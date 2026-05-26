# 🔧 Backend – EstuFin

Este repositorio contiene el backend del sistema **EstuFin** (aplicación de finanzas personales), desarrollado con **PHP** utilizando una estructura modular básica y desplegado en **Render**.

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

- Gestionar solicitudes REST.
- Procesar datos enviados desde el frontend.
- Conectarse a base de datos.
- Implementar operaciones CRUD.
- Retornar respuestas en formato JSON.

---

## 🏗️ Arquitectura

El backend sigue una estructura modular:

```
back-estuFin/
├── api/              → Punto de entrada de los endpoints
├── controllers/      → Lógica del sistema
├── models/           → Acceso a base de datos
├── routes/           → Definición de endpoints
├── database/         → Conexión y scripts SQL
├── Dockerfile        → Configuración para contenedor
├── composer.json     → Dependencias PHP
└── test.php          → Archivo de pruebas
```

---

## 🔵 Rama: `main` — Backend en PHP

Backend desarrollado con **PHP** utilizando estructura modular básica.

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
- ✅ Render (servicio PHP)
- ✅ InfinityFree
- ✅ Hostinger
- ✅ XAMPP (local)

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

## 🗄️ Base de Datos

La base de datos está en **Supabase (PostgreSQL)**.  
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

- Validación de campos obligatorios.
- Validación de formato email.
- Manejo de errores HTTP (200, 201, 400, 404, 500).
- Respuestas en formato JSON.

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

---

## 📚 Aprendizajes

- Despliegue en la nube con Render.
- Configuración de variables de entorno.
- Separación de responsabilidades (routes → controllers → models).
- Arquitectura básica de backend en PHP.
- Conexión a base de datos en la nube con Supabase.
- Separación entre frontend (GitHub Pages) y backend (Render).