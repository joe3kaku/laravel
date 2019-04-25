@extends('layouts.main')
@section('content')
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('商品マスタメンテナンス') }}</div>
                <div class="card-body">
                    @csrf
                    <a href="/search" class="btn btn-primary btn-block">検索・更新</a>
                    <a href="/create" class="btn btn-primary btn-block">新規登録</a>
                    <a href="/list" class="btn btn-primary btn-block">商品一覧</a>
                    <a href="/listEloquent" class="btn btn-primary btn-block">商品一覧(エロクアント)</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
