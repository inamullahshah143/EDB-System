<?php

namespace App\Http\Controllers;

use App\Models\ManufacturingDetail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ManufacturingDetailsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $data = [
            'menu' => 'menu.v_menu_oem',
            'content' => 'oem.content.view_manufacturing_details',
            'title' => 'Manufacturing Details'
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
     * @param  \App\Models\ManufacturingDetail  $manufacturingDetail
     * @return \Illuminate\Http\Response
     */
    public function show(ManufacturingDetail $manufacturingDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ManufacturingDetail  $manufacturingDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(ManufacturingDetail $manufacturingDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ManufacturingDetail  $manufacturingDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ManufacturingDetail $manufacturingDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ManufacturingDetail  $manufacturingDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(ManufacturingDetail $manufacturingDetail)
    {
        //
    }
}