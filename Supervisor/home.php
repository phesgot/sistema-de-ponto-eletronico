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
        <div class="col-md-12">
          <form method="post">
          <button class="btn btn-dark" type="submit" name="btnGerar">Gerar folha de presença</button>
        </form>
        </div>
        <div class="col-md-12 mt-2">
            <ul class="list-group">
<?php
  $id_empresa = $_SESSION['id_emp'];
  foreach($supervisorDao->retornarFolha($id_empresa) as $consulta ){
?>

              <li class="list-group-item d-flex justify-content-between align-items-center" > <?=$consulta["data"];?>
                <a href='?pagina=folha&cod=<?=$consulta["id_folha"];?>' class="btn " type="button">
                  <i class="fa fa-eye fa-fw fa-lg text-secondary" title="Vizualizar" ></i>
                </a>
              </li>
              
<?php
  }
?>

            </ul>
          </div>
      </div>
    </div>
<?php 
    if (isset($_POST['btnGerar'])) {
        
    $data = date('d/m/Y');
    $id_empresa = $_SESSION['id_emp'];

    $confereFolha = $supervisorDao->existeFolha($data, $id_empresa);
    

    if ($confereFolha != 1) { 

      $folha->setData($data);
      $folha->setFk_empresa_folha($id_empresa);
    
      if ($supervisorDao->gerarFolha($folha)) {

        foreach($supervisorDao->ultimaId() as $idFolha ){}

         $id_emp = $_SESSION["id_emp"];
               foreach($supervisorDao->retornarInfoFUN($id_emp) as $consulta ){

                $presenca->setFk_folha_presenca($idFolha["id_folha"]);     
                $presenca->setFk_funcionario_presenca($consulta["id_fun"]);

                $supervisorDao->finalizarFolha($presenca);

               }

        
      }
      ?>
        <script type="text/javascript">
          alert("Folha gerada!");
          window.location = '?pagina=home';
        </script>
      <?php
    }else
    ?>
        <script type="text/javascript">
          alert("Já existe uma folha gerada com a data atual!");
          window.location = '?pagina=home';
        </script>
      <?php
  }
?>