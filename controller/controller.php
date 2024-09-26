<?php
require_once __DIR__ . './../config/init.php';

$ruta = "./..";

$html->top($ruta);

$userNameTool = $select->toolNameList($_SESSION['id']);
$sidebar->sidebar($userNameTool);


?>
<div class="main-content">
<?php

//################### SHARED ACCOUNT ###################
if (isset($_POST['usuarioID'])){
    #echo "user ID: " . $_SESSION['id'];

    $userNameAccount = $select->nameList($_SESSION['id']);

    
    viewAccount($_POST['usuarioID']);
}

//################### VIEW SHARES ###################
if (isset($_POST['toShare'])) {

    viewShares($_SESSION['id']);
    
}
//-------------------- SHARES BTN ----------------------
if (isset($_POST['sharebtn'])) {
    
    $insert->insertShare($_SESSION['id'], $_POST['sharebtn']);
    
    viewShares($_SESSION['id']);
}
//-------------------- UNSHARES BTN ----------------------
if (isset($_POST['unsharebtn'])) {
    
    $delete->deleteShare($_SESSION['id'], $_POST['unsharebtn']);
    
    viewShares($_SESSION['id']);
}

//################### INCOMES / EXPENSES ###################
if (isset($_POST['incExp'])) {
   
    $menu->enterMoney();
}

if (isset($_POST['submitIncomeExpense'])) {
    $insert->newMoney($_SESSION['id'],  $_POST['income'], $_POST['expense']);

    
    viewAccount($_SESSION['id']);
}

//################### UPDATE USER ###################
if (isset($_POST['upUser'])) {
    $userInfo = $select->userInfo($_SESSION['id']);
    
    $menu->updateUser($userInfo);
}

if (isset($_POST['doUpdate'])) {
    $update->updateUser($_SESSION['id'], $_POST['upusername'], $_POST['upname'], $_POST['uplastname'], $_POST['upemail'], $_POST['uppassword']);

    $userInfo = $select->userInfo($_SESSION['id']);
    
    $menu->updateUser($userInfo);
}

//################### SEND MONEY ###################
if(isset($_POST['sendMoney'])){
    $maxMoney = $select->totalMoney($_SESSION['id']);
    $userNameOption = $select->toolNameList($_SESSION['id']);

    $menu->sendMoney($maxMoney, $userNameOption);
}

if (isset($_POST['submitSendMoney'])) {
    $insert->newMoney($_SESSION['id'], 0.00, $_POST['money']);
    $insert->newMoney($_POST['whom'], $_POST['money'], 0.00);

    viewAccount($_SESSION['id']);
}

//################### ADMIN ###################
if(isset($_POST['hiring'])){
    
    viewAdmins($_SESSION['id']);
}
//-------------------- BECOME ADMIN ----------------------
if(isset($_POST['beAdmin'])){
    $insert->insertAdmin($_POST['beAdmin']);

    viewAdmins($_SESSION['id']);
}
//-------------------- REMOVE ADMIN ----------------------
if(isset($_POST['rmAdmin'])){
    $delete->deleteAdmin($_POST['rmAdmin']);

    viewAdmins($_SESSION['id']);
}

//################### ERASE USER ###################
if(isset($_POST['erasing'])){
    $eraseList = $select->listAdmin();
    
    $menu->eraseUser($eraseList);

}if(isset($_POST['submitErase'])){
    $delete->eraseUser($_POST['whomErase']);
    
    viewAccount($_SESSION['id']);
}



?>
</div>
<?php

$html->buttom($ruta);

function viewShares($id){
    require_once __DIR__ . './../config/init.php';
    global $select, $insert, $update, $delete, $view, $menu;

    $userNameAccount = $select->nameList($id);
    $whomShare = $select->usersToShare($id);

    $menu->sharePanel($userNameAccount,$whomShare);
}

function viewAdmins($id){
    require_once __DIR__ . './../config/init.php';
    global $select, $insert, $update, $delete, $view, $menu;

    
    
    $noIsAdmin= $select->listNoAdmin();
    $isAdmin= $select->listAdmin();

    $menu->promoting($noIsAdmin, $isAdmin);
}

function viewAccount($id){
    require_once __DIR__ . './../config/init.php';
    global $select, $insert, $update, $delete, $view, $menu;

    $userSelect = $select->nameSelect($id);
    $accountArray = $select->getAccount($userSelect);

    $menu->account($accountArray);
}

?>