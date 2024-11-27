<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Exception;

class RegisterController extends Controller
{

    // 一覧表示

    public function register(Request $req)
    {
        return view("bookregister");
    }

    public function check(Request $req)
    {
        // $items = null;

        // // 検索キーワードが空の場合
        // if (empty($req->keyword)) {
        //     return redirect()->back()->withErrors(['キーワードを入力してください。']);
        //     // 検索キーワードがある場合
        // } else {
        //     $keyword = $req->input('keyword');

        //     // // キーワードをURLエンコード
        //     $title = urlencode($keyword);

        //     // APIを発行するURLを生成
        //     $url = 'https://www.googleapis.com/books/v1/volumes?q=isbn:' . $title . '&country=JP';

        //     // Guzzle HTTPクライアントでリクエストを送信
        //     $client = new Client();
        //         $response = $client->request("GET", $url);

        //         // レスポンスをJSON形式の配列に変換
        //         $bodyArray = json_decode($response->getBody(), true);

        //         // 書籍情報部分を取得
        //         $items = $bodyArray;

        //     };

        //     // データをビューに渡す
        //     $data = [
        //         'items' => $items,
        //         'keyword' => $keyword,
        //     ];

        //     return view('bookcheck', $data);
        // }
        //↓以下、11/27に修正分

        //         try {
        //             $response = $client->request("GET", $url);

        //             // レスポンスをJSON形式の配列に変換
        //             $bodyArray = json_decode($response->getBody(), true);

        //             // 書籍情報部分を取得
        //             $items = [];
        //             if (isset($bodyArray['items'])) {
        //                 foreach ($bodyArray['items'] as $item) {
        //                     $volumeInfo = $item['volumeInfo'];
        //                     $saleInfo = $item['saleInfo'] ?? [];

        //                     // 必要な情報を配列に追加
        //                     $items[] = [
        //                         'title' => $volumeInfo['title'] ?? '不明',                        // 書籍名
        //                         'author' => isset($volumeInfo['authors']) ? implode(', ', $volumeInfo['authors']) : '不明', // 著者名
        //                         'isbn' => isset($volumeInfo['industryIdentifiers']) ? $volumeInfo['industryIdentifiers'][0]['identifier'] : '不明', // ISBN
        //                         'price' => $saleInfo['listPrice']['amount'] ?? '不明',            // 価格
        //                         'publisher' => $volumeInfo['publisher'] ?? '不明',               // 出版社
        //                         'thumbnail_path' => $volumeInfo['imageLinks']['thumbnail'] ?? '',     // サムネイルURL
        //                         'description' => $volumeInfo['description'] ?? '説明なし',        // 本の詳細
        //                     ];
        //                 }
        //             }
        //         } catch (\Exception $e) {
        //             // エラー時の処理（例: APIが失敗した場合）
        //             return redirect()->back()->withErrors(['書籍情報を取得できませんでした。']);
        //         }
        //     }

        //     // データをビューに渡す
        //     $data = [
        //         'items' => $items,
        //         'keyword' => $keyword,
        //     ];

        //     return view('bookcheck', $data);
        // }
        //↓動くか試し11/27
        $keyword = $req->input('keyword');

        // キーワードが空の場合
        if (empty($keyword)) {
            return redirect()->back()->withErrors(['もう一度入力してください。']);
        }

        // APIリクエストを送信
        try {
            $title = urlencode($keyword);
            $url = 'https://www.googleapis.com/books/v1/volumes?q=isbn:' . $title . '&country=JP';

            $client = new Client();
            $response = $client->get($url);
            $bodyArray = json_decode($response->getBody(), true);

            $items = []; // 初期化
            if (isset($bodyArray['items'])) {
                foreach ($bodyArray['items'] as $item) {
                    $volumeInfo = $item['volumeInfo'];
                    $saleInfo = $item['saleInfo'] ?? [];

                    $items[] = [ // 配列に追加
                        'title' => $volumeInfo['title'] ?? '不明',
                        'author' => isset($volumeInfo['authors']) ? implode(', ', $volumeInfo['authors']) : '不明',
                        'isbn' => $volumeInfo['industryIdentifiers'][0]['identifier'] ?? '不明',
                        'price' => $saleInfo['listPrice']['amount'] ?? '不明',
                        'publisher' => $volumeInfo['publisher'] ?? '不明',
                        'thumbnail_path' => $volumeInfo['imageLinks']['thumbnail'] ?? '',
                        'description' => $volumeInfo['description'] ?? '説明なし',
                    ];
                }
            }
            // dd($bodyArray);
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['書籍情報を取得できませんでした。']);
        }


        // データをビューに渡す
        return view('bookcheck', [
            'items' => $items,
            'keyword' => $keyword,
        ]);
    }
}
