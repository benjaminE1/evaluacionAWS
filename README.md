# Tankpedia - Gestor de Tanques

Aplicación Laravel 13 para gestionar tanques, municiones, combustibles, fabricantes, países y conflictos. Contenerizada con Docker y lista para AWS.

## 🚀 Inicio Rápido

### Requisitos
- Docker Desktop
- Git

### Instalar y Ejecutar (Local)

```bash
# Clonar
git clone https://github.com/usuario/tankpedia.git
cd tankpedia

# Iniciar contenedores
docker-compose up -d --build

# Ejecutar migraciones
docker exec -it laravel_app php artisan migrate
```

Acceder en: **http://localhost**

---

## 🏗️ Arquitectura

- **Backend:** Laravel 13 (PHP 8.3) en Docker
- **Frontend:** Blade Templates + Tailwind CSS
- **BD:** MySQL 8.0 (en contenedor con persistencia)
- **Orquestación:** Docker Compose

```
Cliente (navegador)
    ↓ HTTP
EC2 Instance (AWS)
    ├─ laravel_app (puerto 8000)
    └─ mysql_db (puerto 3306)
```

---

## 📂 Estructura

```
app/
├── Http/Controllers/    # TanqueController, MunicionController, etc.
└── Models/             # Tanque, Municion, Combustible, etc.

database/
├── migrations/         # Tablas de BD
└── seeders/           # Datos iniciales

resources/
├── views/             # Plantillas Blade
└── css/               # Tailwind CSS
```

---

## 🔑 Modelos Principales

- **Tanque** - Vehículo blindado (relaciones: País, Fabricante, Combustible)
- **Municion** - Proyectiles
- **Combustible** - Tipos de carburante
- **Fabricante** - Empresas productoras
- **Pais** - Naciones
- **Conflicto** - Eventos históricos

---

## 🌐 Rutas Disponibles

```
/tanques           # CRUD de tanques
/municiones        # CRUD de municiones
/combustibles      # CRUD de combustibles
/fabricantes       # CRUD de fabricantes
/paises            # CRUD de países
/conflictos        # CRUD de conflictos
```

---

## ☁️ Despliegue en AWS

### En Instancia EC2 (Ubuntu 22.04)

```bash
# Conectar por SSH
ssh -i clave.pem ubuntu@tu-ip

# Instalar Docker
sudo apt update && sudo apt install -y docker.io
sudo usermod -aG docker ubuntu

# Clonar y ejecutar
git clone https://github.com/usuario/tankpedia.git
cd tankpedia
docker-compose up -d --build
docker exec -it laravel_app php artisan migrate
```

Acceder en: **http://tu-ip-publica**

### Variables de Entorno (.env)

```env
APP_NAME=Tankpedia
APP_ENV=production
APP_DEBUG=false
APP_URL=http://tu-ip-publica

DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=tankpedia
DB_USERNAME=root
DB_PASSWORD=tu-password-seguro
```

---

## 🐛 Troubleshooting

| Problema | Solución |
|----------|----------|
| Puerto 80 en uso | Cambiar en `docker-compose.yml`: `"8080:8000"` |
| Error de conexión BD | Esperar a que MySQL inicie: `docker-compose logs mysql_db` |
| Permisos en storage | `docker exec -it laravel_app chmod -R 777 storage` |
| Ver logs | `docker-compose logs -f laravel_app` |

---

## 🔒 Seguridad (Producción)

- ✅ `APP_DEBUG=false`
- ✅ Cambiar contraseña MySQL
- ✅ Security Group: solo puertos 80, 443, 22
- ✅ HTTPS con SSL/TLS
- ✅ Backups automáticos de BD

---

**Versión:** 1.0.0 | **Stack:** Laravel 13 + Docker + AWS
