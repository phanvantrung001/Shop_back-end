<?php

use App\Customer;
use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategoriesSeeder::class);
        $this->call(ProductsSeeder::class);
        $this->call(CustomersSeeder::class);
        $this->call(OrderSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(GroupSeeder::class);

    }
}
