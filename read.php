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
                
            }
        }
    }
    }
?>