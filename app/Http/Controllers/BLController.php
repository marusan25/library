<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class BLController extends Controller
{
    public function index()
    {
        $data=[
            'record'=>Article::all()
        ];

        return view('db.index',$data);
    }
}
