<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
class CrmAdmin extends Authenticatable
{
    protected $guarded = [];

    public function scopeActive($query, $value = null)
    {
        return $query->whereStatus($value ?? 'active');
    }
}
