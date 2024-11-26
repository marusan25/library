@extends('layouts.app')

@section('title', 'レビューの修正')

@section('content_header')
    <div class="col-6">
        <h1>レビューの修正</h1>
    </div>
@endsection

@section('content')


    <div class="col-10 mx-auto">
        <div class="card">
            <div class="card-header">
                以下のレビューを修正して下さい
            </div>
            <div class="card-body">
                {{-- @if (isset($record)) --}}
                <form action="/editresult" method="post">
                    @csrf
                    <input type="hidden" name="bookId" value="{{ $bookId }}">
                    <input type="hidden" name="reviewId" value="{{ $review->id }}"><br>
                    投稿レビュー
                    <div class="row mt-0">
                        <div class="col-2">

                            <input type="number" name="score" class="form-control" placeholder="スコア (1-5)" min="1"
                                max="5" value="{{ $review->score }}" required>


                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">

                            <textarea name="post_review" class="form-control">{{ $review->content }}</textarea><br>
                        </div>
                    </div>
                    <div class="col">
                        <input type="submit" class="btn btn-outline-secondary btn-sm" value="修正">
                    </div>
                </form>

                {{-- @else
        <form action="/bookdetail" method="post"></form>
        @csrf
    @endif --}}
                <div class="col">
                    <a href="/bookdetail?book={{ $bookId }}" class="btn btn-outline-info btn-sm">前のページに戻る</a>
                </div>
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
