<?php

require_once ('config.php');
require_once ROOT . FOLDER_PATH .'/controllers/perguntaController.php';

$id = $_GET['id'];

$obj = new perguntaController;

$obj->deletePerguntaC($id);
   

?>