@extends('layouts.master_product')
@section('title', '商品マスタ（商品一覧）')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header"></div>
            <div class="card-body">
                <div class="panel panel-default">
                	<div class="panel-heading">
                		<h5 class="panel-title">商品一覧</h5>
                	</div>
                	<div class="panel-body">
                      <form class="text-right" method="post" action="DownloadCSV">
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-primary" aria-label="Left Align"><span class="glyphicon glyphicon-cloud-download" aria-hidden="true"></span>Download</button>
                      </form>
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
                        <td class="text-right">&yen;{{ number_format($product->Product_Val) }}</td>
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
@endsection
