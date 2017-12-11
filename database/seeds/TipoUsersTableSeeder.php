<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipousers')->insert([
            'nombre' => 'Administrador'
        ]);
        DB::table('tipousers')->insert([
            'nombre' => 'Usuario'
        ]);
    }
}
