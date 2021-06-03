<div class="body">
    <div class="table-responsive">
        <table class="table table-striped table-hover js-basic-example dataTable">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Mã PC</th>
                    <th>Loại Hồ Sơ</th>
                    <th>Số Tiền</th>
                    <th>Trạng thái</th>
                    <th>Ghi chú</th>

                </tr>
            </thead>
            <tbody>
                @foreach($danhsach as $key=>$value)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{$value->id}}</td>
                    <td>{{$value->Ten_phucap}}</td>
                    <td>{{$value->Sotien}}</td>
                    <td>{{$value->Trangthai}}</td>
                    <td>{{$value->Ghichu}}</td>


                </tr>
                @endforeach


            </tbody>


        </table>

    </div>

</div>
