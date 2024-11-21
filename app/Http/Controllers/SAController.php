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
            redirect("/");
        }
        $article = Book::where('title', 'LIKE', '%$req->search%')
        ->orWhere('author', 'LIKE', '%$req->search%')
        ->orWhere('isbn', 'LIKE', '%$req->search%')
        ->where('is_deleted', 0)
        ->get();
        $count = count($article);
        return view('searchlist');
    }

}
