@extends('layouts.app')

@section('title', 'レビューの追加')

@section('content_header')
    <div class="col-6">
        <h1>レビューの追加</h1>
    </div>
@endsection

@section('content')

    <div class="row">
        <div class="col-10 mx-auto">
            <div class="card">
                <div class="card-header">
                    以下のレビューを追加しました
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>投稿者</th>
                            <th>投稿レビュー</th>
                        </tr>
                        <tr>
                            <td>{{ Session::get('name', 0) }}</td>
                            <td>{{ $content }}</td>
                        </tr>
                    </table>
                    <br>
                    <a href="/bookdetail?book={{ $book_id }}" class="btn btn-outline-info btn-sm">前のページに戻る</a>
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