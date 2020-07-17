<?php

use Illuminate\Database\Seeder;
use App\Estudiante;

class EstudiantesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Estudiante::class)->times(200)->create();
    }
}
