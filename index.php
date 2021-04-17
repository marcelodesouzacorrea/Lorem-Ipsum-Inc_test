<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lorem-Ipsum-Inc</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="topo">
            <h2>Lorem Ipsum Inc</h2>
            <a href=""><button><i class="fa fa-plus"></i>Adicionar projeto</button></a>
        </div>
    <?php
    //  incluindo o arquivo config.php
        require_once "config.php";
    // Tentar selecionar a execução da consulta
        $sql = "SELECT * FROM listaprojetos"; 
        if ($result = mysqli_query($link, $sql)) {
            if (mysqli_num_rows($result) > 0) {
                echo '<"table class="tabela">';
                    echo "<theade>";
                        echo '<tr>';
                            echo "<th>#</th>";
                            echo "<th>Nome do Projeto</th>";
                            echo "<th>Inicio do projeto</th>";
                            echo "<th>Fim do projeto</th>";
                            echo "<th>Valor do Projeto</th>";
                            echo "<th>Riscos do projeto</th>";
                            echo "<th>Participantes</th>";
                            echo "<th>Ação</th>";
                        echo "</tr>";
                        echo "</thead>";
                        echo "<tbody>";
                        while($row = mysqli_fetch_array($result)){
                                echo "<tr>";
                                    echo "<td>" . $row['id'] . "</td>"; 
                                    echo "<td>" . $row['nome'] . "</td>"; 
                                    echo "<td>" . $row['inicio'] . "</td>"; 
                                    echo "<td>" . $row['fim'] . "</td>"; 
                                    echo "<td>" . $row['valor'] . "</td>"; 
                                    echo "<td>" . $row['riscos'] . "</td>"; 
                                    echo "<td>" . $row['participantes'] . "</td>";
                                    echo "<td>";
                                    echo '<a href="read.php?id='. $row['id'] .'" class="mr-3" title="View Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
                                    echo '<a href="update.php?id='. $row['id'] .'" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
                                    echo '<a href="delete.php?id='. $row['id'] .'" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                                                        echo "<td>";
                                                    echo "<tr>";
                                                }
                                                echo "</tbody>";
                                            echo "</table>";

                                        // resultados
                                        mysqli_free_result($result);
                        } else {
                            echo '<div class="alerta"> <em>Nenhum registro foi encontrado.</em></div>';
                        }
            }else {
                echo "Ops! Algo deu errado. Por favor, tente novamente mais tarde.";
            }
                //fechar conexão
                mysqli_close($link);
            ?>
    </div>
            </div>        
        </div>
    </div>
</body>
</html>