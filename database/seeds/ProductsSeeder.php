<?php

use Illuminate\Database\Seeder;
use App\product;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $item = new Product;
        $item->name = "Laptop LG Gram 2021";
        $item->slug = "laptop-lg-gram-2021";
        $item->price = 394900;
        $item->description = "Máy tính xách tay LG Gram 2021 16ZD90P-G.AX54A5 sở hữu màn hình với độ phân giải đỉnh cao.";

        $item->quantity = 0;
        $item->status = 11;
        $item->img = 'd.jpg';
        $item->category_id = 7;

        $item->created_at = "2021-09-25 23:19:08";
        $item->updated_at  = "2021-09-25 23:19:08";
        $item->save();
    }
}
