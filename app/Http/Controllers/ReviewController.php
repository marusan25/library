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
            'reviewed_at' => date('Y-m-d-')
        ]);
        return view('reviewresult', ['bookId' => $req->book_id, 'success' => 'レビューが追加されました！', 'content' => $req->post_review]);
        // return redirect()->route('layouts.bookdetail', ['bookId' => $book->id])->with('success', 'レビューが追加されました！');
        // return redirect()->route('layouts.bookdetail', $bookId)->with('success', 'レビューが追加されました！');
    }

    // レビューを削除
    public function destroy($bookId, $reviewId)
    {
        $review = Review::where('book_id', $bookId)->where('id', $reviewId)->firstOrFail();
        $review->delete();

        return redirect()->route('layouts.bookdetail', $bookId)->with('success', 'レビューが削除されました！');
    }

    // レビューを編集
    public function update(Request $request, $bookId, $reviewId)
    {
        $request->validate([
            'score' => 'required|integer|min:1|max:5',
            'post_review' => 'required|string|max:100',
        ]);

        $review = Review::where('book_id', $bookId)->where('id', $reviewId)->firstOrFail();
        $review->update([
            'score' => $request->score,
            'post_review' => $request->post_review,
        ]);

        return redirect()->route('layouts.bookdetail', $bookId)->with('success', 'レビューが更新されました！');
    }
}
