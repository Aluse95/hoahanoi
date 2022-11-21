<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index() {

        $data = Admin::paginate(6);

        return view('admin.admin.index', compact('data'));
    }

    public function getAdd() {

        return view('admin.admin.add');
    }

    public function postAdd(Request $request) {

        $validated = $request->validate([
            'name' => 'required',
            'username' => 'required',
            'password' => 'required'
        ], [
            'required' => 'Vui lòng nhập trường này!'
        ]);

        $check = Admin::where('username', $request->username)->first();

        if($check) {

            return redirect()->back()->with('message', 'Tên đăng nhập đã được sử dụng !');
        } 

        $admin = new Admin;
        $admin->name = $request->name;
        $admin->username = $request->username;
        $admin->password = md5($request->password);
        $admin->save();

        return redirect()->route('admin.admin');
    }

    public function getEdit($id) {

        $item = Admin::find($id);

        return view('admin.admin.edit', compact('item'));
    }

    public function postEdit(Request $request, $id) {

        $validated = $request->validate([
            'name' => 'required',
            'username' => 'required',
        ],[
            'required' => 'Vui lòng nhập trường này!'
        ]);

        $admin = Admin::find($id);
        $admin->name = $request->name;
        $admin->username = $request->username;
        $admin->image = $request->image;
        $admin->save();

        return redirect()->route('admin.admin');
    }

    public function del($id) {

        $admin = Admin::find($id);

        $admin->delete();

        return redirect()->route('admin.admin');
    }
}
