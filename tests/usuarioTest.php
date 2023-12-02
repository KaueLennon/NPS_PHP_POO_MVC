<?php

// require_once ("../config/config.php");
// require_once "C:/xampp/htdocs/Pesquisa_NPS/config/config.php";
require_once 'C:/xampp/htdocs/Pesquisa_NPS/models/usuarioModel.php';
require_once 'C:/xampp/htdocs/Pesquisa_NPS/controllers/usuarioController.php';

use PHPUnit\Framework\TestCase;

class usuarioTest extends TestCase{
    
    public function testConsultaEmailExistente()
    {
        $usuarioModel = new usuarioController();
        $result = $usuarioModel->consultaEmailC('kaue@gmail.com');

        $this->assertInstanceOf(PDOStatement::class, $result); // Modifique conforme o retorno esperado
    }

    // Testa o método consultaEmail com um email inexistente
    public function testConsultaEmailInexistente()
    {
        $usuarioModel = new usuarioController();
        $result = $usuarioModel->consultaEmailC('kaue55@gmail.com');

        $this->assertFalse($result); // Modifique conforme o retorno esperado
    }

}

?>