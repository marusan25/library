@extends('layouts.app')

@section('title', '検索画面')

@section('content_header')
<div class="col-6">
    <h1>書籍検索</h1>
</div>
@endsection

@section('content')

    <p>検索したい「書籍名」「著者名」「ISBNコード」(一部でもOK)を入力してください</p>

    <!-- 検索フォーム -->
    <div>
    <form action="/searchlist" method="POST" class="form-horizontal">
        @csrf
        
        <!-- 書籍名 -->
        <div class="form-group row">
            <label for="title" class="col-sm-1 col-form-label">書籍名</label>
            <div class="col-sm-4">
                <input type="text" name="title" class="form-control" id="title" required>
            </div>
        </div>

        <!-- 著者名 -->
        <div class="form-group row">
            <label for="author" class="col-sm-1 col-form-label">著者名</label>
            <div class="col-sm-4">
                <input type="text" name="author" class="form-control" id="author" required>
            </div>
        </div>

        <!-- ISBN -->
        <div class="form-group row">
            <label for="isbn" class="col-sm-1 col-form-label">ISBN</label>
            <div class="col-sm-4">
                <input type="text" name="isbn" class="form-control" id="isbn" required>
            </div>
        </div>

        <!-- ボタン -->
        <div class="form-group row">
            <div class="col-sm-10 offset-sm-2">
                <input type="submit" value="検索" class="btn btn-primary">
                <input type="reset" value="リセット" class="btn btn-secondary">
            </div>
        </div>
    </form>
</div>
    
@endsection

@push('js')
{{-- 'javaScript' --}}
@endpush

@push('css')
{{-- css --}}
@endpush