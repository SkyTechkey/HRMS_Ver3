<?php

use Illuminate\Database\Seeder;
use App\Models as Database;

class TinhThanhTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConsTraints();
        DB::table('tbl_tinh_thanh')->truncate();
        $tbl_tinh_thanh = [
            ['01',	'Thành phố Hà Nội',	'1'],
            ['02',	'Tỉnh Hà Giang',	'2'],
            ['04',	'Tỉnh Cao Bằng',	'2'],
            ['06',	'Tỉnh Bắc Kạn',	'2'],
            ['08',	'Tỉnh Tuyên Quang',	'2'],
            ['10',	'Tỉnh Lào Cai',	'2'],
            ['11',	'Tỉnh Điện Biên',	'2'],
            ['12',	'Tỉnh Lai Châu',	'2',],
            ['14',	'Tỉnh Sơn La',	'2'],
            ['15',	'Tỉnh Yên Bái',	'2'],
            ['17',	'Tỉnh Hoà Bình',	'2'],
            ['19',	'Tỉnh Thái Nguyên',	'2'],
            ['20',	'Tỉnh Lạng Sơn',	'2'],
            ['22',	'Tỉnh Quảng Ninh',	'2'],
            ['24',	'Tỉnh Bắc Giang',	'2'],
            ['25',	'Tỉnh Phú Thọ',	'2'],
            ['26',	'Tỉnh Vĩnh Phúc',	'2'],
            ['27',	'Tỉnh Bắc Ninh',	'2'],
            ['30',	'Tỉnh Hải Dương',	'2'],
            ['31',	'Thành phố Hải Phòng',	'1'],
            ['33',	'Tỉnh Hưng Yên',	'2'],
            ['34',	'Tỉnh Thái Bình',	'2'],
            ['35',	'Tỉnh Hà Nam',	'2'],
            ['36',	'Tỉnh Nam Định',	'2'],
            ['37',	'Tỉnh Ninh Bình',	'2'],
            ['38',	'Tỉnh Thanh Hóa',	'2'],
            ['40',	'Tỉnh Nghệ An',	'2'],
            ['42',	'Tỉnh Hà Tĩnh',	'2'],
            ['44',	'Tỉnh Quảng Bình',	'2'],
            ['45',	'Tỉnh Quảng Trị',	'2'],
            ['46',	'Tỉnh Thừa Thiên Huế',	'2'],
            ['48',	'Thành phố Đà Nẵng',	'1'],
            ['49',	'Tỉnh Quảng Nam',	'2'],
            ['51',	'Tỉnh Quảng Ngãi',	'2'],
            ['52',	'Tỉnh Bình Định',	'2'],
            ['54',	'Tỉnh Phú Yên',	'2'],
            ['56',	'Tỉnh Khánh Hòa',	'2'],
            ['58',	'Tỉnh Ninh Thuận',	'2'],
            ['60',	'Tỉnh Bình Thuận',	'2'],
            ['62',	'Tỉnh Kon Tum',	'2'],
            ['64',	'Tỉnh Gia Lai',	'2'],
            ['66',	'Tỉnh Đắk Lắk',	'2'],
            ['67',	'Tỉnh Đắk Nông',	'2'],
            ['68',	'Tỉnh Lâm Đồng',	'2'],
            ['70',	'Tỉnh Bình Phước',	'2'],
            ['72',	'Tỉnh Tây Ninh',	'2'],
            ['74',	'Tỉnh Bình Dương',	'2'],
            ['75',	'Tỉnh Đồng Nai',	'2'],
            ['77',	'Tỉnh Bà Rịa - Vũng Tàu',	'2'],
            ['79',	'Thành phố Hồ Chí Minh',	'1'],
            ['80',	'Tỉnh Long An',	'2'],
            ['82',	'Tỉnh Tiền Giang',	'2'],
            ['83',	'Tỉnh Bến Tre',	'2'],
            ['84',	'Tỉnh Trà Vinh',	'2'],
            ['86',	'Tỉnh Vĩnh Long',	'2'],
            ['87',	'Tỉnh Đồng Tháp',	'2'],
            ['89',	'Tỉnh An Giang',	'2'],
            ['91',	'Tỉnh Kiên Giang',	'2'],
            ['92',	'Thành phố Cần Thơ',	'1'],
            ['93',	'Tỉnh Hậu Giang',	'2'],
            ['94',	'Tỉnh Sóc Trăng',	'2'],
            ['95',	'Tỉnh Bạc Liêu',	'2'],
            ['96',	'Tỉnh Cà Mau',	'2']
        ];

        foreach($tbl_tinh_thanh as $tbl_tinh_thanh) {
            Database\TinhThanh::create([
                'id' => $tbl_tinh_thanh[0],
                'tentinhthanh' => $tbl_tinh_thanh[1],
                'id_loaitinhthanh' => $tbl_tinh_thanh[2]
            ]);
        }
        Schema::enableForeignKeyConstraints();
    }
}
