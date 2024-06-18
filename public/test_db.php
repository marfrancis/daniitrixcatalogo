<?php
$servername = "186.202.152.213";
$username = "catalogo_dani";
$password = "Solution497#";
$dbname = "catalogo_dani";

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
echo "Conexão bem-sucedida!";
?>
