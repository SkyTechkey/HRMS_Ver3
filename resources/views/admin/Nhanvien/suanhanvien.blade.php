
    <div class="modal fade" id="fix{{$item->id}}" role="dialog" tabindex="-1">
        <div class="modal-dialog" role="document">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 style='color:#00b0e4' class="modal-title">Sửa Thông tin nhân viên {{$item->Hovaten}}</h4>
                </div>
                <div  class="body">
                    <form action = "{{url('nhanvien/sua/'.$item->id)}}" id="form_validation" method="POST">
                        @csrf
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input  type="text" class="form-control" name="username" value ="{{$item->username}}"  required>
                            </div>
                            <div class="form-line">
                                <input  type="text" class="form-control" name="hovaten" value ="{{$item->Hovaten}}"  required>
                            </div>
                            <div class="form-line">
                                <input  type="text" class="form-control" name="ngaysinh" value ="{{$item->Ngaysinh}}"  required>
                            </div>
                            <div class="form-line">
                                <input  type="text" class="form-control" name="ngayvaolam" value ="{{$item->Ngayvaolam}}"  required>
                            </div>
                            @foreach($noilamviec as $value)
                                <button type="button" value="{{$value->id}}" onclick="alert('ID = {{$value->id}} và {{$value->Tenchinhanh}}')">{{$value->Tenchinhanh}}</button>
                            @endforeach
                                <div class="demo-single-button-dropdowns">
                                <div class="form-group">
                                    <select class="selective form-control" name="id_noilamviec">
                                        <option >Chọn nơi làm việc</option>
                                        @foreach($noilamviec as $value)
                                            <option value="{{$value->id}}">{{$value->Tenchinhanh}}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                            {{--                                                                <div class="form-line">--}}
                            {{--                                                                    <input  type="text" class="form-control" name="trangthai" value ="{{$item->Trangthai}}"  required>--}}
                            {{--                                                                </div>--}}
                            <div class="demo-radio-button">
                                <input value = "active" name="group1" type="radio" id="radio_1" checked />
                                <label name for="radio_1">Đang làm việc</label>
                                <input value = "close" name="group1" type="radio" id="radio_2" />
                                <label name for="radio_2">Tạm ngừng việc</label>
                            </div>
                        </div>
                        <button class="btn btn-primary waves-effect" type="submit">Chấp nhận</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script language="javascript">

    </script>

