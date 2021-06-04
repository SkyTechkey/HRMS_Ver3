<?php

namespace App\Http\Controllers\DanhMuc;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{HoSoBangCap, LoaiBangCap, LoaiTrinhDoChuyenMon};
use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Excel;
use App\Imports\BangCapImport;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\TemplateProcessor;

class quanlyBangCapController extends Controller implements WithHeadings, FromCollection
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hosobangcap = HoSoBangCap::all();
        $loaibangcap = LoaiBangCap::all();
        $loaitrinhdochuyenmon = LoaiTrinhDoChuyenMon::all();
        $nguoidung = User::all();
        return view('Settings.DanhMuc.quanlyBangCap', \compact('hosobangcap', 'loaibangcap', 'loaitrinhdochuyenmon', 'nguoidung'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $phpWord = new PhpWord();
        $templateProcessor = new TemplateProcessor('HĐLĐ.docx');


        $section = $phpWord->addSection();

        
        $templateProcessor->setValues(
            [
                'Đà Nẵng' => 'John',
            ]
        );


        $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
        try {
            $objWriter->save(storage_path('HĐLĐ.docx'));
        } catch (Exception $e) {
        }


        return response()->download(storage_path('HĐLĐ.docx'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $hosobangcap = new HoSoBangCap();
        $hosobangcap->ID_Username = $request->username;
        $hosobangcap->ID_Loaibangcap = $request->bangcap;
        $hosobangcap->ID_Trinhdochuyenmon = $request->trinhdochuyenmon;
        $hosobangcap->Noitotnghiep = $request->noitotnghiep;
        $hosobangcap->Namtotnghiep = $request->namtotnghiep;
        $hosobangcap->Ghichu = $request->ghichu;
        $hosobangcap->Trangthai = $request->trangthai;
        $file = $request->file;
        if(!empty($file)){
            $hosobangcap->Dinhkem = $file->getClientOriginalName();
        }
        if($hosobangcap->save()){
            if(!empty($file)){
                $file->move('project_asset/file',$file->getClientOriginalName());
            }
            return back()->with('success', 'Tạo mới dữ liệu thành công!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $hosobangcap = HoSoBangCap::find($id);
        $hosobangcap->ID_Username = $request->username;
        $hosobangcap->ID_Loaibangcap = $request->bangcap;
        $hosobangcap->ID_Trinhdochuyenmon = $request->trinhdochuyenmon;
        $hosobangcap->Noitotnghiep = $request->noitotnghiep;
        $hosobangcap->Namtotnghiep = $request->namtotnghiep;
        $hosobangcap->Ghichu = $request->ghichu;
        $hosobangcap->Trangthai = $request->trangthai;
        $file = $request->file;
        if(!empty($file)){
            $hosobangcap->Dinhkem = $file->getClientOriginalName();
        }
        if($hosobangcap->save()){
            if(!empty($file)){
                $file->move('project_asset/file',$file->getClientOriginalName());
                return back()->with('success',__('Đã sửa dữ liệu thành công!'));
            }
            else
            {
                return back()->with('error',__('Lỗi không thể sửa dữ liệu!'));
            }
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = HoSoBangCap::find($id)->delete();
        return back();
    }

    public function collection()
    {
        // TODO: Implement collection() method.
        return (collect(HoSoBangCap::get([
            'ID_Username', 'ID_Loaibangcap', 'ID_Trinhdochuyenmon', 'Noitotnghiep', 'Namtotnghiep',
            'Ghichu', 'Dinhkem', 'Trangthai'
        ])));
    }

    public function headings(): array
    {
        // TODO: Implement headings() method.
        return [
            'Username',
            'Bang_cap',
            'Trinh_do_chuyen_mon',
            'Noi_tot_nghiep',
            'Nam_tot_nghiep',
            'Ghi_chu',
            'Dinh_kem',
            'Trang_thai'
        ];
    }

    public function export() {
        return Excel::download(new quanlyBangCapController(), 'bangcap.xlsx');
    }

    public function import() {
        if (!empty(request()->file('file')))
        {
            $extension_file = request()->file('file');
            if($extension_file->getClientOriginalExtension() == 'xlsx'){
                Excel::import(new BangCapImport,request()->file('file'));
                return back()->with('success',__('Đã thêm mới dữ liệu thành công!'));
            }
            else{
                return back()->with('error',__('Vui lòng chọn tệp excel'));
            }
        }
        else
        {
            return back()->with('error',__('Vui lòng chọn tệp'));
        }
    }
}
