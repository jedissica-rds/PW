<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
include_once("config.php");

$sql = 
"SELECT ID, titulo, autor, ID_user, capa, ID_user, link, sinopse, capa_cor
FROM favoritos_d Fav
Inner Join livro_divulgacao Livro_d On Livro_d.ID = Fav.livro_ID And Fav.user_ID = 34; -- Condição (850 é só um Id de exemplo)";

$result = $conexao->query($sql);

if ($result->num_rows > 0) {

  while ($row = mysqli_fetch_assoc($result)) {
    echo $ID = $row["ID"]."<br>";
    echo $titulo = $row["titulo"]."<br>";
    echo $autor = $row["autor"]."<br>";
    echo $sinopse = $row["sinopse"]."<br>";
    echo $sinopse = $row["ID_user"]."<br>";
    echo $sinopse = $row["capa"]."<br>";
    echo $sinopse = $row["link"]."<br>";
    echo $sinopse = $row["sinopse"]."<br>";
    echo $sinopse = $row["capa_cor"]."<br>";
  }
}
?>
    
</body>
</html>