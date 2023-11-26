<?php

require_once ('config.php');
require_once ROOT . FOLDER_PATH .'/controllers/usuarioController.php';

$obj = new usuarioController;

$obj->sairC();

?>