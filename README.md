# 🔧 Backend – EstuFin

EstuFin es una aplicación de **finanzas personales** que permite a los usuarios registrar movimientos, controlar gastos fijos y rápidos, gestionar métodos de pago, programar próximos pagos y definir metas financieras.

Este repositorio contiene la implementación del backend desarrollado con **PHP** utilizando una estructura modular básica, conectado a una base de datos **Supabase (PostgreSQL)** y desplegado en **Render**.

---

## 👥 Integrantes

| Nombre completo | Código |
|---|---|
| Jhon Sebastian Blandón Pérez | 1202796 |
| Johan Santiago Cárdenas Mancera | 1202781 |
| Deisy Carolina Solano López | 1202805 |

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

El backend sigue una estructura modular:

```
back-estuFin/
├── api/
│   └── index.php         → Punto de entrada y enrutador principal
├── controllers/          → Lógica de negocio de cada módulo
├── models/               → Acceso y consultas a la base de datos
├── routes/               → Definición de rutas de usuarios
├── database/             → Conexión a Supabase y scripts SQL
├── Dockerfile            → Configuración para despliegue en Render
├── composer.json         → Dependencias PHP
└── test.php              → Archivo de pruebas
```

---

## 🔵 Rama: `main` — Backend en PHP

Backend desarrollado con **PHP puro** (sin frameworks), siguiendo una arquitectura modular (routes → controllers → models → database).

### ▶️ Ejecución Local

```bash
php -S localhost:8000
```

Servidor disponible en:
```
http://localhost:8000
```

### 🚀 Despliegue

Compatible con:
- ✅ Render (servicio PHP con Docker)
- ✅ InfinityFree
- ✅ Hostinger
- ✅ XAMPP (local)

---

## 📡 Endpoints Implementados

### 👤 Usuarios — `/api/usuarios`
| Método | Ruta | Descripción |
|---|---|---|
| POST | `/api/usuarios/registro` | Registrar un nuevo usuario |
| POST | `/api/usuarios/login` | Iniciar sesión |
| GET | `/api/usuarios` | Obtener todos los usuarios |
| PUT | `/api/usuarios/{id}` | Actualizar un usuario |
| DELETE | `/api/usuarios/{id}` | Eliminar un usuario |

### 💸 Movimientos — `/api/movimientos`
| Método | Ruta | Descripción |
|---|---|---|
| GET | `/api/movimientos?email=` | Obtener movimientos del usuario |
| POST | `/api/movimientos` | Registrar un movimiento |

### 🔒 Gastos Fijos — `/api/gastos_fijos`
| Método | Ruta | Descripción |
|---|---|---|
| GET | `/api/gastos_fijos?email=` | Obtener gastos fijos |
| POST | `/api/gastos_fijos` | Crear un gasto fijo |
| DELETE | `/api/gastos_fijos?id=` | Eliminar un gasto fijo |

### ⚡ Gastos Rápidos — `/api/gastos_rapidos`
| Método | Ruta | Descripción |
|---|---|---|
| GET | `/api/gastos_rapidos?email=` | Obtener gastos rápidos |
| POST | `/api/gastos_rapidos` | Registrar un gasto rápido |
| PUT | `/api/gastos_rapidos` | Actualizar un gasto rápido |
| DELETE | `/api/gastos_rapidos?id=` | Eliminar un gasto rápido |

### 💳 Métodos de Pago — `/api/metodos_pago`
| Método | Ruta | Descripción |
|---|---|---|
| GET | `/api/metodos_pago?email=` | Obtener métodos de pago |
| POST | `/api/metodos_pago` | Agregar un método de pago |
| PUT | `/api/metodos_pago` | Actualizar saldo de un método |
| DELETE | `/api/metodos_pago?id=` | Eliminar un método de pago |

### 📅 Próximos Pagos — `/api/proximos_pagos`
| Método | Ruta | Descripción |
|---|---|---|
| GET | `/api/proximos_pagos?email=` | Obtener próximos pagos |
| POST | `/api/proximos_pagos` | Programar un pago |
| POST | `/api/proximos_pagos?action=pagar` | Marcar pago como pagado |
| PUT | `/api/proximos_pagos` | Actualizar un pago |
| DELETE | `/api/proximos_pagos?id=` | Eliminar un pago |

### 🎯 Metas Financieras — `/api/metas_financieras`
| Método | Ruta | Descripción |
|---|---|---|
| GET | `/api/metas_financieras?email=` | Obtener metas del usuario |
| POST | `/api/metas_financieras` | Crear una meta |
| PUT | `/api/metas_financieras` | Actualizar progreso de una meta |
| DELETE | `/api/metas_financieras?id=` | Eliminar una meta |

---

## 🗄️ Base de Datos — Supabase (PostgreSQL)

La base de datos está alojada en **Supabase**.
Ubicación del script: `/database/script.sql`

### Tablas del sistema

