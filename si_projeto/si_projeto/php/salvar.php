<?php
// Conectar com o banco
$host = 'localhost';
$port = 3306;
$db = 'db_imobiliaria';
$user = 'root';
$pass = 'root';

$conexao = new mysqli($host, $user, $pass, $db, $port);

if ($conexao->connect_error) {
    die("Erro na conexão: " . $conexao->connect_error);
}

// Pegar os dados do formulário
$titulo = $_POST['titulo'];
$descricao = $_POST['descricao'];
$endereco = $_POST['endereco'];
$preco = $_POST['preco'];
$area = !empty($_POST['area']) ? $_POST['area'] : "NULL";
$quartos = !empty($_POST['quartos']) ? $_POST['quartos'] : "NULL";
$banheiros = !empty($_POST['banheiros']) ? $_POST['banheiros'] : "NULL";
$garagem = !empty($_POST['garagem']) ? $_POST['garagem'] : "NULL";
$status = $_POST['status'];

// Montar SQL
$sql = "INSERT INTO imoveis 
    (titulo, ds_imoveis, nm_endereco, vl_imoveis, nr_area, nr_quartos, nr_banheiros, nr_garagem, en_status)
    VALUES
    ('$titulo', '$descricao', '$endereco', '$preco', $area, $quartos, $banheiros, $garagem, '$status')";

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <title>Resultado do Cadastro</title>
  <style>
    .msg-sucesso {
      background-color: #c8e6c9;
      color: #256029;
      border: 2px solid #4caf50;
      padding: 15px;
      border-radius: 8px;
      font-weight: bold;
      text-align: center;
      margin-bottom: 20px;
      max-width: 500px;
      margin-left: auto;
      margin-right: auto;
      margin-top: 40px;
    }
    .msg-erro {
      background-color: #ffcdd2;
      color: #b71c1c;
      border: 2px solid #f44336;
      padding: 15px;
      border-radius: 8px;
      font-weight: bold;
      text-align: center;
      margin-bottom: 20px;
      max-width: 500px;
      margin-left: auto;
      margin-right: auto;
      margin-top: 40px;
    }
    .btn-link {
      display: inline-block;
      margin-top: 15px;
      padding: 10px 20px;
      background-color: #1976d2;
      color: #fff !important;
      font-weight: 600;
      border-radius: 8px;
      text-decoration: none;
      cursor: pointer;
      transition: background-color 0.3s ease;
      border: none;
      font-size: 1rem;
      user-select: none;
    }
    .btn-link:hover {
      background-color: #0d47a1;
      text-decoration: none;
    }
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(135deg, #0d47a1, #1976d2);
      color: #fff;
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: flex-start;
      padding: 20px;
    }
  </style>
</head>
<body>

<?php
if ($conexao->query($sql) === TRUE) {
    echo '<div class="msg-sucesso">';
    echo 'Imóvel cadastrado com sucesso!';
    echo '<br><a href="../php/listar.php" class="btn-link">Ver Lista de Imóveis</a>';
    echo '</div>';
} else {
    echo '<div class="msg-erro">';
    echo 'Erro ao cadastrar: ' . $conexao->error;
    echo '</div>';
}

$conexao->close();
?>

</body>
</html>
