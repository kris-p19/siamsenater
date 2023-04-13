<?php

namespace App\Http\Controllers;

use App\InternshipProgram;
use Illuminate\Http\Request;

class InternshipProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('page-backend.internship-program.index',[
            'data' => InternshipProgram::first()
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\InternshipProgram  $internshipProgram
     * @return \Illuminate\Http\Response
     */
    public function show(InternshipProgram $internshipProgram)
    {
        $data = [];
        if (app()->getLocale()=='th') {
            $data = $internshipProgram->select('content_th as content')->first();
        } else {
            $data = $internshipProgram->select('content_en as content')->first();
        }
        return view('internship-program',[
            'data'     => $data
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\InternshipProgram  $internshipProgram
     * @return \Illuminate\Http\Response
     */
    public function edit(InternshipProgram $internshipProgram)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\InternshipProgram  $internshipProgram
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InternshipProgram $internshipProgram)
    {
        $table = InternshipProgram::where('id',$internshipProgram->max('id'))->update([
            'content_th' => $request->content_th,
            'content_en' => $request->content_en
        ]);
        if ($table) {
            return back()->with(['status'=>'success', 'msg'=>'ทำรายการสำเร็จ']);
        }
        return back()->with(['status'=>'danger', 'msg'=>'ทำรายการไม่สำเร็จ']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\InternshipProgram  $internshipProgram
     * @return \Illuminate\Http\Response
     */
    public function destroy(InternshipProgram $internshipProgram)
    {
        //
    }

    public static function content()
    {
        if (app()->getLocale()=='th') {
            return InternshipProgram::select('content_th as content')->first();
        } else {
            return InternshipProgram::select('content_en as content')->first();
        }
    }
}
