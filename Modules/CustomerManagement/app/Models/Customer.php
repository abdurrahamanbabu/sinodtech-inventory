<?php

namespace Modules\CustomerManagement\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\SaleManagement\Models\Sale;
 use Modules\CustomerManagement\Database\Factories\CustomerFactory;

class Customer extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $guarded = [];

    public function sales()
    {
        return $this->hasMany(Sale::class,'customer_id');
    }

     protected static function newFactory()
    {
        return CustomerFactory::new();
    }
}
