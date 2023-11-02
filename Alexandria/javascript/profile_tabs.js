var conteudo_sobre = document.getElementById("content-sobre");
var conteudo_estante = document.getElementById("content-estante");
var conteudo_livros = document.getElementById("content-livros");
var conteudo_favoritos = document.getElementById("content-favoritos");

var btn_sobre = document.getElementById("btn-sobre");
var btn_estante = document.getElementById("btn-estante");
var btn_livros = document.getElementById("btn-livros");
var btn_favoritos = document.getElementById("btn-favoritos");

function openSobre(){
    conteudo_sobre.style.transform = "translateX(0)";
    conteudo_estante.style.transform = "translateX(100%)";
    conteudo_livros.style.transform = "translateX(100%)";
    conteudo_favoritos.style.transform = "translateX(100%)";

    btn_sobre.style.color = "#856DDA"
    btn_estante.style.color = "#272727"
    btn_livros.style.color = "#272727"
    btn_favoritos.style.color = "#272727"
}

function openEstante(){
    conteudo_sobre.style.transform = "translateX(100%)";
    conteudo_estante.style.transform = "translateX(0)";
    conteudo_livros.style.transform = "translateX(100%)";
    conteudo_favoritos.style.transform = "translateX(100%)";

    btn_sobre.style.color = "#272727"
    btn_estante.style.color = "#856DDA"
    btn_livros.style.color = "#272727"
    btn_favoritos.style.color = "#272727"
}


function openLivros(){
    conteudo_sobre.style.transform = "translateX(100%)";
    conteudo_estante.style.transform = "translateX(100%)";
    conteudo_livros.style.transform = "translateX(0)";
    conteudo_favoritos.style.transform = "translateX(100%)";

    btn_sobre.style.color = "#272727"
    btn_estante.style.color = "#272727"
    btn_livros.style.color = "#856DDA"
    btn_favoritos.style.color = "#272727"
}

function openFavoritos(){
    conteudo_sobre.style.transform = "translateX(100%)";
    conteudo_estante.style.transform = "translateX(100%)";
    conteudo_livros.style.transform = "translateX(100%)";
    conteudo_favoritos.style.transform = "translateX(0)";

    btn_sobre.style.color = "#272727"
    btn_estante.style.color = "#272727"
    btn_livros.style.color = "#272727"
    btn_favoritos.style.color = "#856DDA"
}
