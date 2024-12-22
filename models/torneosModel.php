<?php

require_once(__DIR__ . '/../config/DataBase.php');

/**
 * Modelo para manejar operaciones relacionadas con torneos, equipos y jugadores.
 */
class TorneosModel {
    private $PDO;

    public function __construct() {
        $connection = new Database();
        $this->PDO = $connection->connect();
    }

    /**
     * Inserta un nuevo torneo en la base de datos.
     */
    public function insert($nombreTorneo, $organizador, $patrocinadores, $sede, $categoria, $premio1, $premio2, $premio3, $otroPremio, $usuario, $contrasena) {
        $sql = "INSERT INTO torneos (nombreTorneo, organizador, patrocinadores, sede, categoria, premio1, premio2, premio3, otroPremio, usuario, contrasena)
                VALUES (:nombreTorneo, :organizador, :patrocinadores, :sede, :categoria, :premio1, :premio2, :premio3, :otroPremio, :usuario, :contrasena)";
        $stmt = $this->PDO->prepare($sql);
    
        // Crear una variable para el hash de la contraseña
        $hashedPassword = password_hash($contrasena, PASSWORD_DEFAULT);
    
        // Bind de parámetros
        $stmt->bindParam(":nombreTorneo", $nombreTorneo);
        $stmt->bindParam(":organizador", $organizador);
        $stmt->bindParam(":patrocinadores", $patrocinadores);
        $stmt->bindParam(":sede", $sede);
        $stmt->bindParam(":categoria", $categoria);
        $stmt->bindParam(":premio1", $premio1);
        $stmt->bindParam(":premio2", $premio2);
        $stmt->bindParam(":premio3", $premio3);
        $stmt->bindParam(":otroPremio", $otroPremio);
        $stmt->bindParam(":usuario", $usuario);
        $stmt->bindParam(":contrasena", $hashedPassword);
    
        return $stmt->execute();
    }
    public function getById($id) {
        $sql = "SELECT * FROM torneos WHERE id = :id";
        $stmt = $this->PDO->prepare($sql);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function delete($id) {
        $sql = "DELETE FROM torneos WHERE id = :id";
        $stmt = $this->PDO->prepare($sql);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
    

    /**
     * Obtiene todos los torneos.
     */
    public function getAll() {
        $sql = "SELECT * FROM torneos";
        $stmt = $this->PDO->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Obtiene la información de un equipo por su ID.
     */
    public function getEquipoById($id) {
        $sql = "SELECT * FROM equipos WHERE id = :id";
        $stmt = $this->PDO->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Obtiene la información de un jugador por su ID.
     */
    public function getJugadorById($id) {
        $sql = "SELECT * FROM jugadores WHERE id = :id";
        $stmt = $this->PDO->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Obtiene el standing general del torneo.
     */
    public function getStanding() {
        $sql = "SELECT * FROM standing ORDER BY puntos DESC";
        $stmt = $this->PDO->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * API REST: Devuelve información de un equipo en formato JSON.
     */
    public function getEquipoByIdAsJson($id) {
        header("Content-Type: application/json");
        echo json_encode($this->getEquipoById($id));
    }

    /**
     * API REST: Devuelve información de un jugador en formato JSON.
     */
    public function getJugadorByIdAsJson($id) {
        header("Content-Type: application/json");
        echo json_encode($this->getJugadorById($id));
    }

    /**
     * API REST: Devuelve el standing general en formato JSON.
     */
    public function getStandingAsJson() {
        header("Content-Type: application/json");
        echo json_encode($this->getStanding());
    }
}
