<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Lab404\Impersonate\Models\Impersonate;
use App\Traits\FormatDates;
use Session;

class User extends Authenticatable
{
    use HasFactory, Notifiable,Impersonate,FormatDates;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'mobile',
        'member_id',
        'tracking_id',
        'side',
        'address',
        'user_role',
        'passkey'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    function package()
    {
        //return $this->belongsTo(Package::class);
        return $this->hasOneThrough(Package::class,
                PackageOrders::class,
                                    'order_id',// Foreign key on the PackageOrders table...
                                    'id',// Foreign key on the Package table...
                                    'package_id',// Local key on the user table...
                                    'package_id', // Local key on the PackageOrders table...
                                    );
    }
    function product()
    {
        //return $this->belongsTo(Package::class);
        return $this->hasOneThrough(Product::class,
                ProductOrders::class,
                                    'order_id',// Foreign key on the PackageOrders table...
                                    'id',// Foreign key on the product table...
                                    'package_id',// Local key on the user table...
                                    'product_id', // Local key on the ProductOrders table...
                                    );
    }
    public function getFullnameAttribute()
    {
        return $this->name;
    }
    /**
     * Get the user that owns the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kyc()
    {
        return $this->belongsTo(Kyc::class, 'member_id', 'id');
    }
    public function getRegisterdateAttribute()
    {
        return date("d/m/Y",strtotime($this->created_at));
    }
    public function setImpersonating($id)
    {
        Session::put('impersonate', $id);
    }

    public function stopImpersonating()
    {
        Session::forget('impersonate');
    }

    public function isImpersonating()
    {
        return Session::has('impersonate');
    }
    public function isAdministrator()
    {
        return $this->user_role == '1';
        //return Session::has('impersonate');
    }
    
}
