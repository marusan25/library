
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
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th class="small font-weight-bold text-center">書籍名<</th>
                                    <th class="small font-weight-bold text-center">ISBN</th>
                                    <th class="small font-weight-bold text-center">著者名</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                <tr>
                                    <td class="small">{{$post->title}}</td>
                                    <td class="small">{{$post->isbn}}</td>
                                    <td class="small">{{$post->author}}</td>
                                    {{-- <td class="small"><form action="{{ route('search_list', [$book->id, $review->id]) }}" method="POST">
                                    <input type="text">    
                                    </form></td> --}}
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