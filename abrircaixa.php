<?php
    include_once './classes/Administrador.php';
    include_once './classes/Caixa.php';

    if (isset($_GET["abrircaixa"])) {
        $admin = new Administrador(0, "", "", "");

        $data = date("Y-m-d", time());
        if ($admin->verificarAberturaCaixa($data)) {
            print "Felipe";
            print "<script type=\"text/javascript\">";
            print "alert('Caixa Já ABERTO!')";
            print "</script>";
        } else {

            $caixa = new Caixa(date("Y/m/d", time()), date("H:m:s", time()), "", "", 0, 0, 1);
            $admin->abrirCaixa($caixa);

        }
        header("Location: privadadmin.php");
        exit();
    }

?>
