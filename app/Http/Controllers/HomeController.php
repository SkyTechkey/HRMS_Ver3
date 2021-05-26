<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Image;
use App\User;
use App\Roles;
use Spatie\Permission\Models\Role;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {

       // return view('admin.dashboard.index',array('user' => User::all()));

     //  $getData = DB::table('users')->select('*')->get();

       $user = User::all();
        $role = Role::all();
        return view('admin.dashboard.index',compact('user','role'));
    }
}
