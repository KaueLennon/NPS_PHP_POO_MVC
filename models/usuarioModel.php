<?php

require_once ("../config/config.php");
require_once ROOT . FOLDER_PATH .'/configuration/connect.php';

class UsuarioModel  extends Connect {
    private $table;
    public $nome;
    public $senha;
    public $email;
    public $telefone;
    public $sexo;
    public $data_nasc;
    public $cidade;
    public $estado;
    public $endereco;
    public $perfil;


        //cria o construtc já utilizando o construct do Connect e também já padroniza o Perfil=usuario
        function __construct()
        {
            parent::__construct();
            $this->table = 'usuario';
            $this->perfil = 'usuario';
        }


        // Inicio metodos Getters e Setters
        public function getNome(){
            return $this->nome;
        }

        public function setNome($m){
            $this->nome = $m;
        }

        public function getSenha(){
            return $this->senha;
        }

        public function setSenha($m){
            $this->senha = $m;
        }

        public function getEmail(){
            return $this->email;
        }

        public function setEmail($m){
            $this->email = $m;
        }

        public function getTelefone(){
            return $this->telefone;
        }

        public function setTelefone($m){
            $this->telefone = $m;
        }

        public function getSexo(){
            return $this->sexo;
        }

        public function setSexo($m){
            $this->sexo = $m;
        }

        public function getData_nasc(){
            return $this->data_nasc;
        }

        public function setData_nasc($m){
            $this->data_nasc = $m;
        }

        public function getCidade(){
            return $this->cidade;
        }

        public function setCidade($m){
            $this->cidade = $m;
        }

        public function getEstado(){
            return $this->estado;
        }

        public function setEstado($m){
            $this->estado = $m;
        }

        public function getEndereco(){
            return $this->endereco;
        }

        public function setEndereco($m){
            $this->endereco = $m;
        }

        public function getPerfil(){
            return $this->perfil;
        }

        public function setPerfil($m){
            $this->perfil = $m;
        }
        //Fim getters e setters




        //Metodo para cadastrar usuario no BD
        function cadastrarUsuario($nome, $senha, $email, $telefone, $sexo, $data_nasc, $cidade, $estado, $endereco, $perfil){
            $sqlSelect = $this->connection->query("INSERT INTO $this->table (nome, senha, email, telefone, sexo, data_nasc, cidade, estado,endereco,perfil) VALUES ('$nome', '$senha', '$email', '$telefone', '$sexo', '$data_nasc', '$cidade', '$estado', '$endereco', '$perfil') ");
            $resultQuery = $sqlSelect->fetchAll();
            return $resultQuery;
        }

        //metodo utilizado no telainicio.php
        function consultaEmail($email){
            $sqlConsultaEmail = $this->connection->query("SELECT * FROM $this->table WHERE email = '$email'");
            $resultQuery = $sqlConsultaEmail;
            return $resultQuery;
        }

        function login($email, $senha){
            $sqlLogin = $this->connection->query("SELECT * FROM $this->table WHERE email = '$email' and senha = '$senha'");
            $resultQuery = $sqlLogin->fetch(PDO::FETCH_ASSOC);
            return $resultQuery;
        }
}

?>