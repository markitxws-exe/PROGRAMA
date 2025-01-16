<?php
require_once("../models/usuariosModel.php");

class UsuariosController {

    private $usuariosModel;

    public function __construct(){
        $this->usuariosModel = new UsuariosModel();
    }

    // Crear un nuevo usuario
    public function createUsuario($nombre, $email, $password, $rol) {
        return $this->usuariosModel->createUsuario($nombre, $email, $password, $rol);
    }

    public function getUsuarioByEmail($email) {
        return $this->usuariosModel->getUsuarioByEmail($email);
    }

    // Obtener todos los usuarios
    public function getAllUsuarios(){
        try {
            return $this->usuariosModel->getAllUsuarios();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    // Obtener un usuario por su ID
    public function getUsuarioById($id){
        try {
            return $this->usuariosModel->getUsuarioById($id);
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    // Actualizar un usuario
    public function updateUsuario($id, $nombre, $email, $password, $rol){
        try {
            $this->usuariosModel->updateUsuario($id, $nombre, $email, $password, $rol);
            echo "Usuario actualizado con éxito.";
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    // Eliminar un usuario
    public function deleteUsuario($id){
        try {
            $this->usuariosModel->deleteUsuario($id);
            echo "Usuario eliminado con éxito.";
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_GET['action'] ?? '';

    $usuariosController = new UsuariosController();

    // Manejar registro
    if ($action === 'register') {
        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $rol = $_POST['rol'];

        $usuariosController->createUsuario($nombre, $email, $password, $rol);

        header("Location: ../views/admin/frmInicioSesion.php");
        exit();
    }

    // Manejar inicio de sesión
    if ($action === 'login') {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $usuario = $usuariosController->getUsuarioByEmail($email);

        if ($usuario && password_verify($password, $usuario['password'])) {
            session_start();
            $_SESSION['user'] = $usuario;
            header("Location: ../views/index.php");
        } else {
            echo "Credenciales incorrectas";
        }
        exit();
    }
}
?>
