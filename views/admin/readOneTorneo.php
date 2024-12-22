<?php
require_once("../admin/template/header.php");
require_once("../../controllers/torneosController.php");

// Instanciamos un objeto del controlador de torneos
$objTorneosController = new torneosController();
// Capturar el id y a su vez sacar la informacion del torneo.
$lstTorneo = $objTorneosController->readOneTorneo($_GET['id']);
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

    .form-control {
        background-color: #2b2b2b;
        color: #ffffff;
        border: 1px solid #555;
    }

    .form-text {
        color: #cccccc;
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
    .bajo img {
      width: 150px; /* Tamaño del logo */
        margin-bottom: 20px;
        color: #f8f9fa;
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

<div class="mx-auto p-5"> 
    <div class="card">
        <div class="card-header">
            <i class="fas fa-info-circle"></i> INFORMACION DEL TORNEO
        </div>
        <div class="card-body">
            <form action="torneosInsert.php" method="post">
                <div class="mb-3">
                    <label for="nombreTorneo" class="form-label">NOMBRE DEL TORNEO (ID: <?= $lstTorneo['id'] ?>)</label> 
                    <input type="text" class="form-control" name="txtNombreTorneo" id="nombreTorneo" value="<?= $lstTorneo['nombreTorneo'] ?>" readonly>
                </div>
                <div class="mb-3">
                    <label for="organizador" class="form-label">ORGANIZADOR (nombre completo)</label>
                    <input type="text" name="txtOrganizador" id="organizador" class="form-control" value="<?= $lstTorneo['organizador'] ?>" readonly>
                </div>
                <div class="mb-3">
                    <label for="patrocinador" class="form-label">PATROCINADOR (ES)</label> 
                    <textarea name="txtPatrocinador" id="patrocinador" cols="30" rows="2" class="form-control" readonly><?= $lstTorneo['patrocinadores'] ?></textarea>
                    <span id="patrocinador" class="form-text">
                        ATENCION!!!: se puede separar con "," si hay más de un patrocinador.
                    </span>
                </div>
                <div class="row">
                    <div class="col-12 mb-3">
                        <label for="sede" class="form-label">SEDE (cancha)</label>
                        <input type="text" name="txtOrganizador" id="sede" class="form-control" value="<?= $lstTorneo['sede'] ?>" readonly>
                    </div>
                    <div class="col-12 mb-3">
                        <label for="categoria" class="form-label">CATEGORIA</label>
                        <input list="lstCategorias" name="txtCategoria" id="categoria" class="form-control" value="<?= $lstTorneo['categoria'] ?>" readonly> 
                        <datalist id="lstCategorias">
                            <option value="1ra. fuerza">
                            <option value="2da. fuerza">
                            <option value="Veteranos">
                            <option value="Libre">
                            <option value="Juvenil">
                            <option value="Femenil">
                            <option value="Empresarial">
                            <option value="Infantil">
                            <option value="Minibasket">
                        </datalist>
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="premio1" class="form-label">PREMIO 1ER. LUGAR</label>
                        <input type="text" name="txtPremio1" id="premio1" class="form-control" value="<?= $lstTorneo['premio1'] ?>" readonly>
                    </div>
                    <div class="col mb-3">
                        <label for="premio2" class="form-label">PREMIO 2DO. LUGAR</label>
                        <input type="text" name="txtPremio2" id="premio2" class="form-control" value="<?= $lstTorneo['premio2'] ?>" readonly>   
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="premio3" class="form-label">PREMIO 3ER. LUGAR</label>
                        <input type="text" name="txtPremio3" id="premio3" class="form-control" value="<?= $lstTorneo['premio3'] ?>" readonly>
                    </div>
                    <div class="col mb-3">
                        <label for="otroPremio" class="form-label">OTRO PREMIO (CAMPEÓN CANASTERO)</label>
                        <input type="text" name="txtOtropremio" id="otroPremio" class="form-control" value="<?= $lstTorneo['otroPremio'] ?>" readonly>   
                    </div>
                </div>

                <!-- USUARIO Y CONTRASEÑA PARA EL ORGANIZADOR DEL TORNEO-->
                <div class="row">
                    <div class="col mb-3">
                        <label for="usuario" class="form-label">USUARIO</label>
                        <input type="text" name="txtUsuario" id="usuario" class="form-control" value="<?= $lstTorneo['usuario'] ?>" readonly>
                    </div>
                    <div class="col mb-3">
                        <label for="contrasena" class="form-label">CONTRASEÑA</label>
                        <input type="text" name="txtcontrasena" id="contrasena" class="form-control" value="<?= $lstTorneo['contrasena'] ?>" readonly>   
                    </div>
                </div>

                <div class="col-12">
                    <a href="readAllTorneos.php" class="btn btn-success">
                        <i class="fas fa-arrow-left"></i> REGRESAR
                    </a>
                </div>
            </form>
        </div>
        <div class="card-footer text-body-secondary">
            <i class="fas fa-cogs"></i> DETALLES DEL TORNEO
        </div>
    </div>
</div>                    

<?php
require_once("../admin/template/footer.php");
?>
