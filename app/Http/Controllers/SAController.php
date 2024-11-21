<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SAController extends Controller
{
    public function search(Request $req)
    {
        // if (!isset($req->search) || $req->search === "") {
        //     redirect("/top");
        // }
        // $article = Article::where("user_name", "LIKE", "%$req->search%")->orWhere("id", "LIKE", "%$req->search%")->orWhere("posted_item", "LIKE", "%$req->search%")->where("is_deleted", 0)->get();
        // $count = count($article);
        return view("booksearch");
    }

    public function index(Request $req){

        
    }
}
