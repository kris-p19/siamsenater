<?php

namespace App\Http\Controllers;

use App\OurServiceItem;
use Illuminate\Http\Request;

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
    public function store(Request $request)
    {
        //
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
    public function edit(OurServiceItem $ourServiceItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OurServiceItem  $ourServiceItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OurServiceItem $ourServiceItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OurServiceItem  $ourServiceItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(OurServiceItem $ourServiceItem)
    {
        //
    }
}
