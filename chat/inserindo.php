<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Inserir no db</title>
</head>

<body>
<?php

                include("conectbd.php"); //chamando o arquivo de conexão com o bd
                if (isset($_COOKIE["nome"])) {
                    $nome = $_COOKIE["nome"];
                } else {
                    $nome = $_COOKIE["nomeReceptor"];
                }
                //$nome = $_POST["nome"];
                $mensagem = $_POST["mensagem"];
                $data = date('Y-m-d');
                $hora = strftime("%H:%M:%S");
                //acima estou pegando o que foi digitado pelo usuário la no formulario
                $sqlinsert = "insert into tb_chat(nome, mensagem, data, hora) values('$nome', '$mensagem', '$data', '$hora')";
                //acima estou inserindo o que o usuário digitou no bd
                mysqli_query($db,$sqlinsert) or die ("Não foi possivel inserir");
               
header('Location:formulario.php'); //estou redirecionando para a pagina formulario novamente
?>
</body>
</html>