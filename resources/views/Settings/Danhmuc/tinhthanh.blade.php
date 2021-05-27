@extends('layouts.master')
<!-- # Nội dung tiêu đề -->
    @section('title')
        Tỉnh thành phố
    @endsection
<!-- #END tiêu đề -->
<!-- # Nội dung CSS, js bổ sung -->
    @push('css-up')
    @endpush
    @push('head-script')
    @endpush
<!-- #END Nội dung CSS, js -->
@section('content')
    <!-- #NOTIFICATIONS -->
    @if(session('success'))
        <div data-notify="container" id = "slice-alert" class="bootstrap-notify-container alert alert-dismissible alert-success p-r-35 animated fadeInDown" role="alert" data-notify-position="bottom-left" style="display: inline-block; margin: 0px auto; position: fixed; transition: all 5s ease-in-out 0s; z-index: 1031; top: 100px; right: 30px;">
            <span data-notify="icon"></span>
            <span data-notify="title"></span>
            </span><span data-notify="message">{{session('success')}}</span><a href="#" target="_blank" data-notify="url"></a>
        </div>
    @elseif(session('error'))
        <div data-notify="container" id = "slice-alert" class="bootstrap-notify-container alert alert-dismissible alert-warning p-r-35 animated fadeInDown" role="alert" data-notify-position="bottom-left" style="display: inline-block; margin: 0px auto; position: fixed; transition: all 5s ease-in-out 0s; z-index: 1031; top: 100px; right: 30px;">
            <span data-notify="icon">
            </span> <span data-notify="title"></span>
            </span> <span data-notify="message">{{session('error')}}</span><a href="#" target="_blank" data-notify="url"></a>
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
    <!-- #END Thongbao -->

    <div class="block-header">
        <h2>Tổng Quát</h2>
    </div>

    <!-- # Phần nội dung -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">

                <div class="header">
                    <h2>
                        Danh Sách địa chỉ
                        <div style="float:right" >
                            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#create">Thêm địa chỉ</button>
                            {{-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#Import">Import</button>
                            <a href="{{url('xuat')}}" class="btn btn-info btn-lg">Export</a> --}}
                        </div>
                    </h2>
                </div>

                <div  class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tinh/Thành phố</th>
                                <th>Quận/Huyện</th>
                                <th>Xã/Phường</th>
                                <th>Chức năng</th>
                            </tr>
                            </thead>
                            <?php $i = 1; ?>
                            <tbody>
                                @foreach($diadanh as $item)
                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td>{{$item->tinhthanh->tentinhthanh}}</td>
                                            <td>{{$item->quanhuyen->tenquanhuyen}}</td>
                                            <td>{{$item->xaphuong->tenxaphuong}}</td>
                                            <td>
                                                <a href="{{url('destroy.tinhthanhpho/'.$item->id)}}"  class="button delete-confirm"><i style="font-size:22px" class="material-icons">delete_forever</i></a>
                                                <a href ="" data-toggle="modal" data-target="#fix{{$item->id}}">
                                                    <i style="font-size:22px" class="material-icons">edit_calendar</i>
                                                    <a>
                                            </td>
                                        </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>


                <!-- Thêm  -->
                @include('Settings.Danhmuc.them_sua');

                {{--Import--}}
                <div class="modal fade" id="Import" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 style='color:#00b0e4' class="modal-title">Thêm ngân hàng</h4>
                            </div>
                            <div  class="body">
                                <form action = "{{url('nhap')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="file" class="form-control" name="file" required>
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
    <!-- #END Nội dung -->

@endsection
<!-- # js footer-->
    @push('footer-script')
    <!-- # Model hỏi xóa -->
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script type="text/javascript">
            $('.delete-confirm').on('click', function (event) {
                event.preventDefault();
                const url = $(this).attr('href');
                swal({
                    title: 'Xóa phòng ban',
                    text: 'Bạn có thực sự muốn xóa thành viên này?',
                    icon: 'warning',
                    buttons: ["Hủy", "Đồng ý!"],
                }).then(function(value) {
                    if (value) {
                        window.location.href = url;
                    }
                });
            });
        </script>
    <!-- #END MODEL -->
    <!-- #JS load thông báo -->
        <script type="text/javascript">
            $("#alert").delay(4000).slideUp(200, function() {
                    $(this).alert('close');
            });
        </script>
    <!-- #END js load thông báo -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <!-- #JS load tinh thanh -->
    <script>
        $('#tinhthanh').change(function(){
            var cit = $(this).val();
            if (cit) {
                $.ajax({
                    type: "get",
                    url: "{{url('/getQuanhuyen/')}}/"+cit,
                    success:function(res) {
                        if (res) {
                            $("#quanhuyen").empty();
                            $("#xaphuong").empty();
                            $("#quanhuyen").append('<option value="" selected>Chọn quận huyện</option>');
                            $.each(res, function(key, value) {
                                $("#quanhuyen").append('<option value="'+key+'">'+value+'</option>')
                            });
                        }
                    }
                });
                console.log(cit);
            }
        });
    
        $('#quanhuyen').change(function(){
            var sid = $(this).val();
            if(sid){
            $.ajax({
               type:"get",
               url:"{{url('getXaphuong/')}}/"+sid,
               success:function(res)
               {       
                    if(res)
                    {
                        $("#xaphuong").empty();
                        $("#xaphuong").append('<option>Chọn phường xã</option>');
                        $.each(res,function(key,value){
                            $("#xaphuong").append('<option value="'+key+'">'+value+'</option>');
                        });
                    }
               }
    
            });
            // console.log(sid);
            }
        });
    </script>
    <!-- #END js load tinh thanh -->
    @endpush
<!-- #END js -->
