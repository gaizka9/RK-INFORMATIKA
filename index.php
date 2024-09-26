<?php

require_once './view/login.php';
require_once './view/headLinks.php';

$view = new view();
$html = new link();

session_start();
$_SESSION['attempts'] = 3;

$html->top(".");

$view->login(".");

$html->buttom(".");
?>