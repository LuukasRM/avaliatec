<?php
	class SugestaoDAO extends Conexao
	{
		public function __construct()
		{
			parent:: __construct();
		}
		
		public function buscar_todas($sugestao)
		{
			$sql = "SELECT sugestao.*, curso.nome, assunto.descritivo FROM sugestao, curso, assunto WHERE sugestao.idcurso = curso.idcurso AND sugestao.idassunto = assunto.idassunto AND sugestao.lida = ?";
			//prepara a frase sql antes de executar
			try
			{
				$stm = $this->db->prepare($sql);
				$stm->bindValue(1, $sugestao->getLida()); 
				//executa a frase sql no BD
				$stm->execute();
				//fecha a conexao com o BD
				$this->db = null;
				//returna o resultado no formato de OBJETOS
				return $stm->fetchAll(PDO::FETCH_OBJ);
			}
			catch(PDOException $e)
			{
				$this->db = null;
				return "Problema ao buscar sugestões";
			}
		}
		
		public function buscar_por_assunto()
		{
			$sql = "SELECT * FROM sugestao WHERE idassunto = ?";
			//prepara a frase sql antes de executar
			try
			{
				$stm = $this->db->prepare($sql);
				
				$stm->bindValue(1, getAssunto()->getIdassunto());
				
				$stm->execute();
				
				$this->db = null;
				
				return $stm->fetchAll(PDO::FETCH_OBJ);
			}
			catch(PDOException $e)
			{
				$this->db = null;
				return "Problema ao buscar sugestões";
			}
		}
		
		public function buscar_periodo($data_inicio, $data_fim)
		{
			$sql = "SELECT * FROM sugestao WHERE data_sugestao BETWEEN ? AND ?";
			
			try
			{
				$stm = $this->db->prepare($sql);
				
				$stm->bindValue(1, $data_inicio);
				
				$stm->bindValue(2, $data_fim);
				
				$stm->execute();
				
				$this->db = null;
				
				return $stm->fetchAll(PDO::FETCH_OBJ);
			}
			catch(PDOException $e)
			{
				$this->db = null;
				return "Problema ao buscar por período";
			}
		}	

		public function buscar_data($sugestao)
		{
			$sql = "SELECT * FROM sugestao WHERE data_sugestao = ?";
			
			try
			{
				$stm = $this->db->prepare($sql);
				
				$stm->bindValue(1, $sugestao->getData_sugestao());
				
				$stm->execute();
				
				$this->db = null;
				
				return $stm->fetchAll(PDO::FETCH_OBJ);
			}
			catch(PDOException $e)
			{
				$this->db = null;
				return "Problema ao buscar por data do registro da sugestão";
			}
		}				
		public function inserir($sugestao)
		{
			$sql = "INSERT INTO sugestao(idcurso, idassunto, descricao, data_sugestao, lida)VALUES(?, ?, ?, ?, ?)";
			try
			{
				$stm = $this->db->prepare($sql);
				//substituir os pontos de interrogação
				$stm->bindValue(1, $sugestao->getCurso()->getIdcurso());
				$stm->bindValue(2, $sugestao->getAssunto()->getIdassunto());
				
				$stm->bindValue(3, $sugestao->getDescricao());
				$stm->bindValue(4, $sugestao->getData_sugestao());
				$stm->bindValue(5, $sugestao->getLida());
				$stm->execute();
				
				$this->db = null;
				return "Sua sugestão foi enviada com sucesso";
			}
			catch(PDOException $e)
			{
				$this->db = null;
				return "Problema ao inserir sugestão";
			}
			
		}
		public function excluir($sugestao)
		{
			$sql = "DELETE FROM sugestao WHERE idsugestao = ?";
			try
			{
				$stm = $this->db->prepare($sql);
				$stm->bindValue(1, $sugestao->getIdsugestao());
				$stm->execute();
				
				$this->db = null;
				return "Sugestão Excluida com sucesso";
			}
			catch(PDOException $e)
			{
				$this->db = null;
				return "Problema ao excluir sugestão";
			}
		}
		public function alterar($sugestao)
		{
			$sql = "UPDATE sugestao SET lida = ? WHERE idsugestao = ?";
			try
			{
				$stm = $this->db->prepare($sql);
				//substituir os pontos de interrogação
				$stm->bindValue(1, $sugestao->getLida());
				$stm->bindValue(2, $sugestao->getIdsugestao());
				
				
				$stm->execute();
				
				$this->db = null;
				return "Sugestão marcada como lida";
			}
			catch(PDOException $e)
			{
				$this->db = null;
				return "Problema ao alterar sugestão";
				
			}
			
		}
		public function excluir_todas()
		{
			$sql = "DELETE FROM sugestao";
			try
			{
				$stm = $this->db->prepare($sql);
				
				$stm->execute();
				
				$this->db = null;
				return "Sugestões Excluidas com sucesso";
			}
			catch(PDOException $e)
			{
				$this->db = null;
				return "Problema ao excluir sugestão";
			}
		}
		public function alterar_todas($sugestao)
		{
			$sql = "UPDATE sugestao SET lida = ?";
			try
			{
				$stm = $this->db->prepare($sql);
				//substituir os pontos de interrogação
				$stm->bindValue(1, $sugestao->getLida());
							
				$stm->execute();
				
				$this->db = null;
				return "Todas as Sugestões foram marcadas como lida";
			}
			catch(PDOException $e)
			{
				$this->db = null;
				return "Problema ao alterar sugestão";
				
			}
			
		}
		
	}//fim classe
?>