<?php

namespace Modules\CustomerManagement\Repositories;

use Carbon\Carbon;
use Modules\CustomerManagement\Models\Customer;

class CustomerRepository
{
    public function customers()
    {
        return Customer::get();
    }

    public function getAll($pageinate = 10)
    {
        return Customer::latest()->paginate($pageinate);
    }
    public function store(array $data)
    {
        return Customer::create($data);
    }

    public function show(int $id)
    {
        return Customer::findOrFail($id);
    }

    public function update(int $id, array $data)
    {
       $existingCustomer = $this->show($id);
       if($existingCustomer){
          return $existingCustomer->update($data);
       }
       return false;
    }

    public function delete(int $id)
    {
        return Customer::where('id',$id)->delete();
    }

    public function showInactiveCustomers()
    {
        return Customer::withMax('sales', 'created_at')
                 ->whereHas('sales')
                 ->whereDoesntHave('sales', function ($query) {
                    $query->where('created_at', '>=', Carbon::now()->subDays(config('app.inactive_day')));
                 })->get();
    }

    public function getAllByIds(array $ids)
    {
        return Customer::whereIn('id',$ids)->get();
    }
}
