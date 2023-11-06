<?php 
    include_once("config.php");
    session_start();
    $id = $_SESSION['ID'];

    if($id != null){
    
    $sqlSelect = "SELECT path_perfil from usuarios WHERE id=$id";

    $result = $conexao->query($sqlSelect);

    if ($result->num_rows > 0) {

    while ($row = mysqli_fetch_assoc($result)) {
    $perfil = $row["path_perfil"];
    }
    }
}
?>
<header class="header">
    <div class="container">
        <div class="flex">
            <h2 class="logo">ALEXANDRIA</h2>
            <nav>
                <ul class="nav__links">
                    <li>
                        <a href="index.php">HOME</a>
                        <a href="divulgacao.php">DIVULGAÇÃO</a>
                        <a href="acervo.php">ACERVO PÚBLICO</a>
                    </li>
                </ul>
            </nav>

            <?php 
            if (isset($_SESSION["logged_in"]) && $_SESSION['logged_in'] == TRUE) {
                echo 
                "<div class='btn-entrar'>
                <a href='logout.php' class='cta'>
                    <button style='margin-top:7px;' class='button' id='btn_entrar'>Sair</button>
                </a>
                <a href='perfil.php?id=$id' class='cta'>
                <img style=' margin-bottom:6px; margin-bottom:7px width:45px; height:45px; border-radius:100%; border: 1px solid #fff; cursor:pointer;' id='foto' src='$perfil'>
                </a>
                </div>";
              }
              
              else if(!isset($_SESSION["logged_in"])) {
                echo 
                "<div class='btn-entrar'>
                <a href='login.php' class='cta'>
                    <button class='button' id='btn_sair'>Entrar</button>
                </a>
                </div>";
              }
              ?>
            <!-- <div class="btn-entrar">
                <a href="login.php" class="cta">
                    <button class="button" id="btn_entrar">Entrar</button>
                </a>
            </div> -->
        </div>
    </div>
</header>

<!-- <script type="text/javascript">
  document.getElementById("btn_entrar").onclick = function () {
    location.href = "login.php";
};
</script>

<script type="text/javascript">
  document.getElementById("btn_sair").onclick = function () {
    location.href = "login.php";
};
</script> -->
