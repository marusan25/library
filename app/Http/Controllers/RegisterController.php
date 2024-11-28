<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Exception;
use App\Models\Book;
use App\Helpers\Toastr;

class RegisterController extends Controller
{

    // 一覧表示

    public function register(Request $req)
    {
        return view("bookregister");
    }

    public function check(Request $req)
    {
        $keyword = $req->input('keyword');

        // キーワードが空の場合
        if (empty($keyword)) {
            return redirect()->back()->withErrors(['もう一度入力してください。']);
        }

        // APIリクエストを送信
        try {
            $title = urlencode($keyword);
            $url = 'https://www.googleapis.com/books/v1/volumes?' . 'q=isbn+title:' . $title . '&country=JP'; // q=以降の書き方で検索方法が変わる

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
                        'price' => $saleInfo['listPrice']['amount'] ?? 0,
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

    public function result(Request $req)
    {
        // 登録済みかどうか確認
        $book = Book::where('isbn', $req->isbn)
            ->where('title', $req->title)
            ->first();

        if (!is_null($book)) {
            Toastr::error('すでに登録済みです');
            return redirect()->back();
            // return to_route('show_result');
        }

        // 新しい本を作成
        $books = new Book();
        $books->title = $req->title;
        $books->author = $req->author ?? '不明'; // 著者はnullが許されるので、nullなら'不明'にする
        $books->isbn = $req->isbn;
        $books->publisher = $req->publisher ?? '不明'; // 出版社はnullが許されるので、nullなら'不明'にする
        $books->amount = $req->price ?? 0;
        $books->thumbnail_path = $req->thumbnail_path ?? '不明'; // サムネイルはnullが許されるので、nullなら'不明'にする
        $books->description = $req->description ?? '説明なし'; // 説明はnullが許されるので、nullなら'説明なし'にする

        // データを保存
        $books->save();
        Toastr::success($books->title."を登録しました。");

        // 保存後はその本のデータを表示するためにshowメソッドを呼び出す
        return redirect()->route('show_result', ['id' => $books->id]);
    }

    // BookController.php

    public function show(Request $req)
    {

        $book = Book::where('id', $req->id)->first();

        $data = [
            'title' => $book->title,
            'author' => $book->author ?? '不明',
            'isbn' => $book->isbn,
            'publisher' => $book->publisher ?? '不明',
            'price' => $book->amount ?? '不明',
            'thumbnail_path' => $book->thumbnail_path,
            'description' => $book->description ?? '説明なし',
        ];

        return view('bookresult', $data);
    }
}
