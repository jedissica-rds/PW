<?php 
include_once('config.php');

session_start();

$id_livro = $_GET['id'];

// echo $id_livro;
$id = $_SESSION['ID'];
$sqlFavoritos = 
"SELECT ID FROM favoritos_d Fav Inner Join livro_divulgacao Livro_d On Livro_d.ID = Fav.livro_ID And Fav.user_ID = $id;";

$resultado = $conexao->query($sqlFavoritos);

$check = mysqli_num_rows($resultado);

if ($check > 0){
    echo "Livro já foi favoritado!"; 
    header("Location: perfil.php?id=$id");
}
else{
    $sqlSelect = "INSERT INTO favoritos_d(user_ID,livro_ID) VALUES ('$id', '$id_livro')";

    $result = $conexao->query($sqlSelect);

    header("Location: perfil.php?id=$id");
}

?>