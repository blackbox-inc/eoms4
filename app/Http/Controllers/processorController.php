<?php

namespace App\Http\Controllers;

use App\Models\c_information;
use App\Models\nlineup;
use App\Models\ndeploy;
use App\Models\c_category;
use App\Models\fdh;
use DB;

use Illuminate\Http\Request;

class processorController extends Controller
{
    //
    public function applicants(Request $request)
    {
        $barcode = $request->bcode;

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
            ->where('c_information.bcode', $barcode)
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
            ->get()
            ->toArray();

        return json_encode($applicants);
    }

    public function createResume()
    {
        return view('applicants.create-resume');
    }
    public function resumebuilder()
    {
        return view('applicants.resume-builder');
    }

    public function fdh()
    {
        $fdh = fdh::orderBy('id', 'desc')->get();
        return view('applicants.fdh', compact('fdh'));
    }
}
