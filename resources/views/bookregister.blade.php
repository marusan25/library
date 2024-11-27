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
                {{-- <div class="card-header">

                </div> --}}
                <div class="card-body">
                    <p>登録する書籍の書籍名・著者名・ISBNを入力してください。</p>
                    <div>
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }} </p>
                        @endforeach
                    </div>
                    <form action="/bookcheck" method="post">
                        @csrf
                        キーワード:<input type="text" name="keyword" size="50">&nbsp;<input type="submit" value="検索"
                            required>
                    </form>
                    @if ($errors->any())
                    @endif


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
