 <!-- #Thêm mới Modal-->
 <div class="modal fade" id="create" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 style='color:#00b0e4' class="modal-title" id="defaultModalLabel">THIÊM MỚI THIẾT BỊ</h4>
            </div>
            <div class="modal-body">
                <form action="{{route('store.tinhthanhpho')}}" method="post">
                    <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}"/>
                    <div class="form-group">
                            <div class="col-sm-4">
                                <select class="selective form-control" name="tinhthanh" id="tinhthanh" aria-label=".form-select-sm">
                                    <option value="" selected>Chọn tỉnh thành</option>
                                    @foreach ($tinhthanh as $item)
                                        <option value="{{$item->id}}">{{$item->tentinhthanh}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <select class="selective form-control" name="quanhuyen" id="quanhuyen" aria-label=".form-select-sm">
                                    {{-- <option value="" selected>Chọn quận huyện</option> --}}
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <select class="selective form-control" name="xaphuong" id="xaphuong" aria-label=".form-select-sm">
                                    {{-- <option value="" selected>Chọn phường xã</option> --}}
                                </select>
                            </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary waves-effect">Lưu</button>
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Đóng</button>
            </div>
            </form>
        </div>
        
    </div>
</div>
<!-- #Sửa modal -->
@foreach($diadanh as $item)
<div class="modal fade" id="fix{{$item->id}}" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 style='color:#00b0e4' class="modal-title" id="defaultModalLabel">Sửa Thiết bị</h4>
            </div>
            <div class="modal-body">
                <form action="{{ url('/settings/danhmuc/tinhthanhpho/suadiadanh/'.$item->id) }}" method="post" id="form_validation">
                    @csrf
                    <div class="form-group">
                        <div class="col-sm-4">
                            <select class="selective form-control" name="tinhthanh" id="tinhthanh1" aria-label=".form-select-sm">
                                {{-- <option value="" selected>Chọn tỉnh thành</option> --}}
                                    <option value="{{$item->tinhthanh->id}}" selected>{{$item->tinhthanh->tentinhthanh}}</option>
                                @foreach ($tinhthanh as $item)
                                    <option value="{{$item->id}}">{{$item->tentinhthanh}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <select class="selective form-control" name="quanhuyen" id="quanhuyen1" aria-label=".form-select-sm">
                                {{-- <option value="{{$item->quanhuyen->id}}" selected>{{$item->quanhuyen->tenquanhuyen}}</option> --}}
                                {{-- @foreach ($quanhuyen as $item) --}}
                                    {{-- <option value="{{$item->id}}">{{$item->tenquanhuyen}}</option> --}}
                                {{-- @endforeach --}}
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <select class="selective form-control" name="xaphuong" id="xaphuong1" aria-label=".form-select-sm">
                                {{-- <option value="{{$item->xaphuong->id}}" selected>>{{$item->xaphuong->tenxaphuong}}</option> --}}
                                {{-- @foreach ($xaphuong as $item) --}}
                                    {{-- <option value="{{$item->id}}">{{$item->tenxaphuong}}</option> --}}
                                {{-- @endforeach --}}
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit"class="btn btn-primary waves-effect">Lưu</button>
                        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Đóng</button>
                    </div>
                </form>
            </div>
            
        </div>
        
    </div>
</div>
@endforeach
<script>
    $('#tinhthanh1').change(function(){
        var cit = $(this).val();
        if (cit) {
            $.ajax({
                type: "get",
                url: "{{url('/getQuanhuyen/')}}/"+cit,
                success:function(res) {
                    if (res) {
                        $("#quanhuyen1").empty();
                        $("#xaphuong1").empty();
                        $("#quanhuyen1").append('<option value="" selected>Chọn quận huyện</option>');
                        $.each(res, function(key, value) {
                            $("#quanhuyen1").append('<option value="'+key+'">'+value+'</option>')
                        });
                    }
                }
            });
            console.log(cit);
        }
    });

    $('#quanhuyen1').change(function(){
        var sid = $(this).val();
        if(sid){
        $.ajax({
           type:"get",
           url:"{{url('getXaphuong/')}}/"+sid,
           success:function(res)
           {       
                if(res)
                {
                    $("#xaphuong1").empty();
                    $("#xaphuong1").append('<option>Chọn phường xã</option>');
                    $.each(res,function(key,value){
                        $("#xaphuong1").append('<option value="'+key+'">'+value+'</option>');
                    });
                }
           }

        });
        // console.log(sid);
        }
    });
</script>