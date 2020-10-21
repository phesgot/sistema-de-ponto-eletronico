   <?php
      require_once("../Classes/DAO/SupervisorDAO.php");
      
      $supervisorDAO = new SupervisorDAO();
    ?>

    <div class="section" id="listaFuncionarios">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h1>
              <i class="fa fa-fw fa-history"></i>Afastamento</h1>
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
                  <th>Observação</th>
                </tr>
              </thead>
              <tbody>
              <?php
              $id_emp = $_SESSION["id_emp"];
               foreach($supervisorDAO->retornarInfoFolga($id_emp) as $consulta ){
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
                  <td><?=$consulta["observacao"];?></td>
                </tr>
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

    <script type="text/javascript">

$('#filtroInicial').keyup(function() {
    var nomeFiltro = $(this).val().toLowerCase();
    $('table tbody').find('tr').each(function() {
        var conteudoCelula = $(this).find('td:first').text();
        var corresponde = conteudoCelula.toLowerCase().indexOf(nomeFiltro) >= 0;
        $(this).css('display', corresponde ? '' : 'none');
    });
});

</script>

<script type="text/javascript">

$('#filtroFinal').keyup(function() {
    var nomeFiltro = $(this).val().toLowerCase();
    $('table tbody').find('tr').each(function() {
        var conteudoCelula = $(this).find('td:first').text();
        var corresponde = conteudoCelula.toLowerCase().indexOf(nomeFiltro) >= 0;
        $(this).css('display', corresponde ? '' : 'none');
    });
});

</script>

  