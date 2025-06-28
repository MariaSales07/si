<?php
require_once 'conexao.php';

$stmt = $pdo->query("SELECT * FROM imoveis");
$imoveis = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8" />
<title>Lista de Imóveis</title>
<style>
body { font-family: Arial, sans-serif; padding: 20px; background: #f0f0f0; }
table { width: 100%; border-collapse: collapse; background: #fff; }
th, td { padding: 10px; border: 1px solid #ccc; text-align: left; }
th { background: #eee; }
a { color: #2196F3; text-decoration: none; }
a:hover { text-decoration: underline; }
.botao { padding: 6px 12px; background: #2196F3; color: white; border-radius: 4px; text-decoration: none; }
.botao:hover { background: #0b7dda; }
</style>
</head>
<body>

<h1>Lista de Imóveis</h1>

<p><a href="../cadastro.html" class="botao">Cadastrar Novo Imóvel</a></p>

<table>
<thead>
<tr>
<th>ID</th>
<th>Título</th>
<th>Endereço</th>
<th>Preço (R$)</th>
<th>Status</th>
<th>Ações</th>
</tr>
</thead>
<tbody>
<?php foreach ($imoveis as $imovel): ?>
<tr>
    <td><?= htmlspecialchars($imovel['id_imoveis']) ?></td>
    <td><?= htmlspecialchars($imovel['titulo']) ?></td>
    <td><?= htmlspecialchars($imovel['nm_endereco']) ?></td>
    <td>R$ <?= number_format($imovel['vl_imoveis'], 2, ',', '.') ?></td>
    <td><?= htmlspecialchars($imovel['en_status']) ?></td>
    <td>
        <a href="<?php echo 'editar.php?id=' . $imovel['id_imoveis']; ?>">Editar</a> | 
        <a href="<?php echo 'excluir.php?id=' . $imovel['id_imoveis']; ?>" onclick="return confirm('Tem certeza que quer excluir este imóvel?');">Excluir</a>
    </td>
</tr>
<?php endforeach; ?>
</tbody>
</table>

</body>
</html>
