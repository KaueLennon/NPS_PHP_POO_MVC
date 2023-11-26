<?php

require_once ("../config/config.php");
require_once ROOT . FOLDER_PATH .'/models/usuarioModel.php';

class usuarioController {
    private $model;

    function __construct(){
        $this->model = new UsuarioModel;
    }

    function cadastrarUsuarioC($nome, $senha, $email, $telefone, $sexo, $data_nasc, $cidade, $estado, $endereco, $perfil){
        $resultInsert = $this->model->cadastrarUsuario($nome, $senha, $email, $telefone, $sexo, $data_nasc, $cidade, $estado, $endereco, $perfil);
        header('Location: ./home.php');
    }

    // Metodo utilizado no telainicio.php
    function consultaEmailC($email){
        $result = $this->model->consultaEmail($email);
        return $result;
    }


    //Metodo para logar o usuario
    function loginC($email, $senha){
        $result = $this->model->login($email, $senha);
        session_start();
        if(!$result){
            unset($_SESSION['email']);
            unset($_SESSION['senha']);
            header('Location: ../views/home.php');
        }else {
            $_SESSION['email'] = $email;
            header('Location: ../views/telainicio.php');
        }
    }


    //Metodo para deslogar o usuario
    function sairC(){
        session_start();
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header('Location: ../views/home.php');
    }
}


?>