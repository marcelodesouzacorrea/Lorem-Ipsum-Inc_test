<?php
    // inclusão do arquivo config.php
    require_once "config.php";

    // Definir variáveis ​​e inicializar com valores vazios
    $nome = $inicio = $fim = $valor = $riscos = $participantes =  "";
    $nome_err = $inicio_err = $fim_err = $valor_err = $riscos_err = $participantes_err = "";
    // Processando dados do formulário quando o formulário é enviado
    if(isset($_POST["id"]) && !empty($_POST["id"])){
        // Obter valor de entrada
        $id = $_POST["id"];
?>