<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\FormatDates;
class Package extends Model
{
    use HasFactory,FormatDates;
    protected $guarded = [];
    protected $table = 'packages';
    public function products()
    {
        return $this->belongsToMany(Product::class);

      
    }
}
