@extends('layouts.app')

@section('title', '書籍詳細')
<link rel="icon" type="image/png" href="images/book.png">
@section('content_header')
    <h2>書籍詳細</h2>
    <style>
        .content-wrapper {
            overflow-y: auto;
        }

        .pagination {
            justify-content: center;
            display: flex;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                {{-- {{dd($records)}} --}}
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th class="small font-weight-bold text-center text-nowrap">書籍番号</th>
                                <th class="small font-weight-bold text-center text-nowrap">ISBN</th>
                                <th class="small font-weight-bold text-center text-nowrap"width="100">書籍名</th>
                                <th class="small font-weight-bold text-center text-nowrap"width="100">著者名</th>
                                <th class="small font-weight-bold text-center text-nowrap">出版社名</th>
                                <th class="small font-weight-bold text-center text-nowrap">価格</th>
                                <th class="small font-weight-bold text-center text-nowrap">表紙</th>
                                <th class="small font-weight-bold text-center text-nowrap">本の詳細</th>
                                {{-- <th class="small font-weight-bold text-center text-nowrap">レビュー件数</th>
                                <th class="small font-weight-bold text-center text-nowrap">平均点</th> --}}
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($records as $record)
                                @if ($loop->first)
                                    <tr>
                                        <td class="small align-middle">{{ $record->id }}</td>
                                        <td class="small align-middle">{{ $record->isbn }}</td>
                                        <td class="small align-middle">{{ $record->title }}</td>

                                        <td class="small align-middle">{{ $record->author }}</td>

                                        <td class="small align-middle">{{ $record->publisher }}</td>
                                        <td class="small align-middle">¥{{ number_format($record->amount) }}</td>
                                        <td class="small align-middle"><img src="{{ $record->thumbnail_path }}"
                                                alt="Thumbnail">
                                        </td>
                                        <td class="small align-middle">
                                            <!-- トリガーボタン -->
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#exampleModal">
                                                詳細を開く
                                            </button>
                                            <!-- モーダル本体 -->
                                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">内容詳細</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            {{ $record->description }}
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">閉じる</button>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        {{-- <td class="small align-middle">{{ $count }}件</td>
                                        <td class="small align-middle">{{ $avg }}点</td> --}}
                                @endif
                            @endforeach
                            </tr>
                        </tbody>
                    </table>
                    </table>
                    <div class="row my-5 mx-auto">
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <h5 id="target">【平均点:{{ $avg }}点】</h5>

                                    <h5>【レビュー：{{ $count }}件】</h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h2>レビューを追加</h2>
                    <div class="card">
                        <div class="card-body">
                            <form action="/reviewresult" method="POST">
                                @csrf
                                @foreach ($records as $record)
                                    <input type="hidden" name="book_id" value="{{ $record->id }}">
                                @endforeach
                                <div class="container mr-3">

                                    <div class="row my-3">
                                        <div class="col-2">

                                            <input type="number" name="score" class="form-control"
                                                placeholder="スコア (1-5)" min="1" max="5" required>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-6">
                                            <textarea name="post_review"class="form-control" placeholder="レビュー内容" required></textarea>
                                        </div>
                                    </div>
                                    <input type="hidden" name="user_id" placeholder="ユーザーID"
                                        value="{{ Session::get('userId', 0) }}">
                                    <button type="submit" class="btn btn-outline-info btn-sm">投稿</button>

                                </div>
                            </form>
                        </div>
                    </div>
                    <h2>レビュー一覧</h2>

                    <div>
                        {{-- <div class="row">
                <div class="col-12"> --}}
                        <div class="container">
                            @foreach ($reviews as $review)
                                <div class="card">
                                    <div class="card-body">

                                        <p>投稿日時:{{ $review->reviewed_at->format('Y年m月d日') }}</p>
                                        <p>スコア: {{ $review->score }}</p>
                                        <p>コメント: {{ $review->content }}</p>
                                        <p>投稿者: {{ $review->user->name }}</p>

                                        <!-- 編集・削除フォーム -->
                                        {{-- {{dd(Session::get('userId'))}} --}}
                                        @if ($review->user->id === Session::get('userId', 0))
                                            <div class="row mr-3">


                                                <form
                                                    action="{{ route('reviews.destroycheck', ['book_id' => $review->book->id, 'review_id' => $review->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    {{-- @method('DELETE') --}}
                                                    <div class="col ml-1">
                                                        <button type="submit"
                                                            class="btn btn-outline-danger btn-sm">削除</button>
                                                    </div>
                                                </form>


                                                <form
                                                    action="{{ route('reviews.updatecheck', ['book_id' => $review->book->id, 'review_id' => $review->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    {{-- @method('PUT') --}}
                                                    {{-- <input type="text" name="post_review" value="{{ $record->content }}">
                <input type="number" name="score" value="{{ $record->score }}" min="1" max="5"> --}}
                                                    <div class="col">
                                                        <button
                                                            type="submit"class="btn btn-outline-primary btn-sm">更新</button>
                                                    </div>
                                                </form>

                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endforeach

                        </div>
                        {{-- <div class="pagination-container">
                {{ $reviews->links() }}
            </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>





    </div>
@endsection
@push('js')
    <script>
        document.getByElementById("target").style.fontsize = "1000px"
        const myModal = document.getElementById('myModal')
        const myInput = document.getElementById('myInput')

        myModal.addEventListener('shown.bs.modal', () => {
            myInput.focus()
        })
        // Bootstrapモーダルのイベントが上書きされないようにする
        $(document).on('show.bs.modal', '.modal', function() {
            if ($(this).hasClass('modal')) {
                $(this).modal('show');
            }
        });
    </script>
@endpush

@push('css')
    {{-- css --}}
@endpush
