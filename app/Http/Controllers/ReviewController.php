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
        $user = User::with('reviews', "books")->findOrFail($userId);


        $book = Book::where("id", $req->bookId)->first();

        // 必要ならレビューを取得
        $review = $user->reviews;


        return view('bookdetail', compact('user', 'review', 'book'));
        // $userId = Session::get("userId",0);
        // $book = User::where("id",$userId)->get();
        // return view('/bookdetail', compact('book'));
    }

    // レビューを追加
    public function store(Request $request, $bookId)
    {
        $request->validate([
            'score' => 'required|integer|min:1|max:5',
            'post_review' => 'required|string|max:100',
            'user_id' => 'required|string',
        ]);

        Review::create([
            'id' => uniqid(),
            'book_id' => $bookId,
            'score' => $request->score,
            'post_review' => $request->post_review,
            'user_id' => $request->user_id,
        ]);

        return redirect()->route('layouts.bookdetail', $bookId)->with('success', 'レビューが追加されました！');
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
