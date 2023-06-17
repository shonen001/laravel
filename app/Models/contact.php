<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contact extends Model
{
    use HasFactory;

    protected $fillable = ['firstName','lastName','phone','email','address','idGroup'];

       //'first_name'=> 'required',
       //'last_name' => 'required',
       //'email'     => 'required|email',
       //'phone'     => 'required',
       //'address'   => 'required',
       //'idGroup'  => 'required|exists:grops,id'

    public function group() {
        return $this->belongsTo(group::class,'idGroup');
    }

    public function user(): BelongsTo {
        return $this->belongsTo(User::class, 'foreign_key', 'other_key');
    }

}
