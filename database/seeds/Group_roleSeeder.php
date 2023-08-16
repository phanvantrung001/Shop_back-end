<?php
use App\Group_role;
use Illuminate\Database\Seeder;

class Group_roleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Group_role::truncate();
        for($i = 106; $i <= 161; $i++){
            $item = new Group_role();
            $item->role_id= $i;
            $item->group_id = 5;
            $item->save();
        }
    }
}
