@extends('Settings.settings')
@section('title')
    Nơi làm việc
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
                                        <th>Nơi làm việc</th>
                                        <th>Địa chỉ</th>
                                        <th width="10%" >Chức Năng</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($noilamviec as $item)
                                    <tr>

                                        <td>{{$item->id}}</td>
                                        <td>{{$item->Tenchinhanh}}</td>
                                        <td>
                                            {{$item->diachi->tinhthanh->tentinhthanh}}, 
                                            {{$item->diachi->quanhuyen->tenquanhuyen}}, 
                                            {{$item->diachi->xaphuong->tenxaphuong}}
                                        </td>
                                        <td>
                                        <a href="{{url('/settings/danhmuc/noilamviec/xoa/'.$item->id)}}"  class="button delete-confirm"><i style="font-size:22px" class="material-icons">delete_forever</i></a>
                                        <a href="" type="button" data-toggle="modal" data-target="#fix{{$item->id}}"><i style="font-size:22px" class="material-icons">edit_calendar</i><a>
                                        </td>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- Thêm phòng ban Modal -->
                   @include('Settings.Noilamviec.them_sua');
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
        }).then(function(item) {
            if (item) {

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
