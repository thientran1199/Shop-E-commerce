@extends('backend.master')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Customer</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('admin-page')}}">Home</a></li>
            <li class="breadcrumb-item active ">Customer</li>
            <li class="breadcrumb-item active ">List</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
<!-- Page Heading -->
{{-- <h1 class="h3 mb-4 text-gray-800">Khách hàng<small> > Danh sách</small></h1> --}}
<div class="card shadow mb-4">
<div class="card-body">
<div class="table-responsive">
	<table class="table table-bordered" id="dataTable" cellspacing="0" width="100%">
		<thead>
			<tr>
				<th>Loại khách</th>
				<th>Tên</th>
				<th>Giới tính</th>
				<th>Địa chỉ</th>
				<th>Ngày sinh</th>
				<th>Điện thoại</th>
				<th>Email</th>
				<th>Tên tài khoản</th>
				<th>Chi tiết</th>
				<th>Xóa</th>
			</tr>
		</thead>
		
		<tbody>
			@foreach($listCustomer as $item)
			<tr>
				@switch($item->type)
				@case('Thường')
					<td><span class="btn btn-sm btn-secondary">{{$item->type}}</span></td>
					@break
				@case('Thân thiết')
					<td><span class="btn btn-sm btn-info">{{$item->type}}</span></td>
					@break
				@case('Vip')
					<td><span class="btn btn-sm btn-warning">{{$item->type}}</span></td>
					@break
				@default
				@endswitch	
				<td>{{ $item->person->full_name}}</td>
				<td>{{ $item->person->gender}}</td>
				<td>{{ $item->person->address}}</td>
				<td>{{ $item->person->date_of_birth}}</td>
				<td>{{ $item->person->phone}}</td>
				<td>{{ ($item->person->email!='')?$item->person->email:'(trống)'}}</td>
				<td>{{ $item->person->account->username}}</td>
				<td class="text-center">
					<a href="{{url('/admin-page/customer/detail/'.$item->id)}}" class="btn btn-secondary btn-sm"><i class="fas fa-eye"></i></a>
				</td>
				<td class="text-center">
					<span data-toggle="modal" data-target="#delete{{$item->id}}" class="btn btn-danger btn-sm" ><i class="fas fa-trash-alt"></i></span>
				</td>
			</tr>
			<!-- modal delete -->
				<div class="modal fade" id="delete{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel{{$item->id}}"
			        aria-hidden="true">
			        <div class="modal-dialog" role="document">
			            <div class="modal-content">
			                <div class="modal-header">
			                    <h5 class="modal-title" id="exampleModalLabel{{$item->id}}">Bạn muốn xóa bản ghi này?</h5>
			                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
			                        <span aria-hidden="true">×</span>
			                    </button>
			                </div>
			                <div class="modal-body">Chọn "Đồng ý" bên dưới để xóa. Khuyến cáo không nên xóa.</div>
			                <div class="modal-footer">
			                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Thoát</button>
			                    <a class="btn btn-primary" href="{{url('/admin-page/customer/delete/'.$item->id)}}">Đồng ý</a>
			                </div>
			            </div>
			        </div>
			    </div>
			@endforeach
		</tbody>
	</table>
</div>
</div>
</div>
@endsection