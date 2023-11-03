<?php
session_start();
include_once('config.php');

$id = $_GET['id'];

$sqlSelect = "SELECT * from usuarios WHERE id=$id";

$result = $conexao->query($sqlSelect);

if ($result->num_rows > 0) {

  while ($row = mysqli_fetch_assoc($result)) {
    $nome = $row["nome"];
    $email = $row["email"];
    $senha = $row["senha"];
    $bio = $row["bio"];
    $perfil = $row["path_perfil"];
    $capa = $row["path_capa"];
  }
}

if ((!isset($_SESSION['email']) == true) && (!isset($_SESSION['senha']) == true)) {
  unset($_SESSION['email']);
  unset($_SESSION['senha']);
  header("Location: login.php");
}

if ($perfil == null) {
  $perfil = "perfil/automatic_profile.jpg";
}

if ($capa == null) {
  $capa = "capa/automatic_banner.jpg";
}

if ($bio == null) {
  $bio = "pressure on people, people on streets";
}

include_once('config.php');

$sqlDivulgacao = "SELECT * FROM livro_divulgacao WHERE ID_user = '$id'";
$result = mysqli_query($conexao, $sqlDivulgacao);

$check = mysqli_num_rows($result);


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cabin:wght@500&family=Josefin+Sans:wght@400;500&display=swap"
    rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="css/perfil.css?v=<?php echo time(); ?>">
  <link
    href="https://fonts.googleapis.com/css2?family=Arimo&family=Inter&family=Montserrat:wght@300;400;500;600;700&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>Alexandria: Acervo Literário</title>

  <style>
    #banner {
      width: 100%;
      height: 340px;
      background-image: url(<?php echo $capa ?>);
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
      text-align: center;
    }
  </style>
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

  <div id="banner">
    <div id="profile">
      <div id="profile-picture">
        <img id="foto_perfil" src=" <?php echo $perfil ?>" />
      </div>
      <div id="profile-nome">
        <p id="nome_perfil">
          <?php echo $nome ?>
      </div>
    </div>
  </div>
  <div class="hero">
    <div class="btn-bottom">
      <div class="btn-box">
        <button id="btn-sobre" onclick="openSobre()">
          SOBRE
        </button>
        <button id="btn-estante" onclick="openEstante()">
          MEUS EVENTOS
        </button>
        <button id="btn-livros" onclick="openLivros()">
          MEUS LIVROS
        </button>
        <button id="btn-favoritos" onclick="openFavoritos()">
          FAVORITOS
        </button>
      </div>
    </div>
    <div id="content-sobre" class="conteudo">
      <div class="conteudo-sobre">
        <div class="grid-container">
          <div id="lado_perfil" class="grid-item">
            <div id="nome_bio">
              <h3 id="nome">
                <?php echo $nome; ?>
              </h3>

              <p id="bio">
                <?php echo $bio ?>
              </p>

              <a href="editPerfil.php?id=<?php echo $id ?>">
                <button id="btn_editar">Editar Perfil</button>
              </a>
            </div>
          </div>


          <div id="lado_livros" class="grid-item">
            <div id="livro_qnt">
              <h3 id="Livros">Livros</h3>

              <div id="livros_flex">
                <div id="publicados" class="qnt">
                  <h4>28</h4>
                  <p>publicados</p>
                </div>

                <div id="favoritados" class="qnt">
                  <h4>48</h4>
                  <p>favoritados</p>
                </div>

                <div id="lista de desejos" class="qnt">
                  <h4>78</h4>
                  <p>lista de desejos</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="content-estante" class="conteudo">
      <div class="conteudo-minha-estante">
        <h1>MEUS EVENTOS</h1>
      </div>
    </div>
    <div id="content-livros" class="conteudo">
      <div class="conteudo-meus-livros">
        <div class="container py-5" id="parent">
          <div class="row" id="display">
            <?php
            if ($check > 0) {
              while ($row = mysqli_fetch_array($result)) {
                echo 
                "<button id='btn_divulgacao_opener' style=' width: fit-content; background-color: transparent; border: 0px;'>
                    <div style='width: 190px; height: 290px;' class='card text-center'>
                        <img style='height: 160px; width: fit-content; margin-top: 15px; box-shadow: 2px 3px 3px #979797;' src='$row[capa]' class='card-img-top mx-auto' alt=''...'>
                    <div class='card-body'>
                        <h5 class='card-title' style='font-family: 'Poppins', sans-serif; font-size: 14px;'>$row[titulo]</h5>
                        <p class='card-text' style='font-family: 'Poppins', sans-serif; font-size: 5px;'>$row[autor]</p>
                    </div>
                    </div>
                  </button>";
              }
            }
            ?>
          </div>
        </div>
        <button id="btn_divulgacao">+</button>
      </div>
    </div>
    <div id="content-favoritos" class="conteudo">
      <div class="conteudo-favoritos">
        <h1>FAVORITOS</h1>
      </div>
    </div>
  </div>

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

  <script>
    var conteudo_sobre = document.getElementById("content-sobre");
    var conteudo_estante = document.getElementById("content-estante");
    var conteudo_livros = document.getElementById("content-livros");
    var conteudo_favoritos = document.getElementById("content-favoritos");

    var btn_sobre = document.getElementById("btn-sobre");
    var btn_estante = document.getElementById("btn-estante");
    var btn_livros = document.getElementById("btn-livros");
    var btn_favoritos = document.getElementById("btn-favoritos");

    function openSobre() {
      conteudo_sobre.style.transform = "translateX(0)";
      conteudo_estante.style.transform = "translateX(100%)";
      conteudo_livros.style.transform = "translateX(100%)";
      conteudo_favoritos.style.transform = "translateX(100%)";

      btn_sobre.style.color = "#856DDA"
      btn_estante.style.color = "#272727"
      btn_livros.style.color = "#272727"
      btn_favoritos.style.color = "#272727"
    }

    function openEstante() {
      conteudo_sobre.style.transform = "translateX(100%)";
      conteudo_estante.style.transform = "translateX(0)";
      conteudo_livros.style.transform = "translateX(100%)";
      conteudo_favoritos.style.transform = "translateX(100%)";

      btn_sobre.style.color = "#272727"
      btn_estante.style.color = "#856DDA"
      btn_livros.style.color = "#272727"
      btn_favoritos.style.color = "#272727"
    }


    function openLivros() {
      conteudo_sobre.style.transform = "translateX(100%)";
      conteudo_estante.style.transform = "translateX(100%)";
      conteudo_livros.style.transform = "translateX(0)";
      conteudo_favoritos.style.transform = "translateX(100%)";

      btn_sobre.style.color = "#272727"
      btn_estante.style.color = "#272727"
      btn_livros.style.color = "#856DDA"
      btn_favoritos.style.color = "#272727"
    }

    function openFavoritos() {
      conteudo_sobre.style.transform = "translateX(100%)";
      conteudo_estante.style.transform = "translateX(100%)";
      conteudo_livros.style.transform = "translateX(100%)";
      conteudo_favoritos.style.transform = "translateX(0)";

      btn_sobre.style.color = "#272727"
      btn_estante.style.color = "#272727"
      btn_livros.style.color = "#272727"
      btn_favoritos.style.color = "#856DDA"
    }

    document.getElementById("btn_divulgacao").onclick = function () {
      location.href = "cadastro_divulgacao.php?id=<?php echo $id ?>";
    }; 
  </script>
</body>

</html>