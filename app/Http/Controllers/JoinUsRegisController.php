<?php

namespace App\Http\Controllers;

use App\JoinUsRegis;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\File\File;
use DataTables;
use DB;

class JoinUsRegisController extends Controller
{
    public function ajaxQuery($job_id, Request $request)
    {
        if ($request->ajax()) {
            $data = JoinUsRegis::select("*")->where('job_id',$job_id)->orderBy('created_at','desc');
            return DataTables::of($data)
            ->addColumn("job",function($row){
                return "<a href='".url('join-us-read/'.$row->job_id)."' target='_blank'>" .
                            DB::table('join_us_jobs')->where('id',$row->job_id)->first()->job_name_th .
                        "</a>";
            })
            ->addColumn("de_phone",function($row){
                return base64_decode($row->phone);
            })
            ->addColumn("de_email",function($row){
                return base64_decode($row->email);
            })
            ->addColumn("de_id_card",function($row){
                return "<a href='".url('card/'.$row->id_card)."' target='_blank'>เปิดดู</a>";
            })
            ->rawColumns(['job','de_phone','de_email','de_id_card'])
            ->make(true);
        }
    }
    public function viewCard($name)
    {
        $myFile = storage_path("card/".$name);
        if (!file_exists($myFile)) { abort(404); }
        return response()->download(
            $myFile,
            $name,
            [],
            'inline'
        );
    }
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\JoinUsRegis  $joinUsRegis
     * @return \Illuminate\Http\Response
     */
    public function show(JoinUsRegis $joinUsRegis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\JoinUsRegis  $joinUsRegis
     * @return \Illuminate\Http\Response
     */
    public function edit(JoinUsRegis $joinUsRegis)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\JoinUsRegis  $joinUsRegis
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JoinUsRegis $joinUsRegis)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\JoinUsRegis  $joinUsRegis
     * @return \Illuminate\Http\Response
     */
    public function destroy(JoinUsRegis $joinUsRegis)
    {
        //
    }
}
