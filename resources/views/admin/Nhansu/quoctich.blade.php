@extends('layouts.master')
@section('title')
    Vai trò
@endsection
@section('css')
<!-- Bootstrap Core Css -->
<link href="{{ asset('project_asset/plugins/bootstrap/css/bootstrap.css')}}" rel="stylesheet">

<!-- Waves Effect Css -->
<link href="{{ asset('project_asset/plugins/node-waves/waves.css')}}" rel="stylesheet" />

<!-- Animation Css -->
<link href="{{ asset('project_asset/plugins/animate-css/animate.css')}}" rel="stylesheet" />

<link href="{{ asset('project_asset/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />

<!-- JQuery DataTable Css -->
<link href="{{ asset('project_asset/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}" rel="stylesheet">

<!-- Custom Css -->
<link href="{{ asset('project_asset/css/style.css')}}" rel="stylesheet">

<!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
<link href="{{ asset('project_asset/css/themes/all-themes.css')}}" rel="stylesheet" />
@endsection
@section('content')
<section class="content">
    <div class="container-fluid">
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
                            Quốc tịch
                            <div style="float:right; padding-right: 10px;" >
                            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Thêm Quốc tịch</button>
                               
                            </div>
                            <div style="float:right; padding-right: 10px;" >
                                <a class="btn btn-info btn-lg button delete-all" href="{{url('/quoctich/xoaAll/')}}">Xóa tất cả</a>
                                   
                                </div>
                            <div style="float:right; padding-right: 10px;" >
                                <a class="btn btn-info btn-lg" href="{{ route('QuoctichExport') }}">Xuất danh sách</a>  
                            </div>
                            <div style="float:right; padding-right: 10px;" >
                                <a class="btn btn-info btn-lg" type="button" data-toggle="modal" data-target="#import">Import danh sách</a>
                            </div>
                        </h2>
                        
                        <div class="modal fade" id="import" role="dialog">
                            <div class="modal-dialog">
                
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 style='color:#00b0e4' class="modal-title">Import Quốc tịch</h4>
                                </div>
                                <div  class="body">
                                    <form action="{{ route('QuoctichImport') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="file" name="file" class="form-control">
                                        <br>
                                        <button class="btn btn-primary waves-effect">Import </button>
                        
                                    </form>
                                </div>
                            </div>
                            
                            </div>
                        </div>
                        
                    </div>
                    <div  class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên Quốc tịch</th>
                                        
                                        <th width="30%" >Chức Năng</th>
                                        
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    
                                    @foreach($quoctichs as $value)
                                    <tr>

                                        <td>{{$value->id}}</td>
                                        <td>{{$value->TenQT_Quoctich}}</td>
                                        
                                        <td>
                                        
                                        
                                        <a href="{{url('/quoctich/xoa/'.$value->id)}}"  class="button delete-confirm"><i style="font-size:22px" class="material-icons">delete_forever</i></a>
                                        <a type="button" data-toggle="modal" data-target="#fix{{$value->id}}"><i style="font-size:22px" class="material-icons">edit_calendar</i><a>
                                        </td>
                                        
                                    </tr>
                                    
                                    <!-- Sửa modal -->
                                    <div class="modal fade" id="fix{{$value->id}}" role="dialog">
                                        <div class="modal-dialog">
                                        
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 style='color:#00b0e4' class="modal-title">Sửa Quốc tịch {{$value->TenQT_Quoctich}}</h4>
                                            </div>
                                            <div  class="body">
                                                <form action = "{{url('quoctich/sua/'.$value->id)}}" id="form_validation" method="POST">
                                                @csrf
                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                            <input  type="text" class="form-control" name="TenQT_Quoctich" value ="{{$value->TenQT_Quoctich}}"  required>     
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
                            <h4 style='color:#00b0e4' class="modal-title">Tạo Quốc tịch</h4>
                            </div>
                            <div  class="body">
                                <form action = "{{url('quoctich/them')}}" id="form_validation" method="POST">
                                @csrf
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input  type="text" class="form-control" name="TenQT_Quoctich" placeholder="Tên Quốc tịch"  required>
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
        
        
    </div>
</section>
@section('js')
<!-- Jquery Core Js -->
<script src="{{ asset('project_asset/plugins/jquery/jquery.min.js')}}"></script>

<!-- Bootstrap Core Js -->
<script src="{{ asset('project_asset/plugins/bootstrap/js/bootstrap.js')}}"></script>



<!-- Slimscroll Plugin Js -->
<script src="{{ asset('project_asset//plugins/jquery-slimscroll/jquery.slimscroll.js')}}"></script>

<!-- Waves Effect Plugin Js -->
<script src="{{ asset('project_asset/plugins/node-waves/waves.js')}}"></script>

<!-- Jquery DataTable Plugin Js -->
<script src="{{ asset('project_asset/plugins/jquery-datatable/jquery.dataTables.js')}}"></script>
<script src="{{ asset('project_asset/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js')}}"></script>
<script src="{{ asset('project_asset/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js')}}"></script>
<script src="{{ asset('project_asset/plugins/jquery-datatable/extensions/export/buttons.flash.min.js')}}"></script>
<script src="{{ asset('project_asset/plugins/jquery-datatable/extensions/export/jszip.min.js')}}"></script>
<script src="{{ asset('project_asset/plugins/jquery-datatable/extensions/export/pdfmake.min.js')}}"></script>
<script src="{{ asset('project_asset/plugins/jquery-datatable/extensions/export/vfs_fonts.js')}}"></script>
<script src="{{ asset('project_asset/plugins/jquery-datatable/extensions/export/buttons.html5.min.js')}}"></script>
<script src="{{ asset('project_asset/plugins/jquery-datatable/extensions/export/buttons.print.min.js')}}"></script>

<!-- Custom Js -->
<script src="{{ asset('project_asset/js/admin.js')}}"></script>
<script src="{{ asset('project_asset/js/pages/tables/jquery-datatable.js')}}"></script>

<!-- Demo Js -->
<script src="{{ asset('project_asset/js/demo.js')}}"></script>
<script src="{{ asset('project_asset/plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
    $('.delete-confirm').on('click', function (event) {
        event.preventDefault();
        const url = $(this).attr('href');
        swal({
            title: 'Xóa Quốc tịch',
            text: 'Bạn có thực sự muốn xóa ?',
            icon: 'warning',
            buttons: ["Hủy", "Đồng ý!"],
        }).then(function(value) {
            if (value) {
                window.location.href = url;
            }
        });
    });
    $('.delete-all').on('click', function (event) {
        event.preventDefault();
        const url = $(this).attr('href');
        swal({
            title: 'Xóa tất cả Quốc tịch',
            text: 'Bạn có thực sự muốn xóa tất cả?',
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
@endsection