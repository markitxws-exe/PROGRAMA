<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Torneo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>


    body {
        background-image: url('../img/FONDO.jpg'); /* Imagen de fondo */
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        color: #f8f9fa; /* Color de texto claro */
        font-family: 'Arial', sans-serif;
    }

        .card {
            background-color: rgba(0, 0, 0, 0.8); /* Fondo oscuro para la tarjeta */
            color: #ffffff; /* Texto blanco */
            border: 1px solid #444;
        }

        .form-control {
            background-color: #2b2b2b;
            color: #ffffff;
            border: 1px solid #555;
        }

        .form-control::placeholder {
            color: #cccccc;
        }

        .card-header,
        .card-footer {
            background-color: #444;
            color: #ffffff;
        }

        .btn-primary,
        .btn-danger,
        .btn-success {
            color: #ffffff;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
        }

        .btn-danger {
            background-color: #dc3545;
            border: none;
        }

        .btn-success {
            background-color: #28a745;
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
</head>
<body>

<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="../index.php  ">
            <img src="../img/LOGOPC.png" alt="Logo">
            FIMAZ TORNEOS 
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Calendario</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h3 class="text-center" style="color: white;">Inicio de Sesión</h3>
                <form action="../../controllers/usuariosController.php?action=login" method="POST">
                    <div class="mb-3">
                        <label for="email" class="form-label" style="color: white;">Correo Electrónico</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label" style="color: white;">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
                    </div>
                </form>
                <p class="mt-3 text-center" style="color: white;">¿No tienes una cuenta? <a href="frmRegistro.php">Regístrate</a></p>
            </div>
        </div>
    </div>
<?php require_once("../admin/template/footer.php"); ?>