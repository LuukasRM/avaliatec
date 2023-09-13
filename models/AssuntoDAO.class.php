<?php
	class AssuntoDAO extends Conexao
	{
		public function __construct()
		{
			parent:: __construct();
		}
		
		public function buscar_todos()
		{
			$sql = "SELECT * FROM assunto";
			//prepara a frase sql antes de executar
			try
			{
				$stm = $this->db->prepare($sql);
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
				return "Problema ao buscar assuntos";
			}
		}
		
		public function buscar_Um($assunto)
		{
			$sql = "SELECT * FROM assunto WHERE idassunto = ?";
			try
			{
				$stm = $this->db->prepare($sql);
				$stm->bindValue(1, $assunto->getIdassunto());
				$stm->execute();
				$this->db = null;
				return $stm->fetchAll(PDO::FETCH_OBJ);
			}
			catch(PDOException $e)
			{
				$this->db = null;
				return "Problema ao buscar um assunto";
			}
			
		}
		
		public function inserir($assunto)
		{
			$sql = "INSERT INTO assunto(descritivo)VALUES(?)";
			try
			{
				$stm = $this->db->prepare($sql);
				//substituir os pontos de interrogação
				$stm->bindValue(1, $assunto->getDescritivo());
				
				
				$stm->execute();
				
				$this->db = null;
				return "Assunto para sugestão cadastrado com sucesso";
			}
			catch(PDOException $e)
			{
				$this->db = null;
				return "Problema ao inserir assunto";
			}
			
		}
		
		public function alterar($assunto)
		{
			$sql = "UPDATE assunto SET descritivo = ? WHERE idassunto = ?";
			try
			{
				
				$stm = $this->db->prepare($sql);
				$stm->bindValue(1, $assunto->getDescritivo());
				$stm->bindValue(2, $assunto->getIdassunto());
				$stm->execute();
				$this->db = null;
				return "Assunto para sugestão alterado com sucesso";
			}
			catch(PDOException $e)
			{
				$this->db = null;
				return "Problema ao alterar assunto";
			}
			
		}
		
	}//fim classe
?>