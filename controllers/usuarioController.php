<?php
echo "usuarioControler Ok";
require_once('../models/usuarioModel.php');

class usuarioController {
    private $model;

    function __construct(){
        $this->model = new UsuarioModel;
    }

    function cadastrarUsuarioC($nome, $senha, $email, $telefone, $sexo, $data_nasc, $cidade, $estado, $endereco, $perfil){
        $resultInsert = $this->model->cadastrarUsuario($nome, $senha, $email, $telefone, $sexo, $data_nasc, $cidade, $estado, $endereco, $perfil);
        header('Location: ../home.php');
    }

    function consultaEmailC($email){
        $result = $this->model->consultaEmail($email);
        return $result;
    }

    function loginC($email, $senha){
        $result = $this->model->login($email, $senha);
        return $result;
    }
}


?>