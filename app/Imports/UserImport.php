<?php

namespace App\Imports;

use App\User;
use Maatwebsite\Excel\Concerns\ToModel;

class UserImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            'ID' => $row[0],
            'Họ và tên'=> $row[1],
            'Tên thường gọi' => $row[2],
            'Gới tính' => $row[3],
            'Ngày vào làm' => $row[4],
            'Số điện thoại' => $row[5],
            'Email' => $row[6],
            'Số CMND' => $row[7],
            'Ngày cấp CMND' => $row[8],
            'Nơi cấp CMND' => $row[19],
            'Ngày sinh' => $row[10],
            'Nơi sinh' => $row[11],
            'Phòng ban' => $row[12],
            'Chức vụ' => $row[13],
            'Nơi làm việc' => $row[14],
            'Địa chỉ thường trú' => $row[15],
            'Địa chỉ tạm trú' => $row[16],
            'Mã số thuê' => $row[17],
            'Số tài khoản' => $row[18],
            'Ngân hàng' => $row[29],
            'Ngày vào công đoàn' => $row[20],
            'Ngày vào đoàn' => $row[21],
            'Ngày vào đảng' => $row[22],
            'Quốc tịch' => $row[23],
            'Tôn giáo' => $row[24],
            'Dân tộc' => $row[25],
            'Người giới thiệu' => $row[26],
            'Tình trạng hôn nhân' => $row[27],
            'Hình thức nhân viên' => $row[28],
            'Hình ảnh' => $row[39],
            'Ghi chú' => $row[30],
            'Trạng thái' => $row[31],
            'Tên đăng nhập' => $row[32],
        ]);
    }
}
