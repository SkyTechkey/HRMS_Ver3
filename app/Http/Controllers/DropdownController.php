<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class DropdownController extends Controller
{
    
        public function index()
        {
            $cities = DB::table("devvn_tinhthanhpho")->pluck("name","matp");
            return view('admin.City.dropdownlistcity',compact('cities'));
        }

        public function getDistrictList(Request $request)
        {
            $districts = DB::table("devvn_quanhuyen")
            ->where("matp",$request->matp)
            ->pluck("name","maqh");
            return response()->json($districts);
        }

        public function getWardList(Request $request)
        {
            $wards = DB::table("devvn_xaphuongthitran")
            ->where("maqh",$request->maqh)
            ->pluck("name","xaid");
            return response()->json($wards);
        }
}