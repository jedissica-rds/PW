<?php 

include_once('config.php');

if(isset($_POST["update"])){

    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $bio = $_POST["bio"];
    
    //capa
    $foto_capa = $_FILES['path_capa'];

    if($foto_capa['error']){
        die("ERROR!");
    }

    $pasta = "capa/";
    $nomeDoArquivo = $foto_capa['name'];
    $novoNomeDoArquivo = uniqid();
    $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));

    if($extensao != 'jpg' && $extensao != 'png'){
        die("Tipo de arquivo não aceito!");
    }

    $deu_certo = move_uploaded_file($foto_capa['tmp_name'], $pasta . $novoNomeDoArquivo . "." . $extensao);

    $path_capa = "capa/$novoNomeDoArquivo.$extensao";


    //perfil
    $foto_perfil = $_FILES['path_perfil'];

    if($foto_perfil['error']){
        die("ERROR!");
    }

    $pasta = "perfil/";
    $nomeDoArquivo = $foto_perfil['name'];
    $novoNomeDoArquivo = uniqid();
    $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));

    if($extensao != 'jpg' && $extensao != 'png'){
        die("Tipo de arquivo não aceito!");
    }

    $deu_certo = move_uploaded_file($foto_perfil['tmp_name'], $pasta . $novoNomeDoArquivo . "." . $extensao);

    $path_perfil = "perfil/$novoNomeDoArquivo.$extensao";



    $sqlUPDATE = 
    "UPDATE usuarios
    SET nome = '$nome', email = '$email', senha = '$senha', bio = '$bio', path_perfil = '$path_perfil', path_capa = '$path_capa'
    WHERE id = '$id'";

    $result = $conexao->query($sqlUPDATE);
}

header("Location: perfil.php?id=$id");

?>