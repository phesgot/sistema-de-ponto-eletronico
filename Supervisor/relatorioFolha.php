   <?php
      require_once("../Classes/DAO/SupervisorDAO.php");
      
      $supervisorDao = new SupervisorDAO();
    ?>

    <div class="section" id="listaFuncionarios">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            <h1>
              <?php
                foreach($supervisorDao->retornarListaFun($_GET['cod']) as $consulta ) {}
              ?>
              <i class="fa fa-fw fa-clock-o"></i>Presença <?=$consulta["data"];?>
            </h1>
            <a href='?pagina=printFolha&cod=<?=$_GET['cod'];?>' type="button" class="btn btn-dark my-2 mx-2"> <i class="fa fa-fw fa-print"></i> Imprimir relatorio</a>
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
                foreach($supervisorDao->retornarListaFun($_GET['cod']) as $consulta ) {

                   if($consulta['status_fun'] == 1 || $consulta['status_fun'] == 3 ) {
              ?>
                <tr>
              <?php 
                  if ($consulta['status_presenca'] == 1) { 
                  if($consulta['status_fun'] == 3) {  
              ?>

                    <td><i class="-o fa fa-history fa-fw fa-lg text-info"></i><p style="display:none">z</p> Afastado(a)</td>
                    <td><?=$consulta["nome_fun"];?></td>
                    <td>--/--</td>
                    <td>--/--</td>
                  <?php
                    }  else{
                  ?>
                  <td>
                    <button class="btn btn-dark" type="button" data-toggle="modal" data-target="#modal_ausente<?=$consulta["id_presenca"];?>">
                     <i class="-o fa fa-close fa-fw fa-lg text-danger" title="Ativar"></i> Ausente 
                    </button>
                  </td>
                  <td><?=$consulta["nome_fun"];?></td>
                  <td>
                    <button class="btn btn-dark" type="button" data-toggle="modal" data-target="#modal_presenca<?=$consulta["id_presenca"];?>">
                     <i class="-o fa fa-check fa-fw fa-lg text-success" title="Presente"></i> Presente 
                    </button>
                  </td>
                  <td><?=$consulta["saida"];?></td>
                 


              <?php
                  }
                  } if ($consulta['status_presenca'] == 2) {
              ?>
                  <td>
                     <i class="-o fa fa-check fa-fw fa-lg text-success"></i> Presente 
                  </td>
                  <td><?=$consulta["nome_fun"];?></td>
                  <td>
                    <?=$consulta["entrada"];?>
                  </td>
                  <td>
                    <button class="btn btn-dark" type="button" data-toggle="modal" data-target="#modal_saida<?=$consulta["id_presenca"];?>">
                     <i class="-o fa fa-check fa-fw fa-lg text-success" title="Saída"></i> Saída
                    </button>
                  </td>
              <?php
                }  if ($consulta['status_presenca'] == 3) {
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
              ?>
                  <td><?=$consulta["jornada"];?></td>
                </tr>

    <!-- inicio Modal ausente --> 
  <div class="modal" id="modal_ausente<?=$consulta["id_presenca"];?>">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Marcar ausência</h5>
          <button type="button" class="close" data-dismiss="modal">
            <span>×</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Tem certeza que deseja marcar este funcionario '<?=$consulta["nome_fun"];?>' como ausente?</p>
        </div>
     <form class="" method="post">
            <div class="form-group">
      <input type="text" style="display:none" name="id" maxlength="14" class="form-control"  value="<?=$consulta["id_presenca"];?>">
      </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger" name="btnAusente">Confirmar</button>
          <button type="button" class="btn btn-dark" data-dismiss="modal">Cancelar</button>
      </form>
        </div>
      </div>
    </div>
  </div> 

<?php
$horaE = date("H:i"); 
$horaS = date("H:i:s"); 
?>


      <!-- inicio Modal presente--> 
  <div class="modal" id="modal_presenca<?=$consulta["id_presenca"];?>">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Marcar entrada</h5>
          <button type="button" class="close" data-dismiss="modal">
            <span>×</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Registrar entrada deste funcionário '<?=$consulta["nome_fun"]?>' ? ?</p>
          <p>Verifique a hora: <?=$horaE?></p>
        </div>
     <form class="" method="post">
            <div class="form-group">
       <input type="text" style="display:none" name="id" maxlength="14" class="form-control"  value="<?=$consulta["id_presenca"];?>">
       <input type="text" style="display:none" name="horaE" maxlength="14" class="form-control"  value="<?=$horaE?>">
      </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger" name="btnPresente">Confirmar</button>
          <button type="button" class="btn btn-dark" data-dismiss="modal">Cancelar</button>
      </form>
        </div>
      </div>
    </div>
  </div> 

    <!-- inicio Modal saida--> 
  <div class="modal" id="modal_saida<?=$consulta["id_presenca"];?>">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Marcar saída</h5>
          <button type="button" class="close" data-dismiss="modal">
            <span>×</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Resgistrar saída deste funcionário '<?=$consulta["nome_fun"]?>' ?</p>
          <p>Verique a hora: <?=$horaS?></p>
        </div>
     <form class="" method="post">
            <div class="form-group">
      <input type="text" style="display:none" name="id" maxlength="14" class="form-control"  value="<?=$consulta["id_presenca"];?>">
       <input type="text" style="display:none" name="horaS" maxlength="14" class="form-control"  value="<?=$horaS?>">
      </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger" name="btnSaida">Confirmar</button>
          <button type="button" class="btn btn-dark" data-dismiss="modal">Cancelar</button>
      </form>
        </div>
      </div>
    </div>
  </div> 


              <?php
                  }
                }
              ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>




	<script type="text/javascript" src="js/jsDataTable1.js"></script>
	<script type="text/javascript" src="js/jsDataTable2.js"></script>
	<script type="text/javascript" src="js/jsDataTable3.js"></script>
	<link rel="stylesheet" href="css/DataTable2.css"> 
    <script>
      $(document).ready(function(){
  		    $('#id_listaFuncionarios').DataTable({
              "language": {
                            "sEmptyTable": "Nenhum registro encontrado",
                            "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                            "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                            "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                            "sInfoPostFix": "",
                            "sInfoThousands": ".",
                            "sLengthMenu": "_MENU_ resultados por página",
                            "sLoadingRecords": "Carregando...",
                            "sProcessing": "Processando...",
                            "sZeroRecords": "Nenhum registro encontrado",
                            "sSearch": "Pesquisar",
                            "oPaginate": {
                                "sNext": "Próximo",
                                "sPrevious": "Anterior",
                                "sFirst": "Primeiro",
                                "sLast": "Último"
                            },
                            "oAria": {
                                "sSortAscending": ": Ordenar colunas de forma ascendente",
                                "sSortDescending": ": Ordenar colunas de forma descendente"
                             }
                        }
  		    });
  		});
    </script>


  <?php    
  /*Código Ausencia*/        
  if (isset($_POST['btnAusente'])) {
        
    $id_presenca = $_POST['id'];
    $status_presenca = 4;
        
    if ($supervisorDao->Ausentar($id_presenca, $status_presenca)) {
    }
    ?>
      <script type="text/javascript">
        alert("Ausência resgistrada com sucesso!!"); 
        window.location = '?pagina=folha&cod=<?=$_GET['cod'];?>';
      </script>
    <?php
  }


    /*Código Presenca*/        
  if (isset($_POST['btnPresente'])) {
        
    $id_presenca = $_POST['id'];
    $timeE = $_POST['horaE'];
    $status_presenca = 2;
        
    if ($supervisorDao->Entrada($id_presenca, $timeE, $status_presenca)) {
    }
    ?>
      <script type="text/javascript">
        alert("Entrada resgistrada com sucesso!!");
         window.location = '?pagina=folha&cod=<?=$_GET['cod'];?>';
      </script>
    <?php
    header("Refresh: 0");
  }


  /*Código Saida*/        
  if (isset($_POST['btnSaida'])) {
        
    $id_presenca = $_POST['id'];
    $timeS = $_POST['horaS'];
    $status_presenca = 3;
        
    if ($supervisorDao->Saida($id_presenca, $timeS, $status_presenca)) {
    }
    ?>
      <script type="text/javascript">
        alert("Saída resgistrada com sucesso!!");
         window.location = '?pagina=folha&cod=<?=$_GET['cod'];?>';
      </script>
    <?php
     header("Refresh: 0");
  }
?>