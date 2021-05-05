@extends('layouts.app')

@section('title','Thêm mới học sinh')

@section('content')

<div class="page-header"><h4>Thêm nhân sự</h4></div>

<?php?>
@if ( Session::has('success') )
	<div class="alert alert-success alert-dismissible" role="alert">
		<strong>{{ Session::get('success') }}</strong>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			<span class="sr-only">Close</span>
		</button>
	</div>
@endif

<?php //Hiển thị thông báo lỗi?>
@if ( Session::has('error') )
	<div class="alert alert-danger alert-dismissible" role="alert">
		<strong>{{ Session::get('error') }}</strong>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			<span class="sr-only">Close</span>
		</button>
	</div>
@endif

<?php //Form thêm mới nhân sự?>
<p><a class="btn btn-primary" href="{{ url('/nhansu') }}">Về danh sách</a></p>
<div class="col-xs-4 col-xs-offset-4">
	<center><h4>Thêm nhân sự</h4></center>
	<form action="{{ url('nhansu/create') }}" method="post">
		<input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}"/>
		<div class="form-group">
			<label for="name">Tên nhân sự</label>
			<input type="text" class="form-control" id="name" name="name" placeholder="Tên nhân sự" maxlength="255" required />
		</div>
		<div class="form-group">
			<label for="email">Email</label>
			<input type="email" class="form-control" id="email"  name="email" placeholder="Email" maxlength="64" required />
		</div>	
    <div class="form-group">
			<label for="role">Vai trò</label>
			<input type="text" class="form-control" id="role"  name="role" placeholder="Vai trò" maxlength="15" required />
		</div>
    <div class="form-group">
			<label for="salary">Lương</label>
			<input type="text" class="form-control" id="salary"  name="salary" placeholder="Lương" maxlength="15" required />
		</div>	
    <div class="form-group">
			<label for="phone">Số điện thoại</label>
			<input type="text" class="form-control" id="phone"  name="phone" placeholder="Số điện thoại" maxlength="15" required />
		</div>	
		<center><button type="submit" class="btn btn-primary">Thêm</button></center>
	</form>
</div>

@endsection