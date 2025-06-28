<?php
require_once 'conexao.php';

if (!isset($_GET['id'])) {
    die("ID não informado.");
}

$id = intval($_GET['id']);

$stmt = $pdo->prepare("SELECT * FROM imoveis WHERE id_imoveis = ?");
$stmt->execute([$id]);
$imovel = $stmt->fetch();

if (!$imovel) {
    die("Imóvel não encontrado.");
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8" />
<title>Editar Imóvel</title>
<style>
body { font-family: Arial, sans-serif; padding: 20px; background: #f9f9f9; }
form { max-width: 600px; background: white; padding: 20px; border-radius: 6px; }
label { display: block; margin-top: 10px; font-weight: bold; }
input, textarea, select { width: 100%; padding: 8px; margin-top: 5px; }
button { margin-top: 15px; padding: 10px 20px; background: #2196F3; color: white; border: none; border-radius: 4px; cursor: pointer; }
button:hover { background: #0b7dda; }
</style>
</head>
<body>

<h1>Editar Imóvel #<?= $imovel['id_imoveis'] ?></h1>

<form action="atualizar.php" method="POST">
    <input type="hidden" name="id_imoveis" value="<?= $imovel['id_imoveis'] ?>" />

    <label for="titulo">Título</label>
    <input type="text" name="titulo" id="titulo" value="<?= htmlspecialchars($imovel['titulo']) ?>" required />

    <label for="descricao">Descrição</label>
    <textarea name="descricao" id="descricao" rows="4" required><?= htmlspecialchars($imovel['ds_imoveis']) ?></textarea>

    <label for="endereco">Endereço</label>
    <input type="text" name="endereco" id="endereco" value="<?= htmlspecialchars($imovel['nm_endereco']) ?>" required />

    <label for="preco">Preço (R$)</label>
    <input type="number" name="preco" id="preco" step="0.01" value="<?= $imovel['vl_imoveis'] ?>" required />

    <label for="area">Área (m²)</label>
    <input type="number" name="area" id="area" step="0.1" value="<?= $imovel['nr_area'] ?>" />

    <label for="quartos">Quartos</label>
    <input type="number" name="quartos" id="quartos" min="0" value="<?= $imovel['nr_quartos'] ?>" />

    <label for="banheiros">Banheiros</label>
    <input type="number" name="banheiros" id="banheiros" min="0" value="<?= $imovel['nr_banheiros'] ?>" />

    <label for="garagem">Garagem</label>
    <input type="number" name="garagem" id="garagem" min="0" value="<?= $imovel['nr_garagem'] ?>" />

    <label for="status">Status</label>
    <select name="status" id="status">
        <option value="disponível" <?= $imovel['en_status'] == 'disponível' ? 'selected' : '' ?>>Disponível</option>
        <option value="reservado" <?= $imovel['en_status'] == 'reservado' ? 'selected' : '' ?>>Reservado</option>
        <option value="vendido" <?= $imovel['en_status'] == 'vendido' ? 'selected' : '' ?>>Vendido</option>
        <option value="alugado" <?= $imovel['en_status'] == 'alugado' ? 'selected' : '' ?>>Alugado</option>
    </select>

    <button type="submit">Atualizar</button>
</form>

<p><a href="listar.php">Voltar para lista</a></p>

</body>
</html>
