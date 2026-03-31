# 🌌 Proyecto NASA - Explorador de Datos Espaciales

<div align="center">

[![PHP](https://img.shields.io/badge/php-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://www.php.net/)
[![phpMyAdmin](https://img.shields.io/badge/phpmyadmin-6C78AF?style=for-the-badge&logo=phpmyadmin&logoColor=white)](https://www.phpmyadmin.net/)
[![XAMPP](https://img.shields.io/badge/XAMPP-FB7A24?style=for-the-badge&logo=xampp&logoColor=white)](https://www.apachefriends.org/es/index.html) <br>
[![HTML5](https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white)](https://html.spec.whatwg.org/multipage/)
[![CSS3](https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=CSS&logoColor=white)](https://www.w3.org/Style/CSS/)
[![JavaScript](https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=white)](https://www.ecma-international.org/) <br>
[![NASA](https://img.shields.io/badge/NASA-E03C31?style=for-the-badge&logo=nasa&logoColor=white)](https://www.nasa.gov/)

</div>

Aplicación web desarrollada como **proyecto práctico del módulo de _Implantación de Aplicaciones Web_** del **Ciclo Formativo de Grado Superior en ASIR** (Administración de Sistemas Informáticos en Red).

Permite interactuar con APIs públicas de la **NASA** para:

- Consultar la **Foto Astronómica del Día (APOD)**
- Rastrear **asteroides cercanos a la Tierra (NEOs)**
- Gestionar de forma segura una **clave de API personalizada** usando `localStorage`

Este proyecto demuestra el uso de tecnologías web estándar (HTML, CSS y JavaScript) para consumir servicios REST, gestionar configuraciones locales y construir interfaces responsivas sin dependencias externas.

---

## 🎯 Objetivos del Proyecto (ASIR - Implantación de Aplicaciones Web)

- Aplicar conocimientos de **desarrollo front-end sin frameworks**.
- Practicar el consumo de **APIs REST públicas**.
- Implementar el **almacenamiento local seguro** de credenciales sensibles (clave API).
- Diseñar una interfaz **responsiva y funcional** para múltiples dispositivos.
- Cumplir buenas prácticas de organización y documentación de código.

---

## 🚀 Funcionalidades

- **Foto Astronómica del Día (APOD)**
  Muestra la imagen o vídeo destacado por la NASA con título, fecha y explicación científica.

- **Rastreador de Asteroides Cercanos (NEOs)**
  Lista asteroides próximos a la Tierra con:
  - Nombre y fecha de aproximación.
  - Distancia mínima (km y unidades astronómicas).
  - Diámetro estimado.
  - Velocidad relativa y clasificación de riesgo.

- **Gestión de Clave API Segura**
  Permite al usuario guardar su clave API en `localStorage` para reutilizarla en futuras sesiones sin tener que introducirla cada vez.

---

## 🌐 APIs de la NASA Utilizadas

1. **APOD (Astronomy Picture of the Day)**
   https://apod.nasa.gov/apod/astropix.html
2. **NEO (Near Earth Object) Feed**
   https://data.nasa.gov/dataset/asteroids-neows-api

🔗 Documentación: https://api.nasa.gov/

> ⚠️ Se recomienda obtener una **clave API personal gratuita** en el portal de la NASA. La clave de demostración (`DEMO_KEY`) tiene límites estrictos de uso.

---

## 🔧 Tecnologías utilizadas

- **PHP** — Backend y lógica del servidor
- **MySQL** + **phpMyAdmin** — Base de datos y gestión
- **XAMPP** — Servidor local de desarrollo
- **HTML5** + **CSS3** — Estructura y diseño responsivo
- **JavaScript** (ES6+) — Peticiones async a las APIs
- **APIs REST de la NASA** — APOD y NEO Feed

---

## 📁 Estructura del Proyecto

```text
proyecto-nasa/
├── 📁 database
│   └── 📁 migrations
│       └── 🗃️ databasesetup.sql
├── 📁 public/
│   └── 📁 assets
│       ├── 📄 index.php
│       └── 📁 img/
│           ├── 🖼️ fondo.jpg
│           ├── 🖼️ fondonasa.jpg
│           ├── 🖼️ logonasa.png
│           └── 🖼️ nasa-3.svg
│       └── 📁 js/
│           └── 🔌 dashboard.js
├── 📁 src/
│   └── 📁 actions/
│       └── 📄 download.php
│   └── 📁 auth/
│       ├── 📄 logout.php
│       └── 📄 register.php
│   └── 📁 lib/
│       ├── 📄 db.php
│       └── 📄 functions.php
└────── 📁 pages/
        └── 📄 dashboard.php
```

---

## 🛠️ Instrucciones de Uso

1. **Obtén tu clave API** en [https://api.nasa.gov/](https://api.nasa.gov/)
2. **Clona el repositorio**:
   ```bash
   git clone https://github.com/Aratea10/proyecto-nasa.git
   ```
3. Configura XAMPP y abre el proyecto en `http://localhost/proyecto-nasa/public/assets/index.php`
4. Ingresa tu clave la primera vez. Se guardará localmente y se reutilizará en sesiones futuras.

---

## 🎓 Contexto Académico

- Ciclo Formativo: Grado Superior en ASIR (Administración de Sistemas Informáticos en Red)
- Módulo: _Implantación de Aplicaciones Web_
- Curso: 2024-2025

---

## 👩‍💻 Autora

**Sara Gallego Méndez** — Estudiante del Ciclo Superior en ASIR.
