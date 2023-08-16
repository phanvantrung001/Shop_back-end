<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User::truncate();
        $item = new User();
        $item->name = 'trung';
        $item->email = 'phanvantrung190402@gmail.com';
        $item->password = bcrypt('123456');
        $item ->save();
    }
}
