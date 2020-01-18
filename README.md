# Bolsa de Trabajo

Sistema de Información para la Publicación de Convocatorias y Selección de Postulantes

## Características del Sistema

**Módulo Administración**
- [x] Roles
- [x] Usuarios
- [x] Empresas
- [x] Convocatorias

**Módulo Perfil**
- [x] Datos
- [x] Estudios
- [x] Capacitaciones
- [x] Experiencia Laboral

**Módulo Portafolio**
- [x] Convocatorias
- [x] Postulaciones
- [x] Documentos
- [x] Curriculum

## Requerimiento para Despliegue

- PHP >= 7.1.3 (Composer)
- MariaDB >= 10.1.40

``` bash
# Instalación de dependencias
composer install

# Migración de Base de Datos y Seeder
php artisan migrate --seed | php artisan migrate:refresh --seed

# Optimización de dependencias
composer dump-autoload

# Habilitación de un Directorio Público para los Archivos
php artisan storage:link

# Levantamiento del Servidor
php artisan serve

```
