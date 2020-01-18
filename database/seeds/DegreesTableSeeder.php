<?php

use App\Degree;

use Illuminate\Database\Seeder;

class DegreesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Degree::create(['description' => 'DOCTORADO']);
        Degree::create(['description' => 'MAESTRIA']);
        Degree::create(['description' => 'POSTGRADO O DIPLOMADO']);
        Degree::create(['description' => 'TITULO PROFESIONAL']);
        Degree::create(['description' => 'BACHILLERATO']);
        Degree::create(['description' => 'ESTUDIOS TECNICOS']);
        Degree::create(['description' => 'ESTUDIOS UNIVERSITARIOS']);
        Degree::create(['description' => 'COLEGIATURA']);
        Degree::create(['description' => 'HABILITACION']);
        Degree::create(['description' => 'OTRO']);
    }
}
