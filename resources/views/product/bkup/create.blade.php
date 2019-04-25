@extends('layouts.app')
@section('content')
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">商品マスタ（新規登録）</div>
                <div class="card-body">
                    <ul class="nav nav-pills nav-stacked">
                        <li role="presentation"><a href="http://192.168.10.10/main">商品マスタメニュー</a></li>
                        <li role="presentation"><a href="http://192.168.10.10/search">検索・更新</a></li>
                        <li role="presentation"><a href="http://192.168.10.10/create">新規登録</a></li>
                        <li role="presentation"><a href="http://192.168.10.10/list">商品一覧</a></li>
                    </ul>
                    <div class="panel panel-default">
                    	<div class="panel-heading">
                    		<h5 class="panel-title">商品データ</h5>
                    	</div>
                    	<div class="panel-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form class="form-horizontal" method="post" action="DataInsert">
                          {{ csrf_field() }}
                          <div class="form-group">
                        		<label class="col-sm-2 control-label" for="InputText">商品コード</label>
                        		<div class="col-sm-10">
                        			<!-- <input type="text" class="form-control" id="product_id"placeholder="" name="product_id" > -->
                              <input type="text"  id="Product_ID" class="form-control{{ $errors->has('Product_ID') ? ' is-invalid' : '' }}" name="Product_ID" value="@if(isset($product)){{$product->Product_ID}}@endif" required autofocus>
                              @if ($errors->has('Product_ID'))
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('Product_ID') }}</strong>
                                  </span>
                              @endif
                        		</div>
                        	</div>
                          @if (Session::has('doubleCheck'))
                              <div class="alert alert-danger" role="alert"><strong>{{ session('doubleCheck') }}</strong></div>
                          @endif
                          <div class="form-group">
                        		<label class="col-sm-2 control-label" for="InputText">商　品　名</label>
                        		<div class="col-sm-10">
                        			<!-- <input type="text" class="form-control" id="product_name" placeholder="" name="product_name" > -->
                              <input type="text"  id="Product_Name" class="form-control{{ $errors->has('Product_Name') ? ' is-invalid' : '' }}" name="Product_Name" value="@if(isset($product)){{$product->Product_Name}}@endif" required autofocus>
                              @if ($errors->has('Product_Name'))
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('Product_Name') }}</strong>
                                  </span>
                              @endif
                        		</div>
                        	</div>
                          <div class="form-group">
                        		<label class="col-sm-2 control-label" for="InputText">単　　　価</label>
                        		<div class="col-sm-10">
                        			<!-- <input type="text" class="form-control" id="product_val" placeholder="" name="product_val" > -->
                              <input type="text"  id="Product_Val" class="form-control{{ $errors->has('Product_Val') ? ' is-invalid' : '' }}" name="Product_Val" value="@if(isset($product)){{$product->Product_Val}}@endif" required autofocus>
                              @if ($errors->has('Product_Val'))
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('Product_Val') }}</strong>
                                  </span>
                              @endif
                        		</div>
                        	</div>
                        	<div class="form-group">
                        		<div class="col-sm-offset-2 col-sm-10">
                        			<button type="submit" class="btn btn-primary">新規登録</button>
                        		</div>
                        	</div>
                        </form>
                        @if (Session::has('DataInsert'))
                            <div class="alert alert-success" role="alert"><strong>{{ session('DataInsert') }}</strong></div>
                        @endif
                    	</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
