<?php

namespace App\Http\Controllers\Client;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;

class UserController extends Controller
{
    public function register() {

        return view('client.register');
    }

    public function postRegister(Request $request) {

        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ],[
            'email' => 'Không đúng định dạng email',
            'required' => 'Vui lòng điền trường này!',
            'unique' => 'Email đã tồn tại trên hệ thống',
            'min' => 'Mật khẩu không được nhỏ hơn :min ký tự'
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->route('login')->with('message','Đăng kí thành công!');
    }

    public function login() {

        return view('client.login');
    }

    public function postLogin(Request $request) {

        $validated = $request->validate([
            'email' => ['required','email'],
            'password' => ['required']
        ]);

        if (Auth::attempt($validated)) {

            return redirect()->intended(route('home'));
        }

        return back()->withErrors([

            'email' => 'Email hoặc mật khẩu không chính xác!'

        ])->onlyInput('email');
    }

    public function logout(Request $request) {

        Auth::logout();
    
        return redirect()->route('home');
    }
}
