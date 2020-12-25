<?php

    include_once './Gerenciar.php';
    include_once './classes/Cliente.php';
    
    $buscarid = new Gerenciar();
    $id = $buscarid->buscarIdPeloNome($_COOKIE["nome"]);
    
    if (isset($_POST["btnInserir"])) {
        $cliente = new Cliente($id, $_POST["txtCliente"], $_COOKIE["nome"]);
        if ($cliente->inserirCliente($cliente->getNome(), $cliente->getIdcliente())) {
            print "<script>";
            print "alert('Cliente Inserido com sucesso');";
            print "</script>";
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            $cliente = $_COOKIE["nome"];
        ?>
        <div id="formCadastrarCliente">
            <form method="post" action="cadastrarcliente.php">
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
        </div>
    </body>
</html>
