<?php

namespace Modules\CustomerManagement\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\CustomerManagement\Models\Customer;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Customer::factory()->count(15)->create();
    }
}
