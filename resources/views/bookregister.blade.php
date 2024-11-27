@extends('layouts.app')

@section('title', '書籍登録')

@section('content_header')
<div class="col-6">
    <h1>書籍登録</h1>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                書籍登録
            </div>
            <div class="card-body">
                <p>書籍名を入力してください。</p>
                <form action="/bookcheck" method="post">
                    @csrf
                    書籍名:<input type="text" name="keyword" size="50">&nbsp;<input type="submit" value="検索" required>
                </form>
                
        
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