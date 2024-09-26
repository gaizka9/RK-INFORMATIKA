<?php

require_once 'conection.php'; 

class model_insert extends Conexion
{
    
    public function __construct()
    {
        $this->conectar();
    }

    function insertShare ($id, $idSh) {
        $sql = "INSERT INTO sharedcount (IDUSER, IDShared) VALUES (?, ?)";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param('ii', $id, $idSh);
        $stmt->execute();
        
        $stmt->close();

    }

    function insertAdmin($id) {
        $sql = "INSERT INTO admin (ID) VALUES (?)";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        
        $stmt->close();

    }

    function newUser ($name, $lastname, $username, $email, $password) {
        $sql = "INSERT INTO users (username, name, lastname, password, email) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param('sssss', $username, $name, $lastname, MD5($password), $email);
        $stmt->execute();
        
        $stmt->close();

    }

    function newMoney ($id, $incomes, $expenses) {
        $fechaHoy = date('Y-m-d');
        $sql = "SELECT money, incomes, expenses  FROM account  WHERE IDUSER = ? ORDER by ID DESC LIMIT 1";

            $stmt = $this->mysqli->prepare($sql);
            $stmt->bind_param('i', $id);
            $stmt->execute();
        
            $stmt->bind_result($total, $inc, $exp);
            $stmt->fetch();

           
            $stmt->close();

            $balance = $total + $inc - $exp;

        

        $sql = "INSERT INTO account (iduser, money, incomes, expenses, dates) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param('iddds', $id, $balance, $incomes, $expenses, $fechaHoy);
        $stmt->execute();
        
        $stmt->close();

    }

    public function __destruct()
    {
        $this->cerrarConexion();
    }
}

?>