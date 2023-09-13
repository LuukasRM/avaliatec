<?php
	class Curso
	{
		public function __construct(private int $idcurso = 0, private string $nome = "", private string $situacao = ""){}
		
		public function getIdcurso()
		{
			return $this->idcurso;
		}
		public function getNome()
		{
			return $this->nome;
		}
		public function getSituacao()
		{
			return $this->situacao;
		}
		public function setIdcurso($idcurso)
		{
			$this->idcurso = $idcurso;
		}
		public function setNome($nome)
		{
			$this->nome = $nome;
		}
		public function setSituacao($situacao)
		{
			$this->situacao = $situacao;
		}
		
	}
?>