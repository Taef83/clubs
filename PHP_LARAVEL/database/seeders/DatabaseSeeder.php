<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'name'          => 'admin',
            'email'         => 'admin@admin.com',
            'role'          => 'superadmin',
            'password'      => Hash::make('password')
        ]);
      
    }
}
