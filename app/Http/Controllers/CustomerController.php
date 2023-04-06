<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DataTables;

class CustomerController extends Controller
{
    public function ajaxQuery(Request $request)
    {
        if ($request->ajax()) {
            $data = Customer::select("*");
            return DataTables::of($data)->make(true);
        }
    }
    public static function wellcomeGet()
    {
        if (app()->getLocale()=='th') {
            return Customer::select('customer_name_th as name','customer_description_th as description','customer_logo')->where('status','active')->orderBy('created_at','desc')->get();
        } else {
            return Customer::select('customer_name_en as name','customer_description_en as description','customer_logo')->where('status','active')->orderBy('created_at','desc')->get();
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        if (app()->getLocale()=='th') {
            $data = Customer::select('customer_name_th as name','customer_description_th as description','customer_logo')->where('status','active')->orderBy('created_at','desc')->get();
        } else {
            $data = Customer::select('customer_name_en as name','customer_description_en as description','customer_logo')->where('status','active')->orderBy('created_at','desc')->get();
        }
        return view('customer',[
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
        return view('page-backend.customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $table = new Customer;
        $table->customer_name_en        = $request->customer_name_en;
        $table->customer_description_en = $request->customer_description_en;
        $table->customer_name_th        = $request->customer_name_th;
        $table->customer_description_th = $request->customer_description_th;
        if (!empty($request->file('customer_logo'))) {
            $files = $request->file('customer_logo');
            $destinationPath = public_path('/images/customers/');
            $profileImage = date('YmdHis') . Str::random(5) . "." . $files->getClientOriginalExtension();
            if ($files->move($destinationPath, $profileImage)) {
                $table->customer_logo = $profileImage;
            }
        }
        $table->save();
        if ($table) {
            return redirect('/webadmin/customer')->with(['status'=>'success', 'msg'=>'ทำรายการสำเร็จ']);
        }
        return back()->with(['status'=>'danger', 'msg'=>'ทำรายการไม่สำเร็จ']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        return view('page-backend.customer.show',[
            'data' => $customer->orderby('id','desc')->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Customer $customer)
    {
        return view('page-backend.customer.edit',[
            'data' => $customer->where('id',$id)->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request, Customer $customer)
    {
        $data = [
            'customer_name_en' => $request->customer_name_en,
            'customer_description_en' => $request->customer_description_en,
            'customer_name_th' => $request->customer_name_th,
            'customer_description_th' => $request->customer_description_th
        ];
        if (!empty($request->file('customer_logo'))) {
            $table = $customer->where('id',$id)->first();
            try { unlink(public_path('/images/customers/'.$table->customer_logo)); } catch (\Throwable $th) { }
            $files = $request->file('customer_logo');
            $destinationPath = public_path('/images/customers/');
            $profileImage = date('YmdHis') . Str::random(5) . "." . $files->getClientOriginalExtension();
            if ($files->move($destinationPath, $profileImage)) {
                $data['customer_logo'] = $profileImage;
            }
        }
        $table = $customer->where('id',$id)->update($data);
        if ($table) {
            return redirect('/webadmin/customer')->with(['status'=>'success', 'msg'=>'ทำรายการสำเร็จ']);
        }
        return back()->with(['status'=>'danger', 'msg'=>'ทำรายการไม่สำเร็จ']);
    }
    public function updateStatus($id, $status, Customer $customer)
    {
        $table = $customer->where('id',$id)->update([
            'status' => $status
        ]);
        if ($table) {
            return redirect('/webadmin/customer')->with(['status'=>'success', 'msg'=>'ทำรายการสำเร็จ']);
        }
        return back()->with(['status'=>'danger', 'msg'=>'ทำรายการไม่สำเร็จ']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Customer $customer)
    {
        $table = $customer->where('id',$id)->first();
        try { unlink(public_path('/images/customers/'.$table->customer_logo)); } catch (\Throwable $th) { }
        $table = $customer->where('id',$id)->delete();
        if ($table) {
            return back()->with(['status'=>'success', 'msg'=>'ทำรายการสำเร็จ']);
        }
        return back()->with(['status'=>'danger', 'msg'=>'ทำรายการไม่สำเร็จ']);
    }
}
