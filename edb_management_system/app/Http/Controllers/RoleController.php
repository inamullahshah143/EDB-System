<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AdditionApplication;
use App\Models\AmendmentApplication;
use App\Models\RevalidationApplication;
use App\Models\IssuanceApplication;
use Illuminate\Http\Request;
use App\Models\Role;
use DataTables;

class RoleController extends Controller
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
         'content' => 'content.roles_permission',
         'title' => 'Roles & Permissions'
      ];
      if ($request->ajax()) {
            $q_role = Role::all();
            return Datatables::of($q_role)
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
    public function store(Request $request)
    {
        try {
            Role::updateOrCreate(
                ['id' => $request->record_id],
                [
                    'name' => $request->role_title,
                    'guard_name' => $request->guard_name,
                ]
            );
            return response()->json(['success' => 'Role created successfully!']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->errorInfo]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Record = Role::find($id);
        return response()->json($Record);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Role::find($id)->delete();
        return response()->json(['success' => 'Record deleted!']);
    }
}
