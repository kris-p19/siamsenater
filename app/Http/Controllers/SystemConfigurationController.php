<?php

namespace App\Http\Controllers;

use App\SystemConfiguration;
use Illuminate\Http\Request;

class SystemConfigurationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('page-backend.system-configuration.index',[
            'data' => SystemConfiguration::orderBy('created_at')->get()
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
     * @param  \App\SystemConfiguration  $systemConfiguration
     * @return \Illuminate\Http\Response
     */
    public function show(SystemConfiguration $systemConfiguration)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SystemConfiguration  $systemConfiguration
     * @return \Illuminate\Http\Response
     */
    public function edit(SystemConfiguration $systemConfiguration)
    {
        return view('page-backend.system-configuration.edit',[
            'data' => SystemConfiguration::orderBy('created_at')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SystemConfiguration  $systemConfiguration
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SystemConfiguration $systemConfiguration)
    {
        $path = base_path('.env');
        $test = file_get_contents($path);
        $arr = explode("\n",$test);

        foreach ($request->all() as $key => $value) {
            if ($key!='_token') {
                if (empty($value)) {
                    return back()->with(['status'=>'danger','msg'=>'NOT EMPTY VALUE.']);
                }
            }
        }
        foreach ($request->all() as $key => $value) {
            if ($key!='_token') {
                $systemConfiguration->where('names',$key)->update([
                    'contents' => $value
                ]);

                // foreach ($arr as $index => $row) {
                //     if (!empty($row)) {
                //         if (str_contains($row,$key)) {
                //             if (file_exists($path)) {
                //                 file_put_contents($path, str_replace($row, $key . '="' . $value . '"', $test));
                //                 echo $row . ' :: ' . $key . '="' . $value . '"';
                //                 echo "<hr>";
                //             }
                //         }
                //     }
                // }
            }
        }
        return back()->with(['status'=>'success','msg'=>'ทำรายการสำเร็จ']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SystemConfiguration  $systemConfiguration
     * @return \Illuminate\Http\Response
     */
    public function destroy(SystemConfiguration $systemConfiguration)
    {
        //
    }
}
