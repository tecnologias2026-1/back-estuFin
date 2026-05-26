# 🔧 Backend – EstuFin

EstuFin es una aplicación de **finanzas personales** que permite a los usuarios registrar movimientos, controlar gastos fijos y rápidos, gestionar métodos de pago, programar próximos pagos y definir metas financieras.

Este repositorio contiene la implementación del backend desarrollado con **PHP** utilizando una estructura modular básica, conectado a una base de datos **Supabase (PostgreSQL)**.

---

## 👥 Integrantes

| Nombre completo | Código |
|---|---|
| Jhon Sebastian Blandón Pérez | 1202796 |
| Johan Santiago Cárdenas Mancera | 1202781 |
| Deisy Carolina Solano López | *(pendiente)* |

---

## 🎯 Objetivo del Backend

Implementar un servidor HTTP capaz de:

- Gestionar solicitudes REST desde el frontend.
- Procesar datos enviados por el cliente.
- Conectarse a la base de datos Supabase (PostgreSQL).
- Implementar operaciones CRUD sobre todas las tablas del sistema.
- Retornar respuestas en formato JSON.

---

## 🏗️ Arquitectura

El backend sigue una estructura modular organizada así:

```
back-estuFin/
├── api/              → Punto de entrada de los endpoints
├── controllers/      → Lógica de negocio de cada módulo
├── models/           → Acceso y consultas a la base de datos
├── routes/           → Definición y enrutamiento de endpoints
├── database/         → Conexión a Supabase y scripts SQL
├── Dockerfile        → Configuración para contenedor
├── composer.json     → Dependencias PHP
└── test.php          → Archivo de pruebas
```

---

## 🌿 Rama Documentada

### 🔵 `php-version` — Backend en PHP

Backend desarrollado con **PHP puro** (sin frameworks), siguiendo una arquitectura modular (routes → controllers → models → database).

### ▶️ Ejecución Local

```bash
# Opción 1: Servidor embebido de PHP
php -S localhost:8000

# Opción 2: XAMPP
# Copiar el proyecto en la carpeta htdocs y acceder desde el navegador
```

Servidor local disponible en:
```
http://localhost:8000
```

---

## 🗄️ Base de Datos — Supabase (PostgreSQL)

La base de datos está alojada en **Supabase**. La tabla central del sistema es `movimientos`, desde donde se registran todos los ingresos y gastos de la aplicación.

### Tablas del sistema

#### 👤 `usuarios`
| Columna | Tipo | Descripción |
|---|---|---|
| id | int8 | Identificador único |
| nombre | text | Nombre del usuario |
| email | text | Correo electrónico |
| password_hash | text | Contraseña encriptada |
| created_at | timestamptz | Fecha de registro |

---

#### 💸 `movimientos` *(tabla principal)*
| Columna | Tipo | Descripción |
|---|---|---|
| id | uuid | Identificador único |
| usuario_email | text | Email del usuario propietario |
| tipo | text | `ingreso` o `gasto` |
| monto | float8 | Valor del movimiento |
| categoria | text | Categoría del movimiento |
| fecha | date | Fecha del movimiento |
| metodo_pago | text | Método de pago utilizado |
| descripcion | text | Descripción del movimiento |

---

#### 🔒 `gastos_fijos`
| Columna | Tipo | Descripción |
|---|---|---|
| id | int8 | Identificador único |
| usuario_email | text | Email del usuario propietario |
| nombre | text | Nombre del gasto fijo |
| monto | float8 | Valor del gasto |
| metodo_pago | text | Método de pago |
| created_at | timestamptz | Fecha de creación |

---

#### ⚡ `gastos_rapidos`
| Columna | Tipo | Descripción |
|---|---|---|
| id | int8 | Identificador único |
| usuario_email | text | Email del usuario propietario |
| nombre | text | Nombre del gasto |
| monto | float8 | Valor del gasto |
| categoria | text | Categoría |
| metodo_pago | text | Método de pago |
| created_at | timestamptz | Fecha de creación |

---

#### 💳 `metodos_pago`
| Columna | Tipo | Descripción |
|---|---|---|
| id | int8 | Identificador único |
| usuario_email | text | Email del usuario propietario |
| nombre_metodo | text | Nombre del método (Nequi, Bancolombia, etc.) |
| saldo | float8 | Saldo disponible |
| created_at | timestamptz | Fecha de creación |

---

#### 📅 `proximos_pagos`
| Columna | Tipo | Descripción |
|---|---|---|
| id | int8 | Identificador único |
| usuario_email | text | Email del usuario propietario |
| nombre_pago | text | Nombre del pago programado |
| monto | float8 | Valor del pago |
| fecha_vencimiento | date | Fecha límite del pago |
| estado | text | `pendiente` o `pagado` |
| es_recurrente | bool | Si el pago se repite |
| metodo_pago | text | Método de pago asociado |

---

#### 🎯 `metas_financieras`
| Columna | Tipo | Descripción |
|---|---|---|
| id | uuid | Identificador único |
| usuario_email | text | Email del usuario propietario |
| nombre_meta | text | Nombre de la meta |
| monto_objetivo | float8 | Monto total a alcanzar |
| monto_ahorrado | float8 | Monto ahorrado hasta ahora |
| fecha_limite | date | Fecha objetivo |

