<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function home(Request $request)
    {
        // ログイン後は、ユーザーモデルを auth()->user(); で取得できる
        return view('home');
    }

    public function loginCreate(Request $request)
    {
        return view('login');
    }

    public function loginStore(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if(is_null($user)){
            // userが見つからなかったとき
            return to_route('login_create');
        }

        // userが見つかったとき、パスワードがあってるかどうか
        if(Hash::check($request->password, $user->password)){
            auth()->login($user);
            return to_route('home');
        }

        return to_route('login_create');
    }
}
