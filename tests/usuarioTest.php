    <?php

    require_once 'C:/xampp/htdocs/Pesquisa_NPS/models/usuarioModel.php';
    require_once 'C:/xampp/htdocs/Pesquisa_NPS/controllers/usuarioController.php';

    use PHPUnit\Framework\TestCase;

    class usuarioTest extends TestCase{
        
        //Testa o método consultaEmail se esta localizando e-mail existente
        public function testConsultaEmailExistente()
        {
            $usuarioModel = new usuarioModel();
            $result = $usuarioModel->consultaEmail('kaue@gmail.com');

            $this->assertInstanceOf(PDOStatement::class, $result); // Modifique conforme o retorno esperado
        }

        
        //Testa o metodo cadastrarUsuario
        public function testCadastrarUsuario() {
            $usuarioModel = new UsuarioModel();
    
            // Dados do usuário para teste
            $nome = "Teste";
            $senha = "1234";
            $email = "teste3@example.com";
            $telefone = "123456789";
            $sexo = "Feminino";
            $data_nasc = "1990-01-01";
            $cidade = "Campo Grande";
            $estado = "Mato Grosso do Sul";
            $endereco = "Rua Marco Feliz, 200";
            $perfil = "usuario";
    
            // Chame o método cadastrarUsuario
            $result = $usuarioModel->cadastrarUsuario($nome, $senha, $email, $telefone, $sexo, $data_nasc, $cidade, $estado, $endereco, $perfil);
    
            // Verifique se o resultado é o esperado
            $this->assertTrue($result);
        }

        public function testEdicaoDeDadosDoUsuario(){
            $usuarioModel = new usuarioModel();

            $email = "teste3@example.com";
            $row = $usuarioModel->consultaEmail($email)->fetch(PDO::FETCH_ASSOC);
            $id = $row['idusuario'];


            // Dados que serão atualizados para o usuario que foi cadastrado no teste anterior -> testCadastrarUsuario().
            $nome = "Novo Nome";
            $email = "teste3@example.com";
            $telefone = "123456789";
            $sexo = "Feminino";
            $data_nasc = "1990-01-01";
            $cidade = "Campo Grande";
            $estado = "Mato Grosso do Sul";
            $endereco = "Rua Marco Feliz, 200";
            $perfil = "administrador";

            $teste = $usuarioModel->editarUsuarios($id, $nome, $email, $telefone, $sexo, $data_nasc, $cidade, $estado, $endereco, $perfil);

            $this->assertTrue($teste);

        }

        //Vefificar se o método para deletar o usuario é true
        public function testDeletarUsuarioPorID(){
            $usuarioModel = new usuarioModel();
            $email = "teste3@example.com";
            $row = $usuarioModel->consultaEmail($email)->fetch(PDO::FETCH_ASSOC);
            $id = $row['idusuario'];
            $result = $usuarioModel->deleteUsuario($id);

            //Verica se o resultado é o esperado
            $this->assertTrue($result);

        }

        public function testLoginSenhaUsuarioCertos(){
            $usuarioModel = new UsuarioModel();
            $email = "kaue@gmail.com";
            $senha = "1234";
            $testeLogin = $usuarioModel->Login($email, $senha);
            $this->assertTrue($testeLogin);
        }

        public function testLoginSenhaUsuarioErrados(){
            $usuarioModel = new UsuarioModel();
            $email = "kaue@yahoo.com";
            $senha = "5555";
            $testeLogin = $usuarioModel->Login($email, $senha);
            $this->assertFalse($testeLogin);
        }

        public function testConsultarUmaPalavraChaveNaTabelaUsuario(){
            $usuarioModel = new UsuarioModel();
            $nomesearch = "Kaue";
            $teste = $usuarioModel->consultaUsuarios($nomesearch);
            $this->assertNotEmpty($teste);

        }

        public function testConsultarVAZIONaTabelaUsuarioParaAConsultaFicarEmBranco(){
            $usuarioModel = new UsuarioModel();
            $teste = $usuarioModel->consultaUsuarios2();
            $this->assertEmpty($teste);

        }

        public function testConsultarNaTabelaUsuarioPorID(){
            $usuarioModel = new UsuarioModel();
            $id = 1;
            $teste = $usuarioModel->consultarUsuarioID($id);
            $this->assertNotEmpty($teste);
        }


}?>