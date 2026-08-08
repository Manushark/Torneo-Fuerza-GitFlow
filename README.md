# 💪 Torneo de la Fuerza — Sistema de Registro de Guerreros

> Proyecto escolar desarrollado en PHP puro con Programación Orientada a Objetos, persistencia en archivos `.dat`, panel de estadísticas interactivo y control de versiones con **GitFlow**.

---

## 📋 Descripción

**Torneo de la Fuerza** es una aplicación web que permite registrar, visualizar y gestionar guerreros participantes en un torneo de combate. Cada guerrero almacena información personal como nombre, apellido, fecha de nacimiento, foto y otras características.

El sistema calcula automáticamente la **edad** y el **signo zodiacal** de cada participante a partir de su fecha de nacimiento, además de proporcionar estadísticas agregadas del torneo.

---

## ✨ Funcionalidades

- ✅ Registro de nuevos guerreros participantes
- ✅ Edición de datos de guerreros existentes
- ✅ Eliminación de registros de guerreros
- ✅ Cálculo automático de edad y signo zodiacal
- ✅ Listado general de guerreros con foto, edad y signo
- ✅ Panel de estadísticas con:
  - Conteo total de participantes 🤷‍♂️
  - Distribución por signos zodiacales 🌟
  - Visualización de datos agregados
- ✅ Persistencia de datos en archivos `.dat` (sin base de datos)
- ✅ Plantilla visual reutilizable con diseño temático "Torneo"
- ✅ Gestión de versiones con **GitFlow**

---

## 🗂️ Estructura del Proyecto

```
Torneo-Fuerza-GitFlow/
│
├── index.php             # Página principal — listado de guerreros
├── registers.php         # Formulario de registro y edición
├── guardar.php           # Lógica de guardado de datos
├── eliminar.php          # Lógica de eliminación de guerreros
├── panel.php             # Panel de estadísticas
│
├── Library/
│   ├── engine.php        # Punto de entrada — requiere todas las librerías
│   ├── class.php         # Clases: fighter y habilidades
│   ├── components.php    # Funciones auxiliares (inputs, guardar, cargar, listar)
│   └── plantilla.php     # Clase plantilla — genera el HTML base (cabecera/pie)
│
└── datos/
    └── [archivos .dat generados dinámicamente]
```

---

## 🧱 Arquitectura y Conceptos Aplicados

### Clases PHP

| Clase | Descripción |
|---|---|
| `fighter` | Entidad principal que representa un guerrero. Contiene métodos `edad()` y `signo_zodiacal()` que calculan valores desde `fecha_nacimiento`. |
| `habilidades` | Clase auxiliar para almacenar información de habilidades (nombre, tipo, nivel). |
| `plantilla` | Implementa el **patrón Singleton** para generar el HTML de la página (cabecera y pie) usando `__construct` y `__destruct`. |

### Persistencia sin base de datos

Los guerreros se serializan con `serialize()` y se guardan en archivos `.dat` dentro de la carpeta `datos/`. Para leerlos se usa `unserialize()`.

```php
// Guardar
file_put_contents("datos/{$codigo}.dat", serialize($datos));

// Cargar
$datos = unserialize(file_get_contents("datos/{$codigo}.dat"));

// Eliminar
unlink("datos/{$codigo}.dat");
```

### CRUD Completo

- **Create**: Formulario en `registers.php` → guardado en `guardar.php`
- **Read**: Listado en `index.php` y detalles en formulario
- **Update**: Edición mediante `registers.php?codigo=ID`
- **Delete**: Eliminación mediante `eliminar.php?id=ID`

---

## 🚀 Cómo Ejecutar

### Requisitos

- PHP 7.4 o superior
- Servidor web local (XAMPP, WAMP, Laragon, PHP built-in server)
- Git (opcional, para clonar el repositorio)

### Con el servidor integrado de PHP

```bash
# Clonar el repositorio
git clone https://github.com/Manushark/Torneo-Fuerza-GitFlow.git
cd Torneo-Fuerza-GitFlow

# Iniciar el servidor
php -S localhost:8000

# Abrir en el navegador
http://localhost:8000/index.php
```

### Con XAMPP / WAMP

1. Clonar o descargar el repositorio en `htdocs/` (XAMPP) o `www/` (WAMP).
2. Iniciar Apache desde el panel de control.
3. Abrir `http://localhost/Torneo-Fuerza-GitFlow/index.php` en el navegador.

> ⚠️ La carpeta `datos/` se crea automáticamente al registrar el primer guerrero.

---

## 📸 Rutas y Vistas

