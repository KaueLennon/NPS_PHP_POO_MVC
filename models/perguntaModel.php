<?php

// require_once ("../config/config.php");
// require_once ROOT . FOLDER_PATH .'/connection/connect.php';

require_once 'C:/xampp/htdocs/Pesquisa_NPS/connection/connect.php';

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
            $rowCount = $sql->rowCount();
            return $rowCount > 0;
    }

    function deletePergunta($id){
        try {
            $stmt = $this->connection->prepare("DELETE FROM $this->table WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    
            $stmt->execute();
    
            $rowCount = $stmt->rowCount();
    
            // Retorna true se a exclusão foi bem-sucedida (pelo menos uma linha foi afetada)
            return $rowCount > 0;
        } catch (PDOException $e) {
            // Log do erro em vez de imprimir diretamente
            error_log("Erro ao excluir pergunta: " . $e->getMessage());
    
            // Lançar uma exceção personalizada se necessário
            throw new Exception("Erro ao excluir pergunta", 0, $e);
    
            // Retorna false em caso de falha
            return false;
        }
    }

    function adicionarPergunta($pergunta, $tipo, $sequencia){
        try {
            $stmt = $this->connection->prepare("INSERT INTO $this->table (pergunta, sequencia, tipo) VALUES (:pergunta, :sequencia, :tipo)");
            $stmt->bindParam(':pergunta', $pergunta);
            $stmt->bindParam(':sequencia', $sequencia);
            $stmt->bindParam(':tipo', $tipo);
    
            $stmt->execute();
    
            $rowCount = $stmt->rowCount();

            if($rowCount >0){
                return true;
            } else {
                return false;
            }
            }catch (PDOException $e) {
                // Log do erro em vez de imprimir diretamente
                error_log("Erro ao adicionar pergunta: " . $e->getMessage());
        
                // Lançar uma exceção personalizada se necessário
                throw new Exception("Erro ao adicionar pergunta", 0, $e);
        
                return false; // Retorna false em caso de falha
            }
    }

    function salvarRespostas($resposta, $user, $fk_pergunta, $cod){
        try {
            $stmt = $this->connection->prepare("INSERT INTO resposta (resposta, user, fk_pergunta, cod_pesquisa, data_pesquisa) VALUES (:resposta, :user, :fk_pergunta, :cod, NOW())");

            $stmt->bindValue(':resposta', $resposta, PDO::PARAM_STR);
            $stmt->bindValue(':user', $user, PDO::PARAM_STR);
            $stmt->bindValue(':fk_pergunta', $fk_pergunta, PDO::PARAM_INT);
            $stmt->bindValue(':cod', $cod, PDO::PARAM_INT);

            $stmt->execute();
            
            return true;
        } catch (PDOException $e) {
            echo "Erro ao inserir respostas: " . $e->getMessage();
            return false;
        }
    }

    function consultaRegras(){
    $sql = $this->connection->query("SELECT * FROM regra ORDER BY pergunta ASC");
    return $sql;
    }

    public function getLastInsertId() {
        return $this->connection->lastInsertId($this->table);
    }

    
}?>