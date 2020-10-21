<?php
error_reporting(0);
ini_set(“display_errors”, 0 );

	require_once("..\Classes\Conexao.php");
	
	class AdministrativoDao {
		
		   function __construct() {
				$this->con = new Conexao();
				$this->pdo = $this->con->Connect();
			}


/*_____________________________________________Administrador____________________________________________________ */	
		public function cadastrarAdministrador($entAdministrador){
			try{
				$stmt = $this->pdo->prepare("insert INTO administrador"
									. "(nome_adm, cpf, usuario, senha)"
									. "VALUES "
									. "(:nome_adm, :cpf, :usuario, :senha)");
														
				$param = array(
					":nome_adm" => $entAdministrador->getNome_adm(),
					":cpf" => $entAdministrador->getCpf(),
					":usuario" => $entAdministrador->getUsuario(),
					":senha" => $entAdministrador->getSenha()	
				);
            
				return $stmt->execute($param);	
			
			} catch (PDOException $ex){
				echo "ERRO 01: {$ex->getMessage()}";
			}
		}
		
		    public function consultarId_adm($usuario) {
				try {
					$stmt = $this->pdo->prepare("SELECT id_adm FROM administrador WHERE usuario = :usuario");

					$param = array(":usuario" => $usuario);

					$stmt->execute($param);

				if ($stmt->rowCount() > 0) {
                $consultaIdadm = $stmt->fetch(PDO::FETCH_ASSOC);
                return $consultaIdadm['id_adm'];
					} else {
						return "";
					}
				} catch (Exception $ex) {
					echo "ERRO 02: {$ex->getMessage()}";
				}
			}


			public function retornarInformacoes($usuario) {
				try {

					$stmt = $this->pdo->prepare("SELECT id_adm, nome_adm, cpf, usuario, senha, status_adm FROM administrador WHERE usuario = :usuario");

					$param = array(":usuario" => $usuario);

					$stmt->execute($param);
					
					return $stmt->fetch(PDO::FETCH_ASSOC);
					
				} catch (PDOException $ex) {
					echo "ERRO 04: {$ex->getMessage()}";
				}
			}
			
/*______________________________Listar ADM_________________ */			
				public function retornarInformacoesADM() {
				try {

					$stmt = $this->pdo->prepare("SELECT id_adm, nome_adm, cpf, usuario, status_adm FROM administrador ");
					$stmt->execute();
					
					return $stmt->fetchall(PDO::FETCH_ASSOC);
					
				} catch (PDOException $ex) {
					echo "ERRO 02: {$ex->getMessage()}";
				}
			}
			
			
			public function existeUsuario ($usuario){

					$query = $this->pdo->prepare("SELECT * FROM administrador WHERE usuario = '$usuario'");
	
					$query->execute();					
					
					if ($query->rowCount() >= 1){
						return true;
					}else{
						return false;
					}

			}
			
			public function existeCPF ($cpf){

					$query = $this->pdo->prepare("SELECT * FROM administrador WHERE cpf = '$cpf'");
	
					$query->execute();					
					
					if ($query->rowCount() >= 1){
						return true;
					}else{
						return false;
					}

			}
			
			public function alterarAdm($id_adm, $nome, $usuario ){
						
					$stmt = $this->pdo->query("UPDATE administrador SET  nome_adm = '$nome', usuario = '$usuario'
												WHERE id_adm = '$id_adm'");
					$stmt->execute();						
							
					}
					
			public function desativarAdm($id_adm, $status_adm){
						
					$stmt = $this->pdo->query("UPDATE administrador SET  status_adm = '$status_adm'
												WHERE id_adm = '$id_adm'");
					$stmt->execute();						
							
					}	
			
			public function ativarAdm($id_adm, $status_adm){
						
					$stmt = $this->pdo->query("UPDATE administrador SET  status_adm = '$status_adm'
												WHERE id_adm = '$id_adm'");
					$stmt->execute();						
							
					}
					
					
			public function alterarSenhaAdm($id_adm, $senha_adm){
						
					$stmt = $this->pdo->query("UPDATE administrador SET  senha = '$senha_adm'
												WHERE id_adm = '$id_adm' ");
					$stmt->execute();						
							
					}
					
					
/*______________________________Validar CPF_________________ */
			 function validaCpf($cpf = null) {

				// Verifica se um número foi informado
				if(empty($cpf)) {
					return true;
				}

				// Elimina possivel mascara
				$cpf = preg_replace("/[^0-9]/", "", $cpf);
				$cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);
				
				// Verifica se o numero de digitos informados é igual a 11 
				if (strlen($cpf) != 11) {
					return true;
				}
				// Verifica se nenhuma das sequências invalidas abaixo 
				// foi digitada. Caso afirmativo, retorna falso
				else if ($cpf == '00000000000' || 
					$cpf == '11111111111' || 
					$cpf == '22222222222' || 
					$cpf == '33333333333' || 
					$cpf == '44444444444' || 
					$cpf == '55555555555' || 
					$cpf == '66666666666' || 
					$cpf == '77777777777' || 
					$cpf == '88888888888' || 
					$cpf == '99999999999') {
					return true;
				 // Calcula os digitos verificadores para verificar se o
				 // CPF é válido
				 } else {   
					
					for ($t = 9; $t < 11; $t++) {
						
						for ($d = 0, $c = 0; $c < $t; $c++) {
							$d += $cpf{$c} * (($t + 1) - $c);
						}
						$d = ((10 * $d) % 11) % 10;
						if ($cpf{$c} != $d) {
							return true;
						}
					}

					return false;
				}
			}
			
	/*_____________________________________________________________________Empresa___________________________________________________________________________ */		
		
	public function cadastrarEmpresa($entEmpresa){
			try{
				$stmt = $this->pdo->prepare("insert INTO empresa"
									. "(nome_emp, email_emp, cnpj, telefone_emp, senha_emp, cep_emp, uf_emp, cidade_emp, bairro_emp, endereco_emp)"
									. "VALUES "
									. "(:nome_emp, :email_emp, :cnpj, :telefone_emp, :senha_emp, :cep_emp, :uf_emp, :cidade_emp, :bairro_emp, :endereco_emp)");
														
				$param = array(
					":nome_emp" => $entEmpresa->getNome_emp(),
					":email_emp" => $entEmpresa->getEmail_emp(),
					":cnpj" => $entEmpresa->getCnpj(),
					":telefone_emp" => $entEmpresa->getTelefone_emp(),
					":senha_emp" => $entEmpresa->getSenha_emp(),
					":cep_emp" => $entEmpresa->getCep_emp(),
					":uf_emp" => $entEmpresa->getUf_emp(),
					":cidade_emp" => $entEmpresa->getCidade_emp(),
					":bairro_emp" => $entEmpresa->getBairro_emp(),
					":endereco_emp" => $entEmpresa->getEndereco_emp()
					
				);
            
				return $stmt->execute($param);	
			
			} catch (PDOException $ex){
				echo "ERRO 01: {$ex->getMessage()}";
			}
		}
		
		    public function consultarId_emp($email_emp) {
				try {
					$stmt = $this->pdo->prepare("SELECT id_emp FROM empresa WHERE email_emp = :email_emp");

					$param = array(":email_emp" => $email_emp);

					$stmt->execute($param);

				if ($stmt->rowCount() > 0) {
                $consultaIdemp = $stmt->fetch(PDO::FETCH_ASSOC);
                return $consultaIdemp['id_emp'];
					} else {
						return "";
					}
				} catch (Exception $ex) {
					echo "ERRO 02: {$ex->getMessage()}";
				}
			}


			public function retornarInformacoesEmp($email_emp) {
				try {

					$stmt = $this->pdo->prepare("SELECT id_emp, nome_emp, email_emp, cnpj, telefone_emp, senha_emp, cep_emp, uf_emp, cidade_emp, bairro_emp, endereco_emp, status_emp FROM empresa WHERE email_emp = :email_emp");

					$param = array(":email_emp" => $email_emp);

					$stmt->execute($param);
					
					return $stmt->fetch(PDO::FETCH_ASSOC);
					
				} catch (PDOException $ex) {
					echo "ERRO 04: {$ex->getMessage()}";
				}
			}
			
/*___________________________Listar Empresas___________________________ */			
				public function retornarInfoEMP() {
				try {

					$stmt = $this->pdo->prepare("SELECT id_emp, nome_emp, email_emp, cnpj, telefone_emp, cep_emp, uf_emp, cidade_emp, bairro_emp, endereco_emp, status_emp FROM empresa ");
					$stmt->execute();
					
					return $stmt->fetchall(PDO::FETCH_ASSOC);
					
				} catch (PDOException $ex) {
					echo "ERRO 02: {$ex->getMessage()}";
				}
			}
			
			
/* Existe Empresa início */		
			public function existeCnpj ($cnpj){
				
					$cnpj = preg_replace("/[^0-9]/", "", $cnpj);
					$cnpj = str_pad($cnpj, 14, '0', STR_PAD_LEFT);

					$query = $this->pdo->prepare("SELECT * FROM empresa WHERE cnpj = '$cnpj'");
	
					$query->execute();					
					
					if ($query->rowCount() >= 1){
						return true;
					}else{
						return false;
					}

			}
			
			
			public function existeEmail ($email){

					$query = $this->pdo->prepare("SELECT * FROM empresa WHERE email_emp = '$email'");
	
					$query->execute();					
					
					if ($query->rowCount() >= 1){
						return true;
					}else{
						return false;
					}

			}
			
			public function existeEmpresa ($nome){

					$query = $this->pdo->prepare("SELECT * FROM empresa WHERE nome_emp = '$nome'");
	
					$query->execute();					
					
					if ($query->rowCount() >= 1){
						return true;
					}else{
						return false;
					}

			}
/* Existe Empresa fim */	

		
			
			public function alterarEmp($id, $nome, $email, $cnpj, $telefone, $cep, $uf, $cidade, $bairro, $endereco){
						
					$stmt = $this->pdo->query("UPDATE empresa SET  nome_emp = '$nome', email_emp = '$email', cnpj = '$cnpj',
											telefone_emp = '$telefone', cep_emp = '$cep', uf_emp = '$uf',
											cidade_emp = '$cidade', bairro_emp = '$bairro', endereco_emp = '$endereco'
											 WHERE id_emp = '$id'");
					$stmt->execute();						
							
					}

					
			public function desativarEmp($id_emp, $status_emp){
						
					$stmt = $this->pdo->query("UPDATE empresa SET  status_emp = '$status_emp'
												WHERE id_emp = '$id_emp'");
					$stmt->execute();						
							
					}	
			
			public function ativarEmp($id_emp, $status_emp){
						
					$stmt = $this->pdo->query("UPDATE empresa SET  status_emp = '$status_emp'
												WHERE id_emp = '$id_emp'");
					$stmt->execute();						
							
					}
					
			public function alterarSenhaEmp($id_emp, $senha_emp){
						
					$stmt = $this->pdo->query("UPDATE empresa SET  senha_emp = '$senha_emp'
												WHERE id_emp = '$id_emp' ");
					$stmt->execute();						
							
					}
					
					
/*______________________________Validar CNPJ_________________ */

					function validaCnpj($cnpj = null) {

					// Verifica se um número foi informado
					if(empty($cnpj)) {
						return false;
					}

					// Elimina possivel mascara
					$cnpj = preg_replace("/[^0-9]/", "", $cnpj);
					$cnpj = str_pad($cnpj, 14, '0', STR_PAD_LEFT);
					
					// Verifica se o numero de digitos informados é igual a 11 
					if (strlen($cnpj) != 14) {
						return false;
					}
					
					// Verifica se nenhuma das sequências invalidas abaixo 
					// foi digitada. Caso afirmativo, retorna falso
					else if ($cnpj == '00000000000000' || 
						$cnpj == '11111111111111' || 
						$cnpj == '22222222222222' || 
						$cnpj == '33333333333333' || 
						$cnpj == '44444444444444' || 
						$cnpj == '55555555555555' || 
						$cnpj == '66666666666666' || 
						$cnpj == '77777777777777' || 
						$cnpj == '88888888888888' || 
						$cnpj == '99999999999999') {
						return false;
						
					 // Calcula os digitos verificadores para verificar se o
					 // CPF é válido
					 } else {   
					 
						$j = 5;
						$k = 6;
						$soma1 = "";
						$soma2 = "";

						for ($i = 0; $i < 13; $i++) {

							$j = $j == 1 ? 9 : $j;
							$k = $k == 1 ? 9 : $k;

							$soma2 += ($cnpj{$i} * $k);

							if ($i < 12) {
								$soma1 += ($cnpj{$i} * $j);
							}

							$k--;
							$j--;

						}

						$digito1 = $soma1 % 11 < 2 ? 0 : 11 - $soma1 % 11;
						$digito2 = $soma2 % 11 < 2 ? 0 : 11 - $soma2 % 11;

						return (($cnpj{12} == $digito1) and ($cnpj{13} == $digito2));
					 
					}
				}
			
/*_____________________________________________________________________Listar Funcionarios_______________________________________ */			
	public function cadastrarFuncionario($entFuncionario){
			try{
				$stmt = $this->pdo->prepare("insert INTO funcionario"
									. "(nome_fun, email_fun, cpf_fun, jornada, telefone_fun, fk_empresa_fun)"
									. "VALUES "
									. "(:nome_fun, :email_fun, :cpf_fun, :jornada, :telefone_fun, :fk_empresa_fun)");
														
				$param = array(
					":nome_fun" => $entFuncionario->getNome_fun(),
					":email_fun" => $entFuncionario->getEmail_fun(),
					":cpf_fun" => $entFuncionario->getCpf_fun(),
					":jornada" => $entFuncionario->getJornada(),
					":telefone_fun" => $entFuncionario->getTelefone_fun(),	
					":fk_empresa_fun" => $entFuncionario->getFk_empresa_fun()					
				);
            
				return $stmt->execute($param);	
			
			} catch (PDOException $ex){
				echo "ERRO 01: {$ex->getMessage()}";
			}
		}
		
					
				public function retornarInfoFUN() {
				try {

					$stmt = $this->pdo->prepare("SELECT funcionario.id_fun, funcionario.nome_fun, funcionario.email_fun, funcionario.cpf_fun, funcionario.jornada, funcionario.telefone_fun, funcionario.status_fun, funcionario.fk_empresa_fun, empresa.id_emp, empresa.nome_emp, empresa.email_emp, empresa.telefone_emp, empresa.cep_emp, empresa.uf_emp, empresa.cidade_emp, empresa.bairro_emp, empresa.endereco_emp FROM funcionario, empresa WHERE empresa.id_emp = funcionario.fk_empresa_fun ");
					$stmt->execute();
					
					return $stmt->fetchall(PDO::FETCH_ASSOC);
					
				} catch (PDOException $ex) {
					echo "ERRO 02: {$ex->getMessage()}";
				}
			}
			
			
			public function existeFuncionario ($nome){

					$query = $this->pdo->prepare("SELECT nome_fun FROM funcionario WHERE nome_fun = '$nome'");
	
					$query->execute();					
					
					if ($query->rowCount() >= 1){
						return true;
					}else{
						return false;
					}

			}
			
			public function existeCpfFun ($cpf){

					$query = $this->pdo->prepare("SELECT cpf_fun FROM funcionario WHERE cpf_fun = '$cpf'");
	
					$query->execute();					
					
					if ($query->rowCount() >= 1){
						return true;
					}else{
						return false;
					}

			}
			
			public function existeEmailFun ($email){

					$query = $this->pdo->prepare("SELECT email_fun FROM funcionario WHERE email_fun = '$email'");
	
					$query->execute();					
					
					if ($query->rowCount() >= 1){
						return true;
					}else{
						return false;
					}

			}
			
			public function alterarFun($id, $nome, $email, $telefone, $jornada  ){
						
					$stmt = $this->pdo->query("UPDATE funcionario SET  nome_fun = '$nome', email_fun = '$email', jornada = '$jornada', 
												telefone_fun = '$telefone' WHERE id_fun = '$id'");
					$stmt->execute();						
							
					}
					
			public function alterarAlocacao($id, $alocar){
						
					$stmt = $this->pdo->query("UPDATE funcionario SET  fk_empresa_fun = '$alocar' WHERE id_fun = '$id'");
					$stmt->execute();						
							
					}
					
					
			public function desativarFun($id_fun, $status_fun){
						
					$stmt = $this->pdo->query("UPDATE funcionario SET  status_fun = '$status_fun'
												WHERE id_fun = '$id_fun'");
					$stmt->execute();						
							
					}	
			
			public function ativarFun($id_fun, $status_fun){
						
					$stmt = $this->pdo->query("UPDATE funcionario SET  status_fun = '$status_fun'
												WHERE id_fun = '$id_fun'");
					$stmt->execute();						
							
					}
					
					
	
	/*__________________________________________Folgas______________________________________ */
	
	public function cadstrarAfastamento($entFolga){
		try{

			$stmt = $this->pdo->prepare("insert INTO folga"
									. "(data_inicial, data_final, quant_dias, observacao, fk_funcionario_folga)"
									. "VALUES "
									. "(:data_inicial, :data_final, :quant_dias, :observacao, :fk_funcionario_folga)");
														
				$param = array(
					":data_inicial" => $entFolga->getData_inicial(),
					":data_final" => $entFolga->getData_final(),
					":quant_dias" => $entFolga->getQuant_dias(),
					":observacao" => $entFolga->getObservacao(),
					":fk_funcionario_folga" => $entFolga->getFk_funcionario_folga()					
				);
            
				return $stmt->execute($param);	

		}catch (PDOException $ex){
				echo "ERRO 01: {$ex->getMessage()}";
			}
	}





	public function retornarInfoFolga() {
				try {

					$stmt = $this->pdo->prepare("
						SELECT funcionario.id_fun, funcionario.nome_fun, funcionario.email_fun, funcionario.cpf_fun, 	funcionario.jornada, funcionario.telefone_fun, funcionario.status_fun, 					funcionario.fk_empresa_fun,
								folga.id_folga, folga.data_inicial, folga.data_final, folga.quant_dias, folga.observacao, folga.fk_funcionario_folga, folga.status_folga,
								empresa.id_emp, empresa.nome_emp 
						FROM funcionario, folga, empresa 
						WHERE funcionario.status_fun = 3 and funcionario.id_fun = folga.fk_funcionario_folga and funcionario.fk_empresa_fun = empresa.id_emp");
					$stmt->execute();
					
					return $stmt->fetchall(PDO::FETCH_ASSOC);
					
				} catch (PDOException $ex) {
					echo "ERRO 02: {$ex->getMessage()}";
				}
			}


			public function desatNotiAfas($id_folga, $status_folga, $id_fun, $status_fun){
						
					$stmt = $this->pdo->query("UPDATE folga, funcionario 
												SET  folga.status_folga = '$status_folga', 
												funcionario.status_fun = '$status_fun'

												WHERE folga.id_folga = '$id_folga' 
												and funcionario.id_fun = '$id_fun'");
					$stmt->execute();						
							
					}
	
	
//home//

					public function contar_adm() {
				try {
					$query = $this->pdo->prepare("SELECT id_adm FROM administrador where status_adm = 1");

					$query->execute();

				if ($query->rowCount() > 0) {
                $quantidaAdm = $query->fetch(PDO::FETCH_ASSOC);
                return $quantidaAdm['id_adm'];
					} else {
						return "";
					}
				} catch (Exception $ex) {
					echo "ERRO 02: {$ex->getMessage()}";
				}
			}

			public function contar_fun() {
				try {
					$stmt = $this->pdo->prepare("SELECT id_fun FROM funcionario where status_fun = 1 or status_fun = 3");

					$stmt->execute();

				if ($stmt->rowCount() > 0) {
                $quantidaFun = $stmt->fetch(PDO::FETCH_ASSOC);
                return $quantidaFun['id_fun'];
					} else {
						return "";
					}
				} catch (Exception $ex) {
					echo "ERRO 02: {$ex->getMessage()}";
				}
			}

			public function contar_emp() {
				try {
					$stmt = $this->pdo->prepare("SELECT id_emp FROM empresa where status_emp = 1");

					$stmt->execute();

				if ($stmt->rowCount() > 0) {
                $quantidaEmp = $stmt->fetch(PDO::FETCH_ASSOC);
                return $quantidaEmp['id_emp'];
					} else {
						return "";
					}
				} catch (Exception $ex) {
					echo "ERRO 02: {$ex->getMessage()}";
				}
			}

	/*-----------------------------------------------REtorno filtro batidas----------------------------------------------------*/

		public function retornarListaFun($id_empresa, $data) {
				try {

					$stmt = $this->pdo->prepare("
						SELECT folha.data, presenca.id_presenca, presenca.status_presenca, presenca.entrada, presenca.saida, funcionario.nome_fun, funcionario.jornada, funcionario.status_fun, empresa.nome_emp						
						FROM  folha, presenca, funcionario, empresa
						WHERE folha.fk_empresa_folha = '$id_empresa' and folha.data = '$data' and folha.fk_empresa_folha = empresa.id_emp and
						 		presenca.fk_folha_presenca = folha.id_folha and  presenca.fk_funcionario_presenca = funcionario.id_fun");
					$stmt->execute();
					
					return $stmt->fetchall(PDO::FETCH_ASSOC);
					
				} catch (PDOException $ex) {
					echo "ERRO 02: {$ex->getMessage()}";
				}
			}

/*-----------------------------------------------REtorno afastamento e filtro----------------------------------------------------*/

			public function retornarAfastamento() {
				try {

					$stmt = $this->pdo->prepare("
						SELECT funcionario.id_fun, funcionario.nome_fun, funcionario.email_fun, funcionario.cpf_fun, 	funcionario.jornada, funcionario.telefone_fun, funcionario.status_fun, funcionario.fk_empresa_fun, folga.id_folga, folga.data_inicial, folga.data_final, folga.quant_dias, folga.observacao, folga.fk_funcionario_folga, folga.status_folga,
							empresa.id_emp, empresa.nome_emp 
						FROM funcionario, folga, empresa 
						WHERE funcionario.id_fun = folga.fk_funcionario_folga and funcionario.fk_empresa_fun = empresa.id_emp");
					$stmt->execute();
					
					return $stmt->fetchall(PDO::FETCH_ASSOC);
					
				} catch (PDOException $ex) {
					echo "ERRO 02: {$ex->getMessage()}";
				}
			}

			public function retornarAfastFun($id_folga) {
				try {

					$stmt = $this->pdo->prepare("
						SELECT funcionario.id_fun, funcionario.nome_fun, funcionario.email_fun, funcionario.cpf_fun, 	funcionario.jornada, funcionario.telefone_fun, funcionario.status_fun, 					funcionario.fk_empresa_fun,
								folga.id_folga, folga.data_inicial, folga.data_final, folga.quant_dias, folga.observacao, folga.fk_funcionario_folga, folga.status_folga 
						FROM funcionario, folga 
						WHERE folga.id_folga = '$id_folga' and folga.fk_funcionario_folga = funcionario.id_fun");
					$stmt->execute();
					
					return $stmt->fetchall(PDO::FETCH_ASSOC);
					
				} catch (PDOException $ex) {
					echo "ERRO 02: {$ex->getMessage()}";
				}
			}


			public function retornarAfastado($id_fun, $data) {
				try {

					$stmt = $this->pdo->prepare("
						SELECT funcionario.id_fun, funcionario.nome_fun, funcionario.email_fun, funcionario.cpf_fun, 	funcionario.jornada, funcionario.telefone_fun, funcionario.status_fun, 					funcionario.fk_empresa_fun,
								folga.id_folga, folga.data_inicial, folga.data_final, folga.quant_dias, folga.observacao, 
								folga.fk_funcionario_folga, folga.status_folga						
						FROM  folga, funcionario
						WHERE folga.data_inicial = '$data' and folga.fk_funcionario_folga = '$id_fun' and folga.fk_funcionario_folga = funcionario.id_fun");
					$stmt->execute();
					
					return $stmt->fetchall(PDO::FETCH_ASSOC);
					
				} catch (PDOException $ex) {
					echo "ERRO 02: {$ex->getMessage()}";
				}
			}

	}

	
	

?>