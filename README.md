### Requerimientos

- PHP 8
  - Extensión php_gd habilitada
- Mysql
- Composer

### Cómo ejecutar el API

Clonar el repositorio

```
git clone https://github.com/freddym1/vivendo.git
cd vivendo
```

Instalar dependencias

```
composer install
```

En la raíz del proyecto realizar una copia del archivo `.env.example` y renombrarlo a `.env` editarlo y configurar la conexión a la base de datos.

Generar key de la aplicación:

```
php artisan key:generate
```

Ejecutar migraciones 

```
php artisan migrate
```

Insertar datos de ejemplo (ejecutar una sola vez). Se insertan datos de ejemplo en todas las tablas exepto en las tablas interesados y usuarios.

```
php artisan db:seed
```

Para evitar error Vite manifest not found, instalar y ejecutar npm install && npm run dev.
```
npm install && npm run dev
```

Correr el servidor web

```
php artisan serve
```

### Rutas API

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

Dato de ejemplo:
{
    "nombre": "John doe",
    "correo": "John@google.com",
    "telefono": "300000000",
    "ciudad": "Bogotá",
    "pais": "Colombia",
    "proyecto_id": "1"
}
```

### Otras rutas

Ver interesados (requiere registrar nuevo usuario)

```
http://127.0.0.1:8000/interesados
```

### Filtros y acciones Datatable en ruta de interesados

- Buscar (permite buscar por términos de cualquier campo)
- Exportar Excel (exporta datos seleccionados en formato XLS)
- Filtrar por columnas (muestra u oculta filas del Datatable)
- Filtrar por cantidad de registros (filtra la cantidad de registros mostrados)