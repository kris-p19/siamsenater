<?php

namespace App\Http\Controllers;

use App\RelatedLink;
use Illuminate\Http\Request;

class RelatedLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('page-backend.relatedLink.index',[
            'data' => RelatedLink::orderBy('created_at','desc')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('page-backend.relatedLink.create');
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
            'name_th' => 'required|string',
            'name_en' => 'required|string',
            'url' => 'required|string',
            'status' => 'required|string',
        ]);
        $table = new RelatedLink;
        $table->name_th = $request->name_th;
        $table->name_en = $request->name_en;
        $table->url = urlencode($request->url);
        $table->status = $request->status;
        $table->save();
        if ($table) {
            return back()->with(['status'=>'success', 'msg'=>'ทำรายการสำเร็จ']);
        }
        return back()->with(['status'=>'danger', 'msg'=>'ทำรายการไม่สำเร็จ']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RelatedLink  $relatedLink
     * @return \Illuminate\Http\Response
     */
    public function show(RelatedLink $relatedLink)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RelatedLink  $relatedLink
     * @return \Illuminate\Http\Response
     */
    public function edit($id, RelatedLink $relatedLink)
    {
        return view('page-backend.relatedLink.edit',[
            'data' => $relatedLink->where('id',$id)->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RelatedLink  $relatedLink
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request, RelatedLink $relatedLink)
    {
        $this->validate($request,[
            'name_th' => 'required|string',
            'name_en' => 'required|string',
            'url' => 'required|string',
            'status' => 'required|string',
        ]);
        $data = [
            "name_th" => $request->name_th,
            "name_en" => $request->name_en,
            "url" => urlencode($request->url),
            "status" => $request->status
        ];
        $table = $relatedLink->where('id',$id)->update($data);
        if ($table) {
            return back()->with(['status'=>'success', 'msg'=>'ทำรายการสำเร็จ']);
        }
        return back()->with(['status'=>'danger', 'msg'=>'ทำรายการไม่สำเร็จ']);
    }

    public function updateStatus($id, $status, Request $request)
    {
        $table = RelatedLink::where('id',$id)->update([
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
     * @param  \App\RelatedLink  $relatedLink
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, RelatedLink $relatedLink)
    {
        $table = $relatedLink->where('id',$id)->delete();
        if ($table) {
            return back()->with(['status'=>'success', 'msg'=>'ทำรายการสำเร็จ']);
        }
        return back()->with(['status'=>'danger', 'msg'=>'ทำรายการไม่สำเร็จ']);
    }
}
