<?php
    include './check_logado_cookies.php';
    
    include './classes/Comida.php';
    include_once './classes/Pedido.php';
    include_once './classes/Garcon.php';
    include_once './Gerenciar.php';
    include_once './classes/Cliente.php';
    
    
    
    if (isset($_POST["btnInserir"])) {
        $buscarid = new Gerenciar();
        $id = $buscarid->buscarIdPeloNome($_COOKIE["nome"]);
        $cliente = new Cliente($id, $_POST["txtCliente"], $_COOKIE["nome"]);
        if ($cliente->inserirCliente($cliente->getNome(), $cliente->getIdcliente())) {
            print "<script>";
            print "alert('Cliente Inserido com sucesso');";
            print "</script>";
        }
    }
    
    if (isset($_POST["btnEnviar"])) {
        
        if ($_POST["txtComida"] != '0') {
            if ($_POST["selCliente"] == '0') {
                print "<script>";
                print "alert('Escolha um cliente!')";
                print "</script>";
            }
            
            $cliente = (int) $_POST["selCliente"];
            //print $cliente;
            $buscarid = new Gerenciar();
            $idBuscado = (int) $buscarid->buscarIdPeloNome($_COOKIE["nome"]);
            //print $idBuscado;
            $pedido = new Pedido(0, $idBuscado, $_POST["txtComida"], 1, date("Y/m/d", time()), 0, date('H:i:s', time()), $cliente);
        
            $garcon = new Garcon(0, "", "", "");
            for ($index = 0; $index < $_POST["numero"]; $index++) {
                if ($garcon->enviarPedido($pedido)) {
                    print "<script>";
                    print "alert('Pedido Salvo com Sucesso!')";
                    print "</script>";
                } else {
                    print "ERRO";
                }
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
        <!--        aqui-->
        
<!--        <link rel="stylesheet" href="/resources/demos/style.css" />-->
        
<!--        aqui-->
        <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
        <link rel="stylesheet" href="css/jquery-ui.css" />
        <script src="js/jquery-1.9.1.js"></script>
        <script src="js/jquery-ui.js"></script>
        
        <script type="text/javascript">
                    
            $(function() {
                $( "#tabs" ).tabs();
            });
            $(function () {
                $("#linkCadastrar").click(function () {
                    $("#formCadastrarCliente").show(5000);
                });
            });
            $(document).ready(function(){
                atualiza();
                
            });
            $(document).ready(function(){
                
                atualiza2();
            });
            
            function atualiza(){
                $.get('pedidosconfirmados.php', function(resultado){
                    $('#pedidosConfirmados').html(resultado);
                });
                
                setTimeout('atualiza()', 1000);
            }
            function atualiza2(){
                        $.get('algunspedidos.php', function(resultado){
                            $('#pedidos').html(resultado);
                        });

                        setTimeout('atualiza2()', 1000);
                    }
            
        </script>
        
    </head>
    <body>
        <div id="saudacao">
            <?php
                print "Olá, " . $_COOKIE["nome"];
                print " | <a href=\"logout.php\">Sair</a>";
                print "<br />";
            ?>
        </div>
        
        
        
        <div id="tabs">
            <ul>
              <li><a href="#tabs-1">Pedidos Confirmados</a></li>
              <li><a href="#tabs-2">Pedidos</a></li>
              <li><a href="#tabs-3">Cadastar Cliente</a></li>
              <li><a href="#tabs-4">Chat</a></li>
              
            </ul>
            <div id="tabs-1">
                <div id="formPedido">
                    <form method="post" action="privadagarcon.php">
                        <table>
                            <tr>
                                <td><label>Cliente:</label></td>
                                <td>
                                    <?php
                                        $cliente = new Cliente(0, "", 0);
                                        $cliente->buscarTodosClientes($_COOKIE["nome"]);
                                    ?>
                                    <label>Qtd: </label>
                                    <input type="number" name="numero" value="1" style="width: 50px;"/>
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
                
                <div id="pedidosConfirmados">
                    <iframe id="macromedia_index" name="iframe01" src="pedidosconfirmados.php" width="300" height="500" scrolling="Auto"></iframe>
                </div>
                
            </div>
            <div id="tabs-2">
                <div id="pedidos">
                    <iframe id="macromedia_index" name="iframe01" src="algunspedidos.php" width="520" height="750" scrolling="Auto"></iframe>
                </div>
            </div>
            <div id="tabs-3">
                <div id="formCadastrarCliente">
                    <fieldset>
                        <legend>Cadastrar Cliente</legend>
                        <form method="post" action="privadagarcon.php">
                            <table>
                                <tr>
                                    <td><label>Nome: </label></td>
                                    <td><input type="text" name="txtCliente" /></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><input type="submit" name="btnInserir" value="Inserir" /></td>
                                </tr>
                            </table>
                        </form>
                    </fieldset>
                </div>
            </div>
            <div id="tabs-4">
             
                <div id="chat">
                    <iframe id="macromedia_index" name="iframe01" src="chat/formulario.php" width="370" height="600" scrolling="Auto"></iframe>
                </div>
                
            </div>
            
        </div>
        
        <br />
        
        
        
        
    </body>
</html>
