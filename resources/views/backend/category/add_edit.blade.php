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
            <li class="breadcrumb-item active ">{{(request()->is('admin-page/category/add'))?'Thêm':'Sửa'}}</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
<!-- Page Heading -->
{{-- <h1 class="h3 mb-4 text-gray-800">Danh mục<small> > {{(request()->is('admin-page/category/add'))?'Thêm':'Sửa'}}</small></h1> --}}
<div class="card shadow mb-4">
<div class="card-body">
		<form action="" method="post">
			@csrf
			<div class="row">
				<div class="col-sm-3"><b>Tên danh mục</b></div>
				<div>
					<input type="text" name="stringName" value="{{isset($category->name)?$category->name:''}}" placeholder="Nhập tên danh mục" class="form-control">
				</div>
			</div>
			@if($errors->has('stringName'))
				<div class="alert alert-danger alert-dismissible text-center mt-1">{{ $errors->first('stringName') }}<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			 	</button>
				</div>
			@endif
			<div class="row" style="margin-top:5px;">
				<div class="col-sm-3"></div>
				<div>
					<input type="submit" name="" value="Thực thi" class="btn btn-success">
				</div>
			</div>
		</form>
</div>
</div>
@endsection