@extends('Settings.settings')
@section('title')
    Tinh/Thành phố
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
                                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#create">Thêm địa chỉ</button>
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
                                                        <a href="{{url('settings/danhmuc/tinhthanhpho/xoadiadanh/'.$item->id)}}"  class="button delete-confirm"><i style="font-size:22px" class="material-icons">delete_forever</i></a>
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
                    <!-- Thêm phòng ban Modal -->
                   @include('Settings.Danhmuc.them_sua');
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

