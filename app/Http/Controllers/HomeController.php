<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use GuzzleHttp\Client;


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


    /**
     * 一覧表示
     */
    // public function bookregister(Request $request)
    // {
    //     $data = [];

    //     $items = null;

    //     if (!empty($request->keyword)) {
    //         // 検索キーワードあり

    //         // 日本語で検索するためにURLエンコードする
    //         $title = urlencode($request->keyword);

    //         // APIを発行するURLを生成
    //         $url = 'https://www.googleapis.com/books/v1/volumes?q=' . $title . '&country=JP&tbm=bks';

    //         $client = new Client();

    //         // GETでリクエスト実行
    //         $response = $client->request("GET", $url);

    //         $body = $response->getBody();

    //         // レスポンスのJSON形式を連想配列に変換
    //         $bodyArray = json_decode($body, true);

    //         // 書籍情報部分を取得
    //         $items = $bodyArray['items'];

    //         // レスポンスの中身を見る
    //         //dd($items);
    //     }

    //     $data = [
    //         'items' => $items,
    //         'keyword' => $request->keyword,
    //     ];

    //     return view('bookregister', $data);
    // }
}


