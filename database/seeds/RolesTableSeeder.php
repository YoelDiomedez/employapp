<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create([
            'name'        => 'ADMINISTRADOR',
            'slug'        => 'admin.system',
            'description' => 'ACCESO TOTAL Y PARCIAL AL MÓDULO ADMINISTRACIÓN CONFORMADO POR: ROLES, USUARIOS Y EMPRESAS'
        ]);

        $admin->permissions()->sync([1, 2, 3, 4, 5, 6, 7, 37, 38, 40]);

        $applicant = Role::create([
            'name'        => 'POSTULANTE',
            'slug'        => 'applicant.user',
            'description' => 'ACCESO TOTAL Y PARCIAL A LOS MÓDULOS PERFIL Y CARPETA LOS CUALES ESTA CONFORMADO POR: DATOS, ESTUDIOS, CAPACITACIONES, EXPERIENCIA LABORAL, CONVOCATORIAS, POSTULACIONES, DOCUMENTOS Y CURRICULUM'
        ]);

        $applicant->permissions()->sync([
                                         8,  9, 
        10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 
        20, 21, 22, 23, 24, 25, 26, 27, 28, 29,
                        34, 35
        ]);

        $business = Role::create([
            'name'        => 'EMPRESA',
            'slug'        => 'business.user',
            'description' => 'ACCESO TOTAL Y PARCIAL AL MÓDULO ADMINISTRACIÓN CONFORMADO POR: CONVOCATORIAS Y EMPRESA'
        ]);

        $business->permissions()->sync([29, 30, 31, 32, 33, 36, 39]);
        
    }
}
