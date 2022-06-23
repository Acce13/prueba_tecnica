<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PacienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pacientes')->insert([
            'tipo_documento_id' => 1,
            'genero_id' => 1,
            'departamento_id' => 1,
            'municipio_id' => 1,
            'numero_documento' => '0987654321',
            'primer_nombre' => 'Primer',
            'segundo_nombre' => 'Paciente',
            'primer_apellido' => 'De',
            'segundo_apellido' => 'Prueba',
            'created_at' => Carbon::now()->format('Y-m-d H:m:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:m:s')
        ]);
    }
}
