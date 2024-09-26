<?php

require_once 'conection.php'; 

class model_update extends Conexion
{
    
    public function __construct()
    {
        $this->conectar();
    }


    function updateUser ($id, $username, $name, $lastname, $email, $pasword) {
        $sql = "UPDATE users SET username = ?, name = ?, lastname = ?, email = ?, password = ? WHERE id = ?";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param('sssssi', $username, $name, $lastname, $email, MD5($pasword), $id);
        $stmt->execute();
        
        $stmt->close();
    }


    public function __destruct()
    {
        $this->cerrarConexion();
    }
}

?>