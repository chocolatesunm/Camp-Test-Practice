<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CampUserPrefix extends Model
{
    protected $table = 'camp_user_prefix';
    protected $fillable = ['name'];
    //สำหรับการสร้างตารางในฐานข้อมูล fillable เพื่อให้สามารถสร้างข้อมูลได้
    public $timestamps = false;

    public function users()
    {
        // คำนำหน้าแต่ละอัน (prefix) จะมีผู้ใช้งาน (users) หลายคนที่อ้างถึง prefix นี้ผ่าน user_prefix_id
        return $this->hasMany(CampUserRegister::class, 'user_prefix_id');
    }
    
}
