<div class="body">
    <div class="table-responsive">
        <table class="table table-striped table-hover js-basic-example dataTable">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Mã Chức Vụ</th>
                    <th>Tên Chức Vụ</th>
                    <th>Ghi Chú</th>
                    <th>Trạng Thái</th>
                </tr>
            </thead>
            <tbody>
                @foreach($danhsach as $key=>$value)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{$value->id}}</td>
                    <td>{{$value->Ten_chucvu}}</td>
                    <td>{{$value->Ghichu}}</td>
                    <td>{{$value->Trangthai}}</td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
