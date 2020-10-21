<?php
session_start();

if (!isset($_SESSION['logado'])) {
    header('Location: ../login_sup.php');
}
      
?>

<!DOCTYPE html>
<html>

<head>
  <title>Sistema de Presença</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="../css/theme.css" type="text/css">
  <link rel="stylesheet" href="../css/bootstrap-datepicker.css" type="text/css">
</head>

  <script type="text/javascript" src="../js/jquery-3.2.1.slim.min.js"></script>
  <script type="text/javascript" src="../js/popper.min.js"></script>
  <script type="text/javascript" src="../js/bootstrap.min.js"></script>
  
  <script src="js/jquery-3.3.1.min.js" type="text/javascript"></script>
  <script src="js/jquery.mask.min.js" type="text/javascript"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      $("#telefone").mask("(00)00000-0000");
      $("#telefoneFixo").mask("(00)0000-0000");
      $("#data").mask("00/00/0000");
      $("#cpf").mask("000.000.000-00");
      $("#cnpj").mask("00.000.000/0000-00");
      $("#cep").mask("00.000-000");
      $("#").mask("");
      $("#").mask("");
    })
  </script>
  <script src="../js/bootstrap-datepicker.min.js" type="text/javascript"></script>
  <script src="../js/bootstrap-datepicker.pt-BR.min.js" type="text/javascript"></script>
  <script type="text/javascript">
    $('.datepicker').datepicker({
    format: 'dd/mm/yyyy',
    language: 'pt-BR',
});
  </script>


<body>


  <nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <div class="container">
      <a class="navbar-brand" href='?pagina=home'>
        <i class="fa d-inline fa-lg fa- fa-file-archive-o"></i>
        <b> SPE</b>
      </a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar2SupportedContent">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse text-center justify-content-end" id="navbar2SupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item" >
              <a href='?pagina=home' class="nav-link"><i class="fa fa-fw s fa-home"></i> Início</a>
          </li>
          <li class="nav-item">
            
              <a href='?pagina=funcionarios' class="nav-link"><i class="fa fa-fw fa-users"></i> Funcionários</a>
          </li>
          <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-fw fa-file-pdf-o"></i> Relatórios
                  </a>   
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href='?pagina=batidas'><i class="fa fa-fw fa-calendar"></i> Batidas</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href='?pagina=ferias'><i class="fa fa-fw fa-history"></i> Aastamento</a>
                    </div>
          </li>
        </ul>
        <a class="btn navbar-btn ml-2 text-white btn-danger" href="..\Classes\Logout\logout.php">
          <i class="fa d-inline fa-lg fa-user-circle-o"></i> Sair</a>
      </div>
    </div>
  </nav>
		
		<div >
			<br>
        </div>
		
	<!------------------------------------------------Linkando páginas----------------------------------------------->			
       <div id="dvCentro">
            <div id="dvEsquerda">
                <?php
                if (isset($_GET['pagina'])) {
                    $pagina = $_GET['pagina'];
                    switch ($pagina) {

                        case "home":
                            include_once("home.php");
                            break;
                        case "funcionarios":
                            include_once ("funcionarios.php");
                            break;
                        case "afastamento":
                            include_once ("afastamento.php");
                            break;
                        case "batidas":
                            include_once ("batidas.php");
                            break;
                        case "folha":
                            include_once ("folha.php");
                            break;
                        case "relatorioFolha":
                            include_once ("relatorioFolha.php");		
                            break;
                        case "printFolha":
                            include_once ("printFolha.php");    
                            break;
                        case "printAfastamentos":
                            include_once ("printAfastamentos.php");    
                            break;
                        case "ferias":
                            include_once ("ferias.php");    
                            break;					
                        default:
                            include_once("inicio.php");
                    }
                } else {
                    include_once("home.php");
                }
                ?>
            </div>
			<div id="dvDireita"></div>
            <div class="clear"></div>
        </div>
		<!------------------------------------------------FIM------------------------------------------------------>
		

	</body>
</html>