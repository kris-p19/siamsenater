<?php

namespace App\Http\Controllers;

use App\OneStopService;
use Illuminate\Http\Request;

class OneStopServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('page-backend.one-stop-service.index');
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
     * @param  \App\OneStopService  $oneStopService
     * @return \Illuminate\Http\Response
     */
    public function show(OneStopService $oneStopService)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OneStopService  $oneStopService
     * @return \Illuminate\Http\Response
     */
    public function edit(OneStopService $oneStopService)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OneStopService  $oneStopService
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OneStopService $oneStopService)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OneStopService  $oneStopService
     * @return \Illuminate\Http\Response
     */
    public function destroy(OneStopService $oneStopService)
    {
        //
    }

    public static function content()
    {
        if (app()->getLocale()=='th') {
            return OneStopService::select('content_th as content')->first();
        } else {
            return OneStopService::select('content_en as content')->first();
        }
    }
}
