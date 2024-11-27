<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class RegisterController extends Controller
{

    // 一覧表示

    public function register(Request $req)
    {
        return view("bookregister");
    }

    public function check(Request $req)
    {
        $items = null;

        // 検索キーワードが空の場合
        if (empty($req->keyword)) {
            return redirect()->back()->withErrors(['キーワードを入力してください。']);

        } else {
            $keyword = $req->input('keyword'); // 検索キーワードがある場合

            // // キーワードをURLエンコード
            $title = urlencode($keyword);

            // APIを発行するURLを生成
            $url = 'https://www.googleapis.com/books/v1/volumes?q=isbn:' . $title . '&country=JP';

            // Guzzle HTTPクライアントでリクエストを送信
            $client = new Client();
            $response = $client->request("GET", $url);

            // レスポンスをJSON形式の配列に変換
            $bodyArray = json_decode($response->getBody(), true);

            // 書籍情報部分を取得
            $items = $bodyArray;
        };

        // データをビューに渡す
        $data = [
            'items' => $items,
            'keyword' => $keyword,
        ];

        return view('bookcheck', $data);
    }
}
