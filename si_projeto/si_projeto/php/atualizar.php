<?php
require_once 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id_imoveis']);

    $titulo = $_POST['titulo'] ?? '';
    $descricao = $_POST['descricao'] ?? '';
    $endereco = $_POST['endereco'] ?? '';
    $preco = floatval($_POST['preco'] ?? 0);
    $area = !empty($_POST['area']) ? floatval($_POST['area']) : null;
    $quartos = !empty($_POST['quartos']) ? intval($_POST['quartos']) : null;
    $banheiros = !empty($_POST['banheiros']) ? intval($_POST['banheiros']) : null;
    $garagem = !empty($_POST['garagem']) ? intval($_POST['garagem']) : null;
    $status = $_POST['status'] ?? 'disponível';

    $sql = "UPDATE imoveis SET
        titulo = :titulo,
        ds_imoveis = :descricao,
        nm_endereco = :endereco,
        vl_imoveis = :preco,
        nr_area = :area,
        nr_quartos = :quartos,
        nr_banheiros = :banheiros,
        nr_garagem = :garagem,
        en_status = :status
        WHERE id_imoveis = :id";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':titulo' => $titulo,
        ':descricao' => $descricao,
        ':endereco' => $endereco,
        ':preco' => $preco,
        ':area' => $area,
        ':quartos' => $quartos,
        ':banheiros' => $banheiros,
        ':garagem' => $garagem,
        ':status' => $status,
        ':id' => $id
    ]);

    header('Location: listar.php');
    exit;
} else {
    die("Método inválido.");
}
