<?php 
   session_start();
   include_once('config.php');
   
   $id_livro = $_GET['id'];
   $sqlSelect = "SELECT * from livro_acervo WHERE ID = '$id_livro'";

   if (isset($_SESSION['ID'])) {

    $id = $_SESSION['ID'];}

   
   $result = $conexao->query($sqlSelect);
   
   if ($result->num_rows > 0) {
   
      $row = mysqli_fetch_assoc($result);
       $titulo = $row["titulo"];
       $autor = $row["autor"];
       $sinopse = $row["sinopse"];
       $arquivo = $row["arquivo"];
       $capa_cor = $row["capa_cor"];
       $capa = $row["capa"];
     }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cabin:wght@500&family=Josefin+Sans:wght@400;500&display=swap"rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="css/livro_profile.css?v=<?php echo time(); ?>>">
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Arimo&family=Inter&family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  <title>Alexandria: Acervo Literário</title>

  <style>
    #banner{
      width: 100%;
      height: 300px;
      background-color: #<?php echo $capa_cor?>;

    }
  </style>
</head>
<body>
    <div id="placeholder"></div>

    <section>
      <div id="banner"></div>

      <div id="banner_capa">
      <img id="capa" src="divulgacao_capa/654473379b5ac.jpg">
      <div id="banner_texto">
      <h3 id="título"><?php echo $titulo?></h3>
      <h5 id="autor"><?php echo $autor?></h5>
      </div>
      </div>

      <div id="sinopse">
        <p id="sinopse-texto">
        <?php echo $sinopse?>
        </p>
      </div>

      <div id="btn_box">
        <button id="btn_comprar" class="button_livro">BAIXAR</button>
        <button id="btn_favoritar" class="button_livro"><i class="fa-regular fa-heart" style="color: #856dda;"></i></button>
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
            <li><a href="#">Home</a></li>
            <li><a href="#">Acervo público</a></li>
            <li><a href="#">Divulgação</a></li>
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
$(function(){
  $("#placeholder").load("navigation.php");
});
</script>

<script>
  document.getElementById("btn_comprar").onclick = function () {
      location.href = "downloadPDF.php?endereco_livro=<?php echo $arquivo?>id_livro=<?php echo $id_livro?>";
  }; 
</script>

<script>
  document.getElementById("btn_favoritar").onclick = function () {
    location.href = "favoritar_acervo.php?id=<?php echo $id_livro?>";
  }; 
</script>
</body>
</html>