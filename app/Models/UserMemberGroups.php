<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\FormatDates;

class UserMemberGroups extends Model
{
    use HasFactory,FormatDates;
    protected $table="user_member_groups";
    protected $guarded=[];
}
