@extends('backend.master')
@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Slide</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('admin-page')}}">Home</a></li>
            <li class="breadcrumb-item active ">Slide</li>
            <li class="breadcrumb-item active ">{{(request()->is('admin-page/slide/add'))?'Thêm':'Sửa'}}</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
{{-- <h1 class="h3 mb-4 text-gray-800">Slide<small> > {{(request()->is('admin-page/slide/add'))?'Thêm':'Sửa'}}</small></h1> --}}
<div class="card shadow mb-4">
<div class="card-body">
		@if(isset($slide))
		<div class="row mb-3">
			<div class="col-sm-3"><b>Slide cũ</b></div>
			<div class="col-sm-4  embed-responsive embed-responsive-16by9"><img class="embed-responsive-item" src="{{asset('/images/slide/'.$slide->name)}}"></div>
		</div>
		@endif
		<form action="" method="post" enctype="multipart/form-data">
			@csrf
			<div class="row">
				<div class="col-sm-3"><b>Slide mới</b></div>
				<div class="col-sm-4">
					<input type="file" name="slide" required class="slide">
				</div>
				<div class="col-sm-4"><img class="slide-display mx-auto" style="display: none;object-fit: cover;width: 160px;height: 90px"></div>
			</div>
			@if($errors->has('slide'))
				<div class="alert alert-danger alert-dismissible text-center mt-1">{{ $errors->first('slide') }}<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			 	</button>
				</div>
			@endif
			<div class="row" style="margin-top:5px;">
				<div class="col-sm-3"></div>
				<div class="col-sm-4">
					<input type="submit" name="" value="Thực thi" class="btn btn-success">
				</div>
			</div>
		</form>
</div>
</div>
@endsection