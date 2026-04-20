<?php
// Mostra erros (ajuda enquanto estiver desenvolvendo)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Conexão com o banco
require '../config/conexao.php';

// Define que a resposta será JSON
header('Content-Type: application/json; charset=utf-8');

// Busca uma palavra aleatória
$sql = "SELECT * FROM palavras ORDER BY RAND() LIMIT 1";
$resultado = $conn->query($sql);

// Verifica se encontrou alguma palavra
if ($resultado && $resultado->num_rows > 0) {

    $palavra = $resultado->fetch_assoc();

    // Retorna os dados em formato JSON
    echo json_encode([
        'sucesso' => true,
        'ingles' => $palavra['ingles'],
        'portugues' => $palavra['portugues']
    ]);

} else {

    // Caso não exista nenhuma palavra cadastrada
    echo json_encode([
        'sucesso' => false
    ]);
}