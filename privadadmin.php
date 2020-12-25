<?php    
    include './check_logado.php';
    include_once './classes/Administrador.php';
//    include_once './classes/Receptor.php';
    
    
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <script type="text/javascript">
            $(document).ready(function(){
                
                
                
            });
        </script>
        
    </head>
    <body>
        <div id="saudacao">
            <?php
                print "Olá, " . $_SESSION["nome"];
            ?>
        </div>
        
        <div id="menu">
            <ul>
                <li><a href="">Cadastrar Garçon</a></li>
                <li><a href="">Cadastrar Comidas</a></li>
                <li><a href="abrircaixa.php?abrircaixa=1" id="abrirCaixa">Abrir Caixa</a></li>
                <li><a href="relatorio.php" id="fecharCaixa" onclick="if(!confirm('Deseja fechar o Caixa?')) return false;">Relatório do Dia</a></li>
            </ul>
        </div>
        
    </body>
</html>
