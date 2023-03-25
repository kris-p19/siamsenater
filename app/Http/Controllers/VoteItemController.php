<?php

namespace App\Http\Controllers;

use App\Vote;
use App\VoteItem;
use Illuminate\Http\Request;

class VoteItemController extends Controller
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
        $this->validate($request,[
            'vote_item' => 'required|exists:votes,id'
        ]);
        $table = new VoteItem;
        $table->vote_id = $request->vote_item;
        $table->save();
        if ($table) {
            $msg = app()->getLocale()=='th'?'<i class="fa fa-check-circle" aria-hidden="true"></i> ขอบคุณสำหรับความเห็นของคุณ':'<i class="fa fa-check-circle" aria-hidden="true"></i> Thank you for your comments.';
            return response()->json(['status'=>'success','msg'=>$msg]);
        }
        $msg = app()->getLocale()=='th'?'ทำรายการไม่สำเร็จ':'Failed to complete the transaction';
        return response()->json(['status'=>'danger','msg'=>'ทำรายการไม่สำเร็จ']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\VoteItem  $voteItem
     * @return \Illuminate\Http\Response
     */
    public function show(VoteItem $voteItem)
    {
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\VoteItem  $voteItem
     * @return \Illuminate\Http\Response
     */
    public function edit(VoteItem $voteItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\VoteItem  $voteItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VoteItem $voteItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\VoteItem  $voteItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(VoteItem $voteItem)
    {
        //
    }
}
