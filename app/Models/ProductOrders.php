<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\FormatDates;

class ProductOrders extends Model
{
    use HasFactory,FormatDates;
    protected $guarded=[];
    protected $table='product_orders';
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
