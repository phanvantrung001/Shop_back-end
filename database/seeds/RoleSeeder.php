<?php
use App\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
{
        // Role::truncate();
    $tables = ['users', 'categories', 'products', 'customers', 'orders', 'orderdetails', 'groups'];
    $actions = ['viewAny', 'view', 'create', 'update', 'delete', 'restore', 'forceDelete', 'viewTrash'];
    
    foreach ($tables as $table) {
        foreach ($actions as $action) {
            $item = new Role();
            $item->name = $table . '_' . $action;
            $item->group_name = $table;
            $item->save();
        }
    }
}


    }

