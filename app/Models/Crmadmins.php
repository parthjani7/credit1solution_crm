<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
class Crmadmins extends Authenticatable
{

    protected $table = 'crm_admins';
    public $timestamps = true;


    protected $fillable = ['username', 'password', "email", "role", "status", "login_attemps"];

    public function scopeActive($query, $value = null)
    {
        return $query->whereStatus($value ?? 'active');
    }
}
