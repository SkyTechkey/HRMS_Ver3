<div class="body">
    <div class="table-responsive">
        <table class="table table-striped table-hover js-basic-example dataTable">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Mã CN</th>
                    <th>Tên Chi nhánh</th>
                    <th>Người đứng đầu</th>
                    <th>Chức vụ</th>
                    <th>Địa chỉ</th>
                    <th>Số điện thoại</th>
                    <th>Email</th>
                    <th>Trạng thái</th>
                    <th>Ghi chú</th>

                </tr>
            </thead>
            <tbody>
                @foreach($danhsach as  $key=>$value)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{$value->id}}</td>
                    <td>{{$value->Tenchinhanh}}</td>
                    <td>{{$value->Tennguoidungdau}}</td>
                    <td>{{$value->Chucvu}}</td>
                    <td>{{$value->Diachi}}</td>
                    <td>{{$value->Sodienthoai}}</td>
                    <td>{{$value->Email}}</td>
                    <td>{{$value->Sodienthoai}}</td>
                    <td>{{$value->Trangthai}}</td>
                    <td>{{$value->Ghichu}}</td>


                </tr>
                @endforeach


            </tbody>


        </table>

    </div>

</div>
