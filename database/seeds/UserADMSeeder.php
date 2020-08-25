<?php

use Illuminate\Database\Seeder;

class UserADMSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuarios')->insert([
            'nome' => 'Rodrigo',
            'email' => 'rodrigo@hotmail.com',
            'password' => bcrypt('admin'),
            'papel' => 'Professor',
            'is_Admin' => 1,
        ]);
    }
}
