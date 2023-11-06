<?php 
include_once('config.php');

if(isset($_POST["submit"])){

    $titulo = $_POST["titulo"];
    $autor = $_POST["autor"];
    $sinopse = $_POST["sinopse"];

    //perfil
        $foto_capa = $_FILES['capa'];
    
        $pasta = "acervo_capa/";
        $nomeDoArquivo = $foto_capa['name'];
        $novoNomeDoArquivo = uniqid();
        $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));
    
        if($extensao != 'jpg' && $extensao != 'png'){
            die("Tipo de arquivo não aceito!");
        }
    
        $deu_certo = move_uploaded_file($foto_capa['tmp_name'], $pasta . $novoNomeDoArquivo . "." . $extensao);
    
        $capa = "acervo_capa/$novoNomeDoArquivo.$extensao";

        require 'color.php';

        $cor = simple_color_thief($capa,'f00');
    
        //arquivo

        $arquivo = $_FILES['arquivo'];
    
        $pastaPDF = "acervo_arquivo/";
        $nomeDoArquivoPDF = $arquivo['name'];
        $novoNomeDoArquivoPDF = uniqid();
        $extensaoPDF = strtolower(pathinfo($nomeDoArquivoPDF, PATHINFO_EXTENSION));
    
        if($extensaoPDF != 'pdf' && $extensao != 'epub'){
            die("Tipo de arquivo não aceito!");
        }
    
        $deu_certo = move_uploaded_file($arquivo['tmp_name'], $pastaPDF . $novoNomeDoArquivoPDF . "." . $extensaoPDF);
    
        $arquivoPDF = "acervo_arquivo/$novoNomeDoArquivoPDF.$extensaoPDF";
    
        $sqlD = "INSERT INTO livro_acervo(titulo, autor, capa, arquivo, sinopse, capa_cor) VALUES ('$titulo', '$autor', '$capa', '$arquivoPDF', '$sinopse', '$cor')";

        $result = mysqli_query($conexao, $sqlD);
}
?>