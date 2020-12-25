<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Mensagens</title>
</head>

<body>
    <div id="msg" style="width: 350px; text-align: justify; word-wrap: break-word;">
<?php
                include("conectbd.php");
                $sql = "select * from tb_chat order by id_mensagem desc"; // estou selecionando tudo o que tem na tabela tb_chat no bd
                $limite = mysqli_query($db,$sql) or die(mysqli_error());
//Abaixo criei um laço para mostrar todos os dados da tabela td_chat
                while($sql = mysqli_fetch_array($limite)){
                               $id_mensagem = $sql["id_mensagem"];
                               $nome = $sql["nome"];
                               $mensagem = $sql["mensagem"];
                               $data = $sql["data"];
                               $hora = $sql["hora"];
//abaixo estou mostrando em tela os dados do bd 
                    //print '<div style="border: 1px solid; width: 500px;">';
                    echo "--Mensagem: $id_mensagem--<br>Na data $data e na hora $hora<br>Nome: <b>$nome</b><br>Mensagem: <b style=\"color: green;text-decoration-style: inherit; \">$mensagem </b><br>"; 
                    //print "</div>";
                    print "<hr />";
                    
                }
                //print "<a name=\"ancora\"></a>";
?>

        </div>
</body>
</html>