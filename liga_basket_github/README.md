# ARENA 26 — Gestión de Liga de Básquetbol 🏀

## ¡Nueva demostración para GitHub Pages!

Si entras a la dirección de GitHub Pages del repositorio, debe abrirse **ARENA 26**, un panel deportivo de estilo nocturno con acentos verde neón, marcador de próximos partidos y navegación horizontal. La página está íntegramente contenida en **un solo `index.html`** (CSS y JavaScript incluidos), por lo que basta con publicarlo en la raíz del repositorio. Incluye 6 equipos, 12 jugadores y 11 partidos de ejemplo para mostrar durante el examen.

En GitHub Pages los cambios se almacenan **solo en el navegador de cada visitante** (`localStorage`). No se sincronizan entre computadoras. Puedes registrar equipos y resultados, ver la clasificación, descargar un JSON y reiniciar los datos de ejemplo. No necesita PHP para esta demostración.

**El proyecto Laravel continúa incluido** para usarlo con XAMPP en tu computadora. Laravel usa su propio almacenamiento JSON en el servidor, distinto de los datos de la demostración pública. GitHub Pages no ejecuta PHP.

Para actualizar tu repositorio desde Visual Studio Code, copia únicamente **`index.html`** a la raíz del proyecto local (al lado de `composer.json`). Si ya existe, reemplázalo. Luego abre **Source Control** en VS Code, escribe un mensaje (por ejemplo, `Rediseño ARENA 26 para examen`), pulsa **Commit** y luego **Sync Changes / Push**. GitHub Pages suele tardar un poco en publicar los cambios.

**Secuencia sugerida de presentación:** abre Dashboard → Ranking → Equipos y crea uno → Jugadores y agrega uno → Calendario y registra un resultado → vuelve a Ranking y muestra cómo se actualiza. Finaliza mostrando la descarga de respaldo JSON en Datos.

---

Versión renovada del proyecto original con **Laravel 12, PHP, HTML, CSS y JavaScript**, ahora también con el diseño **ARENA 26**. Funciona **sin MySQL ni otra base de datos**: guarda la información en `storage/app/private/liga.json` en el equipo que ejecuta Laravel.

## Funciones nuevas

- Panel deportivo moderno y adaptable a celulares.
- Registrar, buscar, editar y eliminar **equipos**.
- Registrar, buscar, editar y eliminar **jugadores**. Control de dorsales duplicados por equipo.
- Programar, filtrar, editar y eliminar **partidos**.
- Registrar y modificar marcadores; volver un encuentro a «Programado».
- **Tabla de posiciones automática**: partidos jugados, ganados, perdidos, puntos a favor/en contra y diferencia.
- Próximos encuentros, líderes del torneo y contadores actualizados.
- Descargar y restaurar **respaldo JSON**.
- Validación de formularios en Laravel y protección CSRF.

## Pasos para abrirlo en Windows, VS Code y XAMPP

**Necesitas:** XAMPP con **PHP 8.2 o superior**, [Composer](https://getcomposer.org/download/) y Git. No hace falta iniciar MySQL.

1. Descomprime `liga_basket_github` y abre esa carpeta en Visual Studio Code.
2. En XAMPP, inicia **Apache**. Deja MySQL apagado.
3. Abre **Terminal → Nueva terminal** en VS Code dentro de la carpeta donde está `composer.json`.
4. Ejecuta **uno por uno**:

   ```powershell
   composer install
   copy .env.example .env
   php artisan key:generate
   php artisan serve
   ```

   Si tu PC no reconoce el comando `php`, utiliza la ruta de XAMPP para los dos últimos comandos:

   ```powershell
   C:\xampp\php\php.exe artisan key:generate
   C:\xampp\php\php.exe artisan serve
   ```

5. En Chrome entra a **http://127.0.0.1:8000**. Mantén la terminal abierta durante el uso.

> **Nota:** `composer install` descarga Laravel la primera vez; el ZIP no incluye la carpeta `vendor`. No uses `npm install`, no crees migraciones y no configures MySQL.

### Acceso desde Apache / XAMPP

Si copias la carpeta a `C:\xampp\htdocs\liga_basket_github`, también puedes entrar a `http://localhost/liga_basket_github/public/` después de instalar dependencias y generar la clave. En un hosting real el sitio debe apuntar directamente al directorio **public** y nunca exponerse la carpeta del proyecto completa.

## Git y GitHub

El proyecto conserva el historial Git del ZIP original. En la terminal de VS Code:

```bash
git status
git add .
git commit -m "Renovar liga de basquetbol con Laravel y JSON"
```

Para subirlo a un repositorio nuevo de GitHub:

```bash
git remote -v
git remote add origin https://github.com/TU-USUARIO/gestion-liga-basquetbol.git
git branch -M main
git push -u origin main
```

Si `git remote -v` ya muestra `origin`, omite `git remote add origin`. Si debes corregirlo, usa `git remote set-url origin URL-REAL-DE-TU-REPOSITORIO`. **El ZIP no está publicado en tu GitHub**: lo subirás desde tu cuenta.

## Datos y seguridad

- Los registros quedan en `storage/app/private/liga.json`, creado automáticamente.
- Ese archivo está excluido de Git para no divulgar datos al subir el repositorio.
- Laravel bloquea el JSON al leer/escribir para evitar operaciones simultáneas incompatibles.
- Antes de borrar equipos o restaurar datos, descarga un respaldo en la sección **Respaldo**.
- Este proyecto académico **no tiene autenticación de administradores**. Úsalo localmente o en una red confiable; no lo publiques en Internet sin añadir usuarios, permisos y controles de acceso.

## Organización

```text
app/Http/Controllers/LigaController.php   API y validación
app/Services/LigaStore.php               Guardado JSON
routes/web.php                           Rutas de Laravel
resources/views/liga.blade.php           Página principal
public/css/arena.css                     Diseño ARENA 26 (Laravel)
index.html                               Demo completa de GitHub Pages
demo.js                                  Lógica de demo (fuente editable)
arena.css                                Estilos de demo (fuente editable)
public/js/app.js                         Funciones y clasificación
storage/app/private/liga.json            Datos (autogenerados)
```
