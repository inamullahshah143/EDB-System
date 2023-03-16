<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AdditionApplication;
use App\Models\AmendmentApplication;
use App\Models\RevalidationApplication;
use App\Models\IssuanceApplication;
use Illuminate\Http\Request;

class RevalidationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $data = [
            'issuance' => IssuanceApplication::latest()->count(),
            'addition' => AdditionApplication::latest()->count(),
            'amendment' => AmendmentApplication::latest()->count(),
            'revalidation' => RevalidationApplication::latest()->count(),
            'menu' => 'menu.v_menu_edb',
            'content' => 'edb.content.view_revalidation_application',
            'title' => 'Re-Validation Of Quota Requests'
        ];
        return view('layouts.v_template', $data);
    }

    public function application(Request $request)
    {
        $data = [
            'issuance' => IssuanceApplication::latest()->count(),
            'addition' => AdditionApplication::latest()->count(),
            'amendment' => AmendmentApplication::latest()->count(),
            'revalidation' => RevalidationApplication::latest()->count(),
            'menu' => 'menu.v_menu_oem',
            'content' => 'oem.content.view_revalidation_application',
            'title' => 'Apply for Re-Validation Of Quota'
        ];
        return view('layouts.oem_template', $data);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}