@extends('layouts.app')

@section('title', 'ホーム')

@section('content_header')

        <h1>　</h1>
    
@endsection

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="height: 80vh;">
    <div class="row text-center">
        <!-- 左側の画像 -->
        <div class="col-md-6 d-flex justify-content-center align-items-center">
            <img src="{{ asset('images/tosyokan.png') }}" alt="本のアイコン" style="width: 400%; max-width: 1000px;">
        </div>

        <!-- 右側のテキストとボタン -->
        <div class="col-md-6"><br><br>
            <h2>管理システムへようこそ！</h2><br>
            <div class="btn-group-vertical" style="margin-top: 25px;">
                <a href="/" class="btn btn-success btn-lg mb-3">おすすめの本</a><br>
                <a href="/" class="btn btn-primary btn-lg">ランキング★</a>
            </div>
        </div>
    </div>
</div>
<footer class="footer text-center mt-4">
    <p>© 2024 ポリテクセンター関西. 宇賀s.</p>
</footer>
@endsection

@push('js')
    {{-- 'javaScript' --}}
@endpush

@push('css')
{{-- 'css' --}}
@endpush
