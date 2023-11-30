<?php

require_once ("../config/config.php");
require_once ROOT . FOLDER_PATH .'/configuration/connect.php';

class PerguntaModel extends Connect {
private $table;
public $pergunta;
public $sequencia;
public $tipo;

    //cria o construtc já utilizando o construct do Connect e também já padroniza o Perfil=usuario
    function __construct()
    {
        parent::__construct();
        $this->table = 'pergunta';
    }


    // Inicio metodos Getters e Setters
    public function getPergunta(){
        return $this->pergunta;
    }

    public function setPergunta($m){
        $this->pergunta = $m;
    }

    public function getSequencia(){
        return $this->sequencia;
    }

    public function setSequencia($m){
        $this->sequencia = $m;
    }

    public function getTipo(){
        return $this->tipo;
    }

    public function setTipo($m){
        $this->tipo = $m;
    }        //Fim getters e setters


    //Criar Metodos abaixo

    //Metodo para consultar todas as perguntas na tabela "Pergunta" no BD
    function consultaPerguntas(){
        $sql = $this->connection->query("SELECT * FROM $this->table ORDER BY sequencia ASC");
        return $sql;
    }

    function consultarIDPergunta($id){
        $sql = $this->connection->query("SELECT * FROM $this->table WHERE id = $id");
        return $sql;
    }

    function atualizarPerguntas($id, $pergunta, $sequencia, $tipo){
        $pergunta = $this->connection->quote($pergunta); // Adiciona aspas e escapa a variável
        $sequencia = $this->connection->quote($sequencia); // Adiciona aspas e escapa a variável
        $tipo = $this->connection->quote($tipo); // Adiciona aspas e escapa a variável
    
        $sql = $this->connection->query("UPDATE $this->table SET 
            pergunta = $pergunta,
            sequencia = $sequencia,
            tipo = $tipo
            WHERE id = $id");
        return $sql;
    }

    function deletePergunta($id){
        $sql = $this->connection->query("DELETE FROM $this->table WHERE id = $id");
        return $sql;
    }

    function adicionarPergunta($pergunta, $tipo, $sequencia){
        $sql = $this->connection->query("INSERT INTO pergunta (pergunta, sequencia, tipo) VALUES ('$pergunta', '$sequencia', '$tipo')");
        return $sql;
    }
    
}?>