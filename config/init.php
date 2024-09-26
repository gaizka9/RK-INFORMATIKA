<?php

require_once './../model/modelSelect.php';
require_once './../model/modelInsert.php';
require_once './../model/modelUpdate.php';
require_once './../model/modelDelete.php';
require_once './../view/login.php';
require_once './../view/menu.php';
require_once './../view/headLinks.php';
require_once './../view/sidebar.php';

session_start();

$select = new model_select();
$insert = new model_insert();
$update = new model_update();
$delete = new model_delete();
$view = new view();
$menu = new menu();
$html = new link();
$sidebar = new sidebar();
?>