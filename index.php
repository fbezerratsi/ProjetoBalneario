<?php
    session_start();
    
    include_once './classes/Garcon.php';
    include_once './classes/Receptor.php';
    include_once './classes/Administrador.php';
    include_once './classes/Comida.php';
    include_once './classes/Pedido.php';
    include './Gerenciar.php';
    
    $admin = new Administrador(0, "", "", "");
    $garcon = new Garcon(0, "", "", "");
    $receptor = new Receptor(0, "", "", "");
    $nomegarcon = new Gerenciar();
                    
    if (isset($_POST["btnEntrar"])) {
        
        if ($admin->logar($_POST["txtLogin"], $_POST["txtSenha"])) {
            $_SESSION["nome"] = "Administrador";
            $_SESSION["login"] = $_POST["txtLogin"];
            header("Location: privadadmin.php");
            exit();
        }
        
        $admin = new Administrador(0, "", "", "");

        $data = date("Y-m-d", time());
        if ($admin->verificarAberturaCaixa($data) === true) {
            if ($garcon->logarGarcon($_POST["txtLogin"], $_POST["txtSenha"])) {
                setcookie("nome", $nomegarcon->buscarNomeGarcon($_POST["txtLogin"]));
                header("Location: privadagarcon.php");
                exit();
            } else if ($receptor->logar($_POST["txtLogin"], $_POST["txtSenha"])) {
                setcookie("nomeReceptor", $nomegarcon->buscarNomeReceptor($_POST["txtLogin"]));
                header("Location: privadareceptor.php");
                exit();
            } else {
                print "<script>";
                print "alert('Senha ou Login INVÁLIDO!')";
                print "</script>";
            }
        } else {
            print "<script type=\"text/javascript\">";
            print "alert('Caixa Fechado! Consulte o Administrador')";
            print "</script>";
        }
        
    }
    
    
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="css/cssindex.css" type="text/css" />
        <title></title>
    </head>
    <body>
        <div id="login">
            <form method="post" action="index.php">
                <label>Login: </label><input type="text" name="txtLogin" />
                <label>Senha: </label><input type="password" name="txtSenha" />
                <input type="submit" name="btnEntrar" value="Entrar" />
            </form>
        </div>
        <?php
            
        
        ?>
        
    </body>
</html>
