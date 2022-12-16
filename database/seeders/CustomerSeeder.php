<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customer = new Customer();
        $customer->address = "Jl. Mawar 135";
        $customer->save();

        $customer = new Customer();
        $customer->address = "Jl. Eureka 35";
        $customer->save();
    }
}
