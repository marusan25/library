<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class ListController extends Controller
{
  public function list()
  {
    $data=[
        'books'=>Book::paginate(5)
    ];
    return view('List.list',$data);
  }
}
