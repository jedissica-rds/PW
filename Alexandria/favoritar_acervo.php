<?php 
include_once('config.php');

session_start();

$id_livro = $_GET['id'];
if (isset($_SESSION['ID'])) {

$id = $_SESSION['ID'];}
$sqlFavoritos = 
"SELECT ID FROM favoritos_a Fav Inner Join livro_acervo Livro_a On Livro_a.ID = Fav.ID_livro And Fav.ID_user = $id;";

$resultado = $conexao->query($sqlFavoritos);

$check = mysqli_num_rows($resultado);

if ($check > 0){
    echo "Livro já foi favoritado!"; 
    header("Location: perfil.php?id=$id");
}
else{
    $sqlINSERT = "INSERT INTO favoritos_a(ID_user,ID_livro) VALUES ('$id', '$id_livro')";

    $result = $conexao->query($sqlINSERT);

    header("Location: perfil.php?id=$id");
}

?>