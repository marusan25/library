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
        if (!isset($req->search) || $req->search === "") {
            return redirect("/"); //インデックスに戻る
        }
        $search = $req->search;
        $article = Book::where('title', 'LIKE', '%'.$search.'%')
        ->orWhere('author', 'LIKE','%'.$search.'%')
        ->orWhere('isbn', 'LIKE', '%'.$search.'%')
        ->where('is_deleted', 0)
        ->get();

        //$article = Book::where('title', 'LIKE', '%$req->search%')
        //->orWhere('author', 'LIKE', '%$req->search%')
        //->orWhere('isbn', 'LIKE', '%$req->search%')
        //->where('is_deleted', 0)
        //->get();

        $count = $articles->count();
        //$count = count($article);

        return view('searchlist', [
            'articles' => $articles, //検索結果のリスト
            'count' => $count,       //検索結果の件数
        ]);
    }
}

//<!-- 検索結果の表示 -->
//<h2>{{ $count }} 件の結果が見つかりました</h2>

//@if ($count > 0)
    //<ul>
        //@foreach ($articles as $article)
            //<li>
                //<strong>タイトル:</strong> {{ $article->title }}<br>
                //<strong>著者:</strong> {{ $article->author }}<br>
                //<strong>ISBN:</strong> {{ $article->isbn }}<br>
            //</li>
        //@endforeach
    //</ul>
//@else
    //<p>検索結果はありません。</p>
//@endif