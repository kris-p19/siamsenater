<?php

namespace App\Http\Controllers;

use App\Vote;
use App\VoteItem;
use Illuminate\Http\Request;
use DB;

class VoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('page-backend.vote.index',[
            'data' => Vote::orderBy('created_at','desc')->get()
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
            'name_th' => 'required',
            'name_en' => 'required'
        ]);
        $table = new Vote;
        $table->name_th = $request->name_th;
        $table->name_en = $request->name_en;
        $table->save();
        if ($table) {
            return back()->with(['status'=>'success','msg'=>'ทำรายการสำเร็จ']);
        }
        return back()->with(['status'=>'danger','msg'=>'ทำรายการไม่สำเร็จ']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vote  $vote
     * @return \Illuminate\Http\Response
     */
    public function show(Vote $vote)
    {
        $data = Vote::orderBy('created_at')->get();
        $final = [];
        $set = [];
        foreach ($data as $key => $value) {
            // array_push($final[0],());
            array_push($final,app()->getLocale()=='th'?$value->name_th:$value->name_en);
            array_push($set,(VoteItem::where('vote_id',$value->id)->count()));
            // array_push($final[1],VoteItem::where('vote_id',$value->id)->count());
        }
        return view('vote.ajax-chart',[
            'label' => $final,
            'data' => $set
        ]);
        // return response()->json([
        //     'data' => $final
        // ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vote  $vote
     * @return \Illuminate\Http\Response
     */
    public function edit(Vote $vote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vote  $vote
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vote $vote)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vote  $vote
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vote $vote)
    {
        //
    }
}
