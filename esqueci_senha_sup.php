<!DOCTYPE html>
<?php
	require_once("Classes/DAO/EmpresaDAO.php");
		
	$empresaDao = new EmpresaDAO();
					
?>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="css/theme.css" type="text/css"> 
  </head>

<body>
  <div class="py-5" style="background-image: url('Imagens/fundo.png');">
    <div class="container">
      <div class="row">
        <div class="align-self-center col-md-6 text-white"></div>
        <div class="col-md-6">
          <div class="card">
            <div class="card-body p-5 bg-secondary">
              <h3 class="pb-3">Esqueci a Senha</h3>
              <form method="post">
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" class="form-control" placeholder="" required="required" maxlength="20" name="txtEmail"> </div>
                <div class="form-group">
                  <label>CNPJ</label>
                  <input type="text" class="form-control" required="required" maxlength="20" name="txtCnpj"> </div>
                <div class="form-group">
                  <label>Nova Senha</label>
                  <input type="password" class="form-control" id="inlineFormInputGroup" placeholder="********" required="required" maxlength="20" name="txtSenha"> </div>
                <a class="btn btn-danger" href="login_sup.php">Voltar</a>
                <button type="submit" class="btn btn-dark"  name="btnAlterarSenha">Alterar</button>
				<font color="black" style='font-weight:bold;'><p style="padding:10px;" id="resultado" align="left"></p></font>
				<font color="#660000" style='font-weight:bold;'><p style="padding:10px;" id="resultado1" align="left"></p></font>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  		<!--inicio rodapé-->
		<div class="bg-dark text-white">
			<div class="container">
				<div class="row">
					<div class="p-4 col-md-6">
						<h2 class="mb-4 text-secondary">PedroTorres</h2>
						<p class="text-white">Desenvolvendo Sistemas</p>
					</div>
					<div class="p-4 col-md-6">
						<h2 class="mb-4">Contato</h2>
						<p>
							<a href="tel:+246 - 542 550 5462" class="text-white">
							<i class="fa d-inline mr-3 text-secondary fa-phone"></i>(61) 9 8102-7519</a>
						</p>
						<p>
							<a href="mailto:info@pingendo.com" class="text-white">
							<i class="fa d-inline mr-3 text-secondary fa-envelope-o"></i>phesgot001@gmail.com</a>
						</p>
						<p>
							<a href="https://goo.gl/maps/UohGpNwUf812" class="text-white" target="_blank">
							<i class="fa d-inline mr-3 fa-map-marker text-secondary"></i>Sobradinho-DF</a>
						</p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 mt-3">
						<p class="text-center text-white">© Copyright 2018 PedroTorres - All rights reserved. </p>
					</div>
				</div>
			</div>
		</div>
		<!--Fim rodapé-->
<script type="text/javascript" src="js/jquery-3.2.1.slim.min.js"></script>
<script type="text/javascript" src="js/popper.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>

</body>

</html>
 <?php
  /*Código alterar Senha*/				
	if (isset($_POST['btnAlterarSenha'])) {
					
		$email = ($_POST['txtEmail']);
		$cnpj = ($_POST['txtCnpj']);		
		$senha = (md5($_POST['txtSenha']));
		
		$confereEmail = $empresaDao->existeEmail($email);
		$confereCnpj = $empresaDao->existeCnpj($cnpj);
		
		if($confereEmail == 1 && $confereCnpj == 1){
			
			$empresaDao->alterarSenha($email, $cnpj, $senha)
						
				?>
					<script>
						document.getElementById("resultado").innerHTML = "Senha alterada com sucesso!";
					</script>
				<?php

		} else{
				?>
					<script>
						document.getElementById("resultado1").innerHTML = "*Erro: Verifique se digitou algum dado incorretamente";
					</script>
				<?php
			}		
	}
?>