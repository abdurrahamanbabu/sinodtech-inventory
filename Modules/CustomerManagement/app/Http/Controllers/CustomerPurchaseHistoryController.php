<?php

namespace Modules\CustomerManagement\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\CustomerManagement\Services\CustomerPurchaseFrequencyService;
use Modules\CustomerManagement\Services\CustomerService;
use Modules\SaleManagement\Services\SaleService;

class CustomerPurchaseHistoryController extends Controller
{
    protected $customerService, $saleService, $purchaseFrequency;
    public function __construct(CustomerService $customerService, SaleService $saleService, CustomerPurchaseFrequencyService $purchaseFrequency)
    {
        $this->customerService = $customerService;
        $this->saleService = $saleService;
        $this->purchaseFrequency = $purchaseFrequency;
    }
    public function purchaseRecord(int $customer_id, Request $request)
    {
            $customer = $this->customerService->show($customer_id);
            $sales = $this->saleService->customerPuchases($customer_id);
            $report = $this->purchaseFrequency->report($customer_id);

            return view('customermanagement::customers.purchase_histories',compact('sales','customer','report'));
    }
}
