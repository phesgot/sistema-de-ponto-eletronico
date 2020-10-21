

<!DOCTYPE html>
<?php
require_once("Classes/DAO/AdministradorDAO.php");
$AdministradorDao = new AdministradorDAO();
session_start();
if (isset($_SESSION['logado'])) {
    header('Location: ../administrador/inicio.php?');
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
          <div class="card text-white p-5 bg-dark">
            <div class="card-body">
              <h1 class="mb-4 text-center">Administrador</h1>
              <form role="form" method="post">
                <div class="form-group">
                  <label>Usuário</label>
                  <input type="text" class="form-control" placeholder="" maxlength="80" required="required" name="txtUsuario"> </div>
                <div class="form-group">
                  <label>Senha</label>
                  <input type="password" class="form-control" id="senha" required="required" maxlength="50" name="txtSenha" placeholder="********"> </div>
                <button type="submit" class="btn btn-secondary btn-block" name="entrar">Entrar</button>
				<a class="btn btn-block btn-danger" href="esqueci_senha_adm.php">Esqueci a Senha </a>
				<font color="red"><p style="padding:10px;" id="resultado" align="left"></p></font>
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
	
	$senha = $_POST['txtSenha'];
	$usuario = $_POST['txtUsuario'];
    
	$consulta = $AdministradorDao->retornarInformacoes($usuario);
	$status_adm = $consulta['status_adm'];
	
	if ($status_adm == 1) {

		if($AdministradorDao->validarUsuario($usuario, $senha)){

			$_SESSION['id_adm'] = $consulta['id_adm'];
			$_SESSION['usuario'] = $consulta['usuario'];
			$_SESSION['cpf'] = $consulta['cpf'];
			$_SESSION['senha'] = $consulta['senha'];
			$_SESSION['logado'] = true;
			?>
			<script>
				document.location.href = "Adiministrador/inicio.php";
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