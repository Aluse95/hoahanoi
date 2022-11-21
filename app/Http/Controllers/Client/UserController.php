<?php

namespace App\Http\Controllers\Client;

use App\Models\Users;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function login() {

        return view('client.login');
    }

    public function register() {

        return view('client.register');
    }

    public function postLogin(Request $request) {

        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ], [
            'email.required' => 'Email không được trống',
            'email.email' => 'Không đúng định dạng email',
            'password.required' => 'Mật khẩu không được trống',
            'password.min' => 'Mật khẩu không được nhỏ hơn :min ký tự',
        ]);

        $check = Users::where('email', $request->input('email'))->first();

        if($check) {

            $pass = md5($request->input('password'));

            if($pass === $check->password) {

                session()->put('customer',$check->email);
                session()->put('name',$check->name);

                return redirect('/bo-hoa-dep');

            } else {
                $message = 'Mật khẩu không chính xác!';

                return view('client.login', compact('message'));
            }

        } else {

            $message = 'Người dùng không tồn tại!';

            return view('client.login', compact('message'));
        }
    }

    public function postRegister(Request $request) {

        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6'
        ],[
            'email.required' => 'Email không được trống',
            'email.email' => 'Không đúng định dạng email',
            'password.required' => 'Mật khẩu không được trống',
            'password.min' => 'Mật khẩu không được nhỏ hơn :min ký tự',
        ]);

        $check = Users::where('email', $request->input('email'))->first();

        if($check) {

            $message = 'Email đã được sử dụng!';

            return view('client.register', compact('message'));

        } else {

            $user = new Users;
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = md5($request->input('password'));
            $user->token = $request->input('_token');
            $user->save();

            session()->put('customer', $user->email);

            return redirect('/gio-hoa-dep');
        }
    }
}
