<?php

namespace App\Http\Controllers;

use App\SupplierMeetingItem;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use File;

class SupplierMeetingItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = SupplierMeetingItem::orderBy('created_at','desc')->get();
        return view('page-backend.supplier-meeting.index',[
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
        return view('page-backend.supplier-meeting.create');
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
            'file' => 'required|mimes:pdf'
        ]);

        $table = new SupplierMeetingItem;
        $table->title_th = $request->title_th;
        $table->title_en = $request->title_en;
        if ($request->file('file')) {
            $file = $request->file('file');
            $destinationPath = public_path('/supplier-meeting/');
            $profileImage = date('YmdHis') . Str::random(20) . "." . $file->getClientOriginalExtension();
            $file->move($destinationPath, $profileImage);
            $table->file = $profileImage;
        }
        $table->save();
        if ($table) {
            return back()->with(['status'=>'success', 'msg'=>'ทำรายการสำเร็จ']);
        }
        return back()->with(['status'=>'danger', 'msg'=>'ทำรายการไม่สำเร็จ']);
    }

    public function openFile($id)
    {
        $file = SupplierMeetingItem::where('id',$id)->first();
        if (!empty($file)) {
            $files = public_path('/supplier-meeting/'.$file->file);
            if (File::exists($files)) {
                $name = !empty($file->title_th)?$file->title_th:Str::random(8);
                return response(file_get_contents($files))
                ->header('Content-Type', 'application/pdf')
                ->header('Content-Disposition', 'inline; filename="'.$name.'.pdf"');
            }
        }
        abort(404);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SupplierMeetingItem  $supplierMeetingItem
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        if (app()->getLocale()=='th') {
            return SupplierMeetingItem::select('id','title_th as title')->where('status','active')->orderby('created_at','desc')->get();
        }
        return SupplierMeetingItem::select('id','title_en as title')->where('status','active')->orderby('created_at','desc')->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SupplierMeetingItem  $supplierMeetingItem
     * @return \Illuminate\Http\Response
     */
    public function edit($id, SupplierMeetingItem $supplierMeetingItem)
    {
        return view('page-backend.supplier-meeting.edit',[
            'data' => $supplierMeetingItem->where('id',$id)->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SupplierMeetingItem  $supplierMeetingItem
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request, SupplierMeetingItem $supplierMeetingItem)
    {
        $data = [
            'title_th' => $request->title_th,
            'title_en' => $request->title_en
        ];
        if (!empty($request->file('file'))) {
            $table = $supplierMeetingItem->where('id',$id)->first();
            try { unlink(public_path('/supplier-meeting/'.$table->file)); } catch (\Throwable $th) { }
            $files = $request->file('file');
            $destinationPath = public_path('/supplier-meeting/');
            $profileImage = date('YmdHis') . Str::random(8) . "." . $files->getClientOriginalExtension();
            if ($files->move($destinationPath, $profileImage)) {
                $data['file'] = $profileImage;
            }
        }
        $table = $supplierMeetingItem->where('id',$id)->update($data);
        if ($table) {
            return redirect('/webadmin/supplier-meeting')->with(['status'=>'success', 'msg'=>'ทำรายการสำเร็จ']);
        }
        return back()->with(['status'=>'danger', 'msg'=>'ทำรายการไม่สำเร็จ']);
    }

    public function updateStatus(Request $request, SupplierMeetingItem $supplierMeetingItem)
    {
        $table = SupplierMeetingItem::where('id',$request->id)->update([
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
     * @param  \App\SupplierMeetingItem  $supplierMeetingItem
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, SupplierMeetingItem $supplierMeetingItem)
    {
        $table = $supplierMeetingItem->where('id',$id)->first();
        try { unlink(public_path('/supplier-meeting/'.$table->file)); } catch (\Throwable $th) { }
        $table = $supplierMeetingItem->where('id',$id)->delete();
        if ($table) {
            return back()->with(['status'=>'success', 'msg'=>'ทำรายการสำเร็จ']);
        }
        return back()->with(['status'=>'danger', 'msg'=>'ทำรายการไม่สำเร็จ']);
    }
}
