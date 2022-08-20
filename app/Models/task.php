<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class task extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable= ["title","description","assigned_by_id","assigned_to_id"];

    public function user(){
        return $this->hasOne(User::class,"id","assigned_to_id");
    }

    public function admin(){
        return $this->hasOne(Admin::class,"id","assigned_by_id");
    }
}
