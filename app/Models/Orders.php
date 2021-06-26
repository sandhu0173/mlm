<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\FormatDates;

class Orders extends Model
{
    use HasFactory,FormatDates;
    protected $guarded=[];
    function getInvoiceAttribute()
    {
        $m=date('m',strtotime($this->created_at));
        $y=date('y',strtotime($this->created_at));
        if($this->is_repurchase=='0')
        {
           $invoice="TL/NEW/".$m."/".$y."/".$this->id;
        }else{
            $invoice="TL/RP/".$m."/".$y."/".$this->id;
        }
        
        return $invoice;
    }
    
    /**
     * Get the bank that owns the Orders
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bank()
    {
        return $this->belongsTo(Banks::class, 'bank_name');
    }
    /**
     * Get the user that owns the Orders
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'member_id');
    }
    /**
     * Get the user that payment  mode the Orders
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function mode()
    {
        return $this->belongsTo(PaymentModes::class, 'payment_mode');
    }
    public function packages()
    {
        //return $this->belongsTo(PackageOrders::class, 'order_id');
        return $this->hasMany(PackageOrders::class,'order_id');
        
       
    }
    public function products()
    {
        return $this->hasMany(ProductOrders::class,'order_id');
    }
    function getStatusNameAttribute()
    {
        if($this->status=='1')
        {
            $status="<label class='badge badge-warning'>Pending</label>";
        }
        if($this->status=='2')
        {
            $status="<label class='badge badge-success'>Approved</label>";
        }
        else
        {
            $status="<label class='badge badge-danger'>Rejected</label>";
        }
        
        return $status;
    }
    



}
