<?php 
include_once('config.php');

if(isset($_POST["submit"])){

    $ID_user = $_POST["ID_user"];
    $titulo = $_POST["titulo"];
    $autor = $_POST["autor"];
    $sinopse = $_POST["sinopse"];
    $link = $_POST["link"];

    //perfil
        $foto_capa = $_FILES['capa'];
    
        $pasta = "divulgacao_capa/";
        $nomeDoArquivo = $foto_capa['name'];
        $novoNomeDoArquivo = uniqid();
        $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));
    
        if($extensao != 'jpg' && $extensao != 'png'){
            die("Tipo de arquivo não aceito!");
        }
    
        $deu_certo = move_uploaded_file($foto_capa['tmp_name'], $pasta . $novoNomeDoArquivo . "." . $extensao);
    
        $capa = "divulgacao_capa/$novoNomeDoArquivo.$extensao";

        require 'color.php';

        $cor = simple_color_thief($capa,'f00');
    
        $sqlD = "INSERT INTO livro_divulgacao(titulo, autor, capa, ID_user, link, sinopse, capa_cor) VALUES ('$titulo', '$autor', '$capa', '$ID_user', '$link', '$sinopse', '$cor')";

        $result = mysqli_query($conexao, $sqlD);
}

header("Location: perfil.php?id=$ID_user");

?>