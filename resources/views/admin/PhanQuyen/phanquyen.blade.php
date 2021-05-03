@extends('layouts.master')
@section('title')
Quản lý phân quyền
@endsection
@section('css')
<link href="{{ asset('project_asset/plugins/bootstrap/css/bootstrap.css')}}" rel="stylesheet">

<!-- Waves Effect Css -->
<link href="{{ asset('project_asset/plugins/node-waves/waves.css')}}" rel="stylesheet" />

<!-- Animation Css -->
<link href="{{ asset('project_asset/plugins/animate-css/animate.css')}}" rel="stylesheet" />
<!-- Custom Css -->
<link href="{{ asset('project_asset/css/style.css')}}" rel="stylesheet">

<!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
<link href="{{ asset('project_asset/css/themes/all-themes.css')}}" rel="stylesheet" />





<!-- Wait Me Css -->
<link href="{{ asset('project_asset/plugins/waitme/waitMe.css')}}" rel="stylesheet" />


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
        <div class="block-header">
            <h2>Phân Quyền - Sky-Tech</h2>
            
        </div>
        <!-- Input -->
        @foreach($tbl_role as $value)
        <form method="post" action="{{url('phanquyen/sua/'.$value->id)}}">
        @csrf
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        
                        <div class="body">
                            <h2 class="card-inside-title">{{$value->name}}</h2>
                            
                            
                            <div class="demo-switch">
                                <div class="row clearfix">
                                    @foreach($tbl_permission as $value)
                                    <div class="col-sm-3">
                                        <div class="demo-switch-title">{{$value->name}}</div>
                                        <div class="switch">
                                            <label><input name="permission[]" value ="{{$value->id}}" type="checkbox" checked><span class="lever switch-col-red"></span></label>
                                        </div>
                                    </div>
                                    @endforeach
                                    
                                </div>
                            </div>
                            <button  class="btn btn-primary waves-effect" type="submit">Chấp nhận</button>
                        </div>
                        
                    </div>
                </div>
            </div>
            
        </form>
        
        @endforeach
        
        <!--#END# Switch Button -->
    </div>
</section>
@endsection
@section('js')
<script src="{{ asset('project_asset/plugins/jquery/jquery.min.js')}}"></script>



<script src="{{ asset('project_asset/plugins/node-waves/waves.js')}}"></script>

<script src="{{ asset('project_asset/js/admin.js')}}"></script>

<script src="{{ asset('project_asset/js/demo.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function(){
        
    });

</script>
@endsection