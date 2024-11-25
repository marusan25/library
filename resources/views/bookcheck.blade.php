@extends('layouts.app')

@section('title', '登録する書籍の検索結果')

@section('content_header')
    <div class="col-6">
        <h1>登録する書籍の検索結果</h1>
    </div>
@endsection

@section('content')
    {{-- {{ dd($items) }} --}}
    {{-- <p>{{ $keyword }}</p> --}}
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    登録する書籍の検索結果
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        @foreach ($items as $item)
                            <p>該当する書籍を登録してください。</p>
                            <p>{{ $item['title'] }}</p>
                        @endforeach
                        @if (!empty($items) && count($items) > 0)
                            <table class="table table-striped">
                                <thead class="thead-dark">
                                    <tr>
                                        <th class="small font-weight-bold text-center text-nowrap">タイトル</th>
                                        <th class="small font-weight-bold text-center text-nowrap">著者</th>
                                        <th class="small font-weight-bold text-center text-nowrap">ISBN</th>
                                        <th class="small font-weight-bold text-center text-nowrap">出版社</th>
                                        <th class="small font-weight-bold text-center text-nowrap">価格</th>
                                        <th class="small font-weight-bold text-center text-nowrap">サムネイル</th>
                                        <th class="small font-weight-bold text-center text-nowrap">詳細</th>
                                        <th class="small font-weight-bold text-center text-nowrap">登録</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($items as $item)
                                        <tr>
                                            <td class="small align-middle">{{ $item['title'] }}</td>
                                            <td class="small align-middle">{{ $item['author'] }}</td>
                                            <td class="small align-middle">{{ $item['isbn'] }}</td>
                                            <td class="small align-middle">{{ $item['publisher'] }}</td>
                                            <td class="small align-middle">{{ $item['price'] }}円</td>
                                            <td class="small align-middle">
                                                @if (!empty($item['thumbnail_path']))
                                                    <img class="mx-3" style="height: 130px"
                                                        src="{{ $item['thumbnail_path'] }}" alt="{{ $item['title'] }}"
                                                        style="width: 50px; height: auto;">
                                                @else
                                                    画像なし
                                                @endif
                                            </td>
                                            <td class="small align-middle">
                                                {{ Str::limit($item['description'], 300, '...') }}</td>
                                            <td>
                                                <form action="{{ route('book_check') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="title" value="{{ $item['title'] }}">
                                                    <input type="submit" class="btn btn-info btn-sm"
                                                        value="登録"></input>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            @else
                                <p>該当する書籍が見つかりませんでした。</p>
                        @endif

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
