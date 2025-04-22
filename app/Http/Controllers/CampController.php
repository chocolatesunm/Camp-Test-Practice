<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CampUserPrefix;
use App\Models\CampUserRegister;

class CampController extends Controller
{
    public function index(){
        $data['users'] = CampUserRegister::all();
        return view('index',$data);
    }

    public function add(){
        $prefixes = CampUserPrefix::all();
        return view('add',compact('prefixes'));
    }
    public function insert(Request $req){
    $user = new CampUserRegister();
    $user->user_prefix_id = $req->prefix;
    $user->user_fname = $req->firstname;
    $user->user_lname = $req->lastname; 
    $user->user_birth_date = $req->birthday;
    $user->user_gender = $req->gender;
    $user->user_bio = $req->bio;
    $user->save();
    return redirect('/')->with('success', 'User added successfully');
}
    public function delete($id)
    {
        $user = CampUserRegister::find($id);
        if ($user) {
            $user->delete();
            return redirect('/')->with('success', 'User deleted successfully');
        } else {
            return redirect('/')->with('error', 'User not found');
        }
    }
    public function edit($id)
{
    $user = CampUserRegister::find($id);
    if ($user) {
        return view('edit', ['user' => $user]);
    } else {
        return redirect('/')->with('error', 'ไม่พบผู้ใช้');
    }
}

    public function update(Request $req,$id){
        $user = CampUserRegister::find($id);
        if($user){
            $user->update([
                'user_fname' => $req->user_fname,
                'user_laname' => $req->user_lname,
            ]);
            return view('edit',['user'=>$user]);
        }else{
            return redirect('/')->with('error','user not found');
        }
    }
}
