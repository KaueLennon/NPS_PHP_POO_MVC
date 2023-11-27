<?php

require_once ('config.php');
require_once ROOT . FOLDER_PATH .'/controllers/usuarioController.php';

$id = $_GET['id'];

$obj = new usuarioController;

$obj->deleteUsuarioC($id);

?>