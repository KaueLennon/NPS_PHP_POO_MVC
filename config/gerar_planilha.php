<?php
session_start();
require_once '../config/config.php';
require_once ROOT . FOLDER_PATH .'/models/usuarioModel.php';
require_once ROOT . FOLDER_PATH .'/controllers/usuarioController.php';

$obj = new usuarioController;
$obj->verificarLogged(); //Verifica se há alguem logado, caso não tenha é redirecionado para a tela home.php
$emaill = $_SESSION['email'];
$obj->verificarPerfil($emaill); //Verifica se o perfil é administrador, caso não seja, é redirecionado para a tela inicial

if(isset($_POST['submitexcel'])){

$datainicio = date('Y-m-d', strtotime($_POST['datainicio']));
$datafim = date('Y-m-d', strtotime($_POST['datafim'] . ' +1 day'));

$arquivo = 'extracao_nps.xls';

$html = '';
$html .= '<table border="1">';

$html .= '<tr>';
$html .= '<td><b>ID Pesquisa</b></td>';
$html .= '<td><b>ORDEM</b></td>';
$html .= '<td><b>PERGUNTA</b></td>';
$html .= '<td><b>RESPOSTA</b></td>';
$html .= '<td><b>NOME</b></td>';
$html .= '<td><b>USUARIO</b></td>';
$html .= '<td><b>DATA DA PESQUISA</b></td>';
$html .= '</tr>';


$result = $obj->consultaPesquisasC($datainicio, $datafim);
foreach($result as $row_excel){
    $html .= '<tr>';
    $html .= '<td>'.utf8_decode($row_excel['cod_pesquisa']).'</td>';
    $html .= '<td>'.utf8_decode($row_excel['numero_questao']).'</td>';
    $html .= '<td>'.utf8_decode($row_excel['pergunta']).'</td>';
    $html .= '<td>'.utf8_decode($row_excel['resposta']).'</td>';
    $html .= '<td>'.utf8_decode($row_excel['nome']).'</td>';
    $html .= '<td>'.utf8_decode($row_excel['user']).'</td>';
    $html .= '<td>'.utf8_decode($row_excel['data_pesquisa']).'</td>';
    $html .= '</tr>';
}
}

//configurações download

header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header ("Last-Modified: ". gmdate("D,d m YH:i:s") . " GMT");
header ("Cache-Control: no-cache, must-revalidate");
header ("Pragma: no-cache");
header ("Content-type: application/x-msexcel");
header ("Content-Disposition: attachment; filename=\"{$arquivo}\"");
header ("Content-Description: PHP Generated Data" );

// Configuração da codificação
header('Content-Encoding: UTF-8');
header('Content-Type: text/html; charset=utf-8');

// Configuração download
header("Content-type: application/vnd.ms-excel; charset=UTF-8");
header("Content-Disposition: attachment; filename=\"{$arquivo}\"");


echo $html;
exit;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Document</title>
</head>
<body>
</body>
</html>