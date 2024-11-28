@extends('layouts.app')

@section('title', '以下の書籍を登録しました。')

@section('content_header')
    <h1>書籍登録結果</h1>
@endsection

@section('content')

    {{-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}

    <h1>{{ $title }}の登録が完了しました</h1>
    <ul>
        <li><strong>著者:</strong> {{ $author }}</li>
        <li><strong>ISBN:</strong> {{ $isbn }}</li>
        <li><strong>出版社:</strong> {{ $publisher }}</li>
        <li><strong>価格:</strong> ¥{{ $price }}</li>
        <li><strong>サムネイル:</strong> <img src="{{ $thumbnail_path }}" alt="thumbnail"></li>
        <li><strong>説明:</strong> {{ $description }}</li>
    </ul>





@endsection

@push('js')
    {{-- 必要に応じてJavaScriptを記述 --}}
@endpush

@push('css')
    {{-- 必要に応じてCSSを記述 --}}
@endpush
