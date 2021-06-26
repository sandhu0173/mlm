<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\FormatDates;

class RepurchaseCommissionLimit extends Model
{
    use HasFactory,FormatDates;
    protected $table="repurchase_commission_limit";
    protected $guarded=[];
}
