<?php

namespace App\Http\Controllers;

use App\OurServiceItem;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OurServiceItemController extends Controller
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
    public function create($our_service_id)
    {
        return view('page-backend.our-service.item.create',[
            'our_service_id' => $our_service_id
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id, Request $request)
    {
        $table = new OurServiceItem;
        $table->our_service_id = $id;
        $table->name_th = $request->name_th;
        $table->name_en = $request->name_en;
        if (!empty($request->file('picture'))) {
            $files = $request->file('picture');
            $destinationPath = public_path('/images/our-service-items/');
            $profileImage = date('YmdHis') . Str::random(5) . "." . $files->getClientOriginalExtension();
            if ($files->move($destinationPath, $profileImage)) {
                $table->picture = $profileImage;
            }
        }
        $table->save();
        if ($table) {
            return redirect('/webadmin/our-service/item/'.$id)->with(['status'=>'success', 'msg'=>'ทำรายการสำเร็จ']);
        }
        return back()->with(['status'=>'danger', 'msg'=>'ทำรายการไม่สำเร็จ']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\OurServiceItem  $ourServiceItem
     * @return \Illuminate\Http\Response
     */
    public function show($our_service_id, OurServiceItem $ourServiceItem)
    {
        return view('page-backend.our-service.item.show',[
            'data' => $ourServiceItem->where('our_service_id',$our_service_id)->get(),
            'our_service_id' => $our_service_id
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OurServiceItem  $ourServiceItem
     * @return \Illuminate\Http\Response
     */
    public function edit($id, OurServiceItem $ourServiceItem)
    {
        return view('page-backend.our-service.item.edit',[
            'data' => $ourServiceItem->where('id',$id)->first(),
            'our_service_id' => $ourServiceItem->where('id',$id)->first()->our_service_id
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OurServiceItem  $ourServiceItem
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request, OurServiceItem $ourServiceItem)
    {
        $data = [
            'name_th' => $request->name_th,
            'name_en' => $request->name_en
        ];
        if (!empty($request->file('picture'))) {
            $table = $ourServiceItem->where('id',$id)->first();
            try { unlink(public_path('/images/our-service-items/'.$table->picture)); } catch (\Throwable $th) { }
            $files = $request->file('picture');
            $destinationPath = public_path('/images/our-service-items/');
            $profileImage = date('YmdHis') . Str::random(5) . "." . $files->getClientOriginalExtension();
            if ($files->move($destinationPath, $profileImage)) {
                $data['picture'] = $profileImage;
            }
        }
        $table = $ourServiceItem->where('id',$id)->update($data);
        if ($table) {
            return redirect()->back()->with(['status'=>'success', 'msg'=>'ทำรายการสำเร็จ']);
        }
        return back()->with(['status'=>'danger', 'msg'=>'ทำรายการไม่สำเร็จ']);
    }
    public function itemUpdateStatus($id, $status, OurServiceItem $ourServiceItem)
    {
        $table = $ourServiceItem->where('id',$id)->update([
            'status' => $status
        ]);
        if ($table) {
            return redirect()->back()->with(['status'=>'success', 'msg'=>'ทำรายการสำเร็จ']);
        }
        return back()->with(['status'=>'danger', 'msg'=>'ทำรายการไม่สำเร็จ']);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OurServiceItem  $ourServiceItem
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, OurServiceItem $ourServiceItem)
    {
        $table = $ourServiceItem->where('id',$id)->first();
        try { unlink(public_path('/images/our-service-items/'.$table->picture)); } catch (\Throwable $th) { }
        $table = $ourServiceItem->where('id',$id)->delete();
        if ($table) {
            return back()->with(['status'=>'success', 'msg'=>'ทำรายการสำเร็จ']);
        }
        return back()->with(['status'=>'danger', 'msg'=>'ทำรายการไม่สำเร็จ']);
    }
}
