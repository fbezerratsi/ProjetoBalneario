<?php
    include './inserir.php';


    if (inserirAdmin("Felipe Bezerra", "admin", "D2drsdrs")) {
        print "Administrador Inserido com SUCESSO!!!";
    }
    
    if (inserirGarcon("Felipe Bezerra", "felipe", "1234")) {
        print "GARÇON Inserido com SUCESSO!!!";
    }
    if (inserirGarcon("Bruno Azevedo", "bruno", "1234")) {
        print "GARÇON Inserido com SUCESSO!!!";
    }
    if (inserirGarcon("Marcelo Azevedo", "marcelo", "1234")) {
        print "GARÇON Inserido com SUCESSO!!!";
    }
    if (inserirGarcon("Jackson Azevedo", "jackson", "1234")) {
        print "GARÇON Inserido com SUCESSO!!!";
    }
    if (inserirGarcon("Xerosa Xeroso", "xerosa", "1234")) {
        print "GARÇON Inserido com SUCESSO!!!";
    }
    if (inserirGarcon("Gleison Azevedo", "gleison", "1234")) {
        print "GARÇON Inserido com SUCESSO!!!";
    }
    
    if (inserirReceptor("Jakelyne Azevedo", "jak", "1234")) {
        print "RECEPTOR Inserido com SUCESSO!!!";
    }

?>
