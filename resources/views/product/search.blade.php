@extends('layouts.master_product')
@section('title', '商品マスタ（検索・更新）')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header"></div>
            <div class="card-body">
                <form class="form-horizontal" method="post" action="DataSearch">
                  {{ csrf_field() }}
                  <div class="form-group row">
                    <div class="input-group" style="padding:0 200px 0 200px;">
                      <input id="search_pid" type="search_pid" class="form-control{{ $errors->has('search_pid') ? ' is-invalid' : '' }}" name="search_pid" value="{{ old('search_pid') }}" required autofocus placeholder="商品コード">
                      <span class="input-group-btn">
                        <button type="submit" class="btn btn-default">検索</button>
                      </span>
                    </div>
                  </div>
                </form>
                @if (Session::has('DataSearch'))
                    <div class="alert alert-danger" role="alert"><strong>{{ session('DataSearch') }}</strong></div>
                @endif
                <div class="panel panel-default">
                	<div class="panel-heading">
                		<h5 class="panel-title">商品マスタ（検索・更新）</h5>
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
                    <form class="form-horizontal" method="post" action="DataUpdate">
                      {{ csrf_field() }}
                      <div class="form-group">
                    		<label class="col-sm-2 control-label" for="InputText">商品コード</label>
                    		<div class="col-sm-10">
                    			<input type="text" class="form-control" id="product_id" placeholder="" readonly name="Product_ID" value=@if(isset($product)){{$product->Product_ID}}@endif>
                    		</div>
                    	</div>
                      <div class="form-group">
                    		<label class="col-sm-2 control-label" for="InputText">商　品　名</label>
                    		<div class="col-sm-10">
                    			<!-- <input type="text" class="form-control" id="product_name" placeholder="" name="Product_Name" value=@if(isset($product)){{$product->Product_Name}}@endif> -->
                          <input type="text"  id="Product_Name" class="form-control{{ $errors->has('Product_Name') ? ' is-invalid' : '' }}" name="Product_Name" value="@if(isset($product)){{$product->Product_Name}}@endif" required autofocus>
                          <!-- @if ($errors->has('Product_Name'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('Product_Name') }}</strong>
                              </span>
                          @endif -->
                    		</div>
                    	</div>
                      <div class="form-group">
                    		<label class="col-sm-2 control-label" for="InputText">単　　　　価</label>
                    		<div class="col-sm-10">
                    			<!-- <input type="text" class="form-control" id="product_val" placeholder="" name="Product_Val" value=@if(isset($product)){{$product->Product_Val}}@endif> -->
                          <input type="text"  id="Product_Val" class="form-control{{ $errors->has('Product_Val') ? ' is-invalid' : '' }}" name="Product_Val" value="@if(isset($product)){{$product->Product_Val}}@endif" required autofocus>
                          <!-- @if ($errors->has('Product_Val'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('Product_Val') }}</strong>
                              </span>
                          @endif -->
                    		</div>
                    	</div>
                      <div class="form-group">
                    		<label class="col-sm-2 control-label" for="InputText">前回登録日時</label>
                    		<div class="col-sm-10">
                          <input type="text" class="form-control" id="insert_date" placeholder="" readonly name="insert_date" value="@if(isset($product)){{$product->insert_date}}@endif">
                    		</div>
                    	</div>
                    	<div class="form-group">
                    		<div class="col-sm-offset-2 col-sm-10">
                    			<button type="submit" class="btn btn-primary">更新</button>
                    		</div>
                    	</div>
                    </form>
                    @if (Session::has('DataUpdate'))
                        <div class="alert alert-success" role="alert"><strong>{{ session('DataUpdate') }}</strong></div>
                    @endif
                	</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
