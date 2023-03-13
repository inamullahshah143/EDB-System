<?php

namespace App\Http\Controllers;

use App\Models\Sro693;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Excel;
use DataTables;
use DB;
use App\Imports\SRO693Import;
use App\Models\AdditionApplication;
use App\Models\AmendmentApplication;
use App\Models\RevalidationApplication;
use App\Models\IssuanceApplication;


class SRO693Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = [
            'issuance' => IssuanceApplication::latest()->count(),
            'addition' => AdditionApplication::latest()->count(),
            'amendment' => AmendmentApplication::latest()->count(),
            'revalidation' => RevalidationApplication::latest()->count(),
            'menu' => 'menu.v_menu_admin',
            'content' => 'content.view_sro_693',
            'title' => 'SRO 693 PCT Headings',
        ];

        if ($request->ajax()) {
            $q_693_heading = DB::table('sro693s')->select('*');
            return Datatables::of($q_693_heading)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<div data-toggle="tooltip" data-id="' . $row->id . '" data-original-title="Edit"
             class="btn btn-sm btn-icon btn-outline-success btn-circle mr-2 editRecord"><i
                 class=" fi-rr-edit"></i></div>';
                    $btn = $btn . ' <div data-toggle="tooltip" data-id="' . $row->id . '" data-original-title="Delete"
             class="btn btn-sm btn-icon btn-outline-danger btn-circle mr-2 deleteRecord"><i
                 class="fi-rr-trash"></i>
         </div>';
                    return $btn;
                })
                ->addColumn('cd_rate_applicable', function ($row) {
                    $rate = ($row->cd_rate) * 100;
                    return "$rate%";
                })
                ->addColumn('acd_rate_applicable', function ($row) {
                    $rate = ($row->acd_rate) * 100;
                    return "$rate%";
                })
                ->rawColumns(['cd_rate_applicable', 'acd_rate_applicable', 'action'])
                ->make(true);
        }
        return view('layouts.v_template', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function upload(Request $request)
    {
        try {
            Excel::import(new SRO693Import, request()->file('sro_693_heading'));
            return response()->json(['success' => 'SRO-693 uploded successfully!']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed']);
        }
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            Sro693::updateOrCreate(
                ['id' => $request->record_id],
                [
                    'pct_heading' => $request->pct_heading,
                    'description' => $request->description,
                    'cd_rate' => ($request->cd_rate) / 100,
                    'acd_rate' => ($request->acd_rate) / 100,
                ]
            );
            return response()->json(['success' => 'SRO-693 created successfully!']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed']);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sro693  $sro693
     * @return \Illuminate\Http\Response
     */
    public function show(Sro693 $sro693)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sro693  $sro693
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Record = Sro693::find($id);
        return response()->json($Record);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sro693  $sro693
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sro693 $sro693)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sro693  $sro693
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Sro693::find($id)->delete();
        return response()->json(['success' => 'Record deleted!']);
    }
}