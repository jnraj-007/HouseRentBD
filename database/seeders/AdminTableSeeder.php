<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'name'=>'admin',
        'email'=>'admin@gmail.com',
        'password'=>bcrypt('123456'),
            'contact'=>'0175555555',
            'address'=>'super admin needs no address',
            'role'=>'superAdmin',
            'status'=>'Active',
            'image'=>'userImage.jpg'

        ]);
    }
}
