<?php

namespace App\Http\Controllers;

use App\SupplierMeeting;
use Illuminate\Http\Request;
use App\Http\Controllers\SupplierMeetingItemController;
use DataTables;

class SupplierMeetingController extends Controller
{
    public function ajaxQuery(Request $request)
    {
        if ($request->ajax()) {
            $data = SupplierMeeting::select("*");
            return DataTables::of($data)->make(true);
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = (new SupplierMeetingItemController)->show();
        return view('supplier',[
            'data' => $data
        ]);
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
        $this->validate($request,[
            'token' => 'required',
            'username' => 'required'
        ]);

        $table = SupplierMeeting::insert([
            'username' => $request->username,
            'supplier_name' => $request->supplier_name,
            'token' => $request->token,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        if ($table) {
            return response()->json(['status'=>'success', 'msg'=>'ทำรายการสำเร็จ']);
        }
        return response()->json(['status'=>'danger', 'msg'=>'ทำรายการไม่สำเร็จ']);
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
        $this->validate($request,[
            'token' => 'required',
            'username' => 'required',
            'id' => 'required'
        ]);

        $table = $supplierMeeting->where('id',$request->id)->update([
            'username' => $request->username,
            'supplier_name' => $request->supplier_name,
            'token' => $request->token
        ]);
        if ($table) {
            return response()->json(['status'=>'success', 'msg'=>'ทำรายการสำเร็จ']);
        }
        return response()->json(['status'=>'danger', 'msg'=>'ทำรายการไม่สำเร็จ']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SupplierMeeting  $supplierMeeting
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, SupplierMeeting $supplierMeeting)
    {
        $table = $supplierMeeting->where('id',$id)->delete();
        if ($table) {
            return back()->with(['status'=>'success', 'msg'=>'ทำรายการสำเร็จ']);
        }
        return back()->with(['status'=>'danger', 'msg'=>'ทำรายการไม่สำเร็จ']);
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
            return redirect('/supplier-meetings');
        }

        session()->forget('supplier_auth');
        return back()->with(['status'=>'danger','msg'=>'Not Access!'])->withInput();
        // dd($supplier);
    }

    public function logout()
    {
        session()->forget('supplier_auth');
        return redirect('/supplier-meetings');
    }

    public function account(SupplierMeeting $supplierMeeting)
    {
        return view('page-backend.supplier-meeting.account',[
            'data' => $supplierMeeting->orderBy('created_at','desc')->get()
        ]);
    }

    public function updateStatus(Request $request, SupplierMeeting $supplierMeeting)
    {
        $table = SupplierMeeting::where('id',$request->id)->update([
            'status' => $request->status
        ]);
        if ($table) {
            return back()->with(['status'=>'success', 'msg'=>'ทำรายการสำเร็จ']);
        }
        return back()->with(['status'=>'danger', 'msg'=>'ทำรายการไม่สำเร็จ']);
    }
}
