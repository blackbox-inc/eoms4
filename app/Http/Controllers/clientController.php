<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\nlineup;
use App\Models\c_information;
use App\Models\c_category;
use DB;

class clientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $c_information = c_information::all();

        $clients = Client::join(
            'nlineup',
            'ncompany.company_name',
            '=',
            'nlineup.company_name'
        )
            ->select(
                'ncompany.*',
                DB::raw('COUNT(nlineup.company_name) as noc')
            )
            ->groupBy('ncompany.company_name')
            ->orderBy('ncompany.id', 'desc')
            ->get();

        return view('clients.index', compact('clients', 'c_information'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function addtolineup(Request $request)
    {
        $applicantName = $request->appname;
        $fra_name = $request->fra_name;
        $pra_officer = $request->pra_officer;

        $findbarcode = c_information::where('fullname', $applicantName)->get();

        if ($findbarcode[0]->bcode) {
            $barcode = $findbarcode[0]->bcode;
            $getposition = c_category::where('u_num', $barcode)->get();
            $position = $getposition[0]->cat2;

            // FIND IF EXISTING TO NLINEUP

            $findExist = nlineup::where('bcode', $barcode)
                ->where('company_name', $fra_name)
                ->first();

            if ($findExist) {
                return '2';
            } else {
                $save = nlineup::create([
                    'bcode' => $barcode,
                    'name' => $applicantName,
                    'company_name' => $fra_name,
                    'position' => $position,
                    'offer_status' => '',
                    'remarks' => '',
                    'history' => 'Lined Up',
                    'username' => $pra_officer,
                ]);

                $save->save();

                return 'SUCCESSFULLY ADDED';
            }
        } else {
            return false;
        }
    }

    public function list($company)
    {
        $getCompany = nlineup::select('nlineup.id as nlineupid', 'nlineup.*')
            ->where('company_name', $company)
            ->join('c_information', 'nlineup.bcode', '=', 'c_information.bcode')
            ->orderBy('nlineup.id', 'desc')
            ->get();
        return view('clients.list', compact('getCompany'));
    }

    public function selected($id)
    {
        nlineup::where('id', $id)->update([
            'history' => 'Selected',
            'offer_status' => 'Accepted',
        ]);
        return 'SUCCESSFULLY SELECTED';
    }
    public function rejected($id)
    {
        nlineup::where('id', $id)->update([
            'history' => 'Rejected',
            'offer_status' => '',
        ]);
        return 'SUCCESSFULLY REJECTED';
    }
    public function backup($id)
    {
        nlineup::where('id', $id)->update([
            'history' => 'Backup',
            'offer_status' => '',
        ]);
        return 'SUCCESSFULLY BACKED UP';
    }
    public function backout($id)
    {
        nlineup::where('id', $id)->update([
            'history' => 'Backout',
            'offer_status' => '',
        ]);
        return 'SUCCESSFULLY BACKED OUT';
    }

    public function delete($id)
    {
        nlineup::where('id', $id)->delete();
        return 'SUCCESSFULLY DELETED';
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
