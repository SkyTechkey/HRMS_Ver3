<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Bộ lọc thay đổi tỉnh thành quận huyện phường xã</title>
</head>
<body>
<div class="container">
    <div class="row justify-content-md-center p-2">
        <form action="{{url('/postDiachi')}}" method="POST">
            @csrf
            <div class="col-md-auto">
                <select class="form-select form-select-sm mb-3" name="tinhthanh" id="tinhthanh" aria-label=".form-select-sm">
                    <option value="" selected>Chọn tỉnh thành</option>
                @foreach ($tinhthanh as $item)
                    <option value="{{$item->id}}">{{$item->tentinhthanh}}</option>
                @endforeach
                </select>
                
    
                <select class="form-select form-select-sm mb-3" name="quanhuyen" id="quanhuyen" aria-label=".form-select-sm">
                    {{-- <option value="" selected>Chọn quận huyện</option> --}}
                </select>
    
                <select class="form-select form-select-sm" name="xaphuong" id="xaphuong" aria-label=".form-select-sm">
                    {{-- <option value="" selected>Chọn phường xã</option> --}}
                </select>

                <button class="btn btn-success" type="submit">Chọn địa chỉ</button>
            </div>
        </form>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
{{-- <script src="{{asset('js/quanhuyen.js')}}"></script> --}}
<script>
    // function renderCity() {
        $('#tinhthanh').change(function(){
        var cit = $(this).val();
        if (cit) {
            $.ajax({
                type: "get",
                url: "{{url('/getQuanHuyen/')}}/"+cit,
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
            // console.log(cit);
        }
    });

    $('#quanhuyen').change(function(){
        var sid = $(this).val();
        if(sid){
        $.ajax({
           type:"get",
           url:"{{url('getXaPhuong/')}}/"+sid,
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
    // }
    
    
</script>
</body>
</html>
