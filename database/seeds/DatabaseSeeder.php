<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('users')->insert([
	             'name'  => 'administrador',
	             'email' =>'admin@admin.com',
				 'rol'  => '1',
	             'password' =>bcrypt('1234'),
	         ]);

		DB::table('roles')->insert(['id' =>1, 'name' => 'Administrador']);
		DB::table('roles')->insert(['id' =>2, 'name' => 'Usuario']);
    }
}
