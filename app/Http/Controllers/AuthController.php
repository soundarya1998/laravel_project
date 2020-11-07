<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\login;

class AuthController extends Controller
{
    public function login(){
        return view('/login');
    }

    public function loginsubmit(Request $request){
        $unm = $request->get('username');
        $pwd = $request->get('password');

        $records = login::select('*')->where('username','=',$unm)
                                     ->where('password','=',$pwd);

        $cnt = $records->count();
            if($cnt > 0)
                {
                    foreach($records as $row)
                        {
                            session(['adminid'=>$row->id]);
                            session()->put('admin_id',$row['id'] );
                        }
                            echo "<script>alert('Login Success')</script>";
                            return view('Admin.index');
                }
                        echo "<script>alert('Authorization Failed!')</script>";
                        return view('/login');
    }

    function logoutsubmit()
    {
      if(session(['adminid'=> NULL])){
          session()->forget('adminid');
      }
      return view('/login');
    }
}
