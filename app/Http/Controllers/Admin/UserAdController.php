<?php

namespace App\Http\Controllers\Admin;

use App\Models\Users;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserAdController extends Controller
{
    public function index() {

        $data = Users::paginate(6);

        return view('admin.user.index', compact('data'));
    }

    public function getAdd() {

        return view('admin.user.add');
    }

    public function postAdd(Request $request) {

        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ], [
            'required' => 'Vui lòng nhập trường này!'
        ]);

        $check = Users::where('email', $request->email)->first();

        if($check) {

            return redirect()->back()->with('message', 'Email đã được sử dụng !');
        } 

        $user = new Users;
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->password = md5($request->password);
        $user->remember_token = $request->input('_token');
        $user->save();

        return redirect()->route('admin.user');
    }

    public function getEdit($id) {

        $item = Users::find($id);

        return view('admin.user.edit', compact('item'));
    }

    public function postEdit(Request $request, $id) {

        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
        ], [
            'required' => 'Vui lòng nhập trường này!'
        ]);

        $user = Users::find($id);
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->save();

        return redirect()->route('admin.user');
    }

    public function del($id) {

        $user = Users::find($id);

        $user->delete();

        return redirect()->route('admin.user');
    }

    public function multiDel(Request $request) {

        $data = $request->all();

        foreach($data['user_id'] as $id) {

            $user = Users::find($id);

            $user->delete();
        }

        return redirect()->route('admin.user');
    }
}
