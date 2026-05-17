🔧 Backend – Nombre del Proyecto

<<<<<<< HEAD
Este repositorio contiene la implementación del backend del sistema en dos tecnologías distintas:

🟢 Rama node-version → Implementación con Node.js
🔵 Rama php-version → Implementación con PHP

Cada rama contiene su propia estructura y configuración independiente.
=======
Este repositorio contiene el backend del sistema desarrollado con Node.js sin frameworks y desplegado en Render.
>>>>>>> template_php

👥 Integrantes

Nombre completo – Código
<<<<<<< HEAD
=======

>>>>>>> template_php
Nombre completo – Código

🎯 Objetivo del Backend

<<<<<<< HEAD
Implementar un servidor capaz de:

Gestionar solicitudes HTTP.
Procesar datos enviados por el cliente.
Conectarse a una base de datos.
Implementar operaciones CRUD.
Retornar respuestas en formato JSON.


Estructura del proyecto

🌿 Estructura de Ramas
🟢 Rama: node-version

Backend desarrollado con Node.js sin frameworks.

Ejecución Local
npm install
npm start

Servidor:
http://localhost:3000

Despliegue
Compatible con:
Render
Railway
VPS Node

Debe usar:
const PORT = process.env.PORT || 3000;

🔵 Rama: php-version

Backend desarrollado con PHP utilizando estructura modular básica.

Ejecución Local

Si usan servidor embebido de PHP:

php -S localhost:8000

Servidor:
http://localhost:8000

Despliegue

Compatible con:

Render (servicio PHP)
InfinityFree
Hostinger
XAMPP (local)

📡 Endpoints Implementados
Método	Ruta	Descripción
GET	/api/users	Obtener usuarios
POST	/api/users	Crear usuario
PUT	/api/users/{id}	Actualizar usuario
DELETE	/api/users/{id}	Eliminar usuario
🗄️ Base de Datos

El modelo de base de datos es el mismo para ambas ramas.

Ubicación del script:

/database/script.sql


🔐 Validaciones Implementadas

Campos obligatorios
Validación de formato email
Manejo de errores HTTP
Respuestas en formato JSON

🌍 URLs en Producción

Node:

https://nombre-app-node.onrender.com


PHP:

https://nombre-app-php.onrender.com
=======
Implementar un servidor HTTP capaz de:

Gestionar solicitudes REST.

Procesar datos enviados desde el frontend.

Conectarse a base de datos.

Implementar operaciones CRUD.

Retornar respuestas en formato JSON.

🏗️ Arquitectura

El backend sigue una estructura modular:

Routes: Definición de endpoints.

Controllers: Lógica del sistema.

Models: Acceso a base de datos.

Database: Conexión y scripts SQL.

📡 Endpoints
Usuarios
Método	Ruta	Descripción
GET	/api/users	Obtener usuarios
POST	/api/users	Crear usuario
PUT	/api/users/:id	Actualizar usuario
DELETE	/api/users/:id	Eliminar usuario
🌍 URL del Backend en Producción

Colocar aquí la URL generada por Render:

https://nombre-del-servicio.onrender.com

🚀 Despliegue en Render
1️⃣ Subir proyecto a GitHub
git init
git add .
git commit -m "Backend inicial"
git push origin main

2️⃣ Crear servicio en Render

Ir a https://render.com

New → Web Service

Conectar repositorio GitHub

Configurar:

Build Command: npm install

Start Command: npm start

Environment: Node

3️⃣ Variable de Puerto

Render asigna automáticamente el puerto mediante:

process.env.PORT

🗄️ Base de Datos

Si se usa base de datos externa (Render PostgreSQL o MySQL):

Configurar variables de entorno:

DB_HOST

DB_USER

DB_PASSWORD

DB_NAME

🔐 Validaciones

Validación de datos obligatorios.

Manejo de errores HTTP (200, 400, 404, 500).

Respuestas en formato JSON.

📚 Aprendizajes

Despliegue en la nube.

Configuración de variables de entorno.

Separación de responsabilidades.

Arquitectura básica de backend.

⚠️ Errores Comunes en Render

❌ Puerto fijo (3000 sin process.env.PORT)
❌ Falta de script "start"
❌ No subir package.json
❌ No hacer commit antes de conectar
>>>>>>> template_php
