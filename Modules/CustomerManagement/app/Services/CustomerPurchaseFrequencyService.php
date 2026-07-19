<?php

namespace Modules\CustomerManagement\Services;

use Carbon\Carbon;
use Modules\CustomerManagement\Models\Customer;

class CustomerPurchaseFrequencyService
{
    public function report(int $customerId)
    {
        $customer = Customer::withCount('sales')
            ->withSum('sales', 'total_amount')
            ->with([
                'sales' => fn ($query) => $query->latest(),
            ])
            ->findOrFail($customerId);

        $totalOrders = $customer->sales_count;
        $firstPurchase = $customer->sales->last()?->created_at;
        $lastPurchase = $customer->sales->first()?->created_at;

        $months = $firstPurchase ? max(1, Carbon::parse($firstPurchase)->diffInMonths(now())) : 1;

        $frequency = round($totalOrders / $months, 2);

        return [
            'customer_id' => $customer->id,
            'customer_name' => $customer->name,
            'phone' => $customer->phone,
            'total_orders' => $totalOrders,
            'total_purchase_amount' => $customer->sales_sum_total_amount ?? 0,
            'first_purchase' => $firstPurchase,
            'last_purchase' => $lastPurchase,
            'purchase_frequency' => $frequency.' orders/month',
            'customer_type' => $this->customerType($frequency),
        ];
    }

    private function customerType($frequency)
    {

        if ($frequency >= 5) {
            return 'Regular Customer';
        }
        if ($frequency >= 2) {
            return 'Occasional Customer';
        }

        return 'New / Low Activity';

    }
}
