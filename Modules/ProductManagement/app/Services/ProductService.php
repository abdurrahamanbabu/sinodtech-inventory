<?php

namespace Modules\ProductManagement\Services;

use Modules\ProductManagement\Repositories\ProductRepository;

class ProductService
{
    private $productRepo;

    public function __construct(ProductRepository $productRepo)
    {
        $this->productRepo = $productRepo;
    }
    public function store(array $product) {
        return $this->productRepo->store($product);
    }

    public function getAllProducts($limit = 10) {
        return $this->productRepo->getAllProducts($limit);
    }

    public function show(int $id) {
        return $this->productRepo->show($id);
    }

    public function lockById(int $id) {
        return $this->productRepo->lockById($id);
    }

    public function update(int $id, array $data) {
        return $this->productRepo->update($id, $data);
    }

    public function delete(int $product_id) {
        return $this->productRepo->delete($product_id);
    }
}
