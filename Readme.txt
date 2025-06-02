# FERREMAS 🛠️

**Proyecto académico para el ramo de Integración de Proyectos**  
**Carrera: Ingeniería en Informática — 7° semestre — Año 2025**

## Descripción

Este proyecto corresponde al ramo Integración de Proyectos de la carrera de Ingeniería en Informática, cursado en el séptimo semestre del año 2025.

El sistema FERREMAS ha sido desarrollado utilizando una arquitectura en capas, lo que permite una separación clara de responsabilidades y facilita el mantenimiento, escalabilidad y reutilización del código. Las capas están organizadas de la siguiente manera:

- **Capa de Presentación:** contiene las vistas, formularios y archivos estáticos (ubicados en `views/`, `forms/` y `assets/`). Es la encargada de la interfaz con el usuario.
- **Capa de Lógica de Negocio:** centraliza el flujo y reglas del sistema (en `app/`, `routes/` y `logs/`), incluyendo los controladores que orquestan los procesos.
- **Capa de Acceso a Datos:** gestiona la conexión y operaciones sobre la base de datos (en `conf/` y `database/`).
- **Capa de Servicios/API:** alojada en la carpeta `api/`, contiene la lógica expuesta a través de endpoints para permitir la comunicación con sistemas externos.
- **Capa de Dependencias:** el directorio `vendor/` incluye las librerías instaladas por Composer, como el SDK de Transbank.
- **Capa de Pruebas:** el sistema contempla scripts y configuraciones para pruebas funcionales en `test/`.

Esta estructura modular asegura un desarrollo limpio y adaptable, cumpliendo con los requerimientos del ramo y buenas prácticas de diseño de software.
----------------------------------------------------------------------------------------------------------------

## Funcionalidades destacadas

- 🔐 Integración con Webpay Plus para pagos reales o de prueba.
- 🌐 Consumo de la API del Banco Central de Chile para visualizar indicadores económicos (dólar, euro, UF, UTM).
- 📊 Icono adicional en el encabezado del sistema que permite abrir un modal y ver en tiempo real los valores actualizados de los indicadores económicos desde cualquier vista.
- 🧩 Modularidad a través de componentes reutilizables (`app/componentes/header.php`, `footer.php`, etc.).
----------------------------------------------------------------------------------------------------------------

## Recursos utilizados

- **Lenguaje de programación:** PHP 8
- **Base de datos:** MySQL
- **Framework:** Bootstrap 5 (frontend), Composer (PHP dependencias)
- **Integraciones externas:**
  - Webpay Plus (Transbank SDK)
  - API del Banco Central de Chile
----------------------------------------------------------------------------------------------------------------

## Arquitectura

El sistema está diseñado bajo una **arquitectura en capas** que incluye:

- **Capa de presentación:** HTML, CSS (Bootstrap), JS
- **Capa lógica (backend):** PHP puro con estructuras MVC simples
- **Capa de datos:** MySQL
- **API REST propia** para orquestar peticiones entre frontend, base de datos y servicios externos
----------------------------------------------------------------------------------------------------------------

## 🔧 Requisitos para ejecutarlo

1. **Servidor local o remoto con:**
   - PHP 8.x
   - MySQL 5.7 o superior
   - Composer instalado

2. **Instalación de dependencias:** 
   composer install

