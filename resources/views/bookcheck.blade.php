@extends('layouts.app')

@section('title', '登録する書籍の検索結果')

@section('content_header')
<div class="col-6">
    <h1>登録する書籍の検索結果</h1>
</div>
@endsection

@section('content')
{{dd($items)}}
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                登録する書籍の検索結果
            </div>
            <div class="card-body">
                <p>該当する書籍を登録してください。</p>

 
               @foreach($items as $i)
                    <p>{{$i["volumeInfo"]["title"]}}</p>
               @endforeach

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