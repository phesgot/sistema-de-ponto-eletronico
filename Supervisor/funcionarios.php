    <?php
      require_once("../Classes/DAO/SupervisorDAO.php");
      
      $supervisorDAO = new SupervisorDAO();
    ?>

    <div class="section" id="listaFuncionarios">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h1>
              <i class="fa fa-fw fa-users"></i>Funcionários</h1>
          </div>
          <div class="col-md-6">
            <div class="btn-group btn-group-justified">
              <a href='?pagina=afastamento' class="btn btn-dark"><i class="fa fa-fw fa-history"></i>Afastamento/Férias</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <table class="table table-striped table-bordered" id="id_listaFuncionarios" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>Status</th>
                  <th>Nome</th>
                  <th>Telefone</th>
                  <th>Jornada</th>
                  <th>Vizualizar</th>
                </tr>
              </thead>
              <tbody>
              <?php
              $id_emp = $_SESSION["id_emp"];
               foreach($supervisorDAO->retornarInfoFUN($id_emp) as $consulta ){
              ?>
                <tr>
                  <td>
                    <?php
                      if($consulta["status_fun"]==1){ 
                    ?>
                      <i class="-o fa fa-check fa-fw fa-lg text-success"></i>Ativo
                    <?php
                      }else if($consulta["status_fun"]==2) {
                    ?>
                      <i class="-o fa fa-fw fa-lg text-danger fa-close"></i>Inativo
                    <?php
                      }else{
                    ?>
                      <i class="-o fa fa-history fa-fw fa-lg text-info"></i>Afastado
                    <?php
                      }
                    ?>
                  </td>
                  <td><?=$consulta["nome_fun"];?></td>
                  <td><?=$consulta["telefone_fun"];?></td>
                  <td><?=$consulta["jornada"];?></td>
                  
                  <td class="text-center">
                      <button type="button" data-toggle="modal" data-target="#modal_visualizar<?=$consulta["id_fun"];  ?>">
                        <i class="fa fa-eye fa-fw fa-lg text-secondary" title="Vizualizar" ></i>
                      </button>
                  </td>
                </tr>




<!-- Inicio Modal Vizualisar Fun--> 
  <div class="modal" id="modal_visualizar<?=$consulta["id_fun"];?>">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Visualizar Informações</h5>
          <button type="button" class="close" data-dismiss="modal">
            <span>×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="list-group">
              <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1"><b>Funcionário</b></h5>
              </div>
              <p class="mb-1"><b><?php echo $consulta["nome_fun"]; ?></b></p>
        
            
              <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">E-mail</h5>
              </div>
              <p class="mb-1"><?php echo $consulta["email_fun"]; ?></p>
           
            
              <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1"><b>CPF</b></h5>
              </div>
              <p class="mb-1"><b><?php echo $consulta["cpf_fun"]; ?></b></p>
           
        <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">Jornada</h5>
              </div>
        <p class="mb-1"><?php echo $consulta["jornada"]; ?></p>
        
        <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1"><b>Telefone</b></h5>
              </div>
              <p class="mb-1"><b><?php echo $consulta["telefone_fun"]; ?></b></p>
          
              <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">Status do Funcionário</h5>
              </div>
        <?php
          if($consulta["status_fun"]==1){ 
        ?>
              <p class="mb-1">Ativo</p>
        <?php
          }else{
        ?>
        <p class="mb-1">Inativo</p>
        <?php
          }
        ?>
            
          </div>
        </div>
      </div>
    </div>
  </div>

              <?php
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
  