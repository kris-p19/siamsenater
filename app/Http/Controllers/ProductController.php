<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($groupName=null)
    {
        $data = [];
        $title = __('messages.product');
        $sub = 0;
        if (app()->getLocale()=='th') {
            $data = Product::select(
                'group_name_th as group_name',
                'name_th as name',
                'desciption_th as desciption',
                'picture',
                'id'
            )->where('status','active')->orderBy('created_at','desc');
            if (!empty($groupName)) {
                $data = $data->where('group_name_th',$groupName)->get();
                $title = $groupName;
                $sub = 1;
            } else {
                $data = $data->groupBy('group_name_th')->get();
            }
        } else {
            $data = Product::select(
                'group_name_en as group_name',
                'name_en as name',
                'desciption_en as desciption',
                'picture',
                'id'
            )->where('status','active')->orderBy('created_at','desc');
            if (!empty($groupName)) {
                $data = $data->where('group_name_en',$groupName)->get();
                $title = $groupName;
                $sub = 1;
            } else {
                $data = $data->groupBy('group_name_en')->get();
            }
        }
        
        return view('product',[
            'data' => $data,
            'title' => $title,
            'sub' => $sub
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('page-backend.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $table = new Product;
        $table->group_name_th = $request->group_name_th;
        $table->group_name_en = $request->group_name_en;
        $table->name_th = $request->name_th;
        $table->name_en = $request->name_en;
        $table->desciption_th = $request->desciption_th;
        $table->desciption_en = $request->desciption_en;
        if (!empty($request->file('picture'))) {
            $files = $request->file('picture');
            $destinationPath = public_path('/images/product/');
            $profileImage = date('YmdHis') . Str::random(5) . "." . $files->getClientOriginalExtension();
            if ($files->move($destinationPath, $profileImage)) {
                // Resize image
                list($width, $height) = getimagesize($destinationPath . $profileImage);
                $newwidth = 300;
                $newheight = ($height / $width) * $newwidth;
                $thumb = imagecreatetruecolor($newwidth, $newheight);
                $source = imagecreatefromjpeg($destinationPath . $profileImage);
                imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
                
                // Save resized image
                $resized_folder = $destinationPath . 'resize/' . $profileImage;
                imagejpeg($thumb, $resized_folder, 80);

                $table->picture = $profileImage;
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
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('page-backend.product.show',[
            'data' => $product->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Product $product)
    {
        return view('page-backend.product.edit',[
            'data' => $product->where('id',$id)->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request, Product $product)
    {
        $data = [
            'group_name_th' => $request->group_name_th,
            'group_name_en' => $request->group_name_en,
            'name_th' => $request->name_th,
            'name_en' => $request->name_en,
            'desciption_th' => $request->desciption_th,
            'desciption_en' => $request->desciption_en
        ];
        if (!empty($request->file('picture'))) {
            $table = $product->where('id',$id)->first();
            try { unlink(public_path('/images/product/'.$table->picture)); } catch (\Throwable $th) { }
            try { unlink(public_path('/images/product/resize/'.$table->picture)); } catch (\Throwable $th) { }
            $files = $request->file('picture');
            $destinationPath = public_path('/images/product/');
            $profileImage = date('YmdHis') . Str::random(5) . "." . $files->getClientOriginalExtension();
            if ($files->move($destinationPath, $profileImage)) {
                // Resize image
                list($width, $height) = getimagesize($destinationPath . $profileImage);
                $newwidth = 300;
                $newheight = ($height / $width) * $newwidth;
                $thumb = imagecreatetruecolor($newwidth, $newheight);
                $source = imagecreatefromjpeg($destinationPath . $profileImage);
                imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
                
                // Save resized image
                $resized_folder = $destinationPath . 'resize/' . $profileImage;
                imagejpeg($thumb, $resized_folder, 80);

                $data['picture'] = $profileImage;
            }
        }
        $table = $product->where('id',$id)->update($data);
        if ($table) {
            return back()->with(['status'=>'success', 'msg'=>'ทำรายการสำเร็จ']);
        }
        return back()->with(['status'=>'danger', 'msg'=>'ทำรายการไม่สำเร็จ']);
    }
    public function itemUpdateStatus($id, $status, Product $product)
    {
        $table = $product->where('id',$id)->update([
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
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Product $product)
    {
        $table = $product->where('id',$id)->first();
        try { unlink(public_path('/images/product/'.$table->picture)); } catch (\Throwable $th) { }
        try { unlink(public_path('/images/product/resize/'.$table->picture)); } catch (\Throwable $th) { }
        $table = $product->where('id',$id)->delete();
        if ($table) {
            return back()->with(['status'=>'success', 'msg'=>'ทำรายการสำเร็จ']);
        }
        return back()->with(['status'=>'danger', 'msg'=>'ทำรายการไม่สำเร็จ']);
    }
}
