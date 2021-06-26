<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\FormatDates;
class Kyc extends Model
{
    use HasFactory,FormatDates;

    protected $table="member_kyc";
    protected $guarded=[];
}
