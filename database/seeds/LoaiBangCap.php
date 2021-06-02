<?php

use Illuminate\Database\Seeder;
use App\Models as Database;

class LoaiBangCap extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConsTraints();
        DB::table('tbl_loai_bang_cap')->truncate();
        $tbl_loai_bang_cap = [
            ['Khác', 'Đã duyệt', 'Hoàn thành'],
            ['THCS', 'Đã duyệt', 'Hoàn thành'],
            ['THPT', 'Đã duyệt', 'Hoàn thành'],
            ['Trung Cấp', 'Đã duyệt', 'Hoàn thành'],
            ['Cao Đẳng', 'Đã duyệt', 'Hoàn thành'],
            ['Đại Học', 'Đã duyệt', 'Hoàn thành'],
            ['Thạc Sĩ', 'Đã duyệt', 'Hoàn thành'],
            ['Tiến Sĩ', 'Đã duyệt', 'Hoàn thành'],
        ];
        foreach($tbl_loai_bang_cap as $tbl_loai_bang_cap) {
            Database\LoaiBangCap::create([
                'Ten_bangcap' => $tbl_loai_bang_cap[0],
                'Trangthai' => $tbl_loai_bang_cap[1],
                'Ghichu' => $tbl_loai_bang_cap[2]
            ]);
        }
        Schema::enableForeignKeyConstraints();
    }
}
