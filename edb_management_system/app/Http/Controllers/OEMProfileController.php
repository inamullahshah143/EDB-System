<?php

namespace App\Http\Controllers;

use App\Models\OemProfile;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OEMProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $data = [
            'menu' => 'menu.v_menu_oem',
            'content' => 'oem.content.view_oem_profile',
            'title' => 'OEM Profile'
        ];
        return view('layouts.oem_template', $data);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OemProfile  $oemProfile
     * @return \Illuminate\Http\Response
     */
    public function show(OemProfile $oemProfile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OemProfile  $oemProfile
     * @return \Illuminate\Http\Response
     */
    public function edit(OemProfile $oemProfile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OemProfile  $oemProfile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OemProfile $oemProfile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OemProfile  $oemProfile
     * @return \Illuminate\Http\Response
     */
    public function destroy(OemProfile $oemProfile)
    {
        //
    }
}