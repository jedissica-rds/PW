<?php 

if(!empty($_GET['id']))
{
    include_once('config.php');

    $id = $_GET['id'];

    $sqlSelect = "SELECT * from usuarios WHERE  id=$id";

    $result = $conexao->query($sqlSelect);

    if($result->num_rows > 0){

        while($row = mysqli_fetch_assoc($result))
        {
            $nome = $row["nome"];
            $email = $row["email"];
            $senha = $row["senha"];
            $bio = $row["bio"];
            $perfil = $row["path_perfil"];
            $capa = $row["path_capa"];
        }
    }
    else
    {
        header("Location: login.php");
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cabin:wght@500&family=Josefin+Sans:wght@400;500&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/editPerfil.css?v=<?php echo time(); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Arimo&family=Inter&family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Alexandria: O Maior Acervo Literário Nacional</title>
</head>

<body>
    <header class="header">

        <div class="container">

            <div class="flex">

                <h2 class="logo">ALEXANDRIA</h2>
                <nav>
                    <ul class="nav__links">
                        <li>
                            <a href="index.php">HOME</a>
                            <a href="#">DIVULGAÇÃO</a>
                            <a href="#">ACERVOS</a>
                        </li>
                    </ul>
                </nav>

                <div class="btn-entrar">

                    <a href="#" class="cta">
                        <button class="button" id="btn_entrar">Entrar</button>
                    </a>
                </div>
            </div>
        </div>
    </header>


    <section>
    <div class="cadastro">
      <!--texto-->

      <div>
        <img class="img_cadastro" src="images/edit-img.png">
      </div>


      <div id="cadastro-texto">
        <h2 id="cadastro-titulo">CONFIGURAÇÃO DE PERFIL</h2>
        <!-- <p id="cadastro-description">Não deseja mudar? <span><a id="cadastro-login-anchor" href="perfil.php?id=<?php echo $id?>">
              Voltar ao Perfil</a></span></p> -->


        <form enctype="multipart/form-data" id="cadastro-form" action="saveEdit.php" method="POST">
          <label for="nome">NOME:</label><br>
          <input class="input" type="text" id="nome" name="nome" value="<?php echo $nome?>" required><br>
          <label for="email">EMAIL:</label><br>
          <input class="input" type="text" id="email" name="email" value="<?php echo $email?>" required><br>
          <label for="senha">SENHA:</label><br>
          <input class="input" type="password" id="senha" name="senha" value="<?php echo $senha?>" required ><br>
          <label for="nome">BIO:</label><br>
          <input class="input" type="text" id="bio" name="bio" value="<?php echo $bio?>"><br>
          <label for="nome">FOTO:</label>
          <input class="input" type="file" id="path_perfil" name="path_perfil" value="<?php echo $perfil?>"><br>
          <label for="nome">CAPA:</label>
          <input class="input" type="file" id="path_capa" name="path_capa" value="<?php echo $capa?>"><br>
          <input type="hidden" name="id" value="<?php echo $id?>">
          <button class="botao-saiba-mais" type="submit" name="update" id="submit">enviar</button>
        </form>


      </div>
    </div>
  </section>

   <!-- footer -->
   <footer class="site-footer">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-6">
          <h4>ALEXANDRIA</h4>
          <p class="text-justify">O maior acervo digital nacional, voltado a literatura brasileira.</p>
        </div>

        <div class="col-xs-6 col-md-3">
          <h5>Menu</h5>
          <ul class="footer-links">
            <li><a href="#">Acervo</a></li>
            <li><a href="#">Divulgação</a></li>
            <li><a href="#">Eventos</a></li>
          </ul>
        </div>

        <div class="col-xs-6 col-md-3">
          <h5>Contato</h5>
          <ul class="footer-links">
            <li><a href="#">alexandria@gmail.com</a></li>
            <li><a href="#">+55 (92) 99156-3446</a></li>
          </ul>
        </div>
      </div>
      <hr>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-sm-6 col-xs-12">
          <p class="copyright-text">©2023 Instituto Federal do Amazonas. Todos os direitos reservados. Política de
            Privacidade.
          </p>
          <p class="copyright-text">
            Av. 7 de Setembro, 1975 - Centro. Manaus - Amazonas/AM - Brasil. CEP 69020-120
          </p>
        </div>

        <div class="col-md-4 col-sm-6 col-xs-12">
          <ul class="social-icons">
            <li><a class="facebook" href="#"><i class="fa-brands fa-facebook redes_icon"></i></a></li>
            <li><a class="twitter" href="#"><i class="fa-brands fa-twitter redes_icon"></i></a></li>
            <li><a class="instagram" href="#"><i class="fa-brands fa-instagram redes_icon"></i></a></li>
            <li><a class="tiktok" href="#"><i class="fa-brands fa-tiktok redes_icon"></i>
              </a></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </footer>

</body>

</html>