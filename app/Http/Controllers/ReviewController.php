<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Book;
use App\Models\Review;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Seesion;
use App\Models\User;

class ReviewController extends Controller
{
    public function show(Request $req)
    {
        // セッションから userId を取得
        $userId = Session::get("userId", 0);


        // ユーザー情報とその関連するレビューを取得
        $records = Review::with('user:id,name', 'book')->get();
        // with('reviews', "books")->findOrFail($userId);
        // $book = Book::where("id", $req->bookId)->first();

        // $book = Book::where("id", $req->book)->first();
        // dd($book);
        // dd($book);
        // 必要ならレビューを取得
        // $review = $user->reviews;
        $totalScore = 0;
        $count = 0;
        foreach ($records as $record) {
            $totalScore += $record->score; // 点数を合計
            $count++;
        }
        $avg = round($totalScore / $count, 1);

        return view('bookdetail', compact('records', 'avg'));
        // $userId = Session::get("userId",0);
        // $book = User::where("id",$userId)->get();
        // return view('/bookdetail', compact('book'));
    }

    // レビューを追加
    public function store(Request $req)
    {

        $req->validate([
            'score' => 'required|integer|min:1|max:5',
            'post_review' => 'required|string|max:100',
            'user_id' => 'required|string',
        ]);

        // dd($req);

        Review::create([
            // 'id' => uniqid(),
            // 'book_id' => $bookId,
            'book_id' => $req->book_id,
            'score' => $req->score,
            'content' => $req->post_review,
            'user_id' => $req->user_id,
            'reviewed_at' => date('Y-m-d')
        ]);
        $data=[
            "title"=> "レビューの追加",
            "msg"=>"レビューを追加しました",
            'content' => $req->post_review 
        ];
        return view('reviewresult', $data);
        // return redirect()->route('layouts.bookdetail', ['bookId' => $book->id])->with('success', 'レビューが追加されました！');
        // return redirect()->route('layouts.bookdetail', $bookId)->with('success', 'レビューが追加されました！');
    }
    // レビューを削除チェック
    public function destroycheck(Request $req)
    {
        $review = Review::with('book')->where('id', $req->review_id)->first();
        
        return view("deletecheck", compact("review"));
    }



    // レビューを削除
    public function destroy(Request $req)
    {
        $review = Review::where('id', $req->id)->first();
        $review->delete();

        $data=[
            "title"=> "レビューの削除",
            "msg"=>"レビューを削除しました",
            'content' => $req->post_review 
        ];

        return view("deleteresult",$data);
    }

 // レビューを編集
 public function updatecheck(Request $req)
 {
    $review = Review::with('book')->where('id', $req->review_id)->first();

     return view("reviewedit",compact("review"));
 }


    // レビューを上書き
    public function update(Request $request)
    {
        $request->validate([
            'score' => 'required|integer|min:1|max:5',
            'post_review' => 'required|string|max:100',
        ]);

        $review = Review::where('id', $request->reviewId)->first();

        
        $review->update([
            'score' => $request->score,
            'content' => $request->post_review,
        ]);
        // dd($review);
        $data=[
            "title"=> "レビューの編集",
            "msg"=>"レビューを編集しました",
            'content' => $request->post_review 
        ];
        return view("/editresult",$data);
    }
}