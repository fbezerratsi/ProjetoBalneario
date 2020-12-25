<?php

//$hostname = 'localhost'; //local do servidor off-line;
//$username = 'root'; // nome padrao de usuario mysql;
//$senha = '1234'; // caso vc tenha senha informe-a dentro das aspas simples.
$banco = 'projeto_balneario'; //nome do bd que quero conectar
//abaixo estou abrindo uma conexão com o bd
$db = mysqli_connect("localhost", "root", "1234", "projeto_balneario");
//mysqli_select_db($banco, $db);
?>