| Ruta | Descripción |
|---|---|
| `/index.php` | Listado de todos los guerreros registrados con acciones |
| `/registers.php` | Formulario para registrar un nuevo guerrero |
| `/registers.php?codigo=ID` | Formulario pre-cargado para editar un guerrero existente |
| `/guardar.php` | Procesa POST del formulario (crear/actualizar) |
| `/eliminar.php?id=ID` | Elimina un guerrero del sistema |
| `/panel.php` | Panel de estadísticas del torneo |

---

## 🎨 Diseño Visual

La interfaz usa un tema visual moderno implementado con CSS puro dentro de la clase `plantilla`. Los colores principales son:

- **Fondo**: `#f4f4f4` (gris claro)
- **Contenedor**: `#ecf0f1` (gris perla)
- **Primario**: `#2980B9` (azul fuerte)
- **Secundario**: `#1ABC9C` (turquesa)
- **Texto**: `#333` (gris oscuro)
- **Encabezados**: `#2C3E50` (azul oscuro)

Características de diseño:
- Interfaz centrada con bordes redondeados
- Efectos hover en botones y enlaces
- Tablas con bordes suave y encabezados coloreados
- Imágenes circulares para fotos de guerreros
- Emojis temáticos para mayor claridad

---

## 📦 Dependencias Externas

**No se requieren dependencias externas.** Todo está desarrollado con:
- PHP puro
- HTML5
- CSS3
- JavaScript vanilla

---

## 🔀 GitFlow Workflow

Este proyecto implementa la metodología **GitFlow** para gestión de ramas:

```
main (production) 
├── release branches (release/vX.X.X)
└── develop
    ├── feature branches (feature/*)
    └── hotfix branches (hotfix/*)
```

**Ramas principales:**
- `main` → Código en producción, versiones estables
- `develop` → Rama de integración de features
- `feature/*` → Nuevas funcionalidades
- `hotfix/*` → Parches urgentes en producción
- `release/*` → Preparación de versiones

---

## 💡 Conceptos Educativos

Este proyecto enseña:

✅ **Programación Orientada a Objetos (POO)**
- Clases y objetos
- Propiedades y métodos
- Patrón Singleton

✅ **Gestión de Datos**
- Serialización de objetos
- Persistencia en archivos
- Operaciones CRUD

✅ **Formularios y Validación**
- POST en PHP
- Manejo de inputs HTML
- Validación básica de datos

✅ **Manejo de Fechas**
- Cálculo de edades
- Determinación de signos zodiacales
- Funciones `strtotime()` y `date()`

✅ **Control de Versiones**
- Git y GitFlow
- Ramas y merges
- Buenas prácticas de commits

---

## 🐛 Limitaciones Conocidas

1. **Seguridad**: Uso de `unserialize()` puede ser riesgoso con datos no confiables
2. **Escalabilidad**: No apto para aplicaciones con miles de registros
3. **Concurrencia**: Sin control de acceso simultáneo a archivos
4. **Validación**: Validación mínima en el servidor
5. **Errores**: Sin manejo robusto de excepciones

---

## 🚀 Mejoras Futuras

- [ ] Migrar a una base de datos (MySQL, SQLite)
- [ ] Implementar autenticación de usuarios
- [ ] Agregar sistema de habilidades/poderes
- [ ] Rankings y enfrentamientos
- [ ] API REST con JSON
- [ ] Interfaz responsiva mejorada (Mobile-first)
- [ ] Tests unitarios y automatizados
- [ ] Documentación con PHPDoc
- [ ] Sistema de notificaciones
- [ ] Cargas de archivos (fotos)

---

## 📖 Ejemplo de Uso

### Registrar un nuevo guerrero

1. Abrir `/registers.php`
2. Completar el formulario con:
   - ID único (identificación)
   - Nombre del guerrero
   - Apellido
   - Fecha de nacimiento
   - URL de foto
3. Hacer clic en "Guardar"

### Ver estadísticas

Hacer clic en "📈Estadísticas" para acceder a `/panel.php` donde se muestra:
- Total de participantes
- Distribución de signos zodiacales

### Editar un guerrero

1. En la tabla principal, hacer clic en "Editar"
2. Se carga el formulario con los datos actuales
3. Modificar los datos deseados
4. Guardar cambios

### Eliminar un guerrero

Hacer clic en el enlace de eliminación (si está disponible) o acceder a `eliminar.php?id=ID`

---

## 👨‍💻 Autor

**Desarrollado por: Lito** ⚡

[GitHub Profile](https://github.com/Manushark)

---

## 📄 Licencia

Este proyecto está bajo la licencia especificada en el archivo LICENSE.

---

<div align="center">

💪 **¡Participa en el Torneo de la Fuerza!** 💪

Hecho con ❤️ en PHP + GitFlow

</div>
