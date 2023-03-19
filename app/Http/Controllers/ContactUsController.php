<?php

namespace App\Http\Controllers;

use App\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ContactUs $contactUs)
    {
        $data = [];
        if (app()->getLocale()=='th') {
            $data = $contactUs->select(
                'conpany_name_th as conpany_name',
                'address_th as address',
                'phone',
                'fax',
                'contact1st_th as contact1st',
                'contact2st_th as contact2st',
                'picture_map',
                'url_googlemap',
                'url_facebook',
                'url_twitter',
                'url_instagram',
                'url_youtube',
                'url_line',
                'url_tiktok'
            )->first();
        } else {
            $data = $contactUs->select(
                'conpany_name_en as conpany_name',
                'address_en as address',
                'phone',
                'fax',
                'contact1st_en as contact1st',
                'contact2st_en as contact2st',
                'picture_map',
                'url_googlemap',
                'url_facebook',
                'url_twitter',
                'url_instagram',
                'url_youtube',
                'url_line',
                'url_tiktok'
            )->first();
        }
        return view('contact-us',[
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
     * @param  \App\ContactUs  $contactUs
     * @return \Illuminate\Http\Response
     */
    public function show(ContactUs $contactUs)
    {
        return view('page-backend.contactUs.show',[
            'data' => $contactUs->first()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ContactUs  $contactUs
     * @return \Illuminate\Http\Response
     */
    public function edit($id, ContactUs $contactUs)
    {
        return view('page-backend.contactUs.edit',[
            'data' => $contactUs->where('id',$id)->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ContactUs  $contactUs
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request, ContactUs $contactUs)
    {
        $data = [
            'conpany_name_en' => $request->conpany_name_en,
            'conpany_name_th' => $request->conpany_name_th,
            'address_en' => $request->address_en,
            'address_th' => $request->address_th,
            'phone' => $request->phone,
            'fax' => $request->fax,
            'contact1st_en' => $request->contact1st_en,
            'contact1st_th' => $request->contact1st_th,
            'contact2st_en' => $request->contact2st_en,
            'contact2st_th' => $request->contact2st_th,
            'picture_map' => $request->picture_map,
            'url_googlemap' => $request->url_googlemap,
            'url_facebook' => $request->url_facebook,
            'url_twitter' => $request->url_twitter,
            'url_instagram' => $request->url_instagram,
            'url_youtube' => $request->url_youtube,
            'url_line' => $request->url_line,
            'url_tiktok' => $request->url_tiktok,
            'updated_at' => date('Y-m-d H:i:s')
        ];
        $table = $contactUs->where('id',$id)->update($data);
        if ($table) {
            return redirect('/webadmin/contact-us')->with(['status'=>'success', 'msg'=>'ทำรายการสำเร็จ']);
        }
        return back()->with(['status'=>'danger', 'msg'=>'ทำรายการไม่สำเร็จ']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ContactUs  $contactUs
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContactUs $contactUs)
    {
        //
    }
}
