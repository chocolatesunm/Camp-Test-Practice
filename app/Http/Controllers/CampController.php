<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CampUserPrefix;
use App\Models\CampUserRegister;

class CampController extends Controller
{
    public function index(){
        $data['users'] = [];
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
    public function delete(Request $req)
    {

    }
}
