<?php

namespace App\Http\Controllers;

use App\OurService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OurServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        if (app()->getLocale()=='th') {
            $data = OurService::select(
                'service_name_th as service_name',
                'service_desciption_th as service_desciption',
                'hastag_th as hastag',
                'picture_header',
                'id'
            )->where('status','active')->orderBy('created_at','desc')->get();
        } else {
            $data = OurService::select(
                'service_name_en as service_name',
                'service_desciption_en as service_desciption',
                'hastag_en as hastag',
                'picture_header',
                'id'
            )->where('status','active')->orderBy('created_at','desc')->get();
        }
        
        return view('our-service',[
            'data' => $data
        ]);
    }

    public function read($id, OurService $ourService)
    {
        $data = [];
        if (app()->getLocale()=='th') {
            $data = OurService::select(
                'service_name_th as service_name',
                'service_desciption_th as service_desciption',
                'hastag_th as hastag',
                'picture_header',
                'id'
            )->where('id',$id)->where('status','active')->first();
        } else {
            $data = OurService::select(
                'service_name_en as service_name',
                'service_desciption_en as service_desciption',
                'hastag_en as hastag',
                'picture_header',
                'id'
            )->where('id',$id)->where('status','active')->first();
        }
        return view('our-service-read',[
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
        return view('page-backend.our-service.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $table = new OurService;
        $table->service_name_th = $request->service_name_th;
        $table->service_name_en = $request->service_name_en;
        $table->service_desciption_th = $request->service_desciption_th;
        $table->service_desciption_en = $request->service_desciption_en;
        $table->hastag_th = $request->hastag_th;
        $table->hastag_en = $request->hastag_en;
        if (!empty($request->file('picture_header'))) {
            $files = $request->file('picture_header');
            $destinationPath = public_path('/images/our-service/');
            $profileImage = date('YmdHis') . Str::random(5) . "." . $files->getClientOriginalExtension();
            if ($files->move($destinationPath, $profileImage)) {
                $table->picture_header = $profileImage;
            }
        }
        $table->save();
        if ($table) {
            return redirect('/webadmin/our-service')->with(['status'=>'success', 'msg'=>'ทำรายการสำเร็จ']);
        }
        return back()->with(['status'=>'danger', 'msg'=>'ทำรายการไม่สำเร็จ']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\OurService  $ourService
     * @return \Illuminate\Http\Response
     */
    public function show(OurService $ourService)
    {
        return view('page-backend.our-service.show',[
            'data' => $ourService->orderBy('created_at','desc')->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OurService  $ourService
     * @return \Illuminate\Http\Response
     */
    public function edit($id, OurService $ourService)
    {
        return view('page-backend.our-service.edit',[
            'data' => $ourService->where('id',$id)->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OurService  $ourService
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request, OurService $ourService)
    {
        $data = [
            'service_name_th' => $request->service_name_th,
            'service_name_en' => $request->service_name_en,
            'service_desciption_th' => $request->service_desciption_th,
            'service_desciption_en' => $request->service_desciption_en,
            'hastag_th' => $request->hastag_th,
            'hastag_en' => $request->hastag_en
        ];
        if (!empty($request->file('picture_header'))) {
            $table = $ourService->where('id',$id)->first();
            try { unlink(public_path('/images/our-service/'.$table->picture_header)); } catch (\Throwable $th) { }
            $files = $request->file('picture_header');
            $destinationPath = public_path('/images/our-service/');
            $profileImage = date('YmdHis') . Str::random(5) . "." . $files->getClientOriginalExtension();
            if ($files->move($destinationPath, $profileImage)) {
                $data['picture_header'] = $profileImage;
            }
        }
        $table = $ourService->where('id',$id)->update($data);
        if ($table) {
            return redirect('/webadmin/our-service')->with(['status'=>'success', 'msg'=>'ทำรายการสำเร็จ']);
        }
        return back()->with(['status'=>'danger', 'msg'=>'ทำรายการไม่สำเร็จ']);
    }
    public function updateStatus($id, $status, OurService $ourService)
    {
        $table = $ourService->where('id',$id)->update([
            'status' => $status
        ]);
        if ($table) {
            return redirect('/webadmin/our-service')->with(['status'=>'success', 'msg'=>'ทำรายการสำเร็จ']);
        }
        return back()->with(['status'=>'danger', 'msg'=>'ทำรายการไม่สำเร็จ']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OurService  $ourService
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, OurService $ourService)
    {
        $table = $ourService->where('id',$id)->first();
        try { unlink(public_path('/images/our-service/'.$table->picture_header)); } catch (\Throwable $th) { }
        $table = $ourService->where('id',$id)->delete();
        if ($table) {
            return back()->with(['status'=>'success', 'msg'=>'ทำรายการสำเร็จ']);
        }
        return back()->with(['status'=>'danger', 'msg'=>'ทำรายการไม่สำเร็จ']);
    }
}
