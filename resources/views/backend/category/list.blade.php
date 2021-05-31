@extends('backend.master')
@section('content')
       <!-- Content Header (Page header) -->
       <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Category</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{url('admin-page')}}">Home</a></li>
                <li class="breadcrumb-item active ">Category</li>
                <li class="breadcrumb-item active ">List</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
<!-- Page Heading -->
{{-- <h1 class="h3 mb-4 text-gray-800">Danh mục<small> > Danh sách</small></h1> --}}
<div class="card shadow mb-4 col-md-9 col-lg-11 mx-auto">
<div class="card-body">
<div class="alert alert-info text-center mt-1 show" style="background-color: rgb(199, 185, 185); color: black;">Không thể xóa các danh mục còn sản phẩm</div>
<div class="table-responsive">
	<table class="table table-bordered" id="dataTable" cellspacing="0" width="100%">
		<thead>
			<tr>
				<th>ID</th>
				<th>Tên danh mục</th>
				<th>Sửa</th>
				<th>Xóa</th>
			</tr>
		</thead>
		{{-- <tfoot>
			<tr>
				<th>Id</th>
				<th>Tên danh mục</th>
				<th>Sửa</th>
				<th>Xóa</th>
			</tr>
		</tfoot> --}}
		<tbody>
			@foreach($listCategory as $item)
			<tr>
				<td>{{ $item->id}}</td>
				<td>{{ $item->name}}</td>
				<td class="text-center">
					<a href="{{url('/admin-page/category/edit/'.$item->id)}}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
				</td>
				<td class="text-center">
					<span data-toggle="modal" data-target="#delete{{$item->id}}" class="btn btn-danger btn-sm {{(count($item->products)>0)?'disabled':''}}" ><i class="fas fa-trash-alt"></i></span>
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
			                <div class="modal-body">Chọn "Đồng ý" bên dưới để xóa.</div>
			                <div class="modal-footer">
			                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Thoát</button>
			                    <a class="btn btn-primary" href="{{url('/admin-page/category/delete/'.$item->id)}}">Đồng ý</a>
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
