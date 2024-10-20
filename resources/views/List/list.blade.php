@extends('layouts.app')

@section('title', '書籍一覧')

@section('content_header')
    <div class="col-6">
        <h1>書籍一覧</h1>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    書籍一覧
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th class="small font-weight-bold text-center">書籍番号</th>
                                    <th class="small font-weight-bold text-center">ISBN<</th>
                                    <th class="small font-weight-bold text-center">書籍名</th>
                                    <th class="small font-weight-bold text-center">著者名</th>
                                    <th class="small font-weight-bold text-center">出版社名</th>
                                    <th class="small font-weight-bold text-center">価格</th>
                                    <th class="small font-weight-bold text-center">サムネイルURL</th>
                                    <th class="small font-weight-bold text-center">本の詳細</th>
                                    <th class="small font-weight-bold text-center">レビュー</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($books as $record)
                                <tr>
                                    <td class="small">{{$record->id}}</td>
                                    <td class="small">{{$record->isbn}}</td>
                                    <td class="small">{{$record->title}}</td>
                                    <td class="small">{{$record->author}}</td>
                                    <td class="small">{{$record->publisher}}</td>
                                    <td class="small">{{$record->amount}}</td>
                                    <td class="small"><img src="{{$record->thumbnail_path}}" alt="サムネイル"></td>
                                    <td class="small">{{$record->description}}</td>
                                    <td class="small">
                                    <form action="/bookdetail" method="POST">
                                        @csrf
                                        <input type="hidden" name="bookId" value="{{$record->id}}">
                                        <input type="hidden" name="title" value="{{$record->title}}">
                                        <input type="submit" value="レビュー">    
                                    </form>
                                </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{-- {{$records->links()}} --}}
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
