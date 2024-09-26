<?php

require_once 'conection.php'; 

class model_select extends Conexion
{
    
    public function __construct()
    {
        $this->conectar();
    }

    public function validarSesion($usuario, $contrasena) {
        $sql = "SELECT ID FROM users WHERE username = ? and password = ?";
        $stmt = $this->mysqli->prepare($sql);
        
        $stmt->bind_param('ss', $usuario, MD5($contrasena));
        $stmt->execute();
        $stmt->store_result();

        if($stmt->num_rows > 0){
            return true;
        }else{
            return false;
        }
    }

    public function getID($usuario) {
        $sql = "SELECT ID FROM users WHERE username = ?";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param('s', $usuario);
        $stmt->execute();
        $stmt->bind_result($id);

        $stmt->fetch();
        $stmt->close();
            return $id;

    }

    public function getAccount($usuario) {
        $sql = "SELECT ID FROM users WHERE username = ?";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param('s', $usuario);
        $stmt->execute();
        $stmt->bind_result($id);
        
        if ($stmt->fetch()) {
            $stmt->close();

            session_start();
            $id;
            
            $sql = "SELECT dates, money, incomes, expenses FROM account WHERE iduser = ?";
            $stmt = $this->mysqli->prepare($sql);
            $stmt->bind_param('i', $id);
            $stmt->execute();
            
            $stmt->bind_result($dates, $money, $incomes, $expenses);
            
            $resultArray = [];
            
            while ($stmt->fetch()) {
                $resultArray[] = [
                    'dates' => $dates,
                    'money' => $money,
                    'incomes' => $incomes,
                    'expenses' => $expenses
                ];
            }
            $stmt->close();
            
            return $resultArray;
        } else {
            return null;
        }
    }

    public function toolNameList($UserID) {
        $sql = "SELECT u.ID, u.USERNAME
                FROM sharedcount s
                JOIN users u ON s.IDUSER = u.ID
                WHERE s.IDShared = ?
                ORDER BY u.USERNAME ASC";

            $stmt = $this->mysqli->prepare($sql);
            $stmt->bind_param('i', $UserID);
            $stmt->execute();
            
            $stmt->bind_result($id, $name);
            
            $resultArray = [];
            
            while ($stmt->fetch()) {
                $resultArray[] = [
                    'id' => $id,
                    'name' => $name,
                ];
            }

            $stmt->close();
            return $resultArray;
    }

    public function NameToErase($UserID) {

        $idList = implode(',', array_map('intval', $this->idAdmin($UserID)));

        $sql = "SELECT ID, USERNAME
                FROM users 
                WHERE ID != ?
                ORDER BY USERNAME ASC";

            $stmt = $this->mysqli->prepare($sql);
            $stmt->bind_param('i', $UserID);
            $stmt->execute();
            
            $stmt->bind_result($id, $name);
            
            $resultArray = [];
            
            while ($stmt->fetch()) {
                $resultArray[] = [
                    'id' => $id,
                    'name' => $name,
                ];
            }

            $stmt->close();
            return $resultArray;
    }

    public function nameList($UserID) {
        $sql = "SELECT u.ID, u.USERNAME
                FROM sharedcount s
                JOIN users u ON s.IDShared = u.ID
                WHERE s.IDUSER = ?
                ORDER BY u.USERNAME ASC";

            $stmt = $this->mysqli->prepare($sql);
            $stmt->bind_param('i', $UserID);
            $stmt->execute();
            
            $stmt->bind_result($id, $name);
            
            $resultArray = [];
            
            while ($stmt->fetch()) {
                $resultArray[] = [
                    'id' => $id,
                    'name' => $name,
                ];
            }

            $stmt->close();
            return $resultArray;
    }

    public function idAdmin() {
        $sql = "SELECT ID FROM admin ";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->execute();
        $stmt->bind_result($id);

        $ids = [];
        while ($stmt->fetch()) {
            $ids[] = $id;
        }
        $stmt->close();
        return $ids;
    }

