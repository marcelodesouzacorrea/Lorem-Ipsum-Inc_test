<?php
//  Verifique a existência do parâmetro id antes de continuar a processar
    if (isset($_GET['id']) && !empty(trim($_GET['id']))) {
    // Incluir arquivo de configuração
    require_once "config.php";        
    // Prepare uma declaração selecionada        
    $sql = "SELECT * FROM listaprojetos WHERE id = ?";
    }
?>