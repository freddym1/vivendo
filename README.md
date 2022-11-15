### Requerimientos

PHP 8
Mysql
Composer
Laravel 9

### Cómo ejecutar el API

Clonar el repositorio

```
git clone https://github.com/freddym1/vivendo.git
cd vivendo
```

Instalar y configurar conexión a base de datos

```
composer install
.env
```

Ejecutar migraciones 

```
php artisan migrate
```

Crear datos de ejemplo (ejecutar una sola vez)

```
php artisan db:seed
```

Correr el servidor web

```
php artisan serve
```

### Rutas 

Reemplazar {id} por algunos de los valores registrados

Listar todos los proyectos

```
http://127.0.0.1:8000/api/proyectos
```

Ver proyectos por ciudad (id o nombre) 

```
http://127.0.0.1:8000/api/proyectos/ciudad/{id}
```

Ver proyecto por (id o nombre)

```
http://127.0.0.1:8000/api/proyectos/{id}
```

Ver proyectos por departamento (id o nombre) 

```
http://127.0.0.1:8000/api/proyectos/{id}
```

Enviar registro de interesado de prueba

```
http://127.0.0.1:8000/api/interesados/
Formato requerido:
{
    "nombre": "John doe",
    "correo": "John@google.com",
    "telefono": "300000000",
    "ciudad": "Bogotá",
    "pais": "Colombia",
    "proyecto_id": "1"
}
```

Ver interesados (accesible solo para usuarios registrados)

```
http://127.0.0.1:8000/interesados
```

### Filtros y acciones de Datatable interesados

Buscar
Exportar Excel
Filtrar por columnas
Filtrar cantidad de registros