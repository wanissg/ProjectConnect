<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile as pro;
use Illuminate\Support\Facades\Validator;
use Auth;
// use App\Models\Profiles as pro;

class ProfileController extends Controller
{
    public function create(Request $req){
        //Request $req คือรับข้อมูลจาก Form

        $profile = pro::where('user_id',Auth::user()->id)->first();

        
        if($profile){

            return redirect('profile');

        }else{

            $profile = New pro;
            $profile->first_name = $req->first_name;
            $profile->last_name = $req->last_name;
            $profile->nick_name = $req->nick_name;
            $profile->birthday = $req->birth_day;
            $profile->phone = $req->phone;
            $profile->user_id = Auth::user()->id;
            $profile->save();

            return redirect('profile');

        }

    

    }

    public function getProfile(){

        $profile = pro::where('user_id',Auth::user()->id)->first();
        return view('profile',['profile'=>$profile]);

    }

    public function updateProfile(Request $req){

        $update = pro::where('user_id',Auth::user()->id)
        ->update(['first_name'=>$req->first_name,
        'last_name'=>$req->last_name,
        'nick_name'=>$req->nick_name]);

        return redirect('profile');


    }


}
