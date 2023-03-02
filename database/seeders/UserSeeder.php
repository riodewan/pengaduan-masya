<?php

  

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Schema;

   

class AdminUserSeeder extends Seeder

{

    /**

     * Run the database seeds.

     *

     * @return void

     */

    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Role::truncate();
        Schema::enableForeignKeyConstraints();

        User::create([
            'name' => 'Hardik',
            'email' => 'admin@gmail.com',
            'nik' => '1212121',
            'no_telp' => '08138210321',
            'role_id' => 1,
            'password' => bcrypt('123456'),
        ]);

    }
}