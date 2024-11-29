@extends('layouts.app')

@section('title', '書籍一覧')

@section('content_header')
    <div class="col-6">
        <h1>書籍一覧</h1>
    </div>
    <style>
        .pagination {
            justify-content: center;
            display: flex;
        }
    </style>
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
                                    <th class="small font-weight-bold text-center text-nowrap">書籍番号</th>
                                    <th class="small font-weight-bold text-center text-nowrap">ISBN</th>
                                    <th class="small font-weight-bold text-center text-nowrap">書籍名</th>
                                    <th class="small font-weight-bold text-center text-nowrap">著者名</th>
                                    <th class="small font-weight-bold text-center text-nowrap">出版社名</th>
                                    <th class="small font-weight-bold text-center text-nowrap">価格</th>
                                    <th class="small font-weight-bold text-center text-nowrap">表紙</th>
                                    <th class="small font-weight-bold text-center text-nowrap">本の詳細</th>
                                    <th class="small font-weight-bold text-center text-nowrap">レビュー</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($books as $record)
                                    <tr>
                                        <td class="small align-middle">{{ $record->id }}</td>
                                        <td class="small align-middle">{{ $record->isbn }}</td>
                                        <td class="small align-middle text-nowrap">{{ $record->title }}</td>
                                        <td class="small align-middle">{{ $record->author }}</td>
                                        <td class="small align-middle text-nowrap">{{ $record->publisher }}</td>
                                        <td class="small align-middle text-nowrap">{{ number_format($record->amount) }}円
                                        </td>
                                        <td class="small align-middle"><img class="mx-3" style="height: 130px"
                                                src="{{ $record->thumbnail_path }}" alt="サムネイル"></td>
                                        <td class="small align-middle">{{ Str::limit($record->description, 300, '...') }}
                                            {{-- {{dd($record)}} --}}
                                        </td>
                                        <td class="small align-middle">

                                            <form action="{{ route('books.show', ['book' => $record]) }}" method="POST">
                                                @csrf
                                                {{-- <input type="hidden" name="bookId" value="{{$record->id}}"> --}}
                                                {{-- <input type="hidden" name="title" value="{{$record->title}}"> --}}
                                                <input type="submit" class="btn btn-info btn-sm" value="レビュー">
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $books->links() }}
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
