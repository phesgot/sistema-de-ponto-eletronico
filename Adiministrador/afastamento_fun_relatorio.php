    <?php
      require_once("../Classes/DAO/AdministrativoDAO.php");
      
      $administrativoDao = new AdministrativoDAO();
      
    ?>

    <div class="container-fluid mt-1">
      <div class="row">
        <div class="col-12">
            <div class="card card-body">

<form>
            <div class="form-row">
              <div class="form-group col-md-5">
                <select class="custom-control custom-select" name="funcionario" >
                  <option value="">Funcionário</option>

                  <?php
                    foreach($administrativoDao->retornarInfoFUN() as $consulta ){
                  ?>

                  <option value="<?=$consulta['id_fun'];?>"><?=$consulta['nome_fun'];?></option>

                  <?php
                    }
                  ?>

                </select>
              </div>

              <div class="form-group col-md-5">
                <div class="input-group date" data-provide="datepicker" language="pt-BR" data-date-format="dd/mm/yyyy" >
                    <input type="text" class="datepicker" id="filtro" maxlength="10"  name="data_inicial">
                      <div class="input-group-append">
                          <button class="btn btn-dark" type="button">
                            <i class="fa fa-calendar"></i>
                          </button>
                      </div>
                </div>
              </div>

              <div class="form-group col-md-2">
                  <button type="submit" class="btn btn-dark btn-block" id="btnfiltrar" name='pagina' value="filtrarAfastamento">Filtrar</button>
              </div>
              
            </div>
 </form>

<div class="row mt-2">
  <div class="col-12">
     <table class="table table-striped table-bordered" id="id_afastamento" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>Nome</th>
                  <th>Data inicial</th>
                  <th>Data final</th>
                  <th>Total de dias</th>
                  <th>Alocação</th>
                  <th>Motivo</th>
                  <th>Imprimir</th>
                </tr>
              </thead>
              <tbody>
              <?php
               foreach($administrativoDao->retornarAfastamento() as $consulta ){
              ?>
                <tr>
                  <td><?=$consulta["nome_fun"];?></td>
                  <td><?=$consulta["data_inicial"];?></td>
                  <td><?=$consulta["data_final"];?></td>
                  <td><?=$consulta["quant_dias"];?></td>
                  <td><?=$consulta["nome_emp"];?></td>
                  <td><?=$consulta["observacao"];?></td>
                  <td><a type="button" href='?pagina=printAfastamento&cod=<?=$consulta["id_folga"];?>' 
                    class="btn ">
                    <i class="-o fa fa-print fa-fw fa-lg text-dark" title="Imprimir"></i>
                  </td>
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
    </div>
      <script type="text/javascript" src="js/jsDataTable1.js"></script>
  <script type="text/javascript" src="js/jsDataTable2.js"></script>
  <script type="text/javascript" src="js/jsDataTable3.js"></script>
  <link rel="stylesheet" href="css/DataTable2.css"> 
    <script>
      $(document).ready(function(){
          $('#id_afastamento').DataTable({
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
