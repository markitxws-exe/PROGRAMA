<?php
require_once("../admin/template/header.php");
require_once("../../controllers/torneosController.php");

// Instanciamos un objeto del controlador de torneos
$objTorneosController = new torneosController();
// Capturamos los registros de la tabla de torneos en la variable $rows
$rows = $objTorneosController->readTorneos();
?>

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

<!-- Estilos personalizados -->
<style>
      body {
        background-image: url('../img/FONDO.jpg'); /* Imagen de fondo */
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

    body {
        background-color: #121212;
        color: #ffffff;
    }

    .card {
        background-color: #2b2b2b;
        color: #ffffff;
        border: 1px solid #444;
    }

    .table {
        color: #ffffff;
    }

    .table-hover tbody tr:hover {
        background-color: #444;
    }

    .btn {
        color: #ffffff;
    }

    footer, footer a {
        color: #ffffff; /* Color de texto blanco para el header y enlaces */
    }
    .bajo{
      color: #ffffff;
      background: rgba(7, 7, 7, 7.7); /* Capa oscura encima del fondo */
        
        padding-top: 18px;
    }
</style>

<!-- Barra de navegación -->
<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="../img/LOGOPC.png" alt="Logo">
            FIMAZ TORNEOS 
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Iniciar Sesión</a>
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

<div class="card text-center mt-4">
    <div class="card-header">
        <i class="fas fa-trophy"></i> LISTADO DE TORNEOS
    </div>
    <div class="card-body">
        <table class="table table-hover table-bordered">
            <thead class="table-light text-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">TORNEO</th>
                    <th scope="col">ORGANIZADOR</th>
                    <th scope="col">ACCIONES</th>
                </tr>
            </thead>
            <tbody>
                <?php if($rows): ?>
                    <?php foreach($rows as $row): ?>
                    <tr>
                        <th><?= $row['id'] ?></th>
                        <th><?= $row['nombreTorneo'] ?></th>
                        <th><?= $row['organizador'] ?></th>
                        <th>
                            <strong>ACCIONES:</strong>
                            <a href="readOneTorneo.php?id=<?= $row['id'] ?>" class="btn btn-primary">
                                <i class="fas fa-eye"></i> Consultar
                            </a>
                            <a href="updateTorneo.php?id=<?= $row['id'] ?>" class="btn btn-success">
                                <i class="fas fa-pencil-alt"></i> Editar
                            </a>
                            <!-- Eliminar registro usando una ventana modal -->
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#idModal<?= $row['id'] ?>">
                                <i class="fas fa-trash"></i> Eliminar
                            </button>

                            <div class="modal fade" id="idModal<?= $row['id'] ?>" tabindex="-1" aria-labelledby="idModal<?= $row['id'] ?>" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="idModal<?= $row['id'] ?>">¿Desea eliminar el torneo?</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cancelar"></button>
                                        </div>
                                        <div class="modal-body">
                                            Esta acción no se puede deshacer.
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                            <a href="deleteTorneo.php?id=<?= $row['id'] ?>" class="btn btn-danger">
                                                <i class="fas fa-check"></i> Eliminar
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </th>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" class="text-center">
                            No hay torneos aún.
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>   

<a href="admin.php" class="btn btn-success mt-3">
    <i class="fas fa-home"></i> Regresar
</a>

<?php
require_once("../admin/template/footer.php");
?>
