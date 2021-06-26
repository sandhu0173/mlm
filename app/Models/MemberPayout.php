<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\FormatDates;
class MemberPayout extends Model
{
    use HasFactory,FormatDates;
    protected $guarded=[];
    protected $table='member_payouts';
}
