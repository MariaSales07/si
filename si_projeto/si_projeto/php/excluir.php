<?php
require_once 'conexao.php';

// Verifica se o ID foi passado pela URL
if (!isset($_GET['id'])) {
    die("ID do imóvel não informado.");
}

// Garante que o valor do ID é um número inteiro
$id = intval($_GET['id']);

// Prepara e executa o comando DELETE no banco de dados
$stmt = $pdo->prepare("DELETE FROM imoveis WHERE id_imoveis = ?");
$stmt->execute([$id]);

// Redireciona de volta para a lista após excluir
header('Location: listar.php');
exit;
