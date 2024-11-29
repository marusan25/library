@extends('layouts.app')

@section('title', '以下の書籍を登録しました。')
<link rel="icon" type="image/png" href="images/plus.png">
@section('content_header')
    <h1>書籍登録結果</h1>
@endsection

@section('content')

    <h2>【{{ $title }}】の登録が完了しました</h2>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th class="small font-weight-bold text-center text-nowrap">ISBN</th>
                        <th class="small font-weight-bold text-center text-nowrap">著者名</th>
                        <th class="small font-weight-bold text-center text-nowrap">出版社名</th>
                        <th class="small font-weight-bold text-center text-nowrap">価格</th>
                        <th class="small font-weight-bold text-center text-nowrap">表紙</th>
                        <th class="small font-weight-bold text-center text-nowrap">本の詳細</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="small align-middle">{{ $isbn }}</td>
                        <td class="small align-middle">{{ $author }}</td>
                        <td class="small align-middle">{{ $publisher }}</td>
                        <td class="small align-middle">{{ $price }}円</td>
                        <td class="small align-middle"><img src="{{ $thumbnail_path }}" alt="thumbnail"></td>
                        <td class="small align-middle">{{ $description }}</td>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    {{-- <ul>
        <li><strong>著者:</strong> {{ $author }}</li>
        <li><strong>ISBN:</strong> {{ $isbn }}</li>
        <li><strong>出版社:</strong> {{ $publisher }}</li>
        <li><strong>価格:</strong> ¥{{ $price }}</li>
        <li><strong>表紙:</strong> </li>
        <li><strong>本の詳細:</strong> {{ $description }}</li>
    </ul>

 --}}

@endsection

@push('js')
    {{-- 必要に応じてJavaScriptを記述 --}}
@endpush

@push('css')
    {{-- 必要に応じてCSSを記述 --}}
@endpush
