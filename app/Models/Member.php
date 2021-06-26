<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\FormatDates;
class Member extends Model
{
    use HasFactory,FormatDates;
    protected $table="users";
    function getCreatedAtAttribute()
    {
        return date("Y-m-d",strtotime($this->created_at));
    }
}
