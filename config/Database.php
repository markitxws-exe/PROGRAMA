<?php
    /**
     * Clase que maneja la conexión a la base de datos.
     */
    class DataBase {

        /**
         * @var string $host Dirección del servidor de base de datos.
         */
        private $host = "practicas.fimaz.uas.edu.mx";

        /**
         * @var string $db Nombre de la base de datos.
         */
        private $db = "lisi4132_torneos";

        /**
         * @var string $user Nombre de usuario para la base de datos.
         */
        private $user = "lisi4132";

        /**
         * @var string $password Contraseña del usuario de la base de datos.
         */
        private $password = "lisi4132";

        /**
         * Constructor de la clase DataBase.
         * Inicializa una nueva instancia de la clase sin necesidad de parámetros.
         */
        public function __construct()
        {
            //constructor
        }

        /**
         * Establece la conexión con la base de datos utilizando PDO.
         *
         * @return PDO|string Objeto PDO si la conexión es exitosa, mensaje de error en caso contrario.
         */
        public function connect(){
            try {
                $PDO = new PDO("mysql:host={$this->host};dbname={$this->db}", $this->user, $this->password);
                $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $PDO;
            } catch (PDOException $e) {
                throw new Exception("Error al conectar con la base de datos: " . $e->getMessage());
            }
        }
    }

?>
