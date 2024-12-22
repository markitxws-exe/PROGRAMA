<?php

require_once(__DIR__ . '/../models/torneosModel.php');

/**
 * Controlador para manejar operaciones relacionadas con torneos.
 */

class TorneosController {
    private $model;

    public function __construct() {
        $this->model = new TorneosModel();
    }

    /**
     * Inserta un nuevo torneo.
     */
    public function saveTorneo($nombreTorneo, $organizador, $patrocinadores, $sede, $categoria, $premio1, $premio2, $premio3, $otroPremio, $usuario, $contrasena) {
        $this->model->insert($nombreTorneo, $organizador, $patrocinadores, $sede, $categoria, $premio1, $premio2, $premio3, $otroPremio, $usuario, $contrasena);
    }

    /**
     * Devuelve todos los torneos.
     */
    public function readTorneos() {
        return $this->model->getAll();
    }

    /**
     * Devuelve un torneo por su ID.
     */
    public function readOneTorneo($id) {
        return $this->model->getById($id);
    }

    /**
     * Actualiza un torneo existente.
     */
    public function updateTorneo($id, $nombreTorneo, $organizador, $patrocinadores, $sede, $categoria, $premio1, $premio2, $premio3, $otroPremio) {
        $this->model->update($id, $nombreTorneo, $organizador, $patrocinadores, $sede, $categoria, $premio1, $premio2, $premio3, $otroPremio);
        // Redireccionar después de la actualización
        header("Location: readAllTorneos.php");
        exit(); // Importante para detener la ejecución después de redireccionar
    }
    /**
     * Elimina un torneo por su ID.
     */
    public function deleteTorneo($id) {
        $this->model->delete($id);
    }
    public function delete($id) {
        $this->model->delete($id);
        // Redirigir después de eliminar el torneo
        header("Location: readAllTorneos.php?deleted=1");
        exit();
    }

    /**
     * API REST: Devuelve la información de un equipo en formato JSON.
     */
    public function getEquipoByIdAsJson($id) {
        $this->model->getEquipoByIdAsJson($id);
    }

    /**
     * API REST: Devuelve la información de un jugador en formato JSON.
     */
    public function getJugadorByIdAsJson($id) {
        $this->model->getJugadorByIdAsJson($id);
    }

    /**
     * API REST: Devuelve el standing general en formato JSON.
     */
    public function getStandingAsJson() {
        $this->model->getStandingAsJson();
    }
}
