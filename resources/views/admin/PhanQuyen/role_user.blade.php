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
        
        <div class="block-header">
            <h2>Phân Quyền - Sky-Tech</h2>
            
        </div>
        <!-- Input -->
        
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    
                    <div class="body">
                        <h2 class="card-inside-title">Phân vai trò cho nhân viên 123</h2>
                        
                        
                        <div class="demo-switch">
                            <div class="row clearfix">
                                @foreach($role as $value)
                                <div class="col-sm-3">
                                    <div class="demo-switch-title">{{$value->name}}</div>
                                    <div class="switch">
                                        <label><input value ="" type="checkbox" checked><span class="lever switch-col-red"></span></label>
                                    </div>
                                </div>
                                @endforeach
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
        <!--#END# Switch Button -->
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
@endsection