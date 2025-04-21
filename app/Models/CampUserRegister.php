<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CampUserRegister extends Model
{
    protected $table = 'camp_user_register';
    //สำหรับการสร้างตารางในฐานข้อมูล fillable เพื่อให้สามารถสร้างข้อมูลได้
    protected $fillable = ['user_prefix_id', 'user_fname', 'user_lname', 'user_birth_date', 'user_gender', 'user_bio'];
    public $timestamps = false;

    public function prefix()
    {
        return $this->belongsTo(CampUserPrefix::class, 'user_prefix_id');

}
}
