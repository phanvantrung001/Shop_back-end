<?php
use App\Group;

use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Group::truncate();
        $names = [
            'Admin',
            'Giám đốc',
            'Quản Lý',
            'Nhân viên'
        ];
        foreach($names as $name){
            $item = new Group();
            $item->name = $name;
            $item ->save();
        }
       
    }
}
