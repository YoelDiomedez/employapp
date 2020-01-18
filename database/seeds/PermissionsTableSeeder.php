<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Usuarios
        Permission::create([
            'name'          => 'Navegación de Usuarios',
            'slug'          => 'users.index',
            'description'   => 'Lista todos los Usuarios del sistema',
        ]);
        
        Permission::create([
            'name'          => 'Edición de Usuarios',
            'slug'          => 'users.edit',
            'description'   => 'Editar cualquier dato de un Usuario del sistema',
        ]);

        Permission::create([
            'name'          => 'Eliminación de Usuario',
            'slug'          => 'users.destroy',
            'description'   => 'Eliminar cualquier Usuario del sistema',
        ]);

        // Roles
        Permission::create([
            'name'          => 'Navegación de Roles',
            'slug'          => 'roles.index',
            'description'   => 'Lista todos los Roles del sistema',
        ]);
        
        Permission::create([
            'name'          => 'Creación de un Rol',
            'slug'          => 'roles.create',
            'description'   => 'Crear un nuevo Rol del sistema',
        ]);

        Permission::create([
            'name'          => 'Edición de un Rol',
            'slug'          => 'roles.edit',
            'description'   => 'Editar cualquier dato de un Rol del sistema',
        ]);

        Permission::create([
            'name'          => 'Eliminación de un Rol',
            'slug'          => 'roles.destroy',
            'description'   => 'Eliminar cualquier Rol del sistema',
        ]);

        // Postulantes
        Permission::create([
            'name'          => 'Edición de un Postulante',
            'slug'          => 'applicants.edit',
            'description'   => 'Editar cualquier dato de un Postulante del sistema',
        ]);

        Permission::create([
            'name'          => 'Eliminación de archivos de un Postulante',
            'slug'          => 'applicants.destroy',
            'description'   => 'Eliminar cualquier archivo de un Postulante del sistema',
        ]);

        // Departamentos
        Permission::create([
            'name'          => 'Navegación de Departamentos',
            'slug'          => 'departments.index',
            'description'   => 'Lista todos los Departamentos del Perú',
        ]);

        Permission::create([
            'name'          => 'Ver las Provincias de un Departamento',
            'slug'          => 'departments.show',
            'description'   => 'Ver en detalle de cada Provincia de un Departamento',
        ]);

        // Provincias
        Permission::create([
            'name'          => 'Ver los Distritos de una Provincia',
            'slug'          => 'provinces.show',
            'description'   => 'Ver en detalle de cada Distrito de una Provincia',
        ]);

        // Paises
        Permission::create([
            'name'          => 'Navegación de Paises',
            'slug'          => 'countries.index',
            'description'   => 'Lista todos los Paises del Mundo',
        ]);

        // Grados o Titulo
        Permission::create([
            'name'          => 'Navegación de Grados o Titulo',
            'slug'          => 'degrees.index',
            'description'   => 'Lista todos los Grados o Titulo del Sistema',
        ]);

        // Estudios
        Permission::create([
            'name'          => 'Navegación de Estudios',
            'slug'          => 'education.index',
            'description'   => 'Lista todos los Estudios de un Postulante del sistema',
        ]);
        
        Permission::create([
            'name'          => 'Creación de un Estudio',
            'slug'          => 'education.create',
            'description'   => 'Crear un nuevo Estudio para un Postulante del sistema',
        ]);

        Permission::create([
            'name'          => 'Edición de un Estudio',
            'slug'          => 'education.edit',
            'description'   => 'Editar cualquier dato de Estudios de un Postulante del sistema',
        ]);

        Permission::create([
            'name'          => 'Eliminación de un Estudio',
            'slug'          => 'education.destroy',
            'description'   => 'Eliminar cualquier Estudio de un Postulante del sistema',
        ]);

        // Capacitación
        Permission::create([
            'name'          => 'Navegación de Capacitaciones',
            'slug'          => 'trainings.index',
            'description'   => 'Lista todos las Capacitaciones de un Postulante del sistema',
        ]);
        
        Permission::create([
            'name'          => 'Creación de una Capacitación',
            'slug'          => 'trainings.create',
            'description'   => 'Crear una nueva Capacitación para un Postulante del sistema',
        ]);

        Permission::create([
            'name'          => 'Edición de una Capacitación',
            'slug'          => 'trainings.edit',
            'description'   => 'Editar cualquier dato de Capacitaciones de un Postulante del sistema',
        ]);

        Permission::create([
            'name'          => 'Eliminación de una Capacitación',
            'slug'          => 'trainings.destroy',
            'description'   => 'Eliminar cualquier Capacitación de un Postulante del sistema',
        ]);

        // Experiencia
        Permission::create([
            'name'          => 'Navegación de Experiencias Laborales',
            'slug'          => 'experiences.index',
            'description'   => 'Lista todos las Experiencias Laborales de un Postulante del sistema',
        ]);
        
        Permission::create([
            'name'          => 'Creación de una Experiencia Laboral',
            'slug'          => 'experiences.create',
            'description'   => 'Crear una nueva Experiencias Laboral para un Postulante del sistema',
        ]);

        Permission::create([
            'name'          => 'Edición de una Experiencia Laboral',
            'slug'          => 'experiences.edit',
            'description'   => 'Editar cualquier dato de Experiencias Laborales de un Postulante del sistema',
        ]);

        Permission::create([
            'name'          => 'Eliminación de una Experiencia Laboral',
            'slug'          => 'experiences.destroy',
            'description'   => 'Eliminar cualquier Experiencia Laboral de un Postulante del sistema',
        ]);

        // Documentos
        Permission::create([
            'name'          => 'Edición de Documentos',
            'slug'          => 'documents.edit',
            'description'   => 'Editar Documentos de un Postulante del sistema',
        ]);

        Permission::create([
            'name'          => 'Eliminación de Documentos de un Postulante',
            'slug'          => 'documents.destroy',
            'description'   => 'Eliminar cualquier Documento de un Postulante del sistema',
        ]);

        // Convocatorias
        Permission::create([
            'name'          => 'Navegación de Convocatorias',
            'slug'          => 'announcements.index',
            'description'   => 'Lista todas las Convocatorias del sistema',
        ]);
        
        Permission::create([
            'name'          => 'Creación de una Convocatoria',
            'slug'          => 'announcements.create',
            'description'   => 'Crear una nueva Convocatoria del sistema',
        ]);

        Permission::create([
            'name'          => 'Edición de una Convocatoria',
            'slug'          => 'announcements.edit',
            'description'   => 'Editar cualquier dato de una Convocatoria del sistema',
        ]);

        Permission::create([
            'name'          => 'Eliminación de una Convocatoria',
            'slug'          => 'announcements.destroy',
            'description'   => 'Eliminar cualquier Convocatoria del sistema',
        ]);

        Permission::create([
            'name'        => 'Selección de Postulante(s)',
            'slug'        => 'announcements.select',
            'description' => 'Seleccionar Postulante(s) por Convocatoria',
        ]);
        
        Permission::create([
            'name'        => 'Postulación a una Convocatoria',
            'slug'        => 'announcements.apply',
            'description' => 'Postular a una Convocatoria',
        ]);

        // Historial
        Permission::create([
            'name'          => 'Navegación de CVs y Postulaciones',
            'slug'          => 'records.index',
            'description'   => 'Mustrar el CV e Historial de Postulaciones de un Usuario del Sistema',
        ]);

        Permission::create([
            'name'          => 'Consulta de CVs de Postulantes',
            'slug'          => 'records.show',
            'description'   => 'Mostrar el CV de un Postulante del Sistema',
        ]);

        // Empresas
        Permission::create([
            'name'          => 'Navegación de Entidad o Empresa',
            'slug'          => 'business.index',
            'description'   => 'Lista todas las Entidades o Empresas del sistema',
        ]);
        
        Permission::create([
            'name'          => 'Creación de una Entidad o Empresa',
            'slug'          => 'business.create',
            'description'   => 'Crear una nueva Entidad o Empresa para el sistema',
        ]);

        Permission::create([
            'name'          => 'Edición de una Entidad o Empresa',
            'slug'          => 'business.edit',
            'description'   => 'Editar cualquier dato de una Entidad o Empresadel del sistema',
        ]);

        Permission::create([
            'name'          => 'Eliminación de una Entidad o Empresa',
            'slug'          => 'business.destroy',
            'description'   => 'Eliminar cualquier Entidad o Empresa del sistema',
        ]);
    }
}
