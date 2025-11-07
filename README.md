# 🌌 Proyecto NASA - Explorador de Datos Espaciales

<div align="center">
  
![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![phpMyAdmin](https://img.shields.io/badge/phpmyadmin-6C78AF?style=for-the-badge&logo=phpmyadmin&logoColor=white)
![XAMPP](https://img.shields.io/badge/XAMPP-FB7A24?style=for-the-badge&logo=xampp&logoColor=white) <br>
![HTML5](https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white)
![CSS3](https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=CSS&logoColor=white)
![JavaScript](https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=white)



</div>

Aplicación web desarrollada como **proyecto práctico del módulo de *Implantación de Aplicaciones Web*** del **Ciclo Formativo de Grado Superior en ASIR** (Administración de Sistemas Informáticos en Red).

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

- **Raestreador de Asteroides Cercanos (NEOs)**
  Lista asteroides próximos a la Tierra con:
  - Nombre y fecha de aproximación.
  - Distancia mínima (km y unidades astronómicas).
  - Diámetro estimado.
  - Velocidad relativa y clasificación de riesgo.

- **Gestión de Clave API Segura**
  - HTML5
  - CSS3 (diseño responsivo)
  - JavaScript vanilla (ES6+)
  - APIs REST de la NASA

---

## 🌐 APIs de la NASA Utilizadas
1. **APOD (Astronomy Picture of the Day)**
    https://apod.nasa.gov/apod/astropix.html
2. **NEO (Near Earth Object) Feed**
   https://data.nasa.gov/dataset/asteroids-neows-api

🔗 Documentación: https://api.nasa.gov/

> ⚠️ Se recomienda obtener una **clave API personal gratuita** en el portal de la NASA. La clave de demostración (`DEMO_KEY`) tiene límites estrictos de uso.

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
3. Abre `index.html`en tu navegador (se recomienda usar Live Server en VS Code).
4. Ingresa tu clave la primera vez. Se guardará localmente y se reutilizará en sesiones futuras.

---

## Contexto Académico
- Ciclo Formativo: Grado Superior en ASIR (Administración de Sistemas Informáticos en Red)
- Módulo: *Implantación de Aplicaciones Web*
- Curso: 2024-2025
- Autora: Sara Gallego Méndez
