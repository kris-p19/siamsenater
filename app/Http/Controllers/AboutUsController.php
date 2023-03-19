<?php

namespace App\Http\Controllers;

use App\AboutUs;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\AboutUsItemController;

class AboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = [];
        if (app()->getLocale()=='th') {
            $data['icon']   = AboutUs::select('icon')->where('path','/'.$request->path())->first()->icon;
            $data['title']   = AboutUs::select('subject_th as subject')->where('path','/'.$request->path())->first()->subject;
            $data['active']  = AboutUs::select('id')->where('path','/'.$request->path())->first()->id;
            $data['content'] = (new AboutUsItemController)->getItem(AboutUs::select('id')->where('path','/'.$request->path())->first()->id,'th');
            $data['menu']    = AboutUs::select('subject_th as subject','path','icon','id')->where('status','active')->get();
        } else {
            $data['icon']   = AboutUs::select('icon')->where('path','/'.$request->path())->first()->icon;
            $data['title']   = AboutUs::select('subject_en as subject')->where('path','/'.$request->path())->first()->subject;
            $data['active']  = AboutUs::select('id')->where('path','/'.$request->path())->first()->id;
            $data['content'] = (new AboutUsItemController)->getItem(AboutUs::select('id')->where('path','/'.$request->path())->first()->id,'en');
            $data['menu']    = AboutUs::select('subject_en as subject','path','icon','id')->where('status','active')->get();
        }
        return view('about-us',[
            'title'     => $data['title'],
            'active'    => $data['active'],
            'content'   => $data['content'],
            'menu'      => $data['menu'],
            'icon'      => $data['icon']
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('page-backend.about.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $table = new AboutUs;
        $table->subject_en = $request->subject_en;
        $table->subject_th = $request->subject_th;
        $table->path       = (empty($request->path) ? '/about-us/' . strtolower(Str::random(5)) : $request->path);
        $table->icon       = empty($request->icon) ? 'menu' : $request->icon;
        $table->save();
        if ($table) {
            return redirect('/webadmin/about-us')->with(['status'=>'success', 'msg'=>'ทำรายการสำเร็จ']);
        }
        return back()->with(['status'=>'danger', 'msg'=>'ทำรายการไม่สำเร็จ']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AboutUs  $aboutUs
     * @return \Illuminate\Http\Response
     */
    public function show(AboutUs $aboutUs)
    {
        return view('page-backend.about.show',[
            'data' => $aboutUs->orderby('id','desc')->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AboutUs  $aboutUs
     * @return \Illuminate\Http\Response
     */
    public function edit($id, AboutUs $aboutUs)
    {
        return view('page-backend.about.edit',[
            'data' => $aboutUs->where('id',$id)->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AboutUs  $aboutUs
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request, AboutUs $aboutUs)
    {
        $table = $aboutUs->where('id',$id)->update([
            'subject_en' => $request->subject_en,
            'subject_th' => $request->subject_th,
            'path'       => (empty($request->path) ? '/about-us/' . strtolower(Str::random(5)) : $request->path),
            'icon'       => empty($request->icon) ? 'menu' : $request->icon
        ]);
        if ($table) {
            return redirect('/webadmin/about-us')->with(['status'=>'success', 'msg'=>'ทำรายการสำเร็จ']);
        }
        return back()->with(['status'=>'danger', 'msg'=>'ทำรายการไม่สำเร็จ']);
    }
    public function updateStatus($id, $status, AboutUs $aboutUs)
    {
        $table = $aboutUs->where('id',$id)->update([
            'status' => $status
        ]);
        if ($table) {
            return redirect('/webadmin/about-us')->with(['status'=>'success', 'msg'=>'ทำรายการสำเร็จ']);
        }
        return back()->with(['status'=>'danger', 'msg'=>'ทำรายการไม่สำเร็จ']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AboutUs  $aboutUs
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, AboutUs $aboutUs)
    {
        $table = $aboutUs->where('id',$id)->delete();
        if ($table) {
            return back()->with(['status'=>'success', 'msg'=>'ทำรายการสำเร็จ']);
        }
        return back()->with(['status'=>'danger', 'msg'=>'ทำรายการไม่สำเร็จ']);
    }
}
