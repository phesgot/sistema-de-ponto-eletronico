<?php

	require_once("Classes\Conexao.php");
	
	class AdministradorDao {
		
		   function __construct() {
				$this->con = new Conexao();
				$this->pdo = $this->con->Connect();
			}
		
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

			public function validarUsuario($usuario, $senha) {
				try {
					$stmt = $this->pdo->prepare("SELECT usuario, senha FROM administrador WHERE usuario = :usuario and senha = :senha");
					$param = array(
						":usuario" => $usuario,
						"senha" => md5($senha)
					);

					$stmt->execute($param);

					if ($stmt->rowCount() > 0) {
						return true;
					} else {
						return false;
					}
				} catch (PDOException $ex) {
					echo "ERRO 03: {$ex->getMessage()}";
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
			
			public function existeCnpj ($cnpj){

					$query = $this->pdo->prepare("SELECT * FROM cadastro WHERE cnpj = '$cnpj'");
	
					$query->execute();					
					
					if ($query->rowCount() >= 1){
						return true;
					}else{
						return false;
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
			
			public function retornarCadastro($idCadastro) {
				try {
					
					$stmt = $this->pdo->prepare("SELECT responsavel, empresa, email, senha1, telefone1, telefone2, cep, 
						uf, cidade, bairro, endereco FROM cadastro WHERE idCadastro = '$idCadastro'");
					$stmt->execute();
					
					return $stmt->fetchall(PDO::FETCH_ASSOC);
					
				} catch (PDOException $ex) {
					echo "ERRO 05: {$ex->getMessage()}";
				}
			}
			
			public function alterarAnuncio($responsavel, $empresa, $email, $telefone1, $telefone2, $cep, 
											$uf, $cidade, $bairro, $endereco, $idCadastro ){
						
					$stmt = $this->pdo->query("UPDATE cadastro SET  responsavel = '$responsavel', empresa = '$empresa',
												email = '$email', telefone1 = '$telefone1', telefone2 = '$telefone2', cep = '$cep', 
												uf = '$uf', cidade = '$cidade', bairro = '$bairro',
												endereco = '$endereco' WHERE idCadastro = '$idCadastro'");
					$stmt->execute();						
							
					}

			public function alterarSenha($usuario, $cpf, $senha){
						
					$stmt = $this->pdo->query("UPDATE administrador SET  senha = '$senha'
												WHERE usuario = '$usuario' and cpf = '$cpf'");
					$stmt->execute();						
							
					}
					
			public function ecluirConta($idCadastro){
						
				$stmt = $this->pdo->query(" DELETE FROM cadastro WHERE idCadastro = '$idCadastro'");
				$stmt->execute();						
							
			}
			
			
			
	}

?>