#### 👤 `usuarios`
| Columna | Tipo | Descripción |
|---|---|---|
| id | int8 | Identificador único |
| nombre | text | Nombre del usuario |
| email | text | Correo electrónico |
| password_hash | text | Contraseña encriptada |
| created_at | timestamptz | Fecha de registro |

#### 💸 `movimientos` *(tabla principal)*
| Columna | Tipo | Descripción |
|---|---|---|
| id | uuid | Identificador único |
| usuario_email | text | Email del usuario |
| tipo | text | `ingreso` o `gasto` |
| monto | float8 | Valor del movimiento |
| categoria | text | Categoría |
| fecha | date | Fecha del movimiento |
| metodo_pago | text | Método de pago utilizado |
| descripcion | text | Descripción |

#### 🔒 `gastos_fijos`
| Columna | Tipo | Descripción |
|---|---|---|
| id | int8 | Identificador único |
| usuario_email | text | Email del usuario |
| nombre | text | Nombre del gasto |
| monto | float8 | Valor del gasto |
| metodo_pago | text | Método de pago |
| created_at | timestamptz | Fecha de creación |

#### ⚡ `gastos_rapidos`
| Columna | Tipo | Descripción |
|---|---|---|
| id | int8 | Identificador único |
| usuario_email | text | Email del usuario |
| nombre | text | Nombre del gasto |
| monto | float8 | Valor del gasto |
| categoria | text | Categoría |
| metodo_pago | text | Método de pago |
| created_at | timestamptz | Fecha de creación |

#### 💳 `metodos_pago`
| Columna | Tipo | Descripción |
|---|---|---|
| id | int8 | Identificador único |
| usuario_email | text | Email del usuario |
| nombre_metodo | text | Nombre (Nequi, Bancolombia, etc.) |
| saldo | float8 | Saldo disponible |
| created_at | timestamptz | Fecha de creación |

#### 📅 `proximos_pagos`
| Columna | Tipo | Descripción |
|---|---|---|
| id | int8 | Identificador único |
| usuario_email | text | Email del usuario |
| nombre_pago | text | Nombre del pago |
| monto | float8 | Valor del pago |
| fecha_vencimiento | date | Fecha límite |
| estado | text | `pendiente` o `pagado` |
| es_recurrente | bool | Si el pago se repite |
| metodo_pago | text | Método de pago |

#### 🎯 `metas_financieras`
| Columna | Tipo | Descripción |
|---|---|---|
| id | uuid | Identificador único |
| usuario_email | text | Email del usuario |
| nombre_meta | text | Nombre de la meta |
| monto_objetivo | float8 | Monto total a alcanzar |
| monto_ahorrado | float8 | Monto ahorrado hasta ahora |
| fecha_limite | date | Fecha objetivo |

---

## 🔐 Validaciones Implementadas

- Validación de campos obligatorios en cada endpoint.
- Contraseñas almacenadas con encriptación (`password_hash`).
- Manejo de errores HTTP: `200`, `201`, `400`, `401`, `404`, `405`, `500`.
- Respuestas estandarizadas en formato JSON.

---

## 🌍 URLs en Producción

| Componente | URL |
|---|---|
| Frontend (GitHub Pages) | https://tecnologias2026-1.github.io/EstuFin/ |
| Backend PHP (Render) | https://back-estufin.onrender.com |

---

## 🚀 Despliegue en Render

### 1️⃣ Subir proyecto a GitHub
```bash
git init
git add .
git commit -m "Backend inicial"
git push origin main
```

### 2️⃣ Crear servicio en Render
1. Ir a https://render.com
2. **New → Web Service**
3. Conectar repositorio GitHub
4. Configurar:
   - **Branch:** `main`
   - **Runtime:** Docker
   - **Instance Type:** Free

### 3️⃣ Variable de Puerto
Render asigna automáticamente el puerto mediante:
```php
$port = getenv('PORT') ?: 8000;
```

### 4️⃣ Variables de entorno
Configurar en el panel de Render:

| Variable | Descripción |
|---|---|
| `SUPABASE_URL` | URL del proyecto Supabase |
| `SUPABASE_KEY` | API Key (anon public) de Supabase |

---

## ⚠️ Errores Comunes en Render

| Error | Solución |
|---|---|
| ❌ Puerto fijo en el código | Usar `getenv('PORT')` en lugar de un número fijo |
| ❌ Credenciales expuestas en el código | Usar variables de entorno siempre |
| ❌ No subir `composer.json` | Hacer commit de todas las dependencias |
| ❌ No hacer commit antes de conectar | Siempre `git push` antes de configurar Render |
| ❌ Driver PostgreSQL faltante | Agregar `pdo_pgsql` en el Dockerfile |

---

## 📚 Aprendizajes

- Desarrollo de APIs REST con PHP sin frameworks.
- Conexión a base de datos en la nube con Supabase (PostgreSQL).
- Estructura modular de un backend (routes → controllers → models).
- Uso de variables de entorno para proteger credenciales.
- Despliegue de aplicaciones PHP con Docker en Render.
- Separación entre frontend (GitHub Pages) y backend (Render).