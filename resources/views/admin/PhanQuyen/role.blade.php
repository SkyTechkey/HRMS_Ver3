@extends('admin.Settings.settings')
@section('title')
    Vai trò
@endsection
@section('css')
@endsection
@section('content_menu')

        @if(session('success'))
            <div class ="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss ="alert" aria-hidden="true"></button>

                {{session('success')}}
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
                            Danh Sách Vai Trò Công Ty SkyTech
                            <div style="float:right" >
                            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Thêm Vai Trò</button>

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


                                        <a href="{{url('/role/xoa/'.$value->id)}}"  class="button delete-confirm"><i style="font-size:22px" class="material-icons">delete_forever</i></a>
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
                                                <form action = "{{url('role/sua/'.$value->id)}}" id="form_validation" method="POST">
                                                @csrf
                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                            <input  type="text" class="form-control" name="name" value ="{{$value->name}}"  required>
                                                        </div>


                                                    </div>

                                                    <!-- Default radio -->


                                                    <button class="btn btn-primary waves-effect" type="submit">Chấp nhận</button>
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
                            <h4 style='color:#00b0e4' class="modal-title">Tạo Vai Trò Công Ty SkyTech</h4>
                            </div>
                            <div  class="body">
                                <form action = "{{url('role/them')}}" id="form_validation" method="POST">
                                @csrf
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input  type="text" class="form-control" name="name" placeholder="Tên vai trò"  required>


                                        </div>

                                    </div>

                                    <button class="btn btn-primary waves-effect" type="submit">Chấp nhận</button>
                                </form>
                            </div>
                        </div>

                        </div>
                    </div>


                </div>
            </div>
        </div>



<script type="text/javascript">
    $('.delete-confirm').on('click', function (event) {
        event.preventDefault();
        const url = $(this).attr('href');
        swal({
            title: 'Xóa chức năng',
            text: 'Bạn có thực sự muốn xóa vai trò này?',
            icon: 'warning',
            buttons: ["Hủy", "Đồng ý!"],
        }).then(function(value) {
            if (value) {
                window.location.href = url;
            }
        });
    });
</script>


@endsection
