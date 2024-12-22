<?php
    require_once ("../admin/template/header.php");
    
?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

<div class="card text-center">
  <div class="card-header">
    <i class="fas fa-tachometer-alt"></i> MENÚ
  </div>
  <div class="card-body">
    <h5 class="card-title"></h5>
    <div class="row mb-3">
        <div class="col">
          <div class="card text-center">
            <div class="card-header">
              <i class="fas fa-plus-circle"></i> CREAR TORNEO
            </div>
            <div class="card-body">
              <a href="frmTorneos.php" class="btn btn-primary">
                  <img src="../img/torneos-admin.png" alt="crear un torneo" width="180" height="180 ">
              </a>
            </div>   
          </div>
        </div>
        <div class="col">
          <div class="card text-center">
            <div class="card-header">
              <i class="fas fa-list-ul"></i> LISTA DE TORNEOS
            </div>
            <div class="card-body">
              <a href="readAllTorneos.php" class="btn btn-primary">
                  <img src="../img/lista-torneos-admin.png" alt="Listar torneos." width="180" height="180 ">
              </a>
            </div>
          </div>   
        </div>
    </div>
  </div>
  <div class="card-footer text-body-secondary">
    <i class="fas fa-user-shield"></i> ADMINISTRADOR
  </div>
</div>

<?php
    require_once ("../admin/template/footer.php");
?>
