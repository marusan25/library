@extends('layouts.app')

@section('title', '書籍詳細')

@section('content_header')
<h2>書籍詳細</h2>
@endsection

@section('content')
<div class="container">
    {{-- {{dd($records)}} --}}
    @foreach ($records as $record)
    @if ($loop->first)
    <h1>{{ $record->book->title }}</h1>
    <p>著者: {{ $record->book->author }}</p>
    <p>出版社: {{ $record->book->publisher }}</p>
    <p>価格: ¥{{ number_format($record->book->amount) }}</p>
    <img src="{{ $record->book->thumbnail_path }}" alt="Thumbnail">
    <p>{{ $record->book->description }}</p>
    
    @endif
    @endforeach
    <p id="target">平均点:{{$avg}}点</p>

    <h2>レビューを追加</h2>
    <form action="/reviewresult" method="POST">
        @csrf
        @foreach ($records as $record)
        <input type="hidden" name="book_id" value="{{$record->book->id}}">
        @endforeach
        <input type="number" name="score" placeholder="スコア (1-5)" min="1" max="5" required>
        <textarea name="post_review" placeholder="レビュー内容" required></textarea>
        <input type="hidden" name="user_id" placeholder="ユーザーID" value="{{Session::get('userId',0)}}">
        <button type="submit">投稿</button>
    </form> 

    <h2>レビュー一覧</h2>
   
        <div>
            <div class="row">
                <div class="col-12">
                    
            @foreach ($records as $record)
            <div class="card">
        
            <p>スコア: {{ $record->score }}</p>
            <p>コメント: {{ $record->content }}</p>
            <p>投稿者: {{ $record->user->name }}</p>

            <!-- 編集・削除フォーム -->
            {{-- {{dd(Session::get('userId'))}} --}}
            @if($record->user->id === Session::get('userId',0))
            <form action="{{ route('reviews.destroycheck', ["book_id" => $record->book->id, "review_id" => $record->id]) }}" method="POST">
                @csrf
                {{-- @method('DELETE') --}}
                <button type="submit">削除</button>
            </form>

            <form action="{{ route('reviews.updatecheck', ["book_id" => $record->book->id, "review_id" => $record->id]) }}" method="POST">
                @csrf
                {{-- @method('PUT') --}}
                {{-- <input type="text" name="post_review" value="{{ $record->content }}">
                <input type="number" name="score" value="{{ $record->score }}" min="1" max="5"> --}}
                <button type="submit">更新</button>
            </form>
            @endif
           
        </div>
            @endforeach
                    
                </div>
            </div>
        </div>



    

</div>
@endsection
<script>document.getByElementById("target").style.fontsize = "100px"</script>
</html>
