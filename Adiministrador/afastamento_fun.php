    <?php
      require_once("../Classes/DAO/AdministrativoDAO.php");
      
      $administrativoDao = new AdministrativoDAO();
    ?>

    <div class="section" id="listaFuncionarios">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h1>
              <i class="fa fa-fw fa-history"></i>Aafastamento</h1>
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
                  <th>Data inicial</th>
                  <th>Data final</th>
                  <th>Total de dias</th>
                  <th>Alocação</th>
                  <th>Motivo</th>
                  <th>Encerrar</th>
                </tr>
              </thead>
              <tbody>
              <?php
               foreach($administrativoDao->retornarInfoFolga() as $consulta ){
                  if($consulta["status_folga"] == 1){
              ?>
                <tr>
                  <td>
                      <i class="-o fa fa-history fa-fw fa-lg text-info"></i>Afastado
                  </td>
                  <td><?=$consulta["nome_fun"];?></td>
                  <td><?=$consulta["data_inicial"];?></td>
                  <td><?=$consulta["data_final"];?></td>
                  <td><?=$consulta["quant_dias"];?></td>
                  <td><?=$consulta["nome_emp"];?></td>
                  <td><?=$consulta["observacao"];?></td>
                  <td><button type="button" data-toggle="modal" data-target="#modal_encerrar<?=$consulta["id_fun"];?>">
                    <i class="-o fa fa-plane fa-fw fa-lg text-info" title="Encerrar Férias"></i>
                  </td>
                </tr>

 <!-- inicio Modal Encerrar FUN--> 
  <div class="modal" id="modal_encerrar<?=$consulta["id_fun"];?>">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Encerrar Afastamento</h5>
          <button type="button" class="close" data-dismiss="modal">
            <span>×</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Tem certeza que deseja encerrar o afastamento deste funcionário?</p>
          <p><?=$consulta["nome_fun"]?></p>
        </div>
     <form class="" method="post">
            <div class="form-group">
      <input type="text" style="display:none" name="id" maxlength="14" class="form-control"  value="<?=$consulta["id_fun"];?>">
      <input type="text" style="display:none" name="idFolga" maxlength="14" class="form-control"  value="<?=$consulta["id_folga"];?>">
      </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger" name="btnEncerrar">Sim</button>
          <button type="button" class="btn btn-dark" data-dismiss="modal">Não</button>
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
    
    if (isset($_POST['btnEncerrar'])) {
        
    $id_fun = $_POST['id'];
    $id_folga = $_POST['idFolga'];
    $status_fun = 1;
    $status_folga = 2;
        
    if ($administrativoDao->desatNotiAfas($id_folga, $status_folga, $id_fun, $status_fun)) {
        
        }
    ?>
      <script type="text/javascript">
        alert("Afastamento encerrado suscesso!");
        window.location = '?pagina=afastamento_fun';
      </script>
    <?php
  }
?>