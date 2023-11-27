<?php
session_start();
include_once 'config.php';

if(isset($_POST['submitexcel'])){

    $datainicio = date('Y-m-d', strtotime($_POST['datainicio']));
    $datafim = date('Y-m-d', strtotime($_POST['datafim'] . ' +1 day'));
    
    $arquivo = 'extracao_nps.xls';
    
    $html = '';
    $html .= '<table border="1">';
    
    $html .= '<tr>';
    $html .= '<td><b>cod_pesquisa</b></td>';
    $html .= '<td><b>numero_questão</b></td>';
    $html .= '<td><b>pergunta</b></td>';
    $html .= '<td><b>resposta</b></td>';
    $html .= '<td><b>nome</b></td>';
    $html .= '<td><b>user</b></td>';
    $html .= '<td><b>data_pesquisa</b></td>';
    $html .= '</tr>';
    
    $sql_excel = "SELECT * FROM visao_pesquisa WHERE data_pesquisa BETWEEN '$datainicio' AND '$datafim' ORDER BY data_pesquisa ASC, numero_questao ASC";
    $result_sql = mysqli_query($conexao, $sql_excel);
    
    while($row_excel = mysqli_fetch_assoc($result_sql)){
        $html .= '<tr>';
        $html .= '<td>'.$row_excel['cod_pesquisa'].'</td>';
        $html .= '<td>'.$row_excel['numero_questao'].'</td>';
        $html .= '<td>'.$row_excel['pergunta'].'</td>';
        $html .= '<td>'.$row_excel['resposta'].'</td>';
        $html .= '<td>'.$row_excel['nome'].'</td>';
        $html .= '<td>'.$row_excel['user'].'</td>';
        $data = date('d/m/Y H:i:s', strtotime($row_excel['data_pesquisa']));
        $html .= '<td>'.$data.'</td>';
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
    <?php

    $arquivo = 'extracao_nps.xls';

    $html = '';
    $html .= '<table border="1">';

    $html .= '<tr>';
    $html .= '<td><b>cod_pesquisa</b></td>';
    $html .= '<td><b>numero_questão</b></td>';
    $html .= '<td><b>pergunta</b></td>';
    $html .= '<td><b>resposta</b></td>';
    $html .= '<td><b>nome</b></td>';
    $html .= '<td><b>user</b></td>';
    $html .= '<td><b>data_pesquisa</b></td>';
    $html .= '</tr>';

    $sql_excel = "SELECT * FROM visao_pesquisa WHERE data_pesquisa BETWEEN '2023-11-01' AND '2023-11-30' ORDER BY data_pesquisa ASC, numero_questao ASC";
    $result_sql = mysqli_query($conexao, $sql_excel);

    while($row_excel = mysqli_fetch_assoc($result_sql)){
        $html .= '<tr>';
        $html .= '<td>'.$row_excel['cod_pesquisa'].'</td>';
        $html .= '<td>'.$row_excel['numero_questao'].'</td>';
        $html .= '<td>'.$row_excel['pergunta'].'</td>';
        $html .= '<td>'.$row_excel['resposta'].'</td>';
        $html .= '<td>'.$row_excel['nome'].'</td>';
        $html .= '<td>'.$row_excel['user'].'</td>';
        $data = date('d/m/Y H:i:s', strtotime($row_excel['data_pesquisa']));
        $html .= '<td>'.$data.'</td>';
        $html .= '</tr>';
    }


    //configurações download

    header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
    header ("Last-Modified: ". gmdate("D,d m YH:i:s") . " GMT");
    header ("Cache-Control: no-cache, must-revalidate");
    header ("Pragma: no-cache");
    header ("Content-type: application/x-msexcel");
    header ("Content-Disposition: attachment; filename=\"{$arquivo}\"");
    header ("Content-Description: PHP Generated Data" );

    echo $html;
    exit;

    ?>
</body>
</html>