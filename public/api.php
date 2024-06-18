<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: http://www.daniitrix.com.br');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    exit(0); // Para a requisição OPTIONS de pré-vôo do CORS
}

$sql = "SELECT imagem, titulo, codigo, valor, data_de_lancamento FROM produtos";
$result = $conn->query($sql);

if (!$result) {
    error_log("Erro ao executar a consulta: " . $conn->error);
    echo json_encode(['error' => 'Erro ao executar a consulta: ' . $conn->error]);
    exit;
}

$produtos = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $produtos[] = $row;
    }
} else {
    error_log("Nenhum produto encontrado");
    echo json_encode(['error' => 'Nenhum produto encontrado']);
    exit;
}

echo json_encode($produtos);
$conn->close();
?>
