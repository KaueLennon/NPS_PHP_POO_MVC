    <?php

    require_once 'C:/xampp/htdocs/Pesquisa_NPS/models/perguntaModel.php';
    require_once 'C:/xampp/htdocs/Pesquisa_NPS/controllers/perguntaController.php';

    use PHPUnit\Framework\TestCase;

    class perguntaTest extends TestCase{
        
        public function test_Consulta_ao_BD_De_Todas_Perguntas(){
            $obj = new perguntaModel;
            $teste = $obj->consultaPerguntas();
            // $this->assertNotEmpty($teste);
            $this->assertInstanceOf(PDOStatement::class, $teste);
        }

        public function test_Consultar_Pergunta_Por_ID(){
            $obj = new perguntaModel;
            $id = '1';
            $teste = $obj->consultarIDPergunta($id);
            $this->assertInstanceOf(PDOStatement::class, $teste);
        }

        public function test_Adicionar_Atulaizar_e_Deletar_Perguntas(){
             // Adicionando pergunta nova
            $obj = new perguntaModel;
            $pergunta = "Pergunta teste";
            $tipo = "ABERTA";
            $sequencia = '99';
            $teste = $obj->adicionarPergunta($pergunta, $tipo, $sequencia);
            //teste para verificar se pergunta foi adicionada = true
            $this->assertTrue($teste);

            // Recuperar a ID da pergunta recém-adicionada
            $idPergunta = $obj->getLastInsertId();

            // Atualizando a pergunta que foi adicionada com base na ID recuperada no getLastInsertId()
            $perguntaAtualizada = "Pergunta atualizada";
            $sequenciaAtualizada = '100';
            $tipoAtualizado = "FECHADA";

            $testeAtualizacao = $obj->atualizarPerguntas($idPergunta, $perguntaAtualizada, $sequenciaAtualizada, $tipoAtualizado);

            //teste para verificar se pergunta foi atualizada
            $this->assertTrue($testeAtualizacao);

            //
            $testeDelete = $obj->deletePergunta($idPergunta);
            $this->assertTrue($testeDelete);

        }

        public function test_Salvar_as_Respostas(){
            $obj = new perguntaModel;
            $resposta = 'teste'; 
            $user = 'teste@gmail.com';
            $fk_pergunta = 1;
            $cod = time();
            $teste = $obj->salvarRespostas($resposta, $user, $fk_pergunta, $cod);
            $this->assertTrue($teste);
        }

}
?>