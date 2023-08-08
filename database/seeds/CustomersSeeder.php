<?php

use App\Customer;
use Illuminate\Database\Seeder;

class CustomersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $item = new Customer();
        $item->name = 'abc';
        $item->address = 'Vinh Linh';
        $item->email = 'PhanVanTrung190204@gmail.com';
        $item->password = bcrypt('12345678');
        $item->phone = '0987654321';
        $item ->save();
    }
}
