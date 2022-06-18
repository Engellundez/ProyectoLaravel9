<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CatalogoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('catalogos')->insert([
			'nombre' => 'Registro del empleado',
			'tipo_id' => 1,
		]);
        DB::table('catalogos')->insert([
			'nombre' => 'Actualización del empleado',
			'tipo_id' => 1,
		]);
        DB::table('catalogos')->insert([
			'nombre' => 'Baja del empleado',
			'tipo_id' => 1,
		]);
    }
}
