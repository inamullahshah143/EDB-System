<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\RegisterOem;
use Illuminate\Support\Facades\Hash;

class RegisterOEMController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

        $user_id = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'level' => '1',
            'type' => '1',
            'password' => Hash::make('password'),
        ])->id;
        
        RegisterOem::create([
            'oem_id' => $user_id,
            'phone'=> $request->tel,
            'secp_registration_no'=> $request->secp_registration_no,
            'ntn_no'=> $request->ntn,
            'product_brand'=> $request->product_brand,
            'strn_no'=> $request->strn,
            'poc'=> $request->poc,
            'poc_cell'=> $request->poc_cell, 
            'contact'=> $request->contact,
            'registration_address'=> $request->registration_address,
            'factory_address'=> $request->factory_address,]);
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
        //
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
        //
    }
}
