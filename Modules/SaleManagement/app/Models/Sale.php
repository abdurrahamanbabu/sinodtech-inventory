<?php

namespace Modules\SaleManagement\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\CustomerManagement\Models\Customer;
// use Modules\SaleManagement\Database\Factories\SaleFactory;

class Sale extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $guarded = [];

    public function customer()
    {
        return $this->belongsTo(Customer::class,'customer_id');
    }

     public function items()
    {
        return $this->hasMany(SaleItem::class,'sale_id');
    }

}
