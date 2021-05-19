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
            <div id='alert' data-notify="container" class="bootstrap-notify-container alert alert-dismissible alert-success p-r-35 animated fadeInDown" role="alert" data-notify-position="bottom-center" style="display: inline-block; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1031; top: 77px; left: 0px; right: 0px;">
                <button type="button" aria-hidden="true" class="close" data-notify="dismiss" style="position: absolute; right: 10px; top: 5px; z-index: 1033;">×</button>
                <span data-notify="icon"></span> 
                <span data-notify="title"></span> <span data-notify="message">{{session('success')}}</span>
                <a href="#" target="_blank" data-notify="url"></a>
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
                            Tôn giáo
                            <div style="float:right; padding-right: 10px;" >
                            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Thêm Tôn giáo</button>
                               
                            </div>
                            <div style="float:right; padding-right: 10px;" >
                                <a class="btn btn-info btn-lg button delete-all" href="{{url('/tongiao/xoaAll/')}}">Xóa tất cả</a>
                                   
                                </div>
                            <div style="float:right; padding-right: 10px;" >
                                <a class="btn btn-info btn-lg" href="{{ route('TongiaoExport') }}">Xuất danh sách</a>  
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
                                    <h4 style='color:#00b0e4' class="modal-title">Import tôn giáo</h4>
                                </div>
                                <div  class="body">
                                    <form action="{{ route('TongiaoImport') }}" method="POST" enctype="multipart/form-data">
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
                                        <th>Tên Tôn giáo</th>
                                        
                                        <th width="30%" >Chức Năng</th>
                                        
                                    </tr>
                                </thead>
                                
                                <tbody id="bodyyy">
                                    
                                    @foreach($tongiaos as $value)
                                    <tr>

                                        <td>{{$value->id}}</td>
                                        <td>{{$value->TenTG_Tongiao}}</td>
                                        
                                        <td>
                                        
                                        
                                        <a href="{{url('/tongiao/xoa/'.$value->id)}}"  ><i style="font-size:22px" class="material-icons">delete_forever</i></a>
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
                                                <h4 style='color:#00b0e4' class="modal-title">Sửa Tôn giáo {{$value->TenTG_Tongiao}}</h4>
                                            </div>
                                            <div  class="body">
                                                <form action = "{{url('tongiao/sua/'.$value->id)}}" id="form_validation" method="POST">
                                                @csrf
                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                            <input  type="text" class="form-control" name="TenTG_Tongiao" value ="{{$value->TenTG_Tongiao}}"  required>     
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
                            <h4 style='color:#00b0e4' class="modal-title">Tạo Tôn giáo</h4>
                            </div>
                            <div  class="body">
                                <form action = "{{url('tongiao/them')}}" id="form_validation" method="POST">
                                @csrf
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input  type="text" class="form-control" name="TenTG_Tongiao" placeholder="Tên tôn giáo"  required>
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
            title: 'Xóa Tôn giáo',
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
            title: 'Xóa tất cả Tôn giáo',
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
<script type="text/javascript">
	$("#alert").delay(4000).slideUp(200, function() {
			$(this).alert('close');
	});
</script>

@endsection
@endsection