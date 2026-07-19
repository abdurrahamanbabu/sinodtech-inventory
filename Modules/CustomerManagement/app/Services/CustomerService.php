<?php

namespace Modules\CustomerManagement\Services;

use Modules\CustomerManagement\Repositories\CustomerRepository;

class CustomerService
{
   protected $customerRepo;
   public function __construct(CustomerRepository $customerRepository)
   {
     $this->customerRepo = $customerRepository;
   }

   public function customers()
   {
        return $this->customerRepo->customers();
   }

   public function getAll()
   {
      return $this->customerRepo->getAll();
   }

   public function store(array $data)
   {
      return  $this->customerRepo->store($data);
   }

   public function show(int $id)
   {
    return $this->customerRepo->show($id);
   }

   public function update(int $id, array $data)
   {
      return $this->customerRepo->update($id, $data);
   }

   public function delete(int $id)
   {
        return $this->customerRepo->delete($id);
   }
}
