<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>adastro de Clientes</title>
</head>
<body>
    <form action="" method="post">
        <label for="nome">Nome do produto:</label>
        <input type="text" name="nome" required> <br>

        <label for="preco">preco:</label>
        <input type="number"  min="1" step="0.01" name="preco" required> <br>

        <button type="submit">Adicionar</button>
    </form>



    <?php
        //Verifica se o formulário foi enviado
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Recebe os valores enviados pelo formulário 
            $nome = $_POST['nome'];
            $preco = $_POST['preco1'];

            // Conexão com o banco de dados
            $servername = "127.0.0.1";
            $username = "root";
            $password = "Senai@118";
            $dbname = "exercicio";

            $conn = new mysqli($servername, $username, $password, $dbname);

            // Verifica a conexão
            if($conn->connect_error) {
                die("Falha na conexão: " . $conn->connect_error);
            }

            //Insere o registro no banco de dados
            $sql = "INSERT INTO produtos (nome, preco) VALUES ('$nome','$preco')";

            if ($conn->query($sql) === TRUE){
                echo "<p style= 'color:Darkgreen;'> Poduto adicionado com sucesso</p>";
            } else {
                echo "<p style= 'color:Red;'> Erro ao adicionar o produto.</p>";
            }

            //Fechar a conexão
            $conn->close();
        }
        
    ?>
</body>
</html>

