<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserAdController extends Controller
{
    public function index() {

        $data = User::paginate(6);

        return view('admin.user.index', compact('data'));
    }

    public function getAdd() {

        return view('admin.user.add');
    }

    public function postAdd(Request $request) {

        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ], [
            'email' => 'Không đúng định dạng email',
            'required' => 'Vui lòng điền trường này!',
            'unique' => 'Email đã tồn tại trên hệ thống',
            'min' => 'Mật khẩu không được nhỏ hơn :min ký tự'
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->level = $request->level;
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->route('admin.user');
    }

    public function getEdit($id) {

        $item = User::find($id);

        return view('admin.user.edit', compact('item'));
    }

    public function postEdit(Request $request, $id) {

        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
        ], [
            'required' => 'Vui lòng nhập trường này!'
        ]);

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->level = $request->level;
        $user->save();

        return redirect()->route('admin.user');
    }

    public function del($id) {

        $user = User::find($id);

        $user->delete();

        return redirect()->route('admin.user');
    }

    public function multiDel(Request $request) {

        $data = $request->all();

        foreach($data['user_id'] as $id) {

            $user = User::find($id);

            $user->delete();
        }

        return redirect()->route('admin.user');
    }
}
