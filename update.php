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

        // Validar o nome
        $input_nome = trim($_POST["nome"]);
        if(empty($input_nome)){
            $nome_err = "Digite o nome do projeto.";
        } elseif(!filter_var($input_nome, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
            $nome_err = "Please enter a valid name.";
        } else{
            $nome = $input_nome;
        }    
        // Validar o inicio
        $input_inicio = trim($_POST["inicio"]);
        if(empty($input_inicio)){
            $inicio_err = "Digite a data de inicio do projeto.";
        } else{
            $inicio = $input_inicio;
        }    
        // Validar o fim
        $input_fim = trim($_POST["fim"]);
        if(empty($input_fim)){
            $fim_err = "Digite a data do fim do projeto.";
        } else{
            $fim = $input_fim;
        }
        // Validar o valor
        $input_valor = trim($_POST["valor"]);
        if(empty($input_valor)){
            $valor_err = "Digite o valor do projeto.";
        } elseif(!ctype_digit($input_valor)){
            $valor_err = "Digite o valor do projeto.";
        }else{
            $valor = $input_valor;
        }
        // Validar riscos
        $input_riscos = trim($_POST["riscos"]);
        if(empty($input_riscos)){
            $riscos_err = "Digite o nivel de riscos do projeto.";
        } else{
            $riscos = $input_riscos;
        }  
        // validar participantes
        $input_participantes = trim($_POST["participantes"]);
        if(empty($input_participantes)){
            $participantes_err = "Digite o nome de participantes do projeto.";
        } else{
            $participantes = $input_participantes;
        } 
        // Verifique os erros de entrada antes de inserir no banco de dados
        if (empty($name_err) && empty($inicio_err) && empty($fim_err) && empty($valor_err) && empty($riscos_err) && empty($participantes_err)) {
            // instrução de inserção
            $sql = "UPDATE listaprojetos SET nome=?, inicio=?, fim=?, valor=?, riscos=?, participantes=?;

        if($stmt = mysqli_prepare($link, $sql)){
                
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            }
            // configura parametro

        
              
?>