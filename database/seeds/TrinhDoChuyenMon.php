<?php

use Illuminate\Database\Seeder;
use App\Models as Database;
class TrinhDoChuyenMon extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConsTraints();
        DB::table('tbl_loai_trinh_do_chuyen_mon')->truncate();
        $tbl_loai_trinh_do_chuyen_mon = [
            ['CNTT Phần cứng', 'Đã duyệt', 'Hoàn thành'],
            ['CNTT Phần mềm', 'Đã duyệt', 'Hoàn thành'],
            ['Hành chính Nhân sự', 'Đã duyệt', 'Hoàn thành'],
            ['Kế toán - Kiểm toán', 'Đã duyệt', 'Hoàn thành'],
            ['Điện / Điện tử / Điện lạnh', 'Đã duyệt', 'Hoàn thành'],
            ['Luật', 'Đã duyệt', 'Hoàn thành'],
            ['Marketing', 'Đã duyệt', 'Hoàn thành'],
            ['Ngoại ngữ', 'Đã duyệt', 'Hoàn thành'],
            ['Quản trị kinh doanh', 'Đã duyệt', 'Hoàn thành'],
            ['Kỹ sư xây dựng', 'Đã duyệt', 'Hoàn thành'],
            ['Khác', 'Đã duyệt', 'Hoàn thành'],
        ];
        foreach($tbl_loai_trinh_do_chuyen_mon as $tbl_loai_trinh_do_chuyen_mon) {
            Database\LoaiTrinhDoChuyenMon::create([
                'Ten_trinhdochuyenmon' => $tbl_loai_trinh_do_chuyen_mon[0],
                'Trangthai' => $tbl_loai_trinh_do_chuyen_mon[1],
                'Ghichu' => $tbl_loai_trinh_do_chuyen_mon[2]
            ]);
        }
        Schema::enableForeignKeyConstraints();
    }
}
