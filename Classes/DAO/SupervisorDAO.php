<?php
//error_reporting(0);
//ini_set(“display_errors”, 0 );

	require_once("..\Classes\Conexao.php");
	
	class SupervisorDAO {
		
		   function __construct() {
				$this->con = new Conexao();
				$this->pdo = $this->con->Connect();
			}
			
			
/*___________________________________________________Listar Funcionarios_______________________________________ */			
					
				public function retornarInfoFUN($id_emp) {
				try {

					$stmt = $this->pdo->prepare("
						SELECT id_fun, nome_fun, email_fun, cpf_fun, jornada, telefone_fun, status_fun, fk_empresa_fun 
						FROM funcionario 
						WHERE fk_empresa_fun = '$id_emp' ");
					$stmt->execute();
					
					return $stmt->fetchall(PDO::FETCH_ASSOC);
					
				} catch (PDOException $ex) {
					echo "ERRO 02: {$ex->getMessage()}";
				}
			}


			public function retornarInfoFolga($id_emp) {
				try {

					$stmt = $this->pdo->prepare("
						SELECT funcionario.id_fun, funcionario.nome_fun, funcionario.email_fun, funcionario.cpf_fun, 	funcionario.jornada, funcionario.telefone_fun, funcionario.status_fun, 					funcionario.fk_empresa_fun,
								folga.id_folga, folga.data_inicial, folga.data_final, folga.quant_dias, folga.observacao, folga.fk_funcionario_folga, folga.status_folga 
						FROM funcionario, folga 
						WHERE funcionario.fk_empresa_fun = '$id_emp' and funcionario.status_fun = 3 and funcionario.id_fun = folga.fk_funcionario_folga");
					$stmt->execute();
					
					return $stmt->fetchall(PDO::FETCH_ASSOC);
					
				} catch (PDOException $ex) {
					echo "ERRO 02: {$ex->getMessage()}";
				}
			}

			public function retornarRelaFolga($id_emp) {
				try {

					$stmt = $this->pdo->prepare("
						SELECT funcionario.id_fun, funcionario.nome_fun, funcionario.email_fun, funcionario.cpf_fun, 	funcionario.jornada, funcionario.telefone_fun, funcionario.status_fun, 					funcionario.fk_empresa_fun,
								folga.id_folga, folga.data_inicial, folga.data_final, folga.quant_dias, folga.observacao, folga.fk_funcionario_folga, folga.status_folga 
						FROM funcionario, folga 
						WHERE funcionario.fk_empresa_fun = '$id_emp' and funcionario.id_fun = folga.fk_funcionario_folga");
					$stmt->execute();
					
					return $stmt->fetchall(PDO::FETCH_ASSOC);
					
				} catch (PDOException $ex) {
					echo "ERRO 02: {$ex->getMessage()}";
				}
			}

			public function retornarAfastFun($id_emp, $nome_fun) {
				try {

					$stmt = $this->pdo->prepare("
						SELECT funcionario.id_fun, funcionario.nome_fun, funcionario.email_fun, funcionario.cpf_fun, 	funcionario.jornada, funcionario.telefone_fun, funcionario.status_fun, 					funcionario.fk_empresa_fun,
								folga.id_folga, folga.data_inicial, folga.data_final, folga.quant_dias, folga.observacao, folga.fk_funcionario_folga, folga.status_folga 
						FROM funcionario, folga 
						WHERE funcionario.fk_empresa_fun = '$id_emp' and funcionario.id_fun = folga.fk_funcionario_folga and funcionario.nome_fun = '$nome_fun'");
					$stmt->execute();
					
					return $stmt->fetchall(PDO::FETCH_ASSOC);
					
				} catch (PDOException $ex) {
					echo "ERRO 02: {$ex->getMessage()}";
				}
			}


/*___________________________________________________Gerar Folha_______________________________________ */	
	
public function gerarFolha ($entFolha){
			try{
				$stmt = $this->pdo->prepare("insert INTO folha"
									. "(data, fk_empresa_folha)"
									. "VALUES "
									. "(:data, :fk_empresa_folha)");
														
				$param = array(
					":data" => $entFolha->getData(),
					":fk_empresa_folha" => $entFolha->getFk_empresa_folha()	
				);
            
				return $stmt->execute($param);	
			
			} catch (PDOException $ex){
				echo "ERRO 01: {$ex->getMessage()}";
			}
		}

public function existeFolha ($data, $fk_empresa_folha){

					$query = $this->pdo->prepare("SELECT * FROM folha WHERE data = '$data' and fk_empresa_folha = '$fk_empresa_folha' ");
	
					$query->execute();					
					
					if ($query->rowCount() >= 1){
						return true;
					}else{
						return false;
					}

			}

public function ultimaId() {
				try {

					$stmt = $this->pdo->prepare("SELECT MAX(id_folha) as id_folha from folha");

					$stmt->execute();
					
					return $stmt->fetchall(PDO::FETCH_ASSOC);
					
				} catch (PDOException $ex) {
					echo "ERRO 04: {$ex->getMessage()}";
				}
			}


public function finalizarFolha($entPresenca){
			try{
				$stmt = $this->pdo->prepare("insert INTO presenca"
									. "(fk_folha_presenca, fk_funcionario_presenca)"
									. "VALUES "
									. "(:fk_folha_presenca, :fk_funcionario_presenca)");
														
				$param = array(
					":fk_folha_presenca" => $entPresenca->getFk_folha_presenca(),
					":fk_funcionario_presenca" => $entPresenca->getFk_funcionario_presenca()	
				);
            
				return $stmt->execute($param);	
			
			} catch (PDOException $ex){
				echo "ERRO 01: {$ex->getMessage()}";
			}
		}

public function retornarFolha($id_empresa) {
				try {

					$stmt = $this->pdo->prepare("SELECT id_folha, data, fk_empresa_folha FROM folha WHERE fk_empresa_folha = '$id_empresa' order by id_folha DESC limit 4");

					$stmt->execute();
					
					return $stmt->fetchall(PDO::FETCH_ASSOC);
					
				} catch (PDOException $ex) {
					echo "ERRO 04: {$ex->getMessage()}";
				}
			}

public function retornarRelaFolha($id_empresa) {
				try {

					$stmt = $this->pdo->prepare("SELECT id_folha, data, fk_empresa_folha FROM folha WHERE fk_empresa_folha = '$id_empresa' order by id_folha");

					$stmt->execute();
					
					return $stmt->fetchall(PDO::FETCH_ASSOC);
					
				} catch (PDOException $ex) {
					echo "ERRO 04: {$ex->getMessage()}";
				}
			}

//____________________________________________________________________folha de presenca______________________//

			public function retornarListaFun($id_folha) {
				try {

					$stmt = $this->pdo->prepare("
						SELECT folha.data, presenca.id_presenca, presenca.status_presenca, presenca.entrada, presenca.saida, funcionario.nome_fun, funcionario.jornada, funcionario.status_fun						
						FROM  folha, presenca, funcionario
						WHERE presenca.fk_folha_presenca = '$id_folha' and presenca.fk_folha_presenca = id_folha and  presenca.fk_funcionario_presenca = funcionario.id_fun ");
					$stmt->execute();
					
					return $stmt->fetchall(PDO::FETCH_ASSOC);
					
				} catch (PDOException $ex) {
					echo "ERRO 02: {$ex->getMessage()}";
				}
			}


			public function Ausentar($id_presenca, $status_presenca){
						
					$stmt = $this->pdo->query("UPDATE presenca SET  status_presenca = '$status_presenca'
												WHERE id_presenca = '$id_presenca'");
					$stmt->execute();						
							
					}


			public function Entrada($id_presenca, $time, $status_presenca){
						
					$stmt = $this->pdo->query("UPDATE presenca SET  status_presenca = '$status_presenca', entrada = '$time'
												WHERE id_presenca = '$id_presenca'");
					$stmt->execute();						
							
					}


			public function Saida($id_presenca, $time, $status_presenca){
						
					$stmt = $this->pdo->query("UPDATE presenca SET  status_presenca = '$status_presenca', saida = '$time'
												WHERE id_presenca = '$id_presenca'");
					$stmt->execute();						
							
					}



public function retornarListaPes($data, $id_empresa) {
				try {

					$stmt = $this->pdo->prepare("
						SELECT folha.data, presenca.id_presenca, presenca.status_presenca, presenca.entrada, presenca.saida, funcionario.nome_fun, funcionario.jornada, funcionario.status_fun						
						FROM  folha, presenca, funcionario
						WHERE folha.data = '$data' and folha.fk_empresa_folha = '$id_empresa' and presenca.fk_folha_presenca = id_folha and  presenca.fk_funcionario_presenca = funcionario.id_fun");
					$stmt->execute();
					
					return $stmt->fetchall(PDO::FETCH_ASSOC);
					
				} catch (PDOException $ex) {
					echo "ERRO 02: {$ex->getMessage()}";
				}
			}




	}


	
	

?>