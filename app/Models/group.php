<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class group extends Model {
    use HasFactory;

public function contact() {
    return $this->hasMany(contacts::class,'id');
    //'id_Company'
}
}
