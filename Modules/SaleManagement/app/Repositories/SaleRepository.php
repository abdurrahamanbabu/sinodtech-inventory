<?php

namespace Modules\SaleManagement\Repositories;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Modules\SaleManagement\Models\Sale;

class SaleRepository
{
    public  function store($data)
    {
        return Sale::create($data);
    }


    public function countSale()
    {
        return Sale::count();
    }

    public function saveSaleItems($data)
    {
       return DB::table('sale_items')->insert($data);
    }

    public function customerPuchases(int $customer_id, array $data = [])
    {
        if(!empty($data))
        {
           return [];
        }
        return Sale::where('customer_id', $customer_id)->paginate(20);
    }
}
