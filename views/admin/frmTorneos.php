<?php
require_once("../admin/template/header.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Torneo</title>
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

<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <i class="fas fa-trophy"></i> CAPTURAR LA INFORMACIÓN DEL TORNEO
            </div>
            <div class="card-body">
                <form action="torneosInsert.php" method="post">
                    <div class="mb-3">
                        <label for="nombreTorneo" class="form-label"><i class="fas fa-futbol"></i> NOMBRE DEL TORNEO</label>
                        <input type="text" class="form-control" name="txtNombreTorneo" id="nombreTorneo" placeholder="Ingrese el nombre del torneo">
                    </div>

                    <div class="mb-3">
                        <label for="organizador" class="form-label"><i class="fas fa-users"></i> ORGANIZADOR (nombre completo)</label>
                        <input type="text" name="txtOrganizador" id="organizador" class="form-control" placeholder="Ingrese el nombre del organizador">
                    </div>

                    <div class="mb-3">
                        <label for="patrocinadores" class="form-label"><i class="fas fa-handshake"></i> PATROCINADOR (ES)</label>
                        <textarea name="txtPatrocinador" id="patrocinadores" cols="30" rows="2" class="form-control" placeholder="Ingrese los patrocinadores"></textarea>
                        <span class="form-text text-light">
                            ATENCIÓN: Separe con "," si hay más de un patrocinador.
                        </span>
                    </div>

                    <div class="mb-3">
                        <label for="sede" class="form-label"><i class="fas fa-map-marker-alt"></i> SEDE (cancha)</label>
                        <input type="text" name="txtSede" id="sede" class="form-control" placeholder="Ingrese la sede">
                    </div>

                    <div class="mb-3">
                        <label for="categoria" class="form-label"><i class="fas fa-cogs"></i> CATEGORÍA</label>
                        <input list="lstCategorias" name="txtCategoria" id="categoria" class="form-control" placeholder="Seleccione la categoría">
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
                    <div class="row">
            <div class="col mb-3">
                <label for="premio1" class="form-label"><i class="fas fa-gift"></i> PREMIO 1ER. LUGAR</label>
                <input type="text" name="txtPremio1" id="premio1" class="form-control">
            </div>
            <div class="col mb-3">
                <label for="premio2" class="form-label"><i class="fas fa-gift"></i> PREMIO 2DO. LUGAR</label>
                <input type="text" name="txtPremio2" id="premio2" class="form-control">   
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label for="premio3" class="form-label"><i class="fas fa-gift"></i> PREMIO 3ER. LUGAR</label>
                <input type="text" name="txtPremio3" id="premio3" class="form-control">
            </div>
            <div class="col mb-3">
                <label for="otroPremio" class="form-label"><i class="fas fa-gift"></i> OTRO PREMIO (CAMPEON CANASTERO)</label>
                <input type="text" name="txtOtroPremio" id="otroPremio" class="form-control">   
            </div>
        </div>

        <!-- USUARIO Y CONTRASEÑA PARA EL ORGANIZADOR DEL TORNEO-->
        <div class="row">
            <div class="col mb-3">
                <label for="usuario" class="form-label"><i class="fas fa-user"></i> USUARIO</label>
                <input type="text" name="txtUsuario" id="usuario" class="form-control">
            </div>
            <div class="col mb-3">
                <label for="contrasena" class="form-label"><i class="fas fa-lock"></i> CONTRASEÑA</label>
                <input type="password" name="txtContrasena" id="contrasena" class="form-control">   
            </div>
        </div>



                    <div class="row">
                        <div class="col mb-3">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Guardar</button>
                            <a href="../index.php" class="btn btn-danger"><i class="fas fa-close"></i> Cancelar</a>
                            <a href="../index.php" class="btn btn-success"><i class="fas fa-home"></i> Regresar</a>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-footer text-center">
                <p class="mb-0">&copy; <?php echo date("Y"); ?> Sistema de Torneos. Todos los derechos reservados.</p>
            </div>
        </div>
    </div>

<?php
require_once("../admin/template/footer.php");
?>
</body>
</html>
