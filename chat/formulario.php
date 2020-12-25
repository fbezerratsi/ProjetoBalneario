<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="cssformulario.css" type="text/css" />
<title> Cadastro </title>

<script type="text/javascript" src="../js/jquery-1.10.2.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                atualiza();
                $("#mensagem").focus();
            });

            function atualiza(){
                $.get('exibir.php', function(resultado){
                    $('#atualizar').html(resultado);
                });
                
                setTimeout('atualiza()', 1000);
            }
            
//            function press(key){
//               if(key===13){alert("Você pressionou a tecla ENTER");}
//            }
        </script>
        

</head>

<body onLoad="gonow()">

    <div align="center" id="paginachat">
    <form action="inserindo.php" method="post" name="chat" id="chat">
        <table>
            <tr>
                <td><textarea name="mensagem" cols="30" rows="3" id="mensagem" onkeypress="press(event.keyCode);"></textarea></td>
                <td></td>
            </tr>
            <tr>
                <td>
                    <div>
                        <input type="submit" name="Submit" value="enviar comentario" />
                    </div>
                </td>
            </tr>
        </table>
    </form>
    <div id="atualizar">
        <iframe  id="chat" src="exibir.php#ancora" width="620" height="300" name="chat" scrolling="auto"></iframe>
    </div>
    
 </div>
<!-- <div style="clear:both"></div>-->
</body>
</html>