@extends('layouts.master')
<!-- # Nội dung tiêu đề -->
    @section('title')
        Tên file mẫu
    @endsection
<!-- #END tiêu đề -->
<!-- # Nội dung CSS, js bổ sung -->
    @push('css-up')
    @endpush
    @push('head-script')
    @endpush
<!-- #END Nội dung CSS, js -->
@section('content')
    <!-- #NOTIFICATIONS Nếu có không thì k dùng-->
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
    <!-- #END Thongbao -->

    <div class="block-header">
        <h2>Tổng Quát</h2>
    </div>

    <!-- # Phần nội dung -->
    <div class="row clearfix">
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
    @endpush
<!-- #END js -->
