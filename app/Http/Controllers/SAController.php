<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class SAController extends Controller
{
    public function booksearch(Request $req)
    {
        return view('booksearch');
    }

    public function searchlist(Request $req)
    {
        $books = null;

        if (!is_null($req->title) || !is_null($req->author) || !is_null($req->isbn)) {
            $books = Book::query()
                ->when(!is_null($req->title), function($query) use ($req){
                    $query->where('title', 'LIKE', "%{$req->title}%");
                })
                ->when(!is_null($req->author), function($query) use ($req){
                    $query->where('author', 'LIKE', "%$req->author%");
                })
                ->when(!is_null($req->isbn), function($query) use ($req){
                    $query->where('isbn', 'LIKE', "%$req->isbn%");
                })
                ->get();
        }

        if (is_null($books) || $books->isEmpty()) {
            // TODO セッションにnullだった時のメッセージを保存
            return to_route('book_search');
        }



        $count = $books->count();

        return view('searchlist', [
            'books' => $books, //検索結果のリスト
            'count' => $count,       //検索結果の件数
        ]);
    }
}

