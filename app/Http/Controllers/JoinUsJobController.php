<?php

namespace App\Http\Controllers;

use App\JoinUsJob;
use App\JoinUsRegis;
use Illuminate\Http\Request;

class JoinUsJobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($type=null)
    {
        if ($type==null) {
            return view('page-backend.join-us.index',[
                'data' => JoinUsJob::orderBy('created_at','desc')->get()
            ]);
        } else if($type=='all'){
            $data = [];
            if (app()->getLocale()=='th') {
                $data = JoinUsJob::select(
                        'id',
                        'job_name_th as job_name',
                        'job_description_th as job_description',
                        'date_begin',
                        'date_end',
                        'maximum_regis',
                    )
                    ->where('status','active')
                    ->where('date_begin','<=',date('Y-m-d'))
                    ->where('date_end','>=',date('Y-m-d'))
                    ->orderBy('created_at','desc')
                    ->get();
            } else {
                $data = JoinUsJob::select(
                    'id',
                    'job_name_en as job_name',
                    'job_description_en as job_description',
                    'date_begin',
                    'date_end',
                    'maximum_regis',
                )
                ->where('status','active')
                ->where('date_begin','<=',date('Y-m-d'))
                ->where('date_end','>=',date('Y-m-d'))
                ->orderBy('created_at','desc')
                ->get();
            }
            
            return view('join-us',[
                'data' => $data
            ]);
        }
    }

    public function read($id)
    {
        $data = [];
            if (app()->getLocale()=='th') {
                $data = JoinUsJob::select(
                        'id',
                        'job_name_th as job_name',
                        'job_description_th as job_description',
                        'date_begin',
                        'date_end',
                        'maximum_regis',
                    )
                    ->where('status','active')
                    ->where('date_begin','<=',date('Y-m-d'))
                    ->where('date_end','>=',date('Y-m-d'))
                    ->orderBy('created_at','desc')
                    ->first();
            } else {
                $data = JoinUsJob::select(
                    'id',
                    'job_name_en as job_name',
                    'job_description_en as job_description',
                    'date_begin',
                    'date_end',
                    'maximum_regis',
                )
                ->where('status','active')
                ->where('date_begin','<=',date('Y-m-d'))
                ->where('date_end','>=',date('Y-m-d'))
                ->orderBy('created_at','desc')
                ->first();
            }
            if (empty($data)) { abort(404); }
            return view('join-us-read',[
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
            "job_name_th" => "required|string",
            "job_description_th" => "required|string",
            "job_name_en" => "required|string",
            "job_description_en" => "required|string",
            "date_begin" => "required|date",
            "date_end" => "required|date",
            "maximum_regis" => "required|numeric|min:1"
        ]);
        $table = new JoinUsJob;
        $table->job_name_th = $request->job_name_th;
        $table->job_description_th = $request->job_description_th;
        $table->job_name_en = $request->job_name_en;
        $table->job_description_en = $request->job_description_en;
        $table->date_begin = $request->date_begin;
        $table->date_end = $request->date_end;
        $table->maximum_regis = $request->maximum_regis;
        $table->save();
        if ($table) {
            return back()->with(['status'=>'success', 'msg'=>'ทำรายการสำเร็จ']);
        }
        return back()->with(['status'=>'danger', 'msg'=>'ทำรายการไม่สำเร็จ']);
    }

    public function register(Request $request)
    {
        $this->validate($request,[
            "job_id" => "required|exists:join_us_jobs,id",
            "first_name" => "required|string",
            "last_name" => "required|string",
            "phone" => "required|string|min:10",
            "email" => "required|email",
            "age" => "required|numeric|min:1",
            "birth_date" => "required|string",
            "id_card" => "required|string|min:13"
        ]);
        $table = new JoinUsRegis;
        $table->job_id = $request->job_id;
        $table->first_name = $request->first_name;
        $table->last_name = $request->last_name;
        $table->phone = base64_encode($request->phone);
        $table->email = base64_encode($request->email);
        $table->age = $request->age;
        $table->birth_date = $request->birth_date;
        $table->id_card = base64_encode($request->id_card);
        $table->save();
        if ($table) {
            return response()->json(['status'=>'success', 'msg'=>'ทำรายการสำเร็จ']);
        }
        return response()->json(['status'=>'danger', 'msg'=>'ทำรายการไม่สำเร็จ']);
    }

    public function viewRegister($id)
    {
        return view('page-backend.join-us.register',[
            'data' => JoinUsRegis::where('job_id',$id)->orderBy('created_at','desc')->get()
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\JoinUsJob  $joinUsJob
     * @return \Illuminate\Http\Response
     */
    public function show(JoinUsJob $joinUsJob)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\JoinUsJob  $joinUsJob
     * @return \Illuminate\Http\Response
     */
    public function edit($id, JoinUsJob $joinUsJob)
    {
        return view('page-backend.join-us.edit',[
            'data' => $joinUsJob->where('id',$id)->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\JoinUsJob  $joinUsJob
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request, JoinUsJob $joinUsJob)
    {
        $this->validate($request,[
            "job_name_th" => "required|string",
            "job_description_th" => "required|string",
            "job_name_en" => "required|string",
            "job_description_en" => "required|string",
            "date_begin" => "required|date",
            "date_end" => "required|date",
            "maximum_regis" => "required|numeric|min:1"
        ]);
        $data = [
            "job_name_th" => $request->job_name_th,
            "job_description_th" => $request->job_description_th,
            "job_name_en" => $request->job_name_en,
            "job_description_en" => $request->job_description_en,
            "date_begin" => $request->date_begin,
            "date_end" => $request->date_end,
            "maximum_regis" => $request->maximum_regis
        ];
        $table = $joinUsJob->where('id',$id)->update($data);
        if ($table) {
            return back()->with(['status'=>'success', 'msg'=>'ทำรายการสำเร็จ']);
        }
        return back()->with(['status'=>'danger', 'msg'=>'ทำรายการไม่สำเร็จ']);
    }

    public function updateStatus($id, $status, Request $request, JoinUsJob $joinUsJob)
    {
        $table = JoinUsJob::where('id',$id)->update([
            'status' => $status
        ]);
        if ($table) {
            return back()->with(['status'=>'success', 'msg'=>'ทำรายการสำเร็จ']);
        }
        return back()->with(['status'=>'danger', 'msg'=>'ทำรายการไม่สำเร็จ']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\JoinUsJob  $joinUsJob
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, JoinUsJob $joinUsJob)
    {
        $table = $joinUsJob->where('id',$id)->delete();
        if ($table) {
            return back()->with(['status'=>'success', 'msg'=>'ทำรายการสำเร็จ']);
        }
        return back()->with(['status'=>'danger', 'msg'=>'ทำรายการไม่สำเร็จ']);
    }
}
