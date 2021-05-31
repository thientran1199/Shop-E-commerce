@extends('backend.master')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Review</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('admin-page')}}">Home</a></li>
            <li class="breadcrumb-item active ">Review</li>
            <li class="breadcrumb-item active ">List</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
{{-- <h1 class="h3 mb-4 text-gray-800">Đánh giá<small> > Danh sách</small></h1> --}}
<div class="card shadow mb-4">
<div class="card-body">
    <div class="table-responsive">
    	<table class="table table-bordered table-sm" id="dataTable" cellspacing="0" width="100%">
    		<thead>
	    		<tr>
	    			<th>Id</th>
	    			<th>Mã khách hàng</th>
	    			<th>Mã đơn hàng</th>
	    			<th>Sản phẩm</th>
	    			<th>Xếp hạng</th>
	    			<th>Nhận xét</th>
	    			<th>Thời gian đánh giá</th>
	    		</tr>
    		</thead>

    		<tbody>
    			@foreach($listReview as $item)
    			<tr>
	    			<td>{{ $item->id}}</td>
	    			<td>{{ $item->order_item->order->customer->id}}</td>
	    			<td>{{ $item->order_item->order->id}}</td>
	    			<td>
	    			<div class="row">
	    				<div class="col-4"><img width="60" src="{{asset('/images/product/'.$item->order_item->product->images[0]->name)}}"></div>
	    				<div class="col-8">{{ $item->order_item->product->name}}</div>
	    			</div>
	    			</td>
	    			<td>{{ $item->rate}}/5</td>
	    			<td>{{ $item->comment}}</td>
	    			<td>{{ $item->updated_at}}</td>
	    		</tr>
	    		@endforeach
    		</tbody>
		</table>
    </div>
</div>
</div>
@endsection
