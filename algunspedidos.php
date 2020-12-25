<?php
    include './check_logado_cookies.php';
    
    include_once './classes/Pedido.php';
    include './Gerenciar.php';
    
    
    
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript">
            
            $(function(){
                
//                $('input[type=button]').click(function(){
//                    var id = $(this).attr('name');
////                    /var idcancelar = $(this).attr('value');
//                    $.ajax({
//                            type      : 'post',
// 
//                            url       : 'privadagarcon.php',
//
//                            data      : 'id='+ id,
//
//                            dataType  : 'html',
//
//                            success : 'ok'
//                    });
//                });
                $('.cancelar').click(function(){
                    var idcancelar = $(this).attr('name');
                    $.ajax({
                            type      : 'post',
 
                            url       : 'privadagarcon.php',

                            data      : 'idcancelar='+ idcancelar,

                            dataType  : 'html',

                            success : 'ok'
                    });
                });
            });
            

        </script>
    </head>
    <body>
        <div id="pedido">
            <?php

                $id = new Gerenciar();
                $idgarcon = $id->buscarIdPeloNome($_COOKIE["nome"]);

                $pedidos = new Pedido(0, 0, 0, 0, "", 0, "", 0);
                $pedidos->pedidos($idgarcon);

                //$x = '<script> document.getElementById(name).value(); </script>';
                //$setarUm = new Pedido(0, 0, 0, 0, "", 0, "");
                //$setarUm->setarConfirmacao($x);

            ?>
        </div>
    </body>
</html>
