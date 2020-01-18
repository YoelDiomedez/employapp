<?php

use App\Career;

use Illuminate\Database\Seeder;

class CareersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Escuelas Profesionales de INGENIERÍAS
        Career::create(['name' => 'INGENIERÍA AGRONÓMICA']);
        Career::create(['name' => 'INGENIERÍA AGROINDUSTRIAL']);
        Career::create(['name' => 'INGENIERÍA TOPOGRÁFICA Y AGRIMENSURA']);
        Career::create(['name' => 'INGENIERÍA AGRICOLA']);
        Career::create(['name' => 'ARQUITECTURA Y URBANISMO']);
        Career::create(['name' => 'FÍSICO - MATEMÁTICA']);
        Career::create(['name' => 'INGENIERÍA CIVIL']);
        Career::create(['name' => 'INGENIERÍA ECONÓMICA']);
        Career::create(['name' => 'INGENIERÍA ESTADÍSTICA E INFORMÁTICA']);
        Career::create(['name' => 'INGENIERÍA GEOLÓGICA']);
        Career::create(['name' => 'INGENIERÍA METALÚRGICA']);
        Career::create(['name' => 'INGENIERÍA ELECTRÓNICA']);
        Career::create(['name' => 'INGENIERÍA MECÁNICA ELÉCTRICA']);
        Career::create(['name' => 'INGENIERÍA DE SISTEMAS']);
        Career::create(['name' => 'INGENIERÍA DE MINAS']);
        Career::create(['name' => 'INGENIERÍA QUÍMICA']);

        // Escuelas Profesionales de BIOMÉDICAS
        Career::create(['name' => 'CIENCIAS BIOLÓGICAS']);
        Career::create(['name' => 'NUTRICIÓN HUMANA']);
        Career::create(['name' => 'ODONTOLOGÍA']);
        Career::create(['name' => 'ENFERMERÍA']);
        Career::create(['name' => 'MEDICINA HUMANA']);
        Career::create(['name' => 'MEDICINA VETERINARIA Y ZOOTECNIA']);

        // Escuelas Profesionales de SOCIALES
        Career::create(['name' => 'ADMINISTRACIÓN']);
        Career::create(['name' => 'CONTABILIDAD']);
        Career::create(['name' => 'FÍSICA']);
        Career::create(['name' => 'INICIAL']);
        Career::create(['name' => 'PRIMARIA']);
        Career::create(['name' => 'SECUNDARIA']);
        Career::create(['name' => 'DERECHO']);
        Career::create(['name' => 'ANTROPOLOGÍA']);
        Career::create(['name' => 'ARTE']);
        Career::create(['name' => 'CIENCIAS DE LA COMUNICACIÓN SOCIAL']);
        Career::create(['name' => 'SOCIOLOGÍA']);
        Career::create(['name' => 'TURISMO']);
        Career::create(['name' => 'TRABAJO SOCIAL']);
    }
}
