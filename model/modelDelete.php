<?php

require_once 'conection.php'; 

class model_delete extends Conexion
{
    
    public function __construct()
    {
        $this->conectar();
    }


     function deleteShare ($id, $idSh) {
        $sql = "DELETE FROM sharedcount WHERE IDUSER = ? and IDShared = ?";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param('ii', $id, $idSh);
        $stmt->execute();
        
        $stmt->close();

    }

    function deleteAdmin ($id) {
        $sql = "DELETE FROM admin WHERE ID = ?";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        
        $stmt->close();

    }

    function eraseUser($id) {
        // Eliminar de la tabla 'users'
        $sql1 = "DELETE FROM users WHERE ID = ?";
        $stmt = $this->mysqli->prepare($sql1);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $stmt->close();
    
        // Eliminar de la tabla 'account'
        $sql2 = "DELETE FROM account WHERE iduser = ?";
        $stmt = $this->mysqli->prepare($sql2);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $stmt->close();
    
        // Eliminar de la tabla 'sharedcount'
        $sql3 = "DELETE FROM sharedcount WHERE iduser = ? OR IDShared = ?";
        $stmt = $this->mysqli->prepare($sql3);
        $stmt->bind_param('ii', $id, $id);
        $stmt->execute();
        $stmt->close();
    }


    public function __destruct()
    {
        $this->cerrarConexion();
    }
}

?>