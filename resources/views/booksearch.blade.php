@extends('layouts.app')

@section('title', '検索画面')

@section('content_header')
    <div class="col-6">
        <h1>書籍検索</h1>
    </div>
@endsection

@section('content')

    <div class="row">
        <div class="col-6 mx-auto">
            <div class="card">
                <div class="card-header">
                    検索したい書籍名・著者名・ISBNコード(一部でもOK)を入力してください
                </div>
                <div class="card-body">
                    {{-- //TODO セッションがある場合、見つからなかったときのメッセージを表示 --}}
                    <form action="{{ route('search_list') }}" method="POST" class="form-horizontal">
                        @csrf

                        <!-- 書籍名 -->
                        <div class="form-group row">
                            <label for="title" class="col-sm-4 col-form-label">書籍名</label>
                            <div class="col-sm-8">
                                <input type="text" name="title" class="form-control" id="title">
                            </div>
                        </div>

                        <!-- 著者名 -->
                        <div class="form-group row">
                            <label for="author" class="col-sm-4 col-form-label">著者名</label>
                            <div class="col-sm-8">
                                <input type="text" name="author" class="form-control" id="author">
                            </div>
                        </div>

                        <!-- ISBN -->
                        <div class="form-group row">
                            <label for="isbn" class="col-sm-4 col-form-label">ISBN</label>
                            <div class="col-sm-8">
                                <input type="text" name="isbn" class="form-control" id="isbn">
                            </div>
                        </div>

                        <!-- ボタン -->
                        <div class="form-group row mb-0">
                            <div class="col-6 mx-auto text-center">
                                <input type="submit" value="検索" class="btn btn-primary">
                                <input type="reset" value="リセット" class="btn btn-secondary">

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script></script>
@endpush

@push('css')
    {{-- css --}}
@endpush
