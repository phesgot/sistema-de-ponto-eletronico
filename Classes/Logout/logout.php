<?php

session_start();

if ($_SESSION["logado"]) {
    
    $_SESSION["id_emp"] = null;
    $_SESSION['nome_emp'] = null;
    $_SESSION['cnpj'] = null;
    $_SESSION['logado'] = null;
}
         ?>
        <script>
            document.location.href = "../../login_sup.php?acao=logout";
        </script>  
        <?php 
?>