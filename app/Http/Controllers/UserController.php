<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(User $user)
    {
        return view('page-backend.administrator.index',[
            'data' => $user->get()
        ]);
    }
    public function create()
    {
        return view('page-backend.administrator.create');
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|confirmed|min:8',
            'status' => 'required|string'
        ]);
        $table = new User;
        $table->name = $request->name;
        $table->email = $request->email;
        $table->password = Hash::make($request->password);
        $table->status = $request->status;
        $table->save();
        if ($table) {
            return back()->with([
                'status' => 'success',
                'msg' => 'ทำรายการสำเร็จ',
                'input' => [
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => $request->password,
                    'status' => $request->status
                ]
            ]);
        }
        return back()->with(['status'=>'danger', 'msg'=>'ทำรายการไม่สำเร็จ']);
    }
    public function updateStatus($id, $status, Request $request)
    {
        $table = User::where('id',$id)->update([
            'status' => $status
        ]);
        if ($table) {
            return back()->with(['status'=>'success', 'msg'=>'ทำรายการสำเร็จ']);
        }
        return back()->with(['status'=>'danger', 'msg'=>'ทำรายการไม่สำเร็จ']);
    }
    public function destroy($id)
    {
        $table = User::where('id',$id)->delete();
        if ($table) {
            return back()->with(['status'=>'success', 'msg'=>'ทำรายการสำเร็จ']);
        }
        return back()->with(['status'=>'danger', 'msg'=>'ทำรายการไม่สำเร็จ']);
    }
    public function resetPassword($id)
    {
        $password = Str::random(8);
        $table = User::where('id',$id)->update([
            'password' => Hash::make($password)
        ]);
        if ($table) {
            return back()->with(['status'=>'success', 'msg'=>'ทำรายการสำเร็จ | <strong style="color:black;font-weight:normal;">รหัสผ่านใหม่ของคุณ ' . User::where('id',$id)->first()->name . ' คือ ' . $password . '</strong>']);
        }
        return back()->with(['status'=>'danger', 'msg'=>'ทำรายการไม่สำเร็จ']);
    }
}
