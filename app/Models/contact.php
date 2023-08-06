<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contact extends Model
{
    use HasFactory;
    protected $fillable = ['firstName', 'lastName', 'phone', 'email', 'address', 'idGroup'];


    public function group()
    {
        return $this->belongsTo(group::class, 'idGroup' , 'id');
    }



    public function user()
    {
        return $this->belongsTo(User::class,'foreign_key', 'other_key');
    }

    public function scopeOrderrBy($query)
    {
       return $query->orderBy('firstName');
    }

    public function scopeFilters($query)
    {
        if ($IdGroup = request('groupID')) {
            $query->where('idGroup', $IdGroup);
        }
        if ($search = request('search')) {
            $query->where('firstName', 'LIKE', "%{$search}%");
            $query->orwhere('firstName', 'LIKE', "%{$search}%");
            $query->orwhere('firstName', 'LIKE', "%{$search}%");
        }

       return $query;
    }

    // public function getRouteKeyName()
    // {
    //     return 'id';
    // }


}
