<?php
require_once("../config/Database.php");

class UsuariosModel {

    private $db;

    public function __construct(){
        $database = new DataBase();
        $this->db = $database->connect(); // Crear la conexión a la base de datos
    }

    // Crear un nuevo usuario
    public function createUsuario($nombre, $email, $password, $rol){
        $query = "INSERT INTO usuarios (nombre, email, password, rol) VALUES (:nombre, :email, :password, :rol)";
        $stmt = $this->db->prepare($query);

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashedPassword);
        $stmt->bindParam(':rol', $rol);

        return $stmt->execute();
    }

    public function getUsuarioByEmail($email) {
        $query = "SELECT * FROM usuarios WHERE email = :email";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Leer todos los usuarios
    public function getAllUsuarios(){
        try {
            $sql = "SELECT * FROM usuarios";
            $stmt = $this->db->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Error al obtener usuarios: " . $e->getMessage());
        }
    }

    // Leer un usuario por su ID
    public function getUsuarioById($id){
        try {
            $sql = "SELECT * FROM usuarios WHERE id = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Error al obtener el usuario: " . $e->getMessage());
        }
    }

    // Actualizar usuario
    public function updateUsuario($id, $nombre, $email, $password, $rol){
        try {
            $sql = "UPDATE usuarios SET nombre = ?, email = ?, password = ?, rol = ? WHERE id = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$nombre, $email, password_hash($password, PASSWORD_DEFAULT), $rol, $id]);
            return true;
        } catch (PDOException $e) {
            throw new Exception("Error al actualizar usuario: " . $e->getMessage());
        }
    }

    // Eliminar usuario
    public function deleteUsuario($id){
        try {
            $sql = "DELETE FROM usuarios WHERE id = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$id]);
            return true;
        } catch (PDOException $e) {
            throw new Exception("Error al eliminar usuario: " . $e->getMessage());
        }
    }
}
?>
