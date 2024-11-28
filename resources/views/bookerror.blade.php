@extends('layouts.app')

@section('title', '重複エラー')

@section('content_header')
    <h1>登録する書籍の検索結果</h1>
@endsection

@section('content')

    <form action="{{ $referer }}" method="post">
        @csrf
        <p>この書籍は既に登録されています</p>

        <input type="submit" value="戻る">


    </form>




@endsection

@push('js')
    {{-- 必要に応じてJavaScriptを記述 --}}
@endpush

@push('css')
    {{-- 必要に応じてCSSを記述 --}}
@endpush
