		<?php
			require_once("../Classes/DAO/AdministrativoDAO.php");
      require_once("../Classes/Entidade/Folga.php");
			
			$administrativoDao = new AdministrativoDAO();
      $folga = new Folga();
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
              <a href='?pagina=cadastrar_fun' class="btn btn-dark"><i class="fa fa-fw fa-user-plus"></i>Novo Funcionário</a>
              <a href="#" class="btn btn-dark"><i class="fa fa-fw fa-calendar"></i>Batidas</a>
              <a href='?pagina=afastamento_fun' class="btn btn-dark"><i class="fa fa-fw fa-history"></i>Afastamento/Férias</a>
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
					<th>Escala</th>
					<th>alocação</th>
					<th>Ações</th>
                </tr>
              </thead>
              <tbody>
                <?php
	foreach($administrativoDao->retornarInfoFUN() as $consulta ){
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
					  <td><?=$consulta["nome_emp"];?></td>
					  <td>
						<button type="button" data-toggle="modal" data-target="#modal_visualizar<?=$consulta["id_fun"];?>">
							<i class="fa fa-eye fa-fw fa-lg text-primary" title="Vizualizar" ></i>
						</button>
						<button type="button" data-toggle="modal" data-target="#modal_editar<?=$consulta["id_fun"];?>">
							<i class="fa fa-fw fa-lg fa-pencil text-warning" title="Editar"></i>
						</button>
						<button type="button" data-toggle="modal" data-target="#modal_alocar<?=$consulta["id_fun"];?>">
							<i class="fa fa-fw fa-lg fa-building text-dark" title="Alocar funcionário"></i>
						</button>

            <?php
              if($consulta["status_fun"]==1){ 
            ?>
            <button type="button" data-toggle="modal" data-target="#modal_afastamento<?=$consulta["id_fun"];?>">
              <i class="fa fa-fw fa-lg fa-history text-secondary" title="Afastamento"></i>
            </button>
            <?php
              }
            ?>

				<?php
				  if($consulta["status_fun"]==1 || $consulta["status_fun"]==3){ 
				  ?>
				  <button type="button" data-toggle="modal" data-target="#modal_desativar<?=$consulta["id_fun"];?>">
                     <i class="fa fa-fw fa-lg fa-lock text-danger" title="Bloquear"></i>
				  </button>
					<?php
				  }else if ($consulta["status_fun"] == 2){
					?>
					<button type="button" data-toggle="modal" data-target="#modal_ativar<?=$consulta["id_fun"];?>">
					<i class="-o fa fa-check fa-fw fa-lg text-success" title="Ativar"></i>
					</button>
					<?php
				  } 
				  ?>
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
                <h5 class="mb-1">Dados da empresa que se encontra alocado</h5>
              </div>
              <p class="mb-1">
			  Empresa: <?php echo $consulta["nome_emp"]; ?> </br>
			  E-mail: <?php echo $consulta["email_emp"]; ?> </br>
			  Telefone:	<?php echo $consulta["telefone_emp"]; ?> </br>
			  Endereço: <?php echo $consulta["endereco_emp"]; ?>, <?php echo $consulta["cidade_emp"]; ?>, <?php echo $consulta["bairro_emp"]; ?>
			  -<?php echo $consulta["uf_emp"]; ?> CEP: <?php echo $consulta["cep_emp"]; ?></p>
			  
            
              <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1"><b>Status do Funcionário</b></h5>
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
  <!-- Fim Modal Visualizar fun-->
				
				
				
<!-- Inicio Modal Editar fun-->
<div class="modal" id="modal_editar<?=$consulta["id_fun"];?>">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Editar Funcionário</h5>
          <button type="button" class="close" data-dismiss="modal">
            <span>×</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="" method="post">
            <div class="form-group">
			<input type="text" style="display:none" name="id" maxlength="14" class="form-control"  value="<?=$consulta["id_fun"];?>">
              <label>Nome</label>
              <input type="text" class="form-control" value="<?=$consulta["nome_fun"];?>" name="txtNome" maxlength="80"> </div>
            <div class="form-group">
              <label>E-mail</label>
              <input type="email" class="form-control" value="<?=$consulta["email_fun"];?>" name="txtEmail" maxlength="80"> </div>
            <div class="form-group">
              <label>CPF</label>
              <input type="text" class="form-control" id="inlineFormInput" maxlength="14" readonly="true" value="<?=$consulta["cpf_fun"];?>" name="txtCpf" >
            </div>
			<div class="form-group">
              <label>Telefone</label>
              <input type="text" class="form-control" value="<?=$consulta["telefone_fun"];?>" name="txtTelefone" maxlength="10"> </div>
			  <div class="form-group">
			<div class="form-group">
              <label for="exampleInputEmail1">Jornada</label>
              <select class="custom-control custom-select" name="txtJornada">
                <option value="<?=$consulta["jornada"];?>"><?php echo $consulta["jornada"]; ?></option>
				<option>SEG - SAB - 19H às 00H</option>
                <option>SEG - SAB - 13H às 19H</option>
                <option>TER - DOM - 19H às 00H</option>
				<option>TER - DOM - 13H às 19H</option>
              </select>
            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-dark" name="btnAlterar">Alterar</button>
		  </form>
        </div>
      </div>
    </div>
  </div>
 </div>
  <!-- Fim Modal Editar fun-->


<!-- Inicio Modal Afastar fun-->
<div class="modal" id="modal_afastamento<?=$consulta["id_fun"];?>">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Afastar Funcionário</h5>
          <button type="button" class="close" data-dismiss="modal">
            <span>×</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="" method="post">
            <div class="form-group">
      <input type="text" style="display:none" name="id" maxlength="14" class="form-control"  value="<?=$consulta["id_fun"];?>">
              <label>Nome</label>
              <input type="text" class="form-control-plaintext" value="<?=$consulta["nome_fun"];?>"> </div>
            <div class="form-group">
              <label>Data Inicial</label>
              <input type="date"  class="form-control" name="txtDataInicial" maxlength="10"> </div>
            <div class="form-group">
              <label>Data Final</label>
              <input type="date"  class="form-control" maxlength="10" name="txtDataFinal" >
            </div>
      <div class="form-group">
              <label>Quantidade de dias</label>
              <input type="number" class="form-control" name="txtDias" maxlength="10"> </div>
        <div class="form-group">
      <div class="form-group">
              <label for="exampleInputEmail1">Motivo</label>
              <select class="custom-control custom-select" name="txtMotivo">
                <option value="">Selecione</option>
                <option>Férias</option>
                <option>Atestado</option>
                <option>Abono</option>>
              </select>
            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-dark" name="btnAfastar">Afastar</button>
      </form>
        </div>
      </div>
    </div>
  </div>
 </div>


  
     <!-- inicio Modal Desativar fun-->	
  <div class="modal" id="modal_desativar<?=$consulta["id_fun"];?>">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Desativar Funcionário</h5>
          <button type="button" class="close" data-dismiss="modal">
            <span>×</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Tem certeza que deseja desativar este funcionário ?</p>
          <p><?=$consulta["nome_fun"]?></p>
        </div>
		 <form class="" method="post">
            <div class="form-group">
			<input type="text" style="display:none" name="id" maxlength="14" class="form-control"  value="<?=$consulta["id_fun"];?>">
			</div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger" name="btnDesativar">Sim</button>
          <button type="button" class="btn btn-dark" data-dismiss="modal">Não</button>
		  </form>
        </div>
      </div>
    </div>
  </div>  
  
    <!-- inicio Modal ativar fun-->	
  <div class="modal" id="modal_ativar<?=$consulta["id_fun"];?>">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Ativar Funcionário</h5>
          <button type="button" class="close" data-dismiss="modal">
            <span>×</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Tem certeza que deseja ativar este funcionário ?</p>
          <p><?=$consulta["nome_fun"]?></p>
        </div>
		 <form class="" method="post">
            <div class="form-group">
			<input type="text" style="display:none" name="id" maxlength="14" class="form-control"  value="<?=$consulta["id_fun"];?>">
			</div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger" name="btnAtivar">Sim</button>
          <button type="button" class="btn btn-dark" data-dismiss="modal">Não</button>
		  </form>
        </div>
      </div>
    </div>
  </div> 

  
  <!-- inicio Modal Alocar-->
<div class="modal" id="modal_alocar<?=$consulta["id_fun"];?>">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Alocação</h5>
          <button type="button" class="close" data-dismiss="modal">
            <span>×</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="" method="post">
            <div class="form-group">
			<input type="text" style="display:none" name="id" maxlength="14" class="form-control"  value="<?=$consulta["id_fun"];?>">
              <label>Alocar</label>
				<select class="custom-control custom-select" name="txtAlocacao">
					<option value="<?=$consulta["id_emp"];?>" ><?=$consulta["nome_emp"];?></option> 
				<?php
					foreach($administrativoDao->retornarInfoEMP() as $empresas ){
									
					?>
						<option value="<?=$empresas["id_emp"];?>"><?=$empresas["nome_emp"];?></option>
					<?php
					}
					?>
				</select>
			</div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-dark" name="btnAlocar" >Alterar</button>
		  </form>
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
	
<?php
/*Código editar fun*/				
	if (isset($_POST['btnAlterar'])) {
				
					
		$nome  = $_POST['txtNome'];
		$email = ($_POST['txtEmail']);
		$telefone  = $_POST['txtTelefone'];
		$jornada = ($_POST['txtJornada']);
		$id = $_POST['id'];
		
				
		if ($administrativoDao->alterarFun($id, $nome, $email, $telefone, $jornada)) {
		}
		?>
			<script type="text/javascript">
				alert("Cadastro alterado com suscesso!");
				window.location = '?pagina=funcionarios';
			</script>
		<?php
	}

/*Código Alocar fun*/				
	if (isset($_POST['btnAlocar'])) {
				
		$alocar = ($_POST['txtAlocacao']);
		$id = $_POST['id'];
		
				
		if ($administrativoDao->alterarAlocacao($id, $alocar)) {
		}
		?>
			<script type="text/javascript">
				alert("Alterado com suscesso!");
				window.location = '?pagina=funcionarios';
			</script>
		<?php
	}
	
	/*Código Desativar e ativar  fun*/				
	if (isset($_POST['btnAtivar'])) {
				
		$id_fun = $_POST['id'];
		$status_fun = 1;
				
		if ($administrativoDao->ativarFun($id_fun, $status_fun)) {
		}
		?>
			<script type="text/javascript">
				alert("Funcionário ativado com suscesso!!");
				window.location = '?pagina=funcionarios';
			</script>
		<?php
	}
	
		if (isset($_POST['btnDesativar'])) {
				
		$id_fun = $_POST['id'];
		$status_fun = 2;
				
		if ($administrativoDao->desativarFun($id_fun, $status_fun)) {
		}
		?>
			<script type="text/javascript">
				alert("Funcionário desativado com suscesso!");
				window.location = '?pagina=funcionarios';
			</script>
		<?php
	}
 

  /*Código afastar fun*/       
  if (isset($_POST['btnAfastar'])) {
        
          
    $data_inicial  = ($_POST['txtDataInicial']);
    $data_final = ($_POST['txtDataFinal']); 
    $dias  = ($_POST['txtDias']);
    $motivo = ($_POST['txtMotivo']);
    $id = ($_POST['id']);


    $folga->setData_inicial($data_inicial);
    $folga->setData_final($data_final);
    $folga->setQuant_dias($dias);
    $folga->setObservacao($motivo);
    $folga->setFk_funcionario_folga($id);

    $status_afas = 3;

      if ($administrativoDao->cadstrarAfastamento($folga)) {

          $administrativoDao->ativarFun($id, $status_afas);
      }

      ?>
        <script type="text/javascript">
           alert("Funcionário afastado com suscesso!");
           window.location = '?pagina=funcionarios';
        </script>
      <?php
  }
	
	
?> 
  