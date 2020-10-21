	
<?php
require_once("../Classes/DAO/AdministrativoDAO.php");			
$administrativoDao = new AdministrativoDAO();


$numEmp = $administrativoDao->contar_emp();
$numFun = $administrativoDao->contar_fun();
$numAdm = $administrativoDao->contar_adm();
?>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">



<!-- Seção de Parallax !-->
	<div id="cursos" class="container-fluid bg-parallax ">
		<div class="py-4">
			<section class="container">
				<header class="col-md-12">
					<h2 class="text-center text-dark"<i class="fa d-inline fa-lg fa- fa-file-archive-o"></i> SPE
						<span class="underline"></span>
					</h2>
					<p class="text-center text-dark">Dados do sistema</p>
				</header>
				<div class="row py-2">
					<div class="col-sm-6 col-md-4 col-lg-4">
						<div class="fatos">
							<div class="icon">
								<i class="fa fa-building"></i>
							</div>
							<div class="fatos-contador">
								<h3><span class="contar">8</span></h3>
								<h4>Quant. de Empresas</h4>
							</div>
						</div>
					</div>
					<div class="col-sm-6 col-md-4 col-lg-4">
						<div class="fatos">
							<div class="icon">
								<i class="fa fa-users"></i>
							</div>
							<div class="fatos-contador">
								<h3><span class="contar">3</span></h3>
								<h4>Quant. de Funcionários</h4>
							</div>
						</div>
					</div>
					<div class="col-sm-6 col-md-4 col-lg-4">
						<div class="fatos">
							<div class="icon">
								<i class="fa fa-user-secret"></i>
							</div>
							<div class="fatos-contador">
								<h3><span class="contar">12</span></h3>
								<h4>Quant. Administradores</h4>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>

	<script type="text/javascript" src="js/jquery-min.js"></script>
	<script type="text/javascript" src="js/jquery.counterup.min.js"></script>
	<script type="text/javascript" src="js/waypoints.min.js"></script>
	<script type="text/javascript" src="js/main.js"></script>