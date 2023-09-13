<?php
	class CursoDAO extends Conexao
	{
		public function __construct()
		{
			parent:: __construct();
		}
		
		public function buscar_todos()
		{
			$sql = "SELECT * FROM curso";
			
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
				return "Problema ao buscar cursos";
			}
		}
		
		public function buscar_Um($curso)
		{
			$sql = "SELECT * FROM curso WHERE idcurso = ?";
			try
			{
				$stm = $this->db->prepare($sql);
				$stm->bindValue(1, $curso->getIdcurso());
				$stm->execute();
				$this->db = null;
				return $stm->fetchAll(PDO::FETCH_OBJ);
			}
			catch(PDOException $e)
			{
				$this->db = null;
				return "Problema ao buscar um curso";
			}
			
		}
		
		public function inserir($curso)
		{
			$sql = "INSERT INTO curso(nome, situacao)VALUES(?, ?)";
			try
			{
				$stm = $this->db->prepare($sql);
				//substituir os pontos de interrogação
				$stm->bindValue(1, $curso->getNome());
				$stm->bindValue(2, $curso->getSituacao());
				
				$stm->execute();
				
				$this->db = null;
				return "curso cadastrado com sucesso";
			}
			catch(PDOException $e)
			{
				$this->db = null;
				return "Problema ao inserir curso";
			}
			
		}
		
		public function alterar($curso)
		{
			$sql = "UPDATE curso SET nome = ? WHERE idcurso = ?";
			try
			{
				
				$stm = $this->db->prepare($sql);
				$stm->bindValue(1, $curso->getNome());
				$stm->bindValue(2, $curso->getIdcurso());
				$stm->execute();
				$this->db = null;
				return "Curso alterado com sucesso";
			}
			catch(PDOException $e)
			{
				$this->db = null;
				return "Problema ao alterar curso";
			}
			
		}
		public function alterar_situacao($curso)
		{
			$sql = "UPDATE curso SET situacao = ? WHERE idcurso = ?";
			try
			{
				
				$stm = $this->db->prepare($sql);
				$stm->bindValue(1, $curso->getSituacao());
				$stm->bindValue(2, $curso->getIdcurso());
				$stm->execute();
				$this->db = null;
				return "Situação do curso alterada com sucesso";
			}
			catch(PDOException $e)
			{
				$this->db = null;
				return "Problema ao alterar a situação do curso";
			}
			
		}
		public function buscar_todos_ativos($curso)
		{
			$sql = "SELECT * FROM curso WHERE situacao = ?";
			
			try
			{
				$stm = $this->db->prepare($sql);
				$stm->bindValue(1, $curso->getSituacao());
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
				return "Problema ao buscar cursos";
			}
		}
	}//fim classe
?>