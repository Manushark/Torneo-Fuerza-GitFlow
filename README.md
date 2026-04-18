# 🌹 Barbie World — Sistema de Registro de Personajes

> Proyecto escolar desarrollado en PHP puro con orientación a objetos, persistencia en archivos `.dat` y un panel de estadísticas interactivo.

---

## 📋 Descripción

**Barbie World** es una aplicación web que permite registrar, visualizar y gestionar personajes con sus respectivas habilidades/profesiones. Cada personaje almacena información personal como nombre, apellido, fecha de nacimiento y foto, además de un listado dinámico de profesiones con nivel de experiencia y sueldo.

El sistema calcula automáticamente la **edad** y el **signo zodiacal** de cada personaje a partir de su fecha de nacimiento.

---

## ✨ Funcionalidades

- ✅ Registro y edición de personajes
- ✅ Gestión dinámica de profesiones (agregar / eliminar)
- ✅ Cálculo automático de edad y signo zodiacal
- ✅ Listado general de personajes con foto, edad y profesiones
- ✅ Panel de estadísticas con:
  - Conteo total de personajes
  - Distribución por signos zodiacales
  - Gráfico de barras de profesiones por personaje (Chart.js)
- ✅ Persistencia de datos en archivos `.dat` (sin base de datos)
- ✅ Plantilla visual reutilizable con diseño temático "Barbie"

---

## 🗂️ Estructura del Proyecto

```
Tarea 2/
│
├── index.php             # Página principal — listado de personajes
├── registers.php         # Formulario de registro y edición
├── guardar.php           # Lógica de guardado de datos
├── panel.php             # Panel de estadísticas y gráficos
│
├── Library/
│   ├── engine.php        # Punto de entrada — require de todas las librerías
│   ├── class.php         # Clases: personaje y habilidades
│   ├── components.php    # Funciones auxiliares (inputs, guardar, cargar, listar)
│   └── plantilla.php     # Clase plantilla — genera el HTML base (cabecera/pie)
│
└── datos/
    ├── 000.dat           # Personaje: Lito Rivas
    ├── 001.dat           # Personaje: Barbie Mejia
    ├── 002.dat           # Personaje: Ali Rivas
    └── 003.dat           # Personaje: Mandy Rivas Mejia
```

---

## 🧱 Arquitectura y Conceptos Aplicados

### Clases PHP

| Clase | Descripción |
|---|---|
| `personaje` | Entidad principal. Tiene métodos `edad()` y `signo_zodiacal()` que calculan valores desde `fecha_nacimiento`. |
| `habilidades` | Clase auxiliar con nombre, tipo y nivel de habilidad. |
| `plantilla` | Implementa el **patrón Singleton** para generar el HTML de la página (cabecera y pie) usando `__construct` y `__destruct`. |

### Persistencia sin base de datos

Los personajes se serializan con `serialize()` y se guardan en archivos `.dat` dentro de la carpeta `datos/`. Para leerlos se usa `unserialize()`.

```php
// Guardar
file_put_contents("datos/{$codigo}.dat", serialize($datos));

// Cargar
$datos = unserialize(file_get_contents("datos/{$codigo}.dat"));
```

### Formulario dinámico de habilidades

Las profesiones se agregan y eliminan dinámicamente con **JavaScript puro** (sin frameworks). Los datos se envían como arrays con nombres `habilidades[nombre][]`, `habilidades[tipo][]` y `habilidades[nivel][]`.

---

## 🚀 Cómo Ejecutar

### Requisitos

- PHP 7.4 o superior
- Servidor web local (XAMPP, WAMP, Laragon, PHP built-in server)

### Con el servidor integrado de PHP

```bash
# Navegar a la carpeta del proyecto
cd "Tarea 2"

# Iniciar el servidor
php -S localhost:8000

# Abrir en el navegador
http://localhost:8000/index.php
```

### Con XAMPP / WAMP

1. Copiar la carpeta `Tarea 2/` dentro de `htdocs/` (XAMPP) o `www/` (WAMP).
2. Iniciar Apache desde el panel de control.
3. Abrir `http://localhost/Tarea 2/index.php` en el navegador.

> ⚠️ La carpeta `datos/` se crea automáticamente al guardar el primer personaje.

---

## 📸 Vistas

| Ruta | Descripción |
|---|---|
| `/index.php` | Listado de todos los personajes registrados |
| `/registers.php` | Formulario para crear un nuevo personaje |
| `/registers.php?codigo=000` | Formulario pre-cargado para editar un personaje existente |
| `/panel.php` | Panel de estadísticas con gráfico de Chart.js |

---

## 🎨 Diseño

La interfaz usa un tema visual rosado inspirado en **Barbie**, implementado con CSS puro dentro de la clase `plantilla`. Los colores principales son:

- Fondo: `#FFC0CB` (rosa claro)
- Texto: `#E91E63` (rosa fuerte)
- Botones / encabezados de tabla: `#E91E63`

---

## 📦 Dependencias Externas

| Librería | Uso | CDN |
|---|---|---|
| [Chart.js](https://www.chartjs.org/) | Gráfico de barras en el panel | `cdn.jsdelivr.net` |

No se requiere instalación de paquetes. Todo lo demás es PHP y JavaScript nativos.

---

## 👨‍💻 Autor

Desarrollado por **Lito**(me)  
Proyecto escolar — Programación Orientada a Objetos en PHP

---

## 📄 Licencia

Este proyecto está bajo la licencia [MIT](../LICENSE).
