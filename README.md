# Laravel Project Setup Guide

## Requisitos Previos

Este projecto se encuentra desarollado en **Laravel Sail**, el cal solo es soportado por macOS, Linux, and Windows (via WSL2).


Antes de comenzar, asegúrate de tener instalados los siguientes requisitos en tu máquina:

- **PHP >= 8.x**
- **Composer**
- **MySQL o MariaDB** (para la base de datos)
- **Git**
- **Docker Desktop**

---

## 1. Clonar el Repositorio

Ejecuta el siguiente comando en tu terminal:

```bash
git clone https://github.com/franzfernandez97/laravel-user-auth.git
cd laravel-user-auth
```

---

## 2. Instalar Dependencias

Ejecuta el siguiente comando para instalar las dependencias de Laravel:

```bash
composer install
```

---
## 3. Iniciar Docker Engine y crear DB mysql o mariadb

Ejecuta la aplicación docker desktop y asegurate de que docker engine se encuentre encendido

Adicional, crea una base de datos MARIADB o MYSQL en local y de preferencia, crea un usuario para acceder a al nuevo schema. 

---

## 4. Configurar Variables de Entorno

Copia el archivo de configuración de ejemplo:

```bash
cp .env.example .env
```

Luego, edita el archivo `.env` y configura la base de datos:
Ten en cuenta que si la base de datos se encuentra en localhost. Debes colocar la ipv4 que se muestra con el comando `ipconfig` ó `ifconfig`

```env
DB_CONNECTION=mysql
DB_HOST=ipv4_sql_server
DB_PORT=3306
DB_DATABASE=nombre_basedatos
DB_USERNAME=usuario
DB_PASSWORD=contraseña
```

---

## 5. Inicia el servicio de Laravel Sail

Se debe encender el servicio de sail con el fin de ejecutar comandos en el contenedor

```bash
cd laravel-user-auth
sail up -d
```

---

## 6. Generar la Clave de Aplicación

Ejecuta el siguiente comando para generar una clave única para la aplicación:

```bash
sail php artisan key:generate
```

---

## 7. Ejecutar Migraciones

Ejecuta las migraciones para crear las tablas en la base de datos:

```bash
sail php artisan migrate --seed
```

---

## 8. Instalar y Compilar Recursos Frontend

```bash
sail npm install 
sail npm run dev
```

---
La aplicación se ejecuta por defecto en `localhost:80`
✅ **Con estos pasos, tu entorno de desarrollo estará listo! 🚀**

