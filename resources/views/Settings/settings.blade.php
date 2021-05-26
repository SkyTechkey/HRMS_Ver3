@extends('layouts.master')
<!-- # Nội dung tiêu đề -->
    @section('title')
        Cài đặt hệ thống
    @endsection
<!-- #END tiêu đề -->
<!-- # Nội dung CSS, js bổ sung -->
    @push('css-up')
    <link href="{{ asset('bap/scss/style.css')}}" rel="stylesheet">

    @endpush
    @push('head-script')

    @endpush
<!-- #END Nội dung CSS, js -->
@section('content')

    <div class="block-header">
        <h2>Cấu hình hệ thống</h2>
    </div>
    <!-- # Phần nội dung -->
    <div class="row clearfix">
        <div class="row">
            @include('partial.menu_settings')
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 no-vert-padding" >
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
                    @yield('content_menu')
                    <br/><br/>
                </div>
            </div>
        </div>
    </div>
    <!-- #END Nội dung -->



@push('footer-script')


@endpush
@endsection
