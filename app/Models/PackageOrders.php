<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\FormatDates;

class PackageOrders extends Model
{
    use HasFactory,FormatDates;
    protected $guarded=[];
    protected $table='package_orders';
    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
