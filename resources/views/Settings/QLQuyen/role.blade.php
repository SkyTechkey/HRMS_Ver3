@extends('Settings.settings')
@section('title')
    Vai trò
@endsection
@section('css')
@endsection
@section('content_menu')

@if(session('success'))
<div data-notify="container" id = "slice-alert" class="bootstrap-notify-container alert alert-dismissible alert-success p-r-35 animated fadeInDown" role="alert" data-notify-position="bottom-left" style="display: inline-block; margin: 0px auto; position: fixed; transition: all 5s ease-in-out 0s; z-index: 1031; top: 100px; right: 30px;">

    <span data-notify="icon">

    </span> <span data-notify="title"></span>

    </span> <span data-notify="message">{{session('success')}}</span><a href="#" target="_blank" data-notify="url"></a>
</div>

@endif
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">

                    <div class="header">

                        <h2>
                            Danh sách Nhóm quyền
                            <div style="float:right" >

                            <button type="button" class="btn btn-primary waves-effect" data-toggle="modal" data-target="#myModal">Thêm mới</button>
                            </div>
                        </h2>



                    </div>
                    <div  class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên Vai Trò</th>

                                        <th width="10%" >Chức Năng</th>

                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($role as $value)
                                    <tr>

                                        <td>{{$value->id}}</td>
                                        <td>{{$value->name}}</td>

                                        <td>


                                        <a href="{{url('/settings/role/delete/'.$value->id)}}"  class="button delete-confirm"><i style="font-size:22px" class="material-icons">delete_forever</i></a>
                                        <a href =""  type="button" data-toggle="modal" data-target="#fix{{$value->id}}"><i style="font-size:22px" class="material-icons">edit_calendar</i><a>
                                        </td>

                                    </tr>
                                    <!-- Sửa modal -->
                                    <div class="modal fade" id="fix{{$value->id}}" role="dialog">
                                        <div class="modal-dialog">

                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 style='color:#00b0e4' class="modal-title">Sửa vai trò {{$value->name}}</h4>
                                            </div>
                                            <div  class="body">
                                                <form action = "{{url('settings/role/edit/'.$value->id)}}" id="form_validation" method="POST">
                                                @csrf
                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                            <input  type="text" class="form-control" name="name" value ="{{$value->name}}"  required>
                                                        </div>


                                                    </div>

                                                    <!-- Default radio -->


                                                    <button class="btn btn-primary waves-effect" type="submit">Đồng ý</button>
                                                </form>
                                            </div>
                                        </div>

                                        </div>
                                    </div>
                                    @endforeach

                                </tbody>


                            </table>

                        </div>

                    </div>
                    <!-- Thêm phòng ban Modal -->
                    <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 style='color:#00b0e4' class="modal-title">Thêm mới Nhóm quyền</h4>
                            </div>
                            <div  class="body">
                                <form action = "{{url('settings/role/create')}}" id="form_validation" method="POST" >
                                @csrf
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input  type="text" class="form-control" name="name" placeholder="Tên vai trò"  required>


                                        </div>

                                    </div>

                                    <button class="btn btn-primary waves-effect" type="submit" >Lưu</button>
                                </form>
                            </div>
                        </div>

                        </div>
                    </div>


                </div>
            </div>
        </div>



@push('footer-script')

<script type="text/javascript">
    $('.delete-confirm').on('click', function (event) {
        event.preventDefault();
        const url = $(this).attr('href');
        swal({
            title: 'Xóa chức năng',
            text: 'Bạn có thực sự muốn xóa dữ liệu này?',
            icon: 'warning',
            buttons: ["Hủy", "Đồng ý!"],
        }).then(function(value) {
            if (value) {

                window.location.href = url;
                $.pjax.reload('#pjax-container');
            }
        });
    });
</script>
<!-- Bootstrap Notify Plugin Js -->

<script type="text/javascript">
    $(document).ready(function() {
        $("#slice-alert").hide();
        $("#slice-alert").fadeTo(3000, 700).slideUp(700, function() {
        $("#slice-alert").slideUp(700);
        });
    });
</script>




@endpush

@endsection
