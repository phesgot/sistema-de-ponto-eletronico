<?php

	require_once("Classes/Conexao.php");
	
	class EmpresaDao {
		
		   function __construct() {
				$this->con = new Conexao();
				$this->pdo = $this->con->Connect();
			}
		
		public function cadastrarEmpresa(cadastro $entEmpresa){
			try{
				$stmt = $this->pdo->prepare("insert INTO empresa"
									. "(nome_emp, email_emp, cnpj, telefone_emp, senha_emp, cep_emp, uf_emp, cidade_emp, bairro_emp, endereco_emp, status_emp)"
									. "VALUES "
									. "(:nome_emp, :email_emp, :cnpj, :telefone_emp, :senha_emp, :cep_emp, :uf_emp, :cidade_emp, :bairro_emp, :endereco_emp, :status_emp)");
														
				$param = array(
					":nome_emp" => $entEmpresa->getNome_emp(),
					":email_emp" => $entEmpresa->getEmail_emp(),
					":cnpj" => $entEmpresa->getCnpj_emp(),
					":telefone_emp" => $entEmpresa->getTelefone_emp(),
					":senha_emp" => $entEmpresa->getSenha_emp(),
					":cep_emp" => $entEmpresa->getCep_emp(),
					":uf_emp" => $entEmpresa->getUf_emp(),
					":cidade_emp" => $entEmpresa->getCidade_emp(),
					":bairro_emp" => $entEmpresa->getBairro_emp(),
					":endereco_emp" => $entEmpresa->getEndereco_emp(),
					":status_emp" => $entEmpresa->getStatus_emp()
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

			public function validarUsuario($email_emp, $senha_emp) {
				try {
					$stmt = $this->pdo->prepare("SELECT email_emp, senha_emp FROM empresa WHERE email_emp = :email_emp and senha_emp = :senha_emp");
					$param = array(
						":email_emp" => $email_emp,
						"senha_emp" => md5($senha_emp)
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

			public function retornarInformacoes($email_emp) {
				try {

					$stmt = $this->pdo->prepare("SELECT id_emp, nome_emp, email_emp, cnpj, telefone_emp, senha_emp, cep_emp, uf_emp, cidade_emp, bairro_emp, endereco_emp, status_emp FROM empresa WHERE email_emp = :email_emp");

					$param = array(":email_emp" => $email_emp);

					$stmt->execute($param);
					
					return $stmt->fetch(PDO::FETCH_ASSOC);
					
				} catch (PDOException $ex) {
					echo "ERRO 04: {$ex->getMessage()}";
				}
			}
			
			public function existeCnpj ($cnpj){

					$query = $this->pdo->prepare("SELECT * FROM empresa WHERE cnpj = '$cnpj'");
	
					$query->execute();					
					
					if ($query->rowCount() >= 1){
						return true;
					}else{
						return false;
					}

			}
			
			public function existeUsuario ($usuario){

					$query = $this->pdo->prepare("SELECT * FROM cadastro WHERE usuario = '$usuario'");
	
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

			public function alterarSenha($email, $cnpj, $senha ){
						
					$stmt = $this->pdo->query("UPDATE empresa SET  senha_emp = '$senha'
												WHERE email_emp = '$email' and cnpj = '$cnpj' ");
					$stmt->execute();						
							
					}
					
			public function ecluirConta($idCadastro){
						
				$stmt = $this->pdo->query(" DELETE FROM cadastro WHERE idCadastro = '$idCadastro'");
				$stmt->execute();						
							
			}
			
			
			
	}

?>