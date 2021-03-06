@extends('layouts.master_product')
@section('title', '商品マスタ（商品一覧（エロクアント））')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header"></div>
            <div class="card-body">
                <div class="panel panel-default">
                	<div class="panel-heading">
                		<h5 class="panel-title">商品一覧（エロクアント）</h5>
                	</div>
                  <br>
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
                        <td>{{$product->product_id}}</td>
                        <td>{{$product->product_name}}</td>
                        <td class="text-right">&yen;{{ number_format($product->product_val) }}</td>
                        <td>{{$product->insert_date}}</td>
                      </tr>
                      @endforeach
                    	</tbody>
                    </table>
                    {{ $products->links() }}
                	</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
