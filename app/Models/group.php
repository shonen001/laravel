<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class group extends Model
{
    use HasFactory;

    protected $table = "grops";

    public function contact()
    {
        return $this->hasMany(contact::class,'id');
        //'id_Company'
    }


    public function scopeDropBox($query,$string)
    {
        return $query->orderBy('Group')->pluck('Group', 'id')->prepend($string, '');
    }
}
