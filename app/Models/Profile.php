<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    public $timestamps = true;
    public $fillable = ['fname', 'mname', 'lname',
        'paddress', 'city', 'state', 'zip',
        'sameadd',
        'mpaddress', 'mcity', 'mstate', 'mzip',
        'hno', 'mno', 'ml', 'hau', 'in', 'btc'
    ];


    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function profile()
    {
        return $this->hasOne('App\Models\Laststep');
    }
}
