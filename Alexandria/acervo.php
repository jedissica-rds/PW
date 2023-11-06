<?php 
    include_once('config.php');
    session_start();

    if (isset($_SESSION['ID'])) {

    $id = $_SESSION['ID'];}

    $sqlDivulgacao = "SELECT * FROM livro_acervo";
    $result = mysqli_query($conexao, $sqlDivulgacao);

    $check = mysqli_num_rows($result);
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
    <link rel="stylesheet" href="css/divulgacao.css">
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Arimo&family=Inter&family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <title>Alexandria: Acervo Literário</title>
</head>
<body>
<div id="placeholder">
      
</div>

<section>
    <div class="container py-5" id="parent">
        <div class="row" id="display">
            <?php 
                if ($check > 0) 
                {
                    while($row = mysqli_fetch_array($result))
                    {
                        $id_livro = $row["ID"];
                        echo
                        "<a href = 'livro_perfil_acervo.php?id=$id_livro'>
                        <button class='btn_divulgacao_opener' style=' width: fit-content; background-color: transparent; border: 0px;'>
                            <div style='width: 190px; height: 280px;' class='card text-center'>
                                <img style='height: 160px; width: fit-content; margin-top: 15px; box-shadow: 2px 3px 3px #979797;' src='$row[capa]' class='card-img-top mx-auto' alt=''...'>
                                    <div class='card-body'>
                                        <h5 class='card-title' style='font-family: 'Poppins', sans-serif; font-size: 14px;'>$row[titulo]</h5>
                                        <p class='card-text' style='font-family: 'Poppins', sans-serif; font-size: 5px;'>$row[autor]</p>
                                    </div>
                            </div>
                        </button>
                        </a>";

                    }
                }
            ?>
        </div>
    </div>
</section>

<script>
$(function(){
  $("#placeholder").load("navigation.php");
});
</script>

<!-- <script type="text/javascript">
  document.querySelector(".btn_divulgacao_opener").onclick = function () {
    location.href = "livro_profile.php";
  };
</script> -->
</body>
</html>