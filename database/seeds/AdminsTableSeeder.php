<?php

use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*Admin::updateOrCreate(
        	['email' => 'admin@admin.com'],
        	[
	            'name' => 'Admin',
	            'email' => 'admin@admin.com',
	            'password' => Hash::make('123456'),
                'avatar' => '/admin_assets/user.jpg',
        	]
    	);*/
    }
}
