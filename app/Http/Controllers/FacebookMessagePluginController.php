<?php

namespace App\Http\Controllers;

use App\FacebookMessagePlugin;
use Illuminate\Http\Request;

class FacebookMessagePluginController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FacebookMessagePlugin  $facebookMessagePlugin
     * @return \Illuminate\Http\Response
     */
    public function show(FacebookMessagePlugin $facebookMessagePlugin)
    {
        return view('page-backend.facebook.show',[
            'data' => $facebookMessagePlugin->first()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FacebookMessagePlugin  $facebookMessagePlugin
     * @return \Illuminate\Http\Response
     */
    public function edit(FacebookMessagePlugin $facebookMessagePlugin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FacebookMessagePlugin  $facebookMessagePlugin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FacebookMessagePlugin $facebookMessagePlugin)
    {
        $this->validate($request,[
            'content' => 'required'
        ]);
        $table = $facebookMessagePlugin->where('id',$facebookMessagePlugin->first()->id)->update([
            'content' => html_entity_decode($request->content)
        ]);
        if ($table) {
            return redirect()->back()->with(['status'=>'success', 'msg'=>'ทำรายการสำเร็จ']);
        }
        return back()->with(['status'=>'danger', 'msg'=>'ทำรายการไม่สำเร็จ']);
    }
    public function updateStatus($status_name, FacebookMessagePlugin $facebookMessagePlugin)
    {
        $table = $facebookMessagePlugin->where('id',$facebookMessagePlugin->first()->id)->update([
            'status' => $status_name
        ]);
        if ($table) {
            return redirect()->back()->with(['status'=>'success', 'msg'=>'ทำรายการสำเร็จ']);
        }
        return back()->with(['status'=>'danger', 'msg'=>'ทำรายการไม่สำเร็จ']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FacebookMessagePlugin  $facebookMessagePlugin
     * @return \Illuminate\Http\Response
     */
    public function destroy(FacebookMessagePlugin $facebookMessagePlugin)
    {
        //
    }
}