---

## 📡 Endpoints Implementados

### 👤 Usuarios
| Método | Ruta | Descripción |
|---|---|---|
| GET | `/api/users` | Obtener todos los usuarios |
| POST | `/api/users` | Crear un usuario |
| PUT | `/api/users/{id}` | Actualizar un usuario |
| DELETE | `/api/users/{id}` | Eliminar un usuario |

### 💸 Movimientos
| Método | Ruta | Descripción |
|---|---|---|
| GET | `/api/movimientos` | Obtener todos los movimientos |
| POST | `/api/movimientos` | Registrar un movimiento |
| PUT | `/api/movimientos/{id}` | Actualizar un movimiento |
| DELETE | `/api/movimientos/{id}` | Eliminar un movimiento |

### 🔒 Gastos Fijos
| Método | Ruta | Descripción |
|---|---|---|
| GET | `/api/gastos-fijos` | Obtener gastos fijos |
| POST | `/api/gastos-fijos` | Crear un gasto fijo |
| PUT | `/api/gastos-fijos/{id}` | Actualizar un gasto fijo |
| DELETE | `/api/gastos-fijos/{id}` | Eliminar un gasto fijo |

### ⚡ Gastos Rápidos
| Método | Ruta | Descripción |
|---|---|---|
| GET | `/api/gastos-rapidos` | Obtener gastos rápidos |
| POST | `/api/gastos-rapidos` | Registrar un gasto rápido |
| PUT | `/api/gastos-rapidos/{id}` | Actualizar un gasto rápido |
| DELETE | `/api/gastos-rapidos/{id}` | Eliminar un gasto rápido |

### 💳 Métodos de Pago
| Método | Ruta | Descripción |
|---|---|---|
| GET | `/api/metodos-pago` | Obtener métodos de pago |
| POST | `/api/metodos-pago` | Agregar un método de pago |
| PUT | `/api/metodos-pago/{id}` | Actualizar un método de pago |
| DELETE | `/api/metodos-pago/{id}` | Eliminar un método de pago |

### 📅 Próximos Pagos
| Método | Ruta | Descripción |
|---|---|---|
| GET | `/api/proximos-pagos` | Obtener próximos pagos |
| POST | `/api/proximos-pagos` | Programar un pago |
| PUT | `/api/proximos-pagos/{id}` | Actualizar un pago programado |
| DELETE | `/api/proximos-pagos/{id}` | Eliminar un pago programado |

### 🎯 Metas Financieras
| Método | Ruta | Descripción |
|---|---|---|
| GET | `/api/metas` | Obtener metas financieras |
| POST | `/api/metas` | Crear una meta |
| PUT | `/api/metas/{id}` | Actualizar una meta |
| DELETE | `/api/metas/{id}` | Eliminar una meta |

---

## 🔐 Validaciones Implementadas

- Validación de campos obligatorios en cada endpoint.
- Manejo de errores HTTP: `200`, `201`, `400`, `404`, `500`.
- Respuestas estandarizadas en formato JSON.
- Autenticación de usuarios con contraseña encriptada (`password_hash`).

---

## 🌍 URLs del Proyecto

| Componente | URL |
|---|---|
| Frontend (GitHub Pages) | [https://tecnologias2026-1.github.io/EstuFin/](https://tecnologias2026-1.github.io/EstuFin/) |
| Backend (producción) | *(pendiente de despliegue)* |

---

## 🚀 Despliegue en Render (PHP)

### 1️⃣ Subir proyecto a GitHub
```bash
git init
git add .
git commit -m "Backend inicial PHP"
git push origin main
```

### 2️⃣ Crear servicio en Render
1. Ir a [https://render.com](https://render.com)
2. **New → Web Service**
3. Conectar el repositorio de GitHub
4. Configurar:
   - **Environment:** PHP
   - **Build Command:** *(dejar vacío o según configuración)*
   - **Start Command:** `php -S 0.0.0.0:$PORT`

### 3️⃣ Variables de entorno en Render
Configurar las siguientes variables en el panel de Render:

| Variable | Descripción |
|---|---|
| `SUPABASE_URL` | URL del proyecto Supabase |
| `SUPABASE_KEY` | API Key de Supabase |
| `DB_HOST` | Host de la base de datos |
| `DB_USER` | Usuario de la base de datos |
| `DB_PASSWORD` | Contraseña de la base de datos |
| `DB_NAME` | Nombre de la base de datos |

---

## ⚠️ Errores Comunes en Render

| Error | Solución |
|---|---|
| Puerto fijo en el código | Usar `$_ENV['PORT']` en lugar de un puerto fijo |
| Credenciales expuestas | Usar variables de entorno, nunca escribirlas en el código |
| No se sube `composer.json` | Asegurarse de hacer commit de todas las dependencias |
| No se hace commit antes de conectar | Siempre hacer `git push` antes de configurar Render |

---

## 📚 Aprendizajes

- Desarrollo de APIs REST con PHP sin frameworks.
- Conexión a bases de datos en la nube con Supabase.
- Estructura modular de un backend (routes → controllers → models).
- Uso de variables de entorno para proteger credenciales.
- Despliegue de aplicaciones PHP en la nube.
- Separación entre frontend (GitHub Pages) y backend (servidor PHP).