<?php
	class Usuario
	{
		
		public function __construct(private int $idusuario = 0, private string $nome = "", private string $email = "", private string $senha = ""){}
		//métodos gets
		public function getIdusuario()
		{
			return $this->idusuario;
		}
		public function getNome()
		{
			return $this->nome;
		}
		public function getEmail()
		{
			return $this->email;
		}
		public function getSenha()
		{
			return $this->senha;
		}
		//sets
		public function setIdusuario($idusuario)
		{
			$this->idusuario = $idusuario;
		}
		public function setNome($nome)
		{
			$this->nome = $nome;
		}
		public function setEmail($email)
		{
			$this->email = $email;
		}
		public function setSenha($senha)
		{
			$this->senha = $senha;
		}
		
		
}//fim classe

?>