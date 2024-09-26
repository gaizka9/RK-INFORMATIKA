
<?php
require_once __DIR__ . './../config/init.php';

$ruta = "./..";

$html->top($ruta);

//################### LOGIN ###################

//-------------------- SIGN IN ----------------------

if (isset($_POST['loginbutton'])) {
    
    $usuario = $_POST['name'];
    $contrasena = $_POST['psw'];

    if ($select->validarSesion($usuario, $contrasena)) {

        $_SESSION['id'] = $select->getID($usuario);
        
        $userNameTool = $select->toolNameList($_SESSION['id']);
        $accountArray = $select->getAccount($usuario);
        $userNameAccount = $select->nameList($_SESSION['id']);

        if ($select->adminFind ($_SESSION['id'])){
            $_SESSION['admin'] = true;
        }else{
            $_SESSION['admin'] = false;
        }

        $sidebar->sidebar($userNameTool);
        
        echo '<div class="main-content">';
        
            $menu->account($accountArray);
        
        echo '</div>';
        

    } else {
        if ($_SESSION['attempts'] > 1) {

            $_SESSION['attempts'] -= 1;
            $view->login($ruta);
        }else{
            

            $view->loginBlocked();
            $view->errorWait();
        }
        
    }
}
//-------------------- SIGN up ----------------------
if (isset($_POST['createbutton'])) {
    
    $insert->newUser($_POST['crname'], $_POST['crlastname'], $_POST['crusername'], $_POST['cremail'], $_POST['crpassword']);
    
    $_SESSION['attempts'] = 3;
    $view->login($ruta);
}

//################### LOGOUT ###################
if (isset($_POST['logoutbutton'])) {
    $_SESSION['attempts'] = 3;
    $_SESSION['id'] = null;
    $view->login($ruta);
}

$html->buttom($ruta);
?>
