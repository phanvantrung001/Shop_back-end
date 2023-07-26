<?php

use Illuminate\Database\Seeder;
use App\Category;
class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $item = new Category();
        $item->name = 'abc';
        $item->mota = 'Mô tả danh mục dep trai';
        $item ->save();
    }
}
