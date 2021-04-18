<?php
// incluindo o arquivo config
    require_once "config.php";

// Definir variáveis ​​e inicializar com valores vazios    
    $nome = $inicio = $fim = $valor = $riscos = $participantes = "";
    $nome_err = $inicio_err = $fim_err = $valor_err = $riscos_err = $participantes_err = "";

// Processando dados do formulário quando o formulário é enviado
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
        $sql = "INSERT INTO listaprojetos (nome, inicio, fim, valor, riscos, participantes) VALUES (?, ?, ?, ?, ?, ?)";

            if($stmt = mysqli_prepare($link, $sql)){
                // Vincule as variáveis ​​à instrução preparada como parâmetros
                mysqli_stmt_bind_param($stmt, "sss", $param_nome, $param_inicio, $param_fim, $param_valor, $param_riscos, $param_participantes);

                // Definir parâmetros
                $param_nome = $nome;
                $param_inicio = $inicio;
                $param_fim = $fim;
                $param_valor = $valor;
                $param_riscos = $riscos;
                $param_participantes = $participantes;
            }
                // Tenta executar a instrução preparada
                if (mysqli_stmt_execute($stmt)) {
                // Registros criados com sucesso. Redirecionar para a página de destino
                header("location: index.php");
                exit();
                }else{
                    echo "Algo deu errado. Por favor, tente novamente mais tarde.";
                }
        }
                //fechar a confirmação
                mysqli_stmt_close($stmt);
    }        
                //fecha a conexão
            mysqli_close($link);
    
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lorem-Ipsum-Inc</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
    
    </div>
</body>
</html>