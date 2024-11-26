@extends('layouts.app')
<link rel="icon" type="image/png" href="images/search.png">
@section('content_header')
    <div class="col-6">
        <h1>検索結果</h1>
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
                    <p class="small">{{ $count }}件ヒットしました！</p>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th class="small font-weight-bold text-center">書籍名</th>
                                    <th class="small font-weight-bold text-center">著者名</th>
                                    <th class="small font-weight-bold text-center">ISBN</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($books as $book)
                                    <tr>
                                        <td class="small">{{ $book->title }}</td>
                                        <td class="small">{{ $book->author }}</td>
                                        <td class="small">{{ $book->isbn }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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
