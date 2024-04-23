<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\c_information;
use App\Models\nlineup;
use App\Models\ndeploy;
use App\Models\c_category;
use DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->isactive == 0) {
            return view('admin.foractivation');
        } else {
            return view('home');
        }
    }

    public function allapp()
    {
        $applicants = c_information::join(
            'c_category',
            'c_information.bcode',
            '=',
            'c_category.u_num'
        )
            ->leftJoin('nlineup', 'c_information.bcode', '=', 'nlineup.bcode')
            ->select(
                'c_information.*',
                'c_category.*',
                'nlineup.company_name',
                DB::raw("COALESCE(nlineup.history, 'POOLING') AS thechecker")
            )
            ->groupBy('c_information.fullname') // Group by fullname to remove duplicates
            ->orderBy('c_information.id', 'desc') // Order by id column in descending order
            ->get();

        return view('applicants.applicants', compact('applicants'));
    }

    public function fetchallapp(Request $request)
    {
        $applicants = c_information::query()
            ->join(
                'c_category AS category',
                'c_information.bcode',
                '=',
                'category.u_num'
            )
            ->join(
                'c_contactinfo AS contact',
                'c_information.bcode',
                '=',
                'contact.u_num'
            )
            ->leftJoin('nlineup', function ($join) {
                $join
                    ->on('c_information.bcode', '=', 'nlineup.bcode')
                    ->whereRaw(
                        'nlineup.id = (SELECT MAX(id) FROM nlineup WHERE nlineup.bcode = c_information.bcode)'
                    );
            })
            ->select(
                'c_information.*',
                'category.*',
                'contact.*',
                'category.cat2 AS posi',
                DB::raw("COALESCE(nlineup.history, 'POOLING') AS thechecker"),
                'nlineup.history',
                'nlineup.company_name'
            )
            ->distinct()
            ->orderByDesc('c_information.id')
            ->get();
        // Prepare data in DataTables-compatible format
        $data = [];

        foreach ($applicants as $applicant) {
            $data[] = [
                'bcode' => $applicant->bcode,
                'fullname' => strtoupper($applicant->fullname),
                'thechecker' => $applicant->thechecker,
                'posi' => strtoupper($applicant->category->cat2),
                'position_applied' =>
                    '<button class="btn btn-outline-success btn-information btn-sm" data-toggle="modal" data-target="#ModalInformation" data-bcode="' .
                    $applicant->bcode .
                    '">View Information</button>',
            ];
        }

        return response()->json(['data' => $data]);
    }

    public function applicants()
    {
        $applicants = c_information::query()
            ->join(
                'c_category AS category',
                'c_information.bcode',
                '=',
                'category.u_num'
            )
            ->join(
                'c_contactinfo AS contact',
                'c_information.bcode',
                '=',
                'contact.u_num'
            )
            ->leftJoin('nlineup', function ($join) {
                $join
                    ->on('c_information.bcode', '=', 'nlineup.bcode')
                    ->whereRaw(
                        'nlineup.id = (SELECT MAX(id) FROM nlineup WHERE nlineup.bcode = c_information.bcode)'
                    );
            })
            ->select(
                'c_information.*',
                'category.*',
                'contact.*',
                'category.cat2 AS posi',
                DB::raw("COALESCE(nlineup.history, 'POOLING') AS thechecker"),
                'nlineup.history',
                'nlineup.company_name'
            )
            ->distinct()
            ->orderByDesc('c_information.id')
            ->get()
            ->toArray();

        return view('applicants.index')->with(
            'applicants',
            json_encode($applicants)
        );
    }
}
