<?php

namespace App\Http\Controllers;

use App\Models\PctHeading;
use Illuminate\Http\Request;
use Excel;
use DataTables;
use DB;
use App\Imports\PCTHeadingImport;
use App\Models\AdditionApplication;
use App\Models\AmendmentApplication;
use App\Models\RevalidationApplication;
use App\Models\IssuanceApplication;

class PctHeadingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
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
            'content' => 'content.view_pct_heading',
            'title' => 'PCT Headings'
        ];
        if ($request->ajax()) {
            $q_heading = DB::table('pct_headings')->select('*');
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
                ->rawColumns(['action'])
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


    public function upload(Request $request)
    {
        try {
            Excel::import(new PCTHeadingImport, request()->file('pct_heading'));
            return response()->json(['success' => 'PCT Headings uploded successfully!']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed']);
        }
    }

    public function store(Request $request)
    {
        try {
            PctHeading::updateOrCreate(
                ['id' => $request->record_id],
                [
                    'pct_heading' => $request->pct_heading,
                    'description' => $request->description,
                ]
            );
            return response()->json(['success' => 'PCT Heading created successfully!']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->errorInfo]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PctHeading  $pctHeading
     * @return \Illuminate\Http\Response
     */
    public function show(PctHeading $pctHeading)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PctHeading  $pctHeading
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Record = PctHeading::find($id);
        return response()->json($Record);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PctHeading  $pctHeading
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PctHeading $pctHeading)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PctHeading  $pctHeading
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PctHeading::find($id)->delete();
        return response()->json(['success' => 'Record deleted!']);
    }
}