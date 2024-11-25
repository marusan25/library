<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class RegisterController extends Controller
{
    
     // 一覧表示
     
     public function register(Request $request)
    {
        $data = [
            'items' => null,
            'keyword' => $request->keyword,
        ];

        if (!empty($request->keyword)) {
            // 検索キーワードあり

            // 日本語で検索するためにURLエンコードする
            $title = urlencode($request->keyword);

           // APIを発行するURLを生成
             $url = 'https://www.googleapis.com/books/v1/volumes?q=' . $title . '&country=JP&tbm=bks';

         $client = new Client();

             // GETでリクエスト実行
            $response = $client->request("GET", $url);

             $body = $response->getBody();

             // レスポンスのJSON形式を連想配列に変換
             $bodyArray = json_decode($body, true);

             // 書籍情報部分を取得
             $items = $bodyArray['items'];

             // レスポンスの中身を見る
             //dd($items);
         }

         return view('bookregister', $data);
     }
}
