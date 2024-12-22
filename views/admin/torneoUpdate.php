<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once("../../controllers/torneosController.php");
require_once("template/header.php");

// Instancia del controlador
$controller = new TorneosController();
$torneo = null;

// Verificar si el id está presente en la URL
if (isset($_GET['id'])) {
    $torneo = $controller->readOneTorneo($_GET['id']);
}

// Verificar si el formulario fue enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener datos del formulario
    $id = isset($_POST['id']) ? $_POST['id'] : null;
    $nombreTorneo = isset($_POST['txtNombreTorneo']) ? $_POST['txtNombreTorneo'] : '';
    $organizador = isset($_POST['txtOrganizador']) ? $_POST['txtOrganizador'] : '';
    $patrocinadores = isset($_POST['txtPatrocinadores']) ? $_POST['txtPatrocinadores'] : '';
    $sede = isset($_POST['txtSede']) ? $_POST['txtSede'] : '';
    $categoria = isset($_POST['txtCategoria']) ? $_POST['txtCategoria'] : '';
    $premio1 = isset($_POST['txtPremio1']) ? $_POST['txtPremio1'] : '';
    $premio2 = isset($_POST['txtPremio2']) ? $_POST['txtPremio2'] : '';
    $premio3 = isset($_POST['txtPremio3']) ? $_POST['txtPremio3'] : '';
    $otroPremio = isset($_POST['txtOtroPremio']) ? $_POST['txtOtroPremio'] : '';
    $usuario = isset($_POST['txtUsuario']) ? $_POST['txtUsuario'] : '';
    $contrasena = isset($_POST['txtContrasena']) ? $_POST['txtContrasena'] : '';

    // Validar campos obligatorios
    if (!empty($nombreTorneo) && !empty($organizador) && !empty($sede) && !empty($categoria)) {
        $controller->updateTorneo($id, $nombreTorneo, $organizador, $patrocinadores, $sede, $categoria, $premio1, $premio2, $premio3, $otroPremio);
        echo "<div class='alert alert-success'>Torneo actualizado correctamente.</div>";
    } else {
        echo "<div class='alert alert-danger'>Por favor, completa todos los campos obligatorios.</div>";
    }
}
?>

<div class="container mt-5">
    <h2 class="text-center mb-4">Actualizar Torneo</h2>
    <?php if ($torneo): ?>
        <form method="POST" action="">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($torneo['id']); ?>">

            <div class="mb-3">
                <label class="form-label">Nombre del Torneo</label>
                <input type="text" class="form-control" name="txtNombreTorneo" value="<?php echo htmlspecialchars($torneo['nombreTorneo']); ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Organizador</label>
                <input type="text" class="form-control" name="txtOrganizador" value="<?php echo htmlspecialchars($torneo['organizador']); ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Sede</label>
                <input type="text" class="form-control" name="txtSede" value="<?php echo htmlspecialchars($torneo['sede']); ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Categoría</label>
                <input type="text" class="form-control" name="txtCategoria" value="<?php echo htmlspecialchars($torneo['categoria']); ?>" required>
            </div>

            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Actualizar
                </button>
                <a href="readAllTorneos.php" class="btn btn-secondary">
                    <i class="fas fa-times"></i> Cancelar
                </a>
            </div>
        </form>
    <?php else: ?>
        <div class="alert alert-danger text-center">No se encontró el torneo. Verifica el ID proporcionado.</div>
        <div class="text-center">
            <a href="readAllTorneos.php" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Volver a la Lista de Torneos
            </a>
        </div> 
    <?php endif; ?>
</div>

<?php require_once("template/footer.php"); ?>
