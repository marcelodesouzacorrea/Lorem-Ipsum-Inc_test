
<!-- Credenciais do banco de dados. Supondo que você esteja executando o MySQL
servidor com configuração padrão (usuário 'root' sem senha) -->
<?php
    define('DB_SERVER','localhost');
    define('DB_USER','root');
    define('DB_PASSWORD','');
    define('DB_NAME','projeto');

// Tentativa de conexão com o banco de dados da aplicação 
    $link = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);

//checar a conexão
    if ($link === false) {
        die("ERRO: Não conectado.". mysqli_connect_error());
    }
?>