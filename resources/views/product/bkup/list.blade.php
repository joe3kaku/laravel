@extends('layouts.app')
@section('content')
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">商品マスタ（一覧）</div>
                <div class="card-body">
                    <ul class="nav nav-pills nav-stacked">
                        <li role="presentation"><a href="http://192.168.10.10/main">商品マスタメニュー</a></li>
                        <li role="presentation"><a href="http://192.168.10.10/search">検索・更新</a></li>
                        <li role="presentation"><a href="http://192.168.10.10/create">新規登録</a></li>
                        <li role="presentation"><a href="http://192.168.10.10/list">商品一覧</a></li>
                    </ul>
                    <div class="panel panel-default">
                    	<div class="panel-heading">
                    		<h5 class="panel-title">商品一覧</h5>
                    	</div>
                      <br>
                      <form class="form-horizontal" method="post" action="DownloadCSV">
                        {{ csrf_field() }}
                        <div class="form-group row">
                          <div class="input-group" style="padding:0 200px 0 200px;">
                            <!-- <input id="search_pid" type="search_pid" class="form-control{{ $errors->has('search_pid') ? ' is-invalid' : '' }}" name="search_pid" value="{{ old('search_pid') }}" required autofocus placeholder="商品コード"> -->
                            <span class="input-group-btn">
                              <button type="submit" class="btn btn-primary btn-block">商品一覧<br>ダウンロード</button>
                            </span>
                          </div>
                        </div>
                      </form>
                    	<div class="panel-body">
                        <table class="table table-striped">
                        	<thead>
                        		<tr>
                              <th>　商品コード</th>
                        			<th>　商　品　名</th>
                        			<th>単　　　　価</th>
                        			<th>前回登録日時</th>
                        		</tr>
                        	</thead>
                        	<tbody>
                          @foreach($products as $product)
                          <tr>
                            <td>{{$product->Product_ID}}</td>
                            <td>{{$product->Product_Name}}</td>
                            <td>&yen;{{ number_format($product->Product_Val) }}</td>
                            <td>{{$product->insert_date}}</td>
                          </tr>
                          @endforeach
                        	</tbody>
                        </table>
                    	</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
