<?php
session_start();

if (!isset($_SESSION['logado'])) {
    header('Location: ../login_adm.php');
}


      require_once("../Classes/DAO/AdministrativoDAO.php");
      
      $administrativoDao = new AdministrativoDAO();
?>

<!DOCTYPE html>
<html>

<head>
  <title>Sistema de Presença</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="../css/theme.css" type="text/css"> 

</head>

  <script type="text/javascript" src="../js/jquery-3.2.1.slim.min.js"></script>
  <script type="text/javascript" src="../js/popper.min.js"></script>
  <script type="text/javascript" src="../js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../css/bootstrap-datepicker.css" type="text/css">
  
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
      <a class="navbar-brand" href="?pagina=home">
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
          
          <li class="nav-item">
            
              <a href='?pagina=administradores' class="nav-link"><i class="fa fa-fw fa-user-secret"></i> Administradores</a>
          </li>
		  <li class="nav-item">
            
              <a href='?pagina=empresas' class="nav-link"><i class="fa fa-fw fa-building"></i> Empresas</a>
          </li>
		  <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-fw fa-file-pdf-o"></i> Relatórios
                  </a>   
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href='?pagina=batidas'><i class="fa fa-fw fa-calendar"></i> Batidas</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href='?pagina=afastamento'><i class="fa fa-fw fa-history"></i> Afastamento</a>
                    </div>
          </li>
        </ul>
        <a class="btn navbar-btn ml-2 text-white btn-danger" href="..\Classes\Logout\logout_adm.php">
          <i class="fa d-inline fa-lg fa-user-circle-o"></i> Sair</a>
      </div>
    </div>
  </nav>
		
		<div >
			<br>
        </div>
		
	<!------------------------------------------------Linkando páginas------------------------------------------------------>			
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
                        case "batidas":
                            include_once ("batidas_fun.php");
                            break;
                        case "cadastrar_fun":
                            include_once ("cadastrar_fun.php");
                            break;
						            case "cadastrar_adm":
                            include_once ("cadastrar_adm.php");
                            break;
						            case "cadastrar_emp":
                            include_once ("cadastrar_emp.php");
                            break;
						            case "administradores":
                            include_once ("administradores.php");
                            break;
						            case "empresas":
                            include_once ("empresas.php");
                            break;
                        case "afastamento_fun":
                            include_once ("afastamento_fun.php");
                            break;
                        case "afastamento":
                            include_once ("afastamento_fun_relatorio.php");
                            break;
                        case "printAfastamento":
                            include_once ("printAfastamento.php");    
                            break;

                        case "filtrar":
                          $info1 = ($_GET['empresa']);
                          $info2 = ($_GET['data']);

                          ?>

                <script type="text/javascript">
    window.print();
  </script>
    <div class="section" id="listaFuncionarios">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            
              <?php
                foreach($administrativoDao->retornarListaFun($info1, $info2) as $consulta ) {}
              ?>
            <h4>Empresa: <?=$consulta["nome_emp"];?></h4>
            <h6><i class="fa fa-fw fa-clock-o"></i>Presença <?=$consulta["data"];?> </h6>
          </div>
        </div>
      </div>
    </div>
    <div class="section">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <table class="table table-striped table-bordered" id="id_listaFuncionarios" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>Status</th>
                  <th>Nome</th>
                  <th>Entrada</th>
                  <th>Saída</th>
                  <th>Jornada</th>
                </tr>
              </thead>
              <tbody>
             <?php
                foreach($administrativoDao->retornarListaFun($info1, $info2) as $consulta ) {

                   if($consulta['status_fun'] == 1 || $consulta['status_fun'] == 3 ) {
              ?>
                <tr>
              
              <?php
                if ($consulta['status_presenca'] == 3) {
              ?>
                 <td>
                     <i class="-o fa fa-check fa-fw fa-lg text-success"></i> Presente 
                  </td>
                  <td><?=$consulta["nome_fun"];?></td>
                  <td>
                    <?=$consulta["entrada"];?>
                  </td>
                  <td>
                    <?=$consulta["saida"];?>
                  </td>

              <?php
                } if ($consulta['status_presenca']  == 4) {
              ?>
                   <td>
                     <i class="-o fa fa-close fa-fw fa-lg text-danger"></i><p style="display:none">q</p> Ausente 
                  </td>
                  <td><?=$consulta["nome_fun"];?></td>
                  <td>
                    --/--
                  </td>
                  <td>
                    --/--
                  </td>

              <?php
                  }
              }
        
              ?>
                  <td><?=$consulta["jornada"];?></td>
                </tr>
             <?php
              }
            ?>

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

                        <?php
                          break;

						case "filtrarAfastamento":
                          $info3 = ($_GET['funcionario']);
                          $info4 = ($_GET['data_inicial']);

                          ?>
                          <script type="text/javascript">
    window.print();
  </script>

             
                    <div class="container-fluid">
                      <div class="row">
                        <div class="col-md-6">
                          
                            <?php
                              foreach($administrativoDao->retornarAfastado($info3, $info4) as $retorno ) {
                            ?>
                                <h6>Afastado</h6>
                                <h6>Nome: <?=$retorno["nome_fun"];?></h6>
                                <h6>Data Inicial: <?=$retorno["data_inicial"];?>  ---   Término: <?=$retorno["data_final"];?></h6>
                                <h6>Total de dias: <?=$retorno["quant_dias"];?></h6>
                                <h6>Motivo: <?=$retorno["observacao"];?></h6>
                              </br>
                            <?php
                              }
                            ?>


                        </div>
                      </div>
                    </div>

                        <?php
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