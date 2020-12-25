<?php
    include './check_logado_cookies_1.php';
    
    include_once './classes/Pedido.php';
    include_once './Gerenciar.php';
    
    
    if (isset($_POST["id"])) {
        $id = $_POST["id"];
        $setarUm = new Pedido(0, 0, 0, 0, "", 0, "", 0);
        $setarUm->setarConfirmacao($id);
        $buscarpedido = new Gerenciar();
        
        $buscarpedido->setarPedidosConfirmados($id);
    }
    if (isset($_POST["idcancelar"])) {
        $deletarPedido = new Gerenciar();
        $deletarPedido->setarConfirmacaoPedido($_POST["idcancelar"]);
    }
    
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link type="text/css" href="css/cssprivadareceptor.css" rel="stylesheet" />
        <title></title>
        
        <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
        <script type="text/javascript">
            $(function (){
                $('#testar').click(function (){
                    document.getElementById('demo').play();
                });
            });
            $(document).ready(function(){
                atualiza();
            });
            
            function atualiza(){
                $.get('pedidos.php', function(resultado){
                    $('#pedidos').html(resultado);
                });
                
                setTimeout('atualiza()', 1000);
            }
        </script>
        
    </head>
    <body>
        <div id="saudacao">
            <?php
                print "Olá, " . $_COOKIE["nomeReceptor"];
                print " | <a href=\"logoutReceptor.php\">Sair</a>";
            ?>
        </div>
        <div id="pedidos">
            <iframe id="macromedia_index" name="iframe01" src="pedidos.php" width="300" height="750" scrolling="Auto"></iframe>
        </div>
        
        
        <div id="chat">
            <iframe id="macromedia_index" name="iframe01" src="chat/formulario.php" width="370" height="600" scrolling="Auto"></iframe>
        </div>
    </body>
</html>
