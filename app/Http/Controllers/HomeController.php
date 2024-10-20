<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


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
        if (is_null($user)) {
            // userが見つからなかったとき
            return to_route('login_create');
        }

        // userが見つかったとき、パスワードがあってるかどうか
        if (Hash::check($request->password, $user->password)) {
            auth()->login($user);
            $user = User::where("email", $request->email)->first();

            Session::put('userId', $user->id);
            Session::put('name', $user->name);
            // dd(Session::get('userId'));
            // $request->sessdion->put('userId',$userId->id);
            return to_route('home');
        }

        return to_route('login_create');
    }

    public function logout(Request $request)
    {
        auth()->logout();

        session()->invalidate(); // セッションをクリア
        session()->regenerateToken(); // セッションIDを再生成

        return to_route('login_create');
    }
}
