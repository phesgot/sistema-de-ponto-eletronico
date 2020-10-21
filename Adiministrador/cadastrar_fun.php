		<?php
			require_once("../Classes/DAO/AdministrativoDAO.php");
			require_once("../Classes/Entidade/Funcionario.php");
			
			$administrativoDao = new AdministrativoDAO();
			$funcionario = new Funcionario();
		?>
<body>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="">Adicionar Funcionários</h1>
          <div class="row">
            <div class="col-md-12">
              <p class="lead">Dados gerais</p>
              <div class="row">
                <div class="col-md-12">
                  <form class="" method="post">
                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Nome</label>
                          <input type="text" class="form-control" name="txtNome" required="required" maxlength="80"> </div>
                        <div class="form-group">
                          <label>Telefone</label>
                          <input id="telefone" type="tel" class="form-control" name="txtTelefone" required="required" maxlength="20"> </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>E-mail</label>
                          <input type="email" class="form-control" name="txtEmail" required="required" maxlength="80"> </div>
                        <div class="form-group">
                          <label>CPF</label>
                          <input id="cpf" type="text" class="form-control" placeholder="" name="txtCpf" required="required" maxlength="14"> </div>
                      </div>
                      <div class="col-md-3">
					            <div class="form-group">
                                <label>Jornada</label>
                                <select class="custom-control custom-select" name="txtJornada" required="required">
                                  <option value="" >Selecione</option>
                                  <option>SEG - SAB - 19H às 00H</option>
                                  <option>SEG - SAB - 13H às 19H</option>
                                  <option>TER - DOM - 19H às 00H</option>
								  <option>TER - DOM - 13H às 19H</option>
                                </select>
                              </div>
							  <div class="form-group">
                                <label>Alocar</label>
                                <select class="custom-control custom-select" name="txtAlocacao" required="required">
								<option value="1" >Selecione</option>
								<?php
								foreach($administrativoDao->retornarInfoEMP() as $consulta ){
									
								?>
                                  <option value="<?=$consulta["id_emp"];?>"><?=$consulta["nome_emp"];?></option>
								<?php
									}
								?>
                                </select>
                              </div>
                      </div>
                      <div class="col-md-3">
                      </div>
                    </div>
                    <a class="btn btn-danger" href='?pagina=funcionarios'>Cancelar </a>
                    <button type="submit" class="btn btn-dark" name="btnCadastrar">Salvar</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </body>
  
  <?php
/*Código verifica e cadastra administrador*/
	if (isset($_POST['btnCadastrar'])) {
	
		$nome  = $_POST['txtNome'];
		$email = $_POST['txtEmail'];
		$cpf = $_POST['txtCpf'];
		$telefone  = $_POST['txtTelefone'];
		$jornada  = $_POST['txtJornada'];
		$alocacao  = $_POST['txtAlocacao'];
		
			
		$validaCpf = $administrativoDao->validaCpf($cpf);	
		$confereEmail = $administrativoDao->existeEmailFun($email);
		
		$cpf = preg_replace("/[^0-9]/", "", $cpf);
		$cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);
		$telefone = preg_replace("/[^0-9]/", "", $telefone);
		$telefone = str_pad($cpf, 11, '0', STR_PAD_LEFT);
		
		$confereCpf = $administrativoDao->existeCpfFun($cpf);
		

		if ($confereCpf != 1  && $validaCpf != 1 && $confereEmail != 1) {
			
			
		
			$funcionario->setNome_fun($nome);
			$funcionario->setEmail_fun($email);
			$funcionario->setCpf_fun($cpf);
			$funcionario->setJornada($jornada);
			$funcionario->setTelefone_fun($telefone);
			$funcionario->setFk_empresa_fun($alocacao);
			
				
				if ($administrativoDao->cadastrarFuncionario($funcionario)) {
					?>
						<script type="text/javascript">
							alert("Cadastrado com sucesso!");
						</script>
					<?php
				} else {
					?>
						<script type="text/javascript">
							alert("Erro ao cadastrar!");
						</script>
					<?php
				}
		} else if($validaCpf == 1){
			?>
				<script type="text/javascript">
					alert("ERRO: Este CPF não é valido!");
				</script>
			<?php
		} else if($confereFuncionario == 1){
			?>
				<script type="text/javascript">
					alert("ERRO: Já existe um cadastro com este nome!");
				</script>
			<?php
		} else if($confereCpf == 1){
			?>
				<script type="text/javascript">
					alert("ERRO: Já existe um cadastro com este CPF!");
				</script>
			<?php
		} else if ($confereEmail == 1){
			?>
				<script type="text/javascript">
					alert("ERRO: Já existe um cadastro com este E-mail!");
				</script>
			<?php
		}
		 
	}
?>
