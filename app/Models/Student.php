<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    public function courses()
    {
        return $this->belongsTo('App\Models\Course');
    }
    public function campus()
    {
        return $this->belongsTo('App\Models\Campus');
    }

}