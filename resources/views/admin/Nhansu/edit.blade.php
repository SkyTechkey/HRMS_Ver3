@extends('layouts.app')
@section('content')
<?php?>
@if ( Session::has('success') )
	<div id='alert' data-notify="container" class="bootstrap-notify-container alert alert-dismissible alert-success p-r-35 animated fadeInDown" role="alert" data-notify-position="bottom-center" style="display: inline-block; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1031; top: 77px; left: 0px; right: 0px;">
		<button type="button" aria-hidden="true" class="close" data-notify="dismiss" style="position: absolute; right: 10px; top: 5px; z-index: 1033;">×</button>
		<span data-notify="icon"></span> 
		<span data-notify="title"></span> <span data-notify="message">{{ Session::get('success') }}</span>
		<a href="#" target="_blank" data-notify="url"></a>
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

<?php?>
<p><a class="btn btn-primary" href="{{ url('/nhansu') }}">Về danh sách</a></p>
<div class="col-xs-4 col-xs-offset-4">
	<center><h4>Sửa nhân sự</h4></center>
	<form action="{{ url('nhansu/update/'.$getData[0]->id) }}" method="post">
    @csrf
		<div class="form-group">
			<label for="name">Tên nhân sự</label>
			<input type="text" class="form-control" id="name" name="name" placeholder="Tên nhân sự" maxlength="255" value="{{ $getData[0]->name }}" required />
		</div>
		<div class="form-group">
			<label for="email">Email</label>
			<input type="text" class="form-control" id="email" name="email" placeholder="Email" maxlength="64" value="{{ $getData[0]->email }}" required />
		</div>
    <div class="form-group">
			<label for="phone">Số điện thoại</label>
			<input type="text" class="form-control" id="phone" name="phone" placeholder="Số điện thoại" maxlength="15" value="{{ $getData[0]->phone }}" required />
		</div>
    <div class="form-group">
			<label for="role">Chức vụ</label>
			<input type="text" class="form-control" id="role" name="role" placeholder="Chức vụ" maxlength="15" value="{{ $getData[0]->role }}" required />
		</div>
    <div class="form-group">
			<label for="salary">Lương</label>
			<input type="text" class="form-control" id="salary" name="salary" placeholder="Lương" maxlength="15" value="{{ $getData[0]->salary }}" required />
		</div>
		<div>
			<label for="tongiao">Tôn giáo</label>
			<select id="tongiao" name="tongiao" form="formsua">
					@foreach($tongiaos as $tongiao)
							<option value="{{ $tongiao->tongiao_id }}"> {{ $tongiao->TenTG_Tongiao }}</option>
					@endforeach
			</select>
	</div>
		<center><button type="submit" class="btn btn-primary">Lưu lại</button></center>
	</form>
</div>
<script type="text/javascript">
	$("#alert").delay(4000).slideUp(200, function() {
			$(this).alert('close');
	});
</script>
@endsection