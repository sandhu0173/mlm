<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\FormatDates;

class PackageProducts extends Model
{
    use HasFactory,FormatDates;
    protected $guarded = [];
    protected $table = 'package_product';
}
