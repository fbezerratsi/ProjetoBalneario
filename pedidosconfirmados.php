<?php
    //include './check_logado_cookies_1.php';
    
    include_once './Gerenciar.php';
    include_once './classes/PedidoConfirmado.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            $id = new Gerenciar();
            $idgarcon = $id->buscarIdPeloNome($_COOKIE["nome"]);
            
            $pedidos = new PedidoConfirmado(0, 0, 0, 0, "", "");
            $pedidos->todosPedidosConfirmadosGarcon($idgarcon);
        ?>
    </body>
</html>
