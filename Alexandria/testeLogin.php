<?php 
    //print_r($_REQUEST);

    include_once('config.php');

    if(isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha']))
    {

        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $sql = "SELECT * FROM usuarios WHERE email = '$email' and senha = '$senha'";

        $result = $conexao->query($sql);

        $row = $result->fetch_assoc();

        $email = $row["email"];
        $nome = $row["nome"];
        $ID = $row["ID"];
        $foto = $row["path_perfil"];
        $capa = $row["path_capa"];
        $bio = $row["bio"];

        if(mysqli_num_rows($result) < 1)
        {
            unset($_SESSION['email']);
            unset($_SESSION['senha']);
            $_SESSION['logged_in'] = false;
            header("Location: login.php");
        }
        else
        {
            session_start();
            $_SESSION['email'] = $email;
            $_SESSION['senha'] = $senha;
            $_SESSION['ID'] = $ID;
            $_SESSION['nome'] = $nome;
            $_SESSION['path_perfil'] = $foto;
            $_SESSION['path_capa'] = $capa;
            $_SESSION['bio'] = $bio;
            $_SESSION['logged_in'] = TRUE;
            header("Location: perfil.php?id=$ID");
        }
    }
?>