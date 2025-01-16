<?php
session_start();

require_once("admin/template/header.php");
?>

<!-- Estilos personalizados para el tema oscuro y la imagen de fondo -->
<style>

    
    body {
        background-image: url('../views/img/FONDO.jpg'); /* Imagen de fondo */
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        color: #f8f9fa; /* Color de texto claro */
        font-family: 'Arial', sans-serif;
    }

    .overlay {
        background: rgba(0, 0, 0, 0.7); /* Capa oscura encima del fondo */
        min-height: 100vh;
        padding-top: 50px;
    }

    .welcome-section {
        text-align: center;
        margin-bottom: 50px;
        color: #f8f9fa;
    }

    .welcome-section img {
        width: 150px; /* Tamaño del logo */
        margin-bottom: 20px;
        color: #f8f9fa;
    }

    .card {
        background-color: #2b2b2b;
        color: #f8f9fa;
        border: none;
        transition: transform 0.3s;
    }

    .card:hover {
        transform: scale(1.05); /* Efecto de escala al pasar el ratón */
    }

    .card img {
        width: 50px;
        margin-bottom: 15px;
    }

    .btn-dark {
        background-color: #444;
        border: none;
    }
    footer, footer a {
        color: #ffffff; /* Color de texto blanco para el header y enlaces */
    }
    .bajo{
      color: #ffffff;
      background: rgba(7, 7, 7, 7.7); /* Capa oscura encima del fondo */
        
        padding-top: 18px;
    }
    .bajo img {
      width: 150px; /* Tamaño del logo */
        margin-bottom: 20px;
        color: #f8f9fa;
    }
    .navbar {
        background-color: #222;
        padding: 10px;
    }

    .navbar-brand img {
        width: 40px;
        height: 40px;
    }
  
    .navbar-brand{
        color: #ffffff !important;
    }

    .navbar-nav .nav-link {
        color: #ffffff !important;
    }

    .navbar-nav .nav-link:hover {
        color: #00bcd4 !important;
    }
</style>
<!-- Barra de navegación -->
<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="../views/img/LOGOPC.png" alt="Logo">
            FIMAZ TORNEOS 
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="admin/frmInicioSesion.php">Iniciar Sesión</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Cerrar Sesión</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Usuario</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Calendario</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="overlay">
    <div class="container">
        <!-- Sección de bienvenida con el logo -->
        <div class="welcome-section">
            <img src="../views/img/LOGOPC.png" alt="Logo del Sistema">
            <h1 class="display-4">Bienvenido al Sistema de Torneos</h1>
        </div>

        <!-- Sección de tarjetas con imágenes y botones -->
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="card shadow text-center p-4">
                    <img src="../views/img/COPAmas.png" alt="Crear Torneo">
                    <h5 class="card-title">Crea un nuevo torneo y organiza tus competencias</h5>
                    <a href="admin/frmTorneos.php" class="btn btn-primary mt-3">
                        <i class="fas fa-plus-circle"></i> Crear Torneo
                    </a>
                </div>
            </div>

            <div class="col-md-6 mb-4">
                <div class="card shadow text-center p-4">
                    <img src="../views/img/COPAver.png" alt="Ver Torneos">
                    <h5 class="card-title">Consulta la lista completa de torneos registrados</h5>
                    <a href="admin/readAllTorneos.php" class="btn btn-success mt-3">
                        <i class="fas fa-list-ul"></i> Ver Torneos
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require_once("admin/template/footer.php");
?>
