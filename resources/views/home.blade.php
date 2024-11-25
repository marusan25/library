@extends('layouts.app')

@section('title', 'ホーム')

@section('content_header')
    <div class="col-6">
        <h1>ホーム</h1>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    サンプル
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th class="small font-weight-bold text-center">列サンプル</th>
                                    <th class="small font-weight-bold text-center">列サンプル</th>
                                    <th class="small font-weight-bold text-center">列サンプル</th>
                                    <th class="small font-weight-bold text-center">列サンプル</th>
                                    <th class="small font-weight-bold text-center">列サンプル</th>
                                    <th class="small font-weight-bold text-center">列サンプル</th>
                                    <th class="small font-weight-bold text-center">列サンプル</th>
                                    <th class="small font-weight-bold text-center">列サンプル</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (range(0, 10) as $i)
                                <tr>
                                    <td class="small">サンプルデータ</td>
                                    <td class="small">サンプルデータ</td>
                                    <td class="small">サンプルデータ</td>
                                    <td class="small">サンプルデータ</td>
                                    <td class="small">サンプルデータ</td>
                                    <td class="small">サンプルデータ</td>
                                    <td class="small">サンプルデータ</td>
                                    <td class="small">サンプルデータ</td>
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
