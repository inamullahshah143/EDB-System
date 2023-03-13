<?php

namespace App\Http\Controllers;

use App\Models\PctHeading;
use App\Models\PctSubHeading;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Excel;
use DataTables;
use DB;
use App\Imports\PCTSubHeadingImport;
use App\Models\AdditionApplication;
use App\Models\AmendmentApplication;
use App\Models\RevalidationApplication;
use App\Models\IssuanceApplication;

class PctSubHeadingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pct_heading_list = array();
        $pct_headings = PctHeading::all();
        foreach ($pct_headings as $pct_heading) {
            $pct_heading_list[] = array('name' => round($pct_heading->pct_heading, 2), 'value' => $pct_heading->id);
        }
        $data = [
            'issuance' => IssuanceApplication::latest()->count(),
            'addition' => AdditionApplication::latest()->count(),
            'amendment' => AmendmentApplication::latest()->count(),
            'revalidation' => RevalidationApplication::latest()->count(),
            'menu' => 'menu.v_menu_admin',
            'content' => 'content.view_pct_sub_headings',
            'title' => 'PCT Sub Headings',
            'pct_heading_list' => $pct_heading_list
        ];

        if ($request->ajax()) {
            $q_heading = DB::table('pct_sub_headings')->select('*');
            return Datatables::of($q_heading)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<div data-toggle="tooltip" data-id="' . $row->id . '" data-original-title="Edit"
              class="btn btn-sm btn-icon btn-outline-success btn-circle mr-2 editRecord"><i class=" fi-rr-edit"></i>
          </div>';
                    $btn = $btn . ' <div data-toggle="tooltip" data-id="' . $row->id . '" data-original-title="Delete"
              class="btn btn-sm btn-icon btn-outline-danger btn-circle mr-2 deleteRecord"><i class="fi-rr-trash"></i>
          </div>';
                    return $btn;
                })
                ->addColumn('cd_rate_applicable', function ($row) {
                    $rate = ($row->cd_rate) * 100;
                    return "$rate%";
                })
                ->rawColumns(['cd_rate_applicable', 'action'])
                ->make(true);
        }
        return view('layouts.v_template', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
            PctSubHeading::updateOrCreate(
                ['id' => $request->record_id],
                [
                    'pct_heading_id' => $request->pct_heading,
                    'sub_pct_heading' => $request->pct_sub_heading,
                    'description' => $request->description,
                    'cd_rate' => ($request->cd_rate) / 100,
                ]
            );
            return response()->json(['success' => 'PCT Heading created successfully!']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->errorInfo]);
        }
    }

    public function upload(Request $request)
    {
        try {
            Excel::import(new PCTSubHeadingImport($request->pct_heading), request()->file('pct_sub_heading'));
            return response()->json(['success' => 'PCT Sub Headings uploded successfully!']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed']);
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PctSubHeading  $pctSubHeading
     * @return \Illuminate\Http\Response
     */
    public function show(PctSubHeading $pctSubHeading)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PctSubHeading  $pctSubHeading
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Record = PctSubHeading::find($id);
        return response()->json($Record);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PctSubHeading  $pctSubHeading
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PctSubHeading $pctSubHeading)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PctSubHeading  $pctSubHeading
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PctSubHeading::find($id)->delete();
        return response()->json(['success' => 'Record deleted!']);
    }
}