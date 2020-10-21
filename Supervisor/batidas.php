    <?php
      require_once("../Classes/DAO/SupervisorDAO.php");
      require_once("../Classes/Entidade/Folha.php");
      require_once("../Classes/Entidade/Presenca.php");
      
      $supervisorDao = new SupervisorDAO();
      $folha = new Folha();
      $presenca = new Presenca();
    ?>

    <div class="container">
      <div class="row">
        <div class="col-md-6">
           <h1>
              <i class="fa fa-fw fa-calendar"></i>Relatório de Batida</h1>
          </div>
            <table class="table table-striped table-bordered" id="lista" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>Data
                          <div class="input-group date" data-provide="datepicker" language="pt-BR" data-date-format="dd/mm/yyyy" >
                              <input type="text" class="datepicker" id="filtro" maxlength="10" >
                              <div class="input-group-append">
                                <button class="btn btn-dark" type="button">
                                  <i class="fa fa-calendar"></i>
                                </button>
                              </div>
                          </div>
                  </th>
                  <th>Vizualizar</th>
                </tr>
              </thead>
              <tbody>
              <?php
                $id_empresa = $_SESSION['id_emp'];
                foreach($supervisorDao->retornarRelaFolha($id_empresa) as $consulta ){
              ?>

                <tr>
                  <td> <?=$consulta["data"];?></td>
                  <td>
                    <a href='?pagina=relatorioFolha&cod=<?=$consulta["id_folha"];?>' 
                    class="btn " type="button">
                      <i class="fa fa-eye fa-fw fa-lg text-secondary" title="Vizualizar" ></i>
                    </a>
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

<script type="text/javascript">

$('#filtro').keyup(function() {
    var nomeFiltro = $(this).val().toLowerCase();
    $('table tbody').find('tr').each(function() {
        var conteudoCelula = $(this).find('td:first').text();
        var corresponde = conteudoCelula.toLowerCase().indexOf(nomeFiltro) >= 0;
        $(this).css('display', corresponde ? '' : 'none');
    });
});

</script>




