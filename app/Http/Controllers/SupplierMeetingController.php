<?php

namespace App\Http\Controllers;

use App\SupplierMeeting;
use Illuminate\Http\Request;

class SupplierMeetingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('supplier');
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
     * @param  \App\SupplierMeeting  $supplierMeeting
     * @return \Illuminate\Http\Response
     */
    public function show(SupplierMeeting $supplierMeeting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SupplierMeeting  $supplierMeeting
     * @return \Illuminate\Http\Response
     */
    public function edit(SupplierMeeting $supplierMeeting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SupplierMeeting  $supplierMeeting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SupplierMeeting $supplierMeeting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SupplierMeeting  $supplierMeeting
     * @return \Illuminate\Http\Response
     */
    public function destroy(SupplierMeeting $supplierMeeting)
    {
        //
    }

    public function login()
    {
        return view('required-token');
    }

    public function checkLogin(Request $request)
    {
        $this->validate($request,[
            'token' => 'required',
            'username' => 'required'
        ]);

        $supplier = SupplierMeeting::where('username',$request->username)
        ->where('token',$request->token)
        ->where('status','active')
        ->first();

        if (!empty($supplier)) {
            session()->put('supplier_auth',$request->token);
            return redirect('supplier-meeting');
        }

        session()->forget('supplier_auth');
        return back()->with(['status'=>'danger','msg'=>'Not Access!'])->withInput();
        // dd($supplier);
    }

    public function logout()
    {
        session()->forget('supplier_auth');
        return redirect('supplier-meeting');
    }
}
