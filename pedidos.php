<?php
    include './check_logado_cookies_1.php';
    
    include_once './classes/Pedido.php';
    
    
    
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript">
            $(function(){
                
                $('input[type=button]').click(function(){
                    var id = $(this).attr('name');
//                    /var idcancelar = $(this).attr('value');
                    $.ajax({
                            type      : 'post',
 
                            url       : 'privadareceptor.php',

                            data      : 'id='+ id,

                            dataType  : 'html',

                            success : 'ok'
                    });
                });
                $('.cancelar').click(function(){
                    var idcancelar = $(this).attr('name');
                    $.ajax({
                            type      : 'post',
 
                            url       : 'privadareceptor.php',

                            data      : 'idcancelar='+ idcancelar,

                            dataType  : 'html',

                            success : 'ok'
                    });
                });
            });
            
//                $(function() {
//                    $(".botao").click( function() {
//                        var id = $(this).attr('name');
//                        id = parseInt(id);
//                        //alert(id);
//                        $.post("pedidos.php", {txtId: id});
//                        //ocument.write(id).valueOf();
//                    });
//                    
//                });
        </script>
    </head>
    <body>
        
        <?php
            $pedidos = new Pedido(0, 0, 0, 0, "", 0, "", 0);
            $pedidos->todosPedidos();
            
            //$x = '<script> document.getElementById(name).value(); </script>';
            //$setarUm = new Pedido(0, 0, 0, 0, "", 0, "");
            //$setarUm->setarConfirmacao($x);
            
        ?>
    </body>
</html>
