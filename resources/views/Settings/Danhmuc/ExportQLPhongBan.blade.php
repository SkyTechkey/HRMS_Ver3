<div class="body">
    <div class="table-responsive">
        <table class="table table-striped table-hover js-basic-example dataTable">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Mã PB</th>
                    <th>Tên Phòng Ban</th>
                    <th>Tên Chi Nhánh</th>
                    <th>Trạng thái</th>
                    <th>Ghi chú</th>

                </tr>
            </thead>
            <tbody>
                @foreach($danhsach as $key=>$value)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{$value->id}}</td>
                    <td>{{$value->Ten_phongban}}</td>
                    <td>{{$value->Chinhanh}}</td>
                    <td>{{$value->Trangthai}}</td>
                    <td>{{$value->Ghichu}}</td>


                </tr>
                @endforeach


            </tbody>


        </table>

    </div>

</div>
