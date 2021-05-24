@extends('layouts.master')
@section('title')
    Danh sách nhân viên công ty
@endsection
@section('css')
    <!-- Bootstrap Core Css -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="{{ asset('project_asset/plugins/bootstrap/css/bootstrap.css')}}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    

    <!-- Waves Effect Css -->
    <link href="{{ asset('project_asset/plugins/node-waves/waves.css')}}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{ asset('project_asset/plugins/animate-css/animate.css')}}" rel="stylesheet" />

    <!-- Bootstrap Material Datetime Picker Css -->
    <link href="{{ asset('project_asset/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css')}}" rel="stylesheet" />

    <!-- Bootstrap DatePicker Css -->
    <link href="{{ asset('project_asset/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css')}}" rel="stylesheet" />

    <!-- Wait Me Css -->
    <link href="{{ asset('project_asset/plugins/waitme/waitMe.css')}}" rel="stylesheet" />

    <!-- Bootstrap Select Css -->
    <link href="{{ asset('project_asset/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />

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
                                Thêm nhân viên
                                
                            </h2>
                        </div>

                        <div  class="body">
                                        <form action = "{{url('nhanvien/them')}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group form-float">
                                            
                                                <div class="form-line">
                                                    <input disabled type="text" value ="{{$Id_new + 1}}"  class="form-control" name="id_nv" required>
                                                    
                                                </div>
                                            </div>
                                            <div class="form-group form-float">
                                                
                                                <div class="form-line">
                                                    <input type="text" place class="form-control" name="username" required>
                                                    <label class="form-label">Tên đăng nhập</label>
                                                </div>
                                                
                                            </div>

                                            <div class="form-group form-float">
                                                
                                                <div class="form-line">
                                                    <input type="text" place class="form-control" name="password" required>
                                                    <label class="form-label">Mật khẩu</label>
                                                </div>
                                                
                                            </div>

                                            <div class="form-group form-float">
                                                
                                                <div class="form-line">
                                                    <input type="text" place class="form-control" name="fullname" required>
                                                    <label class="form-label">Họ và tên</label>
                                                </div>
                                                
                                            </div>
                                            
                                            <div style="width:400px" class="form-group">
                                            
                                                
                                                <div class="form-line" id="bs_datepicker_container">
                                                    <input type="text" class="form-control" name = "ngaySinh" placeholder="Ngày sinh">
                                                </div>
                                               
                                            </div>
                                            
                                           
                                            <div style="width:400px" class="form-group">
                                            
                                                
                                                <div class="form-line" id="bs_datepicker_container">
                                                    <input type="text" class="form-control" name="ngayVaoLam" placeholder="Ngày vào làm">
                                                </div>
                                               
                                            </div>
                                            <div style="width:400px" class="form-group form-float">
                                                
                                                <select id ="getThanhPho"  class="selective form-control" name="thanhPho" required>
                                                        <option value="" >Tỉnh\Thành phố</option>
                                                        @foreach($thanhPho as $value)                 
                                                        <option  value="{{$value->id}}">{{$value->Tenthanhpho}}</option>
                                                          
                                                        @endforeach   
                                                </select>
                                                
                                            </div>
                                            <div  style="width:400px" class="form-group form-float">
                                                
                                                <select id="load_data"  class="selective form-control" name="xaPhuong" required>
                                                        <option value="" >Quận\Huyện</option>
                                                                         
                                                        
                                                        
                                                </select>
                                                
                                            </div>
                                            
                                            <div  style="width:400px" class="form-group form-float">
                                                
                                                <select  class="selective form-control" name="xaPhuong" required>
                                                        <option value="" >Xã\Phường</option>
                                                                         
                                                        <option class ="getXaPhuong" value=""></option>
                                                        
                                                </select>
                                                
                                            </div>
                                            <div style="width:400px" class="form-group form-float">
                                                
                                                <select  class="selective form-control" name="noiLamViec" required>
                                                        <option value="" >Nơi làm việc</option>
                                                        
                                                        @foreach($tbl_Noilamviec as $value)
                                                        <option value="{{$value->id}}">{{$value->Tenchinhanh}}</option>
                                                   
                                                        
                                                        @endforeach
                                                </select>
                                                
                                            </div>
                                            <div style="width:400px" class="form-group form-float">
                                                
                                                <select class="selective form-control" name="status" required>
                                                        <option value="">Trạng thái hoạt động</option>
                                                        <option value="Hoạt động">Hoạt động</option>
                                                        <option value="Ngưng hoạt động">Ngưng hoạt động</option>
                                                        <option value="Tạm dừng">Tạm dừng</option>
                                                    
                                                </select>
                                                
                                            </div>
                                            <div style="width:400px" class="form-group form-float">
                                                <label class="form-label">Avatar</label>
                                                <div class="form-line">
                                                    <input type="file" place class="form-control" name="avatar" required>
                                                    
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
    </section>
@section('js')
    <!-- Jquery Core Js -->
    <script src="{{ asset('project_asset/plugins/jquery/jquery.min.js')}}"></script>

    <!-- Bootstrap Core Js -->
    <script src="{{ asset('project_asset/plugins/bootstrap/js/bootstrap.js')}}"></script>

    <!-- Select Plugin Js -->
    <script src="{{ asset('project_asset/plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="{{ asset('project_asset/plugins/jquery-slimscroll/jquery.slimscroll.js')}}"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{ asset('project_asset/plugins/node-waves/waves.js')}}"></script>

    <!-- Autosize Plugin Js -->
    <script src="{{ asset('project_asset/plugins/autosize/autosize.js')}}"></script>

    <!-- Moment Plugin Js -->
    <script src="{{ asset('project_asset/plugins/momentjs/moment.js')}}"></script>

    <!-- Bootstrap Material Datetime Picker Plugin Js -->
    <script src="{{ asset('project_asset/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js')}}"></script>

    <!-- Bootstrap Datepicker Plugin Js -->
    <script src="{{ asset('project_asset/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>

    <!-- Custom Js -->
    <script src="{{ asset('project_asset/js/admin.js')}}"></script>
    <script src="{{ asset('project_asset/js/pages/forms/basic-form-elements.js')}}"></script>

    <!-- Demo Js -->
    <script src="{{ asset('project_asset/js/demo.js')}}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    
    <script type="text/javascript">
        $('.delete-confirm').on('click', function (event) {
            event.preventDefault();
            const url = $(this).attr('href');
            swal({
                title: 'Xóa phòng ban',
                text: 'Bạn có thực sự muốn xóa phòng ban này?',
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
        $(document).ready(function(){
            
            $('#getThanhPho').on('change',function(){
                var idThanhPho = $(this).val();
                
                $.ajax({
                    method: "POST",// phương thức dữ liệu được truyền đi
                    url: "{{ url('/nhanvien/them/quanhuyen') }}",// gọi đến file server show_data.php để xử lý
                    // data: $("#fr_form").serialize(),//lấy toàn thông tin các fields trong form bằng hàm serialize của jqueryinput
                    data: {
                        'ID': idThanhPho,
                        _token: '{{csrf_token()}}'
                    },
                    success : function(response){//kết quả trả về từ server nếu gửi thành công
                        // var data = JSON.parse(response);
                        if (response.success) {
                            var result = response.success;
                            var html = '';
                            
                            
                            $.map(result, function(value, index){
                                
                                html+=  
                                       
                                        
                                        '<option value='+value['id']+' >'+value['Tenquanhuyen']+'</option>';
                                        
                                   
                                            
                            });    
                            $('#load_data').html(html);                
                        }           
                        
                        
                        
                    }
                });
            });
            
        });
    </script>
@endsection
@endsection
