<?php 
include_once('config.php');

session_start();

$id_livro = $_GET['id_livro'];
$id = $_SESSION['ID'];
$sqlSelect = "INSERT INTO favoritos_d(user_ID,livro_ID) VALUES ('$id', '$id_livro')";

$result = $conexao->query($sqlSelect);

header("Location: perfil.php?id=$id");

?>