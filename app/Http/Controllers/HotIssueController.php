<?php

namespace App\Http\Controllers;

use App\HotIssue;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DataTables;

class HotIssueController extends Controller
{
    public function ajaxQuery(Request $request)
    {
        if ($request->ajax()) {
            $data = HotIssue::select("*");
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
        return view('page-backend.hotIssue.index',[
            'data' => HotIssue::orderBy('created_at')->get()
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
            'picture' => 'required|image',
            'url' => 'required|string'
        ]);
        $file = $request->file('picture');
        $destinationPath = public_path('/images/hotIssue/');
        $profileImage = date('YmdHis') . Str::random(5) . "." . $file->getClientOriginalExtension();
        $file->move($destinationPath, $profileImage);
        $table = new HotIssue;
        $table->picture = $profileImage;
        $table->url = $request->url;
        $table->save();
        if ($table) {
            return back()->with(['status'=>'success', 'msg'=>'ทำรายการสำเร็จ']);
        }
        return back()->with(['status'=>'danger', 'msg'=>'ทำรายการไม่สำเร็จ']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\HotIssue  $hotIssue
     * @return \Illuminate\Http\Response
     */
    public function show(HotIssue $hotIssue)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HotIssue  $hotIssue
     * @return \Illuminate\Http\Response
     */
    public function edit(HotIssue $hotIssue)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HotIssue  $hotIssue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HotIssue $hotIssue)
    {
        //
    }

    public function updateStatus(Request $request, HotIssue $hotIssue)
    {
        $table = HotIssue::where('id',$request->id)->update([
            'status' => $request->status
        ]);
        if ($table) {
            return back()->with(['status'=>'success', 'msg'=>'ทำรายการสำเร็จ']);
        }
        return back()->with(['status'=>'danger', 'msg'=>'ทำรายการไม่สำเร็จ']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HotIssue  $hotIssue
     * @return \Illuminate\Http\Response
     */
    public function destroy(HotIssue $hotIssue)
    {
        //
    }
}
