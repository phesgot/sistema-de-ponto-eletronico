   <?php
      require_once("../Classes/DAO/SupervisorDAO.php");
      
      $supervisorDao = new SupervisorDAO();
    ?>
    <script type="text/javascript">
    window.print();
  </script>
    <div class="section" id="listaFuncionarios">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            
              <?php
                foreach($supervisorDao->retornarAfastFun($_SESSION['id_emp'], $_GET['cod']) as $consulta ) {
              ?>
                  <!-- Print -->
                  <h6>Afastado</h6>
                  <h6>Nome: <?=$consulta["nome_fun"];?></h6>
                  <h6>Data Inicial: <?=$consulta["data_inicial"];?>  ---   Término: <?=$consulta["data_final"];?></h6>
                  <h6>Total de dias: <?=$consulta["quant_dias"];?></h6>
                  <h6>Motivo: <?=$consulta["observacao"];?></h6>
                </br>
              <?php
                }
              ?>

          </div>
        </div>
      </div>
  </div>