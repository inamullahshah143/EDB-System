<?php

namespace App\Http\Controllers;

use App\Models\AdditionApplication;
use App\Models\AmendmentApplication;
use App\Models\RevalidationApplication;
use App\Models\IssuanceApplication;

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
        $data = array(
            'issuance' => IssuanceApplication::latest()->count(),
            'addition' => AdditionApplication::latest()->count(),
            'amendment' => AmendmentApplication::latest()->count(),
            'revalidation' => RevalidationApplication::latest()->count(),
            'menu' => 'menu.v_menu_admin',
            'content' => 'content.view_dashboard'
        );
        return view('layouts.v_template', $data);
    }

    public function oemHome()
    {
        $data = array(
            'issuance' => IssuanceApplication::latest()->count(),
            'addition' => AdditionApplication::latest()->count(),
            'amendment' => AmendmentApplication::latest()->count(),
            'revalidation' => RevalidationApplication::latest()->count(),
            'menu' => 'menu.v_menu_oem',
            'content' => 'oem.content.view_dashboard'
        );
        return view('layouts.oem_template', $data);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edbHome()
    {
        $data = array(
            'issuance' => IssuanceApplication::latest()->count(),
            'addition' => AdditionApplication::latest()->count(),
            'amendment' => AmendmentApplication::latest()->count(),
            'revalidation' => RevalidationApplication::latest()->count(),
            'menu' => 'menu.v_menu_edb',
            'content' => 'edb.content.view_dashboard'
        );
        return view('layouts.edb_template', $data);
    }
}