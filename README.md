EL Proyecto es SARH

Proyecto desarrollado con Laravel que incluye sistema de autenticación con Breeze y manejo de base de datos mediante migraciones.

---

Requisitos Previos

- PHP >= 8.1
- Composer
- MySQL 
- Node.js y NPM 

---

Clona el repositorio

bash
git clone https://github.com/juanposada25/SARH.git
cd SARH

---

Instalación y Configuración

Instala las dependencias de PHP y JavaScript:

composer install
npm install

---

Compila los archivos front-end:

npm run dev

---

Copia el archivo .env y configura tus variables

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=sarh
DB_USERNAME=root
DB_PASSWORD=

---

Genera la clave de la aplicación

php artisan key:generate

---

Ejecuta las migraciones

php artisan migrate

---

Ejecutar el Servidor de Desarrollo

php artisan serve

Luego abre tu navegador y accede a la URL: http://127.0.0.1:8000