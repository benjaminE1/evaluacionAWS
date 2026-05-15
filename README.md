# Proyecto Cloud Computing - Repositorio de Aplicación

[cite_start]Este repositorio contiene la solución técnica para el despliegue de una aplicación web funcional en AWS, cumpliendo con los requerimientos de infraestructura, contenerización y documentación técnica[cite: 1, 3].

## 🏗️ 1. Arquitectura de la Solución
[cite_start]La arquitectura se basa en un modelo de infraestructura como servicio (IaaS) y contenedores[cite: 3, 4]:
* [cite_start]**Servidor de Aplicación:** Instancia **Amazon EC2** (IaaS)[cite: 4].
* [cite_start]**Contenerización:** Docker para el backend y servicios dependientes[cite: 6].
* [cite_start]**Base de Datos:** MySQL ejecutado en un contenedor con persistencia de datos[cite: 5].
* [cite_start]**Redes:** Configuración de **Security Groups** para acceso controlado vía HTTP (80) y SSH (22)[cite: 7].

## 🐳 2. Dockerfile y Contenedores
[cite_start]Se incluye el archivo `Dockerfile` en la raíz del proyecto para la creación de la imagen de la aplicación.
* [cite_start]**Orquestación:** Se utiliza **Docker Compose** para gestionar la relación entre el servidor de aplicación y la base de datos de forma automática[cite: 6, 7].

## 🚀 3. Instrucciones de Despliegue
[cite_start]Siga estos pasos para desplegar la aplicación en una instancia EC2:

1.  **Preparación:** Clonar este repositorio en la instancia.
    ```bash
    git clone <url-del-repositorio>
    cd <nombre-carpeta>
    ```
2.  **Configuración:** Crear el archivo de entorno y configurar las credenciales de base de datos.
    ```bash
    cp .env.example .env
    ```
3.  **Levantamiento:** Construir y ejecutar los contenedores.
    ```bash
    docker-compose up -d --build
    ```
4.  **Base de Datos:** Ejecutar las migraciones necesarias.
    ```bash
    docker exec -it <nombre_contenedor> php artisan migrate
    ```

## 📁 4. Código Fuente
[cite_start]El repositorio incluye la estructura completa del proyecto (Laravel), archivos de configuración de entorno, scripts de migración y archivos de orquestación (Docker Compose) necesarios para la continuidad operacional.

## 🛡️ 5. Continuidad y Resiliencia
* [cite_start]**DRP:** En caso de falla, la recuperación se realiza mediante el despliegue de una nueva instancia y la clonación de este repositorio (RTO estimado: 10 min)[cite: 8].
* [cite_start]**BCP:** Mitigación de riesgos mediante políticas de reinicio automático de servicios en Docker.
