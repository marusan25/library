@extends('layouts.app')

@section('title', '書籍登録')
<link rel="icon" type="image/png" href="images/plus.png">
@section('content_header')
    <div class="col-6">
        <h1>書籍登録</h1>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-6 mx-auto">
            <div class="card">
                <div class="card-header">
                    登録する書籍の書籍名・著者名・ISBNを入力してください。
                </div>
                <div class="card-body">
                    <div>
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }} </p>
                        @endforeach
                    </div>
                    <form action="/bookcheck">
                        <div class="form-group row">
                            <label for="title" class="col-sm-2 col-form-label">キーワード</label>
                            <div class="col-sm-8 d-flex">
                                <!-- 入力フィールド -->
                                <input type="text" name="keyword" class="form-control" id="title">
                                <!-- 検索ボタン -->
                                <input type="submit" value="検索" class="btn btn-primary ml-2">
                                <!-- リセットボタン -->
                                <input type="reset" value="リセット" class="btn btn-secondary ml-2">
                            </div>
                        </div>
                    </form>
                    @if ($errors->any())
                    @endif



                    {{-- {{$records->links()}} --}}
                </div>
            </div>
        </div>
    </div>
    </div>
    <marquee behavior="alternate" direction="up" height="600">
        <marquee direction="right"><img src="images/search.png" style="width: 400%; max-width: 100px;"></marquee>
        <marquee scrollamount="100" truespeed><img src="images/search.png" style="width: 1000%; max-width: 100px;">
        </marquee>
        <marquee direction="left"><img src="images/search.png" style="width: 400%; max-width: 100px;"></marquee>
        <marquee scrollamount="100" truespeed direction="right"><img src="images/search.png"
                style="width: 1000%; max-width: 100px;">
        </marquee>
    </marquee>

@endsection

@push('js')
    {{-- 'javaScript' --}}
@endpush

@push('css')
    <style>
        .change {
            cursor: url(images/book.png), default;
        }
    </style>
@endpush
