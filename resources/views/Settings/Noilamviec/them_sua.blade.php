<!-- Thêm modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 style='color:#00b0e4' class="modal-title">Thêm mới Nhóm quyền</h4>
        </div>
        <div  class="body">
            <form action = "{{route('store.noilamviec')}}" id="form_validation" method="POST" >
            @csrf
                <div class="form-group form-float">
                    <div class="form-line">
                        <input  type="text" class="form-control" name="tendiachi" placeholder="Tên chi nhánh"  required>
                    </div>
                    <select class="selective form-control" name="id_diachi" id="tinhthanh" aria-label=".form-select-sm">
                    <option value="" selected>Chọn tỉnh thành</option>
                    @foreach ($diadanh as $item)
                        <option value="{{$item->id}}">{{$item->tinhthanh->tentinhthanh}}</option>
                    @endforeach
                    </select>
                </div>
                <button class="btn btn-primary waves-effect" type="submit" >Lưu</button>
            </form>
        </div>
    </div>
    </div>
</div>

<!-- Sửa modal -->
<div class="modal fade" id="#fix{{$item->id}}" role="dialog">
    <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 style='color:#00b0e4' class="modal-title">Sửa vai trò </h4>
        </div>
        <div  class="body">
            <form action = "" id="form_validation" method="POST">
            @csrf
                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="text" class="form-control" name="tenchinhanh" item ="" value="{{$item->tinhthanh->tentinhthanh}}" required>
                    </div>
                </div>
                <!-- Default radio -->
                <button class="btn btn-primary waves-effect" type="submit">Đồng ý</button>
            </form>
        </div>
    </div>

    </div>
</div>