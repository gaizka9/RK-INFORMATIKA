<?php
require_once './../config/config.php'; 

class Conexion
{
    protected $mysqli;

    public function conectar()
    {
        try {
            $this->mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
            if ($this->mysqli->connect_errno) {
                throw new Exception('Error en conexión: ' . $this->mysqli->connect_error);
            }
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function cerrarConexion()
    {
        if ($this->mysqli) {
            $this->mysqli->close();
        }
    }
}
?>
