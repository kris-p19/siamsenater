<?php

namespace App\Http\Controllers;

use App\NewsActivitie;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DataTables;

class NewsActivitieController extends Controller
{
    public function ajaxQuery(Request $request)
    {
        if ($request->ajax()) {
            $data = NewsActivitie::select("*")->orderBy('created_at','desc');
            return DataTables::of($data)
            ->addColumn('gallery', function ($row) {
                $it = "";
                $uri = asset('images/news-activites');
                if (!empty($row->picture_gallery)) {
                    foreach (json_decode($row->picture_gallery) as $key => $value) {
                        $it .= "<img src='".$uri."/".$value."' class='img-responsive' style='width:150px;' onerror='this.style.display=none'>";
                    }
                }
                return $it;
            })
            ->rawColumns(['gallery'])
            ->make(true);
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(NewsActivitie $newsActivitie, Request $request)
    {
        $data = [];
        $group = "";
        if (app()->getLocale()=='th') {
            $data = $newsActivitie->select(
                'title_th as title',
                'content_th as content',
                'group_type_th as group_type',
                'picture_header',
                'picture_gallery',
                'conter',
                'keyword_th as keyword',
                'public_datetime',
                'id'
            )->where('status','active')->where('public_datetime','<',date('Y-m-d H:i:s'))->orderBy('public_datetime','desc');
        } else {
            $data = $newsActivitie->select(
                'title_en as title',
                'content_en as content',
                'group_type_en as group_type',
                'picture_header',
                'picture_gallery',
                'conter',
                'keyword_en as keyword',
                'public_datetime',
                'id'
            )->where('status','active')->where('public_datetime','<',date('Y-m-d H:i:s'))->orderBy('public_datetime','desc');
        }

        if ($request->path()=='news-activities/announcement') {
            $data = $data->where('group_type_en','Announcement');
            $group = __('messages.announcement');
        } else if ($request->path()=='news-activities/event') {
            $data = $data->where('group_type_en','Event');
            $group = __('messages.event');
        } else if ($request->path()=='news-activities/article') {
            $data = $data->where('group_type_en','Article');
            $group = __('messages.article');
        }

        return view('news-activities',[
            'first_item' => $data->take(2)->get(),
            'second_item' => $data->skip(2)->take(10)->get(),
            'group' => $group
        ]);
    }

    public function read($id, NewsActivitie $newsActivitie)
    {
        $newsActivitie->where('id',$id)->update(['conter'=>(($newsActivitie->where('id',$id)->first()->conter*1)+1)]);
        $data = [];
        if (app()->getLocale()=='th') {
            $data = $newsActivitie->select(
                'title_th as title',
                'content_th as content',
                'group_type_th as group_type',
                'picture_header',
                'picture_gallery',
                'conter',
                'keyword_th as keyword',
                'public_datetime',
                'id'
            );
        } else {
            $data = $newsActivitie->select(
                'title_en as title',
                'content_en as content',
                'group_type_en as group_type',
                'picture_header',
                'picture_gallery',
                'conter',
                'keyword_en as keyword',
                'public_datetime',
                'id'
            );
        }
        
        return view('news-activities-read',[
            'data' => $data->where('status','active')->where('id',$id)->first(),
            'group' => $data->where('status','active')->where('id',$id)->first()->group_type_en
        ]);
    }

    public function announcement(Request $request)
    {
        
    }
    public function event(Request $request)
    {
        
    }
    public function article(Request $request)
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('page-backend.newsActivite.create');
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
            'title_th' => 'required',
            'title_en' => 'required',
            'content_th' => 'required',
            'content_en' => 'required',
            'group_type_th' => 'required',
            'group_type_en' => 'required'
        ]);
        $table = new NewsActivitie;
        $table->title_th = $request->title_th;
        $table->title_en = $request->title_en;
        $table->content_th = $request->content_th;
        $table->content_en = $request->content_en;
        $table->group_type_th = $request->group_type_th;
        $table->group_type_en = $request->group_type_en;
        if (!empty($request->file('picture_header'))) {
            $files = $request->file('picture_header');
            $destinationPath = public_path('/images/news-activites/');
            $profileImage = date('YmdHis') . Str::random(5) . "." . $files->getClientOriginalExtension();
            if ($files->move($destinationPath, $profileImage)) {
                $table->picture_header = $profileImage;
            }
        }
        if (!empty($request->file('picture_gallery'))) {
            $files = $request->file('picture_gallery');
            $items = [];
            foreach ($files as $key => $value) {
                $file = $value;
                $destinationPath = public_path('/images/news-activites/');
                $profileImage = date('YmdHis') . Str::random(5) . $key . "." . $file->getClientOriginalExtension();
                if ($file->move($destinationPath, $profileImage)) {
                    array_push($items,$profileImage);
                }
            }
            $table->picture_gallery = json_encode($items);
        }
        $table->conter = $request->conter;
        $table->keyword_th = $request->keyword_th;
        $table->keyword_en = $request->keyword_en;
        $table->public_datetime = empty($request->public_datetime)?date('Y-m-d H:i:s'):$request->public_datetime;
        $table->save();
        if ($table) {
            return redirect('/webadmin/news-activities')->with(['status'=>'success', 'msg'=>'ทำรายการสำเร็จ']);
        }
        return back()->with(['status'=>'danger', 'msg'=>'ทำรายการไม่สำเร็จ']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\NewsActivitie  $newsActivitie
     * @return \Illuminate\Http\Response
     */
    public function show(NewsActivitie $newsActivitie)
    {
        return view('page-backend.newsActivite.show',[
            'data' => $newsActivitie->orderby('id','desc')->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\NewsActivitie  $newsActivitie
     * @return \Illuminate\Http\Response
     */
    public function edit($id, NewsActivitie $newsActivitie)
    {
        return view('page-backend.newsActivite.edit',[
            'data' => $newsActivitie->where('id',$id)->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\NewsActivitie  $newsActivitie
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request, NewsActivitie $newsActivitie)
    {
        $this->validate($request,[
            'title_th' => 'required',
            'title_en' => 'required',
            'content_th' => 'required',
            'content_en' => 'required',
            'group_type_th' => 'required',
            'group_type_en' => 'required'
        ]);
        $data = [
            'title_th' => $request->title_th,
            'title_en' => $request->title_en,
            'content_th' => $request->content_th,
            'content_en' => $request->content_en,
            'group_type_th' => $request->group_type_th,
            'group_type_en' => $request->group_type_en,
            'keyword_th' => $request->keyword_th,
            'keyword_en' => $request->keyword_en,
            'public_datetime' => $request->public_datetime
        ];
        if (!empty($request->file('picture_header'))) {
            $table = $newsActivitie->where('id',$id)->first();
            try { unlink(public_path('/images/news-activites/'.$table->picture_header)); } catch (\Throwable $th) { }
            $files = $request->file('picture_header');
            $destinationPath = public_path('/images/news-activites/');
            $profileImage = date('YmdHis') . Str::random(5) . "." . $files->getClientOriginalExtension();
            if ($files->move($destinationPath, $profileImage)) {
                $data['picture_header'] = $profileImage;
            }
        }
        if (!empty($request->file('picture_gallery'))) {

            $table = $newsActivitie->where('id',$id)->first();
            if (!empty($table->picture_gallery)) {
                foreach (json_decode($table->picture_gallery) as $key => $value) {
                    try { unlink(public_path('/images/news-activites/'.$table->value)); } catch (\Throwable $th) { }
                }
            }
            $files = $request->file('picture_gallery');
            $items = [];
            foreach ($files as $key => $value) {
                $file = $value;
                $destinationPath = public_path('/images/news-activites/');
                $profileImage = date('YmdHis') . Str::random(5) . $key . "." . $file->getClientOriginalExtension();
                if ($file->move($destinationPath, $profileImage)) {
                    array_push($items,$profileImage);
                }
            }
            $data['picture_gallery'] = json_encode($items);
        }
        $table = $newsActivitie->where('id',$id)->update($data);
        if ($table) {
            return redirect('/webadmin/news-activities')->with(['status'=>'success', 'msg'=>'ทำรายการสำเร็จ']);
        }
        return back()->with(['status'=>'danger', 'msg'=>'ทำรายการไม่สำเร็จ']);
    }
    public function updateStatus($id, $status, NewsActivitie $newsActivitie)
    {
        $table = $newsActivitie->where('id',$id)->update([
            'status' => $status
        ]);
        if ($table) {
            return redirect('/webadmin/news-activities')->with(['status'=>'success', 'msg'=>'ทำรายการสำเร็จ']);
        }
        return back()->with(['status'=>'danger', 'msg'=>'ทำรายการไม่สำเร็จ']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\NewsActivitie  $newsActivitie
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, NewsActivitie $newsActivitie)
    {
        $table = $newsActivitie->where('id',$id)->first();
        try { unlink(public_path('/images/news-activites/'.$table->picture_header)); } catch (\Throwable $th) { }
        foreach (json_decode($table->picture_gallery) as $key => $value) {
            try { unlink(public_path('/images/news-activites/'.$value)); } catch (\Throwable $th) { }
        }
        $table = $newsActivitie->where('id',$id)->delete();
        if ($table) {
            return back()->with(['status'=>'success', 'msg'=>'ทำรายการสำเร็จ']);
        }
        return back()->with(['status'=>'danger', 'msg'=>'ทำรายการไม่สำเร็จ']);
    }
}
