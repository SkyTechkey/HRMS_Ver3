<div class="body">
    <div class="table-responsive">
        <table class="table table-striped table-hover js-basic-example dataTable">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Mã HS</th>
                    <th>Mã Nhân Viên</th>
                    <th>Tên Nhân Viên</th>
                    <th>Mã Hồ Sơ</th>
                    <th>Tên Loại Hồ Sơ</th>
                    <th>File Đính Kèm</th>
                    <th>Trạng Thái</th>
                    <th>Ghi chú</th>


                </tr>
            </thead>
            <tbody>
                @foreach($danhsach as $key=>$value)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{$value->id}}</td>
                    <td>{{$value->ID_username}}</td>
                    <td>{{$value->nhanvien->Hovaten}}</td>
                    <td>{{$value->ID_loaihoso}}</td>
                    <td>{{$value->loaihoso->Ten_loaihoso}}</td>
                    <td>{{$value->Dinhkem}}</td>
                    <td>{{$value->Trangthai}}</td>
                    <td>{{$value->Ghichu}}</td>

                </tr>
                @endforeach


            </tbody>


        </table>

    </div>

</div>
