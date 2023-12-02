<?php

// require_once ("../config/config.php");
// require_once ROOT . FOLDER_PATH .'/connection/connect.php';

require_once 'C:/xampp/htdocs/Pesquisa_NPS/connection/connect.php';

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
            $resultQuery = $sqlSelect->fetch(PDO::FETCH_ASSOC);
            return $resultQuery;
        }

        //metodo utilizado no telainicio.php
        function consultaEmail($email){
            $sqlConsultaEmail = $this->connection->query("SELECT * FROM $this->table WHERE email = '$email'");
            $resultQuery = $sqlConsultaEmail;
            return $resultQuery;
        }

        //metodo para realizar o login do ususario na tela home.php
        function login($email, $senha){
            $sqlLogin = $this->connection->query("SELECT * FROM $this->table WHERE email = '$email' and senha = '$senha'");
            $resultQuery = $sqlLogin->fetch(PDO::FETCH_ASSOC);
            return $resultQuery;
        }

        //metodo para consultar TODOS os usuarios e exibir na tela ger_usuario.php
        function consultaUsuarios($nomesearch){
            $sql = $this->connection->query("SELECT * FROM $this->table WHERE nome LIKE '%$nomesearch%' or email LIKE '%$nomesearch%' ORDER BY nome ASC");
            $resultQuery = $sql->fetchall(PDO::FETCH_ASSOC);
            return $resultQuery;
        }

        //metodo para consultar NENHUM usuario e exibir na tela ger_usuario.php
        function consultaUsuarios2(){
            $sql = $this->connection->query("SELECT * FROM $this->table WHERE nome = ''");
            $resultQuery = $sql->fetchall(PDO::FETCH_ASSOC);
            return $resultQuery;
        }

        //Metodo para consultar um usuário por ID no editUsuario.php
        function consultarUsuarioID($id){
            $sql = $this->connection->query("SELECT * FROM $this->table WHERE idusuario = '$id'");
            $resultQuery = $sql->fetchall(PDO::FETCH_ASSOC);
            return $resultQuery;
        }

        // Metodo para editar e atualizar usuarios
        function editarUsuarios($id, $nome, $email, $telefone, $sexo, $data_nasc, $cidade, $estado, $endereco, $perfil){
            $sql = $this->connection->query("UPDATE $this->table SET 
            nome = '$nome',
            email = '$email',
            telefone = '$telefone',
            sexo = '$sexo',
            data_nasc = '$data_nasc',
            cidade = '$cidade',
            estado = '$estado',
            endereco = '$endereco',
            perfil = '$perfil'
        WHERE idusuario = '$id'");
        }

        // Metodo para deletar o usuario selecionado na pag ger_usuario.php conforme a id dele (resgatada no GET_ID)
        function deleteUsuario($id) {
            try {
                    $stmt = $this->connection->prepare("DELETE FROM usuario WHERE idusuario = :id");
                    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

                    $stmt->execute();

                    $rowCount = $stmt->rowCount();

                    if ($rowCount > 0) {
                        return true; // Exclusão bem-sucedida
                    } else {
                        return false; // Nenhuma linha foi afetada, a exclusão falhou
                    }
            } catch (PDOException $e) {
                echo "Erro ao excluir usuário: " . $e->getMessage();
                return false; // Retorna false em caso de falha
            }
        }

        //Metodo para consultar a views 'visao_pesquisa' no BD
        function consultaPesquisa($datainicio, $datafim){
            $sql = $this->connection->query("SELECT * FROM visao_pesquisa WHERE data_pesquisa BETWEEN '$datainicio' AND '$datafim' ORDER BY data_pesquisa ASC, numero_questao ASC");
            $resultQuery = $sql->fetchall(PDO::FETCH_ASSOC);
            return $resultQuery;
        }


}?>