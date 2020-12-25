<?php
    
    include './classes/Comida.php';
    include_once './classes/Pedido.php';
    include_once './classes/Garcon.php';
    include_once './Gerenciar.php';
    include_once './classes/Cliente.php';
    
    
    if (isset($_POST["btnEnviar"])) {
        if ($_POST["txtComida"] != '0') {
//            if ($_POST["selCliente"] == '0') {
//                print "<script>";
//                print "alert('Escolha um cliente!')";
//                print "</script>";
//            }
            
//            $cliente = (int) $_POST["selCliente"];
            //print $cliente;
//            $buscarid = new Gerenciar();
//            $idBuscado = (int) $buscarid->buscarIdPeloNome($_COOKIE["nome"]);
            //print $idBuscado;
            $pedido = new Pedido(0, $_POST["radFuncionario"], $_POST["txtComida"], 1, date("Y/m/d", time()), 0, date('H:i:s', time()), 1);
        
            $garcon = new Garcon(0, "", "", "");
            if ($garcon->enviarPedido($pedido)) {
                print "<script>";
                print "alert('Pedido Salvo com Sucesso!')";
                print "</script>";
            } else {
                print "ERRO";
            }
        } else {
            print "<script>";
            print "alert('Escolha alguma comida!')";
            print "</script>";
        }
    }
    
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="css/cssprivadagarcon.css" />
        <title></title>
        
        <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<!--        <script type="text/javascript">
            
            $(function () {
                $("#linkCadastrar").click(function () {
                    $("#formCadastrarCliente").show(5000);
                });
            });
            $(document).ready(function(){
                atualiza();
            });

            function atualiza(){
                $.get('pedidosconfirmados.php', function(resultado){
                    $('#pedidosConfirmados').html(resultado);
                });
                
                setTimeout('atualiza()', 1000);
            }
        </script>
        -->
    </head>
    <body>
        <div id="formPedido">
            <form method="post" action="privadapedido.php">
                <table>
                    <tr>
                        <td><label>Cliente:</label></td>
                        <td>
                            <?php
//                                $cliente = new Cliente(0, "", 0);
//                                $cliente->buscarTodosClientes($_COOKIE["nome"]);
                                    $func = new Gerenciar();
                                    $func->getQuantFuncionario();
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td><label>Comida:</label></td>
                        <td>
                            <?php
                                $comidas = new Comida(0, "", "");
                                $comidas->todasComidas();
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="btnEnviar" /> 
                        </td>
                    </tr>
                </table>  
<!--                onclick="if(!confirm('Deseja Alterar?')) return false;"-->
            </form>
        </div>
        
    </body>
</html>
