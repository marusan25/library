@extends('layouts.app')

@section('title', 'レビューの削除確認')

@section('content_header')
    <div class="col-6">
        <h1>レビューの削除確認</h1>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-10 mx-auto">
            <div class="card">
                <div class="card-header">
                    以下のレビューを削除してもよろしいでしょうか
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>投稿者</th>
                            <th>投稿レビュー</th>
                        </tr>
                        {{-- {{dd($review)}} --}}

                        <td>{{ Session::get('name', 0) }}</td>
                        <td>{{ $review->content }}</td>
                        </tr>

                    </table>
                    <div class="col mt-4">
                        <form action="/deleteresult" method="post">
                            @csrf
                            <input type="hidden" name="bookId" value="{{ $bookId }}">
                            <input type="hidden" name="id" value="{{ $review->id }}">
                            <input type="hidden" name="post_review" value="{{ $review->content }}">
                            <input type="submit" value="削除" class="btn btn-outline-danger btn-sm">

                        </form>
                    </div>
                    <br>
                    <a href="/bookdetail?book={{ $bookId }}" class="btn btn-outline-info btn-sm">前のページに戻る</a>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    {{-- 'javaScript' --}}
@endpush

@push('css')
    {{-- css --}}
@endpush
