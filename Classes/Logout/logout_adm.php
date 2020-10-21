<?php

session_start();

if ($_SESSION["logado"]) {
    
    $_SESSION["id_adm"] = null;
    $_SESSION['nome_adm'] = null;
    $_SESSION['cpf'] = null;
    $_SESSION['logado'] = null;
}
         ?>
        <script>
            document.location.href = "../../login_adm.php?acao=logout";
        </script>  
        <?php 
?>