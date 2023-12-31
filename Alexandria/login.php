<?php 
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Cabin:wght@500&family=Josefin+Sans:wght@400;500&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="css/login.css?v=<?php echo time(); ?>">
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Arimo&family=Inter&family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Alexandria: Acervo Literário</title>
</head>
<body>

<div id="placeholder">
      
</div>

<section>
      <div class="login">
              <!--texto-->

              <div id="login-texto">
                  <h2 id="login-titulo">LOGIN</h2>
                  <p id="login-description">Ainda não possui uma conta? <span><a href="cadastro.php" id="cadastro-login-anchor"> Cadastro</a></span></p>
                  
                  
                  <form id="login-form" action="testeLogin.php" method="POST">
                  <label for="email">EMAIL:</label><br>
                  <input class="input" type="text" id="email" name="email" required><br>
                  <label for="senha">SENHA:</label><br>
                  <input class="input" type="password" id="senha" name="senha" required>
                  <button class="botao-saiba-mais" type="submit" name="submit" id="submit">entrar</button>
                  </form>


                </div>

                <div>
                  <img class="img_login" src="images/login-img.png">
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
          <p class="copyright-text">©2023 Instituto Federal do Amazonas. Todos os direitos reservados. Política de Privacidade.
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

<script>
$(function(){
  $("#placeholder").load("navigation.php");
});
</script>
<script type="text/javascript">
    document.getElementById("btn_entrar").onclick = function () {
        location.href = "login.php";
    };
</script>
</html>