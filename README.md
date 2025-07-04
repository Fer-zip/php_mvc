# 📁 Plantilla PHP - MVC

> **Leer antes de clonar el repositorio**

Esta es una plantilla base en PHP que implementa el patrón MVC (Modelo - Vista - Controlador), pensada para proyectos pequeños o educativos. Ideal para desarrolladores que desean una estructura clara y reutilizable.

El nombre del proyecto, debe coinicidir con la ruta establecida en el config.php y con el .htaccess:

RewriteBase /php_mvc/               <-aqui

---

## 📂 Estructura del Proyecto

```
php_mvc/
├─ app/                     
│   ├─ controllers/         → Controladores (lógica de negocio)
│   ├─ models/              → Modelos (acceso a datos)
│   └─ views/               → Vistas (plantillas HTML)
│
├─ config/                  
│   └─ config.php           → Variables globales, credenciales de BD, etc.
│
├─ core/                    
│   ├─ Controller.php       → Clase base para controladores
│   ├─ Database.php         → Conexión a la base de datos
│   ├─ Model.php            → Clase base para modelos
│   └─ Router.php           → Enrutador principal
│
├─ lib/                     → Librerías externas
│
├─ public/                  → Carpeta pública (accesible desde navegador)
│   ├─ css/
│   ├─ js/
│   └─ img/
│
├─ .htaccess                → Reescribe URLs hacia `public/index.php`
├─ README.md                → Este archivo
└─ index.php                → Controlador frontal
```

> 📝 **Nota:** Mover la carpeta del proyecto dentro de `htdocs/` si estás usando XAMPP o similar.

---

## 🛠️ Crear una nueva vista

1. Crea una **vista** en `app/views/` con el nombre deseado:
   ```
   app/views/dashboard.php
   ```

2. Crea su **controlador** en `app/controllers/`, con el mismo nombre más el sufijo `Controller`:
   ```
   app/controllers/DashboardController.php
   ```

3. Ejemplo básico del controlador:

   ```php
   <?php
   class DashboardController extends Controller {
       public function index() {
           $this->view('dashboard');
       }
   }
   ```

---

## 🔁 Redireccionamiento entre páginas

Para redirigir a otra vista, usa la constante `BASE_URL`:

```php
<a href="<?= BASE_URL ?>dashboard/">Ir al Dashboard</a>
```

Si el controlador tiene más de una función:

```php
<a href="<?= BASE_URL ?>dashboard/index/">Vista 1</a>
<a href="<?= BASE_URL ?>dashboard/otro/">Vista 2</a>
<a href="<?= BASE_URL ?>dashboard/otro1/">Vista 3</a>
```

---

## 🧩 Ejemplo de modelo

```php
<?php
class Carrito {
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    public function obtenerClientes() {
        // lógica de consulta a base de datos
    }
}
```

---

## 🔗 Integración del modelo en un controlador

```php
<?php
class HomeController extends Controller {
    public function index() {
        // Instancia el modelo
        $categoriaModel = $this->model('Carrito');

        // Llama a una función del modelo
        $carrito = $categoriaModel->obtenerClientes();

        // Pasa los datos a la vista
        $this->view('home', [
            'carrito' => $carrito
        ]);
    }
}
```

---
