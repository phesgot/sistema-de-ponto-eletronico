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
                foreach($supervisorDao->retornarListaFun($_GET['cod']) as $consulta ) {}
              ?>
          	<h4>Empresa: <?=$_SESSION["nome_emp"];?></h4>
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
                foreach($supervisorDao->retornarListaFun($_GET['cod']) as $consulta ) {

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
