<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\FormatDates;

class UserMembers extends Model
{
    use HasFactory,FormatDates;
    protected $table="user_members";
    protected $guarded=[];
}
