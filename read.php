<?php
//  Verifique a existência do parâmetro id antes de continuar a processar
    if (isset($_GET['id']) && !empty(trim($_GET['id']))) {
    // Incluir arquivo de configuração
    require_once "config.php";        
    // Prepare uma declaração selecionada        
    $sql = "SELECT * FROM listaprojetos WHERE id = ?";

    if ($stmt = mysqli_prepare($link, $sql)) {
        
        mysqli_stmt_bind_param($stmt, "i", $param_id);

        // configura os parametros
        $param_id = trim($_GET["id"]);

        // Tenta executar a instrução preparada
        if (mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);

            if (mysqli_num_rows($result) == 1) {
/* Busca a linha do resultado como uma matriz associativa. Desde o conjunto de resultados
 contém apenas uma linha, não precisamos usar o loop while*/
             $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            //  Recuperar valor de campo individual
            $nome = $row["nome"];
            $inicio = $row["inicio"];
            $fim = $row["fim"];
            $valor = $row["valor"];
            $riscos = $row["riscos"];
            $participantes = $row["participantes"];
            }else {
            // URL não contém parâmetro de id válido. Redirecionar para a página de erro
            header("location: error.php");
            exit();
            }
        }else {
            echo "Ups! Algo deu errado. Por favor, tente novamente mais tarde.";
        }
    }
            // Fechar declaração
            mysqli_stmt_close($stmt);
            // fechar a conexão
            mysqli_close($link);
    }else {
        // O URL não contém o parâmetro id. Redirecionar para a página de erro
        header("location: error.php");
        exit();
    }
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
        <h1>Ver registro</h1>

        <div>
            <label for="">Nome</label>
            <p><b><?php echo $row['nome'];?></b></p>
        </div>
        <div>
            <label for="">Inicio</label>
            <p><b><?php echo $row['inicio'];?></b></p>
        </div>
        <div>
            <label for="">Fim</label>
            <p><b><?php echo $row['fim'];?></b></p>
        </div>
        <div>
            <label for="">Valor</label>
            <p><b><?php echo $row['valor'];?></b></p>
        </div>
        <div>
            <label for="">Riscos</label>
            <p><b><?php echo $row['riscos'];?></b></p>
        </div>
        <div>
            <label for="">Participantes</label>
            <p><b><?php echo $row['participantes'];?></b></p>
        </div>
        <p><a href="index.php" class="botao">Voltar</a></p>
        </div>
            </div>        
        </div>
    </div>
</body>
</html>