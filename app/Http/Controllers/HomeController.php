<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Profile as pro; 
// use App\Model\Profile; 

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;
        //กำหนดให้ $id มีค่าเท่ากับ id ของ user ที่ Login ปัจจุบัน

        $profile = pro::where('user_id',$id)->first();
         //กำหนดให้ $profile มีค่าเท่ากับ ข้อมูล profile ที่มี user_id = $id

        //ตรวจว่ามี Profile ดังกล่าวหรือไม่

        if($profile){
            //มี


            return redirect('profile');

        }else{
            //ไม่มี

            return view('form_profile');

            // dd('1');

        }


        // ไปเช็คว่า มี profiles ไหนที่มี user_id = $id

       




        
    }
}