    public function listNoAdmin() {
        $idList = implode(',', array_map('intval', $this->idAdmin()));

    $sql = "SELECT id, username FROM users WHERE id IN ($idList) ORDER BY USERNAME ASC";
    
    $stmt = $this->mysqli->prepare($sql);
    if (!$stmt) {
        die('Error al preparar la consulta: ' . $this->mysqli->error);
    }
    $stmt->execute();
    $stmt->bind_result($id, $name);
    
    $resultArray = [];
    
    while ($stmt->fetch()) {
        $resultArray[] = [
            'id' => $id,
            'name' => $name,
        ];
    }
    
    $stmt->close();
    
    return $resultArray;

    }

    public function listAdmin() {
        $idList = implode(',', array_map('intval', $this->idAdmin()));

    $sql = "SELECT id, username FROM users WHERE id NOT IN ($idList) ORDER BY USERNAME ASC";
    
    $stmt = $this->mysqli->prepare($sql);
    if (!$stmt) {
        die('Error al preparar la consulta: ' . $this->mysqli->error);
    }
    $stmt->execute();
    $stmt->bind_result($id, $name);
    
    $resultArray = [];
    
    while ($stmt->fetch()) {
        $resultArray[] = [
            'id' => $id,
            'name' => $name,
        ];
    }
    
    $stmt->close();
    
    return $resultArray;

    }

    public function nameSelect($id) {
        $sql = "SELECT username FROM users WHERE id = ?";
            $stmt = $this->mysqli->prepare($sql);
            $stmt->bind_param('i', $id);
            $stmt->execute();
        
            $stmt->bind_result($username);
            $stmt->fetch();
            $stmt->close();
            return $username;
    }


    public function getLasIDs($UserID) {
        $sql = "SELECT IDShared FROM sharedcount WHERE IDUSER = ?";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param('i', $UserID);
        $stmt->execute();
        $stmt->bind_result($id);

        $ids = [];
        while ($stmt->fetch()) {
            $ids[] = $id;
        }
        array_push($ids, $UserID);
        $stmt->close();
        return $ids;
    }

    public function usersToShare($UserID) {

        $idList = implode(',', array_map('intval', $this->getLasIDs($UserID)));

    $sql = "SELECT id, username FROM users WHERE id NOT IN ($idList) ORDER BY USERNAME ASC";
    
    $stmt = $this->mysqli->prepare($sql);
    if (!$stmt) {
        die('Error al preparar la consulta: ' . $this->mysqli->error);
    }
    $stmt->execute();
    $stmt->bind_result($id, $name);
    
    $resultArray = [];
    
    while ($stmt->fetch()) {
        $resultArray[] = [
            'id' => $id,
            'name' => $name,
        ];
    }
    
    $stmt->close();
    
    return $resultArray;

    }

    function userInfo($id) {
        $sql = "SELECT username, name, lastname, email FROM users WHERE id = ?";
        $stmt = $this->mysqli->prepare($sql);
    
        if (!$stmt) {
            die('Error al preparar la consulta: ' . $this->mysqli->error);
        }
    
        $stmt->bind_param('i', $id); 
        $stmt->execute();
        $stmt->bind_result($username, $name, $lastname, $email);
    
        $infoArray = [];
    
        while ($stmt->fetch()) {
            $infoArray = [
                'username' => $username,
                'name' => $name,
                'lastname' => $lastname,
                'email' => $email
            ];
        }
    
        $stmt->close();
    
        return $infoArray;
    }

    function totalMoney ($id) {
        $sql = "SELECT money, incomes, expenses  FROM account  WHERE IDUSER = ? ORDER by ID DESC LIMIT 1";

            $stmt = $this->mysqli->prepare($sql);
            $stmt->bind_param('i', $id);
            $stmt->execute();
        
            $stmt->bind_result($total, $inc, $exp);
            $stmt->fetch();

            $stmt->close();

            $balance = $total + $inc - $exp;
            return $balance;
    }


    function adminFind ($id) {
            $sql = "SELECT ID  FROM admin  WHERE ID = ?";

                $stmt = $this->mysqli->prepare($sql);
                $stmt->bind_param('i', $id);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    $stmt->close();
                    return true;
                } else {
                    $stmt->close();
                    return false;
                }
        }


    
    public function __destruct()
    {
        $this->cerrarConexion();
    }
}

?>

