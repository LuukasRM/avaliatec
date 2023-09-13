<?php
	class UsuarioDAO extends Conexao
	{
		public function __construct()
		{
			parent:: __construct();
		}//fim construtor
		
		public function autenticar($usuario)
		{
			$sql = "SELECT idusuario, nome FROM usuario WHERE email = ? AND senha = ?";
			try
			{
				$stm = $this->db->prepare($sql);
				$stm->bindValue(1, $usuario->getEmail());
				$stm->bindValue(2, $usuario->getSenha());
				$stm->execute();
				$this->db = null;
				return $stm->fetchAll(PDO::FETCH_OBJ);
			}
			catch(PDOException $e)
			{
				$this->db = null;
				return "Problema na autenticação do usuário";
			}
		}
		public function inserir($usuario)
		{
			$sql = "INSERT INTO usuario (nome, email, senha) VALUES(?,?,?)";
			try
			{
				$stm = $this->db->prepare($sql);
				
				$stm->bindValue(1, $usuario->getNome());
				$stm->bindValue(2, $usuario->getEmail());
				$stm->bindValue(3, $usuario->getSenha());
				
				$stm->execute();
				$this->db = null;
				return "Usuário inserido com sucesso";
			}
			catch(PDOException $e)
			{
				$this->db = null;
				return "Problema ao inserir usuário";
			}
		}
		public function buscar_Um($usuario)
		{
			$sql = "SELECT idusuario, nome, email FROM usuario WHERE idusuario = ?";
			try
			{
				$stm = $this->db->prepare($sql);
				$stm->bindValue(1, $usuario->getIdusuario());
				
				$stm->execute();
				$this->db = null;
				return $stm->fetchAll(PDO::FETCH_OBJ);
			}
			catch(PDOException $e)
			{
				$this->db = null;
				return "Problema ao buscar um usuário";
			}
		}
		public function alterar($usuario)
		{
			$sql = "UPDATE usuario SET nome = ?, email = ? WHERE idusuario = ?";
			try
			{
				$stm = $this->db->prepare($sql);
				
				$stm->bindValue(1, $usuario->getNome());
				$stm->bindValue(2, $usuario->getEmail());
				$stm->bindValue(3, $usuario->getIdusuario());
				
				$stm->execute();
				$this->db = null;
				return "Usuário alterado com sucesso";
			}
			catch(PDOException $e)
			{
				$this->db = null;
				return "Problema ao alterar usuário";
			}
		}
		public function alterar_senha($usuario)
		{
			$sql = "UPDATE usuario SET senha = ? WHERE idusuario = ?";
			try
			{
				$stm = $this->db->prepare($sql);
				
				$stm->bindValue(1, $usuario->getSenha());
				$stm->bindValue(2, $usuario->getIdusuario());
				
				
				$stm->execute();
				$this->db = null;
				return "Usuário alterado com sucesso";
			}
			catch(PDOException $e)
			{
				$this->db = null;
				return "Problema ao alterar usuário";
			}
		}
	}//fim da classe
?>