<!DOCTYPE html>
<?php
require_once("Classes/DAO/EmpresaDAO.php");
$EmpresaDao = new EmpresaDAO();
session_start();
if (isset($_SESSION['logado'])) {
    header('Location: ../supervisor/inicio.php?');
}
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
        <div class="col-md-3"> </div>
        <div class="col-md-6">
          <div class="card text-white p-5 bg-secondary">
            <div class="card-body">
              <h1 class="mb-4 text-center">Supervisor</h1>
              <form role="form" method="post">
                <div class="form-group">
                  <label>E-mail</label>
                  <input type="email" class="form-control" placeholder="nome@domínio.com" maxlength="80" required="required" name="txtEmail"> </div>
                <div class="form-group">
                  <label>Senha</label>
                  <input type="password" class="form-control" id="senha" required="required" maxlength="50" name="txtSenha" placeholder="********"> </div>
                <button type="submit" class="btn btn-block btn-dark" name="entrar">Entrar</button>
				 <a class="btn btn-block btn-danger" href="esqueci_senha_sup.php">Esqueci a Senha </a>
				 <font color="#660000" style='font-weight:bold;'><p style="padding:10px;" id="resultado" align="left"></p></font>
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
/*validando Usuario*/
if (isset($_POST['entrar'])) {
	
	$email_emp = $_POST['txtEmail'];
	$senha_emp = $_POST['txtSenha'];
	
	$consulta = $EmpresaDao->retornarInformacoes($email_emp);
	$status_emp = $consulta['status_emp'];
	
	if ($status_emp == 1){
		
		if($EmpresaDao->validarUsuario($email_emp, $senha_emp)){

			$_SESSION['id_emp'] = $consulta['id_emp'];
			$_SESSION['nome_emp'] = $consulta['nome_emp'];
			$_SESSION['cnpj'] = $consulta['cnpj'];
			$_SESSION['senha_emp'] = $consulta['senha_emp'];
			$_SESSION['logado'] = true;
			?>
			<script>
				document.location.href = "Supervisor/inicio.php";
			</script>  
			<?php
		} else {
			?>
			<script>
				document.getElementById("resultado").innerHTML = "*Usuário ou senha inválido";
			</script>  
			<?php
		}
	}else{
			?>
			<script>
				document.getElementById("resultado").innerHTML = "*Usuário desativado";
			</script>  
			<?php
		}

}
?>