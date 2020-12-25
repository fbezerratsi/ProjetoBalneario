<?php
    include './classes/Caixa.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            $caixa = new Caixa("", "", "", "", 0, 0, 1);
            $caixa->fecharCaixa();
            
        ?>
    </body>
</html>
