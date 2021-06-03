<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use App\Models\QuanLyDanToc;
use App\Models\QuanLyQuocTich;
use App\Models\QuanLyQuanHuyen;
use App\Models\QuanLyTinhThanhPho;
use App\Models\QuanLyXaPhuong;
use App\Models\QuanLyChiNhanh;
class User extends Authenticatable
{
    use Notifiable,HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','username','phone','role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function tinhthuongtru() {
        return $this->belongsTo('App\Models\QuanLyTinhThanhPho', 'ID_Tinhthuongtru', 'id');
    }
    public function tinhtamtru() {
        return $this->belongsTo('App\Models\QuanLyTinhThanhPho', 'ID_Tinhtamtru', 'id');
    }
    public function quanthuongtru() {
        return $this->belongsTo('App\Models\QuanLyQuanHuyen', 'ID_Quanthuongtru', 'id');
    }
    public function quantamtru() {
        return $this->belongsTo('App\Models\QuanLyQuanHuyen', 'ID_Quantamtru', 'id');
    }
    public function xathuongtru() {
        return $this->belongsTo('App\Models\QuanLyXaPhuong', 'ID_Xathuongtru', 'id');
    }
    public function xatamtru() {
        return $this->belongsTo('App\Models\QuanLyXaPhuong', 'ID_Xatamtru', 'id');
    }
    public function dantoc() {
        return $this->belongsTo('App\Models\QuanLyDanToc', 'ID_Dantoc', 'id');
    }
    public function quoctich() {
        return $this->belongsTo('App\Models\QuanLyQuocTich', 'ID_Quoctich', 'id');
    }
    public function chinhanh()
    {
       return $this->belongsTo('App\Models\QuanlyChinhanh','ID_Chinhanh','id');
    }
    public function phongban()
    {
       return $this->belongsTo('App\Models\QuanLyPhongBan','ID_Phongban','id');
    }
    public function chucvu()
    {
       return $this->belongsTo('App\Models\ChucVu','ID_Chucvu','id');
    }
}
