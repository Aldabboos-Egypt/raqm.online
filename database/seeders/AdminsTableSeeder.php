<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'name' => 'test',
            'email' => 'test@test.com',
            'password' => bcrypt(123456),
        ];

        $admin = Admin::where('email', 'test@test.com')->first();

        if(!$admin){
           $admin = Admin::create($data);
        }
        $admin->attachPermissions(Permission::all());
    }
}
