<?php

namespace App\Http\Controllers;

use App\AboutUsItem;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Storage;
use DB;
use DataTables;

class AboutUsItemController extends Controller
{
    public function ajaxQuery($id, Request $request)
    {
        if ($request->ajax()) {
            $data = AboutUsItem::where('about_us_id',$id)->select("*")->orderBy('created_at','desc');
            return DataTables::of($data)->make(true);
        }
    }
    public static function welcomPageByG($id)
    {
        if (app()->getLocale()=='th') {
            return AboutUsItem::where('about_us_id',$id)
            ->where('status','active')
            ->select('subject_th as subject','content_th as content','datatype')
            ->get();
        } else {
            return AboutUsItem::where('about_us_id',$id)
            ->where('status','active')
            ->select('subject_en as subject','content_en as content','datatype')
            ->get();
        }
    }
    public static function welcomPage()
    {
        if (app()->getLocale()=='th') {
            return AboutUsItem::wherein('id',[2,5])
            ->where('status','active')
            ->select('subject_th as subject','content_th as content','datatype')
            ->get();
        } else {
            return AboutUsItem::wherein('id',[2,5])
            ->where('status','active')
            ->select('subject_en as subject','content_en as content','datatype')
            ->get();
        }
    }
    public function getItem($about_us_id, $lang)
    {
        if ($lang=='th') {
            return AboutUsItem::where('about_us_id',$about_us_id)
            ->where('status','active')
            ->select('subject_th as subject','content_th as content','datatype')
            ->get();
        } else {
            return AboutUsItem::where('about_us_id',$about_us_id)
            ->where('status','active')
            ->select('subject_en as subject','content_en as content','datatype')
            ->get();
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($about_us_id)
    {
        return view('page-backend.about.item.create',[
            'about_us_id' => $about_us_id,
            'datatype' => $this->getEnumValues()
        ]);
    }
    public function create2($about_us_id)
    {
        return view('page-backend.history.create',[
            'about_us_id' => $about_us_id,
            'datatype' => $this->getEnumValues()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($about_us_id, Request $request)
    {
        $table = new AboutUsItem;
        $table->about_us_id = $about_us_id;
        $table->subject_th  = $request->subject_th;
        $table->subject_en  = $request->subject_en;
        $table->datatype    = $request->datatype;
        if (!empty($request->datatype)) {
            if (in_array($request->datatype,['image','file'])) {
                if (!empty($request->file('content_en'))) {
                    $files = $request->file('content_en');
                    $profileImage = date('YmdHis') . Str::random(5) . "." . $files->getClientOriginalExtension();
                    if (Storage::disk('public_upload')->put('about-us/'.$profileImage,file_get_contents($files))) {
                        $table->content_en = $profileImage;
                    }
                }
                if (!empty($request->file('content_th'))) {
                    $files = $request->file('content_th');
                    $profileImage = date('YmdHis') . Str::random(5) . "." . $files->getClientOriginalExtension();
                    if (Storage::disk('public_upload')->put('about-us/'.$profileImage,file_get_contents($files))) {
                        $table->content_th = $profileImage;
                    }
                }
            } else {
                $table->content_en = $request->content_en;
                $table->content_th = $request->content_th;
            }
        }
        $table->save();
        if ($table) {
            return back()->with(['status'=>'success', 'msg'=>'ทำรายการสำเร็จ']);
        }
        return back()->with(['status'=>'danger', 'msg'=>'ทำรายการไม่สำเร็จ']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AboutUsItem  $aboutUsItem
     * @return \Illuminate\Http\Response
     */
    public function show($about_us_id, AboutUsItem $aboutUsItem)
    {
        return view('page-backend.about.item.show',[
            'data' => $aboutUsItem->where('about_us_id',$about_us_id)->get(),
            'about_us_id' => $about_us_id
        ]);
    }
    public function showHistoryOnly(AboutUsItem $aboutUsItem)
    {
        return view('page-backend.history.show',[
            'data' => $aboutUsItem->where('about_us_id',2)->get(),
            'about_us_id' => 2
        ]);
    }

    public static function getEnumValues() {
        $type = DB::select(DB::raw("SHOW COLUMNS FROM about_us_items WHERE Field = 'datatype'"))[0]->Type;
        $type = str_replace('enum','',$type);
        $type = str_replace('(','',$type);
        $type = str_replace(')','',$type);
        $type = str_replace("'",'',$type);
        $type = explode(',',$type);
        return $type;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AboutUsItem  $aboutUsItem
     * @return \Illuminate\Http\Response
     */
    public function edit($id, AboutUsItem $aboutUsItem)
    {
        return view('page-backend.about.item.edit',[
            'data' => $aboutUsItem->where('id',$id)->first(),
            'datatype' => $this->getEnumValues(),
            'about_us_id' => $aboutUsItem->where('id',$id)->first()->about_us_id
        ]);
    }
    public function edit2($id, AboutUsItem $aboutUsItem)
    {
        return view('page-backend.history.edit',[
            'data' => $aboutUsItem->where('id',$id)->first(),
            'datatype' => $this->getEnumValues(),
            'about_us_id' => $aboutUsItem->where('id',$id)->first()->about_us_id
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AboutUsItem  $aboutUsItem
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request, AboutUsItem $aboutUsItem)
    {
        $data = [
            'subject_th' => $request->subject_th,
            'subject_en' => $request->subject_en,
            'datatype' => $request->datatype
        ];
        if (!empty($request->datatype)) {
            if (in_array($request->datatype,['image','file'])) {
                if (!empty($request->file('content_en'))) {
                    $table = $aboutUsItem->where('id',$id)->first();
                    try { unlink(public_path('/upload/about-us/'.$table->content_en)); } catch (\Throwable $th) { }
                    $files = $request->file('content_en');
                    $profileImage = date('YmdHis') . Str::random(5) . "." . $files->getClientOriginalExtension();
                    if (Storage::disk('public_upload')->put('about-us/'.$profileImage,file_get_contents($files))) {
                        $data['content_en'] = $profileImage;
                    }
                }
                if (!empty($request->file('content_th'))) {
                    $table = $aboutUsItem->where('id',$id)->first();
                    try { unlink(public_path('/upload/about-us/'.$table->content_th)); } catch (\Throwable $th) { }
                    $files = $request->file('content_th');
                    $profileImage = date('YmdHis') . Str::random(5) . "." . $files->getClientOriginalExtension();
                    if (Storage::disk('public_upload')->put('about-us/'.$profileImage,file_get_contents($files))) {
                        $data['content_th'] = $profileImage;
                    }
                }
            } else {
                $data['content_en'] = $request->content_en;
                $data['content_th'] = $request->content_th;
            }
        }
        $table = $aboutUsItem->where('id',$id)->update($data);
        if ($table) {
            return back()->with(['status'=>'success', 'msg'=>'ทำรายการสำเร็จ']);
        }
        return back()->with(['status'=>'danger', 'msg'=>'ทำรายการไม่สำเร็จ']);
    }

    public function itemUpdateStatus($id, $status, AboutUsItem $aboutUsItem)
    {
        $table = $aboutUsItem->where('id',$id)->update([
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
     * @param  \App\AboutUsItem  $aboutUsItem
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, AboutUsItem $aboutUsItem)
    {
        $table = $aboutUsItem->where('id',$id)->first();
        if (in_array($table->datatype,['image','file'])) {
            try { 
                unlink(public_path('/upload/about-us/'.$table->content_en)); 
                unlink(public_path('/upload/about-us/'.$table->content_th)); 
            } catch (\Throwable $th) { }
        }
        $table = $aboutUsItem->where('id',$id)->delete();
        if ($table) {
            return back()->with(['status'=>'success', 'msg'=>'ทำรายการสำเร็จ']);
        }
        return back()->with(['status'=>'danger', 'msg'=>'ทำรายการไม่สำเร็จ']);
    }
}
