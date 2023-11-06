<?php 

$id_livro = $_GET['endereco_livro'];

header('Content-disposition: attachment; filename='.$id_livro);
header('Content-type: application/pdf');
readfile($id_livro);

?>