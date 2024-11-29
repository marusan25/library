@extends('layouts.app')

@section('title', '登録する書籍の検索結果')

@section('content_header')

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
                                            <td class="small align-middle text-center">{{ $item['isbn'] }}</td>
                                            <td class="small align-middle text-nowrap">{{ $item['publisher'] }}</td>
                                            <td class="small align-middle text-nowrap">
                                                @if ($item['price'] === '不明')
                                                    不明
                                                @else
                                                    {{ $item['price'] }}円
                                                @endif
                                            </td>
                                            <td class="small align-middle">
                                                @if (!empty($item['thumbnail_path']))
                                                    <img class="mx-3" style="height: 130px"
                                                        src="{{ $item['thumbnail_path'] }}" alt="{{ $item['title'] }}"
                                                        style="width: 50px; height: auto;">
                                                @else
                                                    画像なし
                                                @endif
                                            </td>
                                            <td class="small align-middle text-center">
                                                {{ Str::limit($item['description'], 300, '...') }}</td>
                                            <td class="small align-middle">

                                                <form action="{{ route('book_result') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="title" value="{{ $item['title'] }}">
                                                    <input type="hidden" name="author" value="{{ $item['author'] }}">
                                                    <input type="hidden" name="isbn" value="{{ $item['isbn'] }}">
                                                    <input type="hidden" name="publisher"
                                                        value="{{ $item['publisher'] }}">
                                                    <input type="hidden" name="price" value="{{ $item['price'] }}">
                                                    <input type="hidden" name="thumbnail_path"
                                                        value="{{ $item['thumbnail_path'] }}">
                                                    <input type="hidden" name="description"
                                                        value="{{ $item['description'] }}">
                                                    <input type="submit" class="btn btn-info btn-sm"
                                                        value="登録"></input>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <p>該当する書籍が見つかりませんでした。</p>
                        @endif
                        {{ $items->links() }}
                        <style>
                            .pagination {
                                justify-content: center;
                                display: flex;
                            }
                        </style>
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
