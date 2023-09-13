<?php
	class Sugestao
	{
		public function __construct(private int $idsugestao = 0, private string $descricao = "", private string $data_sugestao = "", private $assunto = null, private $curso = null, private  string $lida = ""){}
		
		public function getIdsugestao()
		{
			return $this->idsugestao;
		}
		public function getDescricao()
		{
			return $this->descricao;
		}
		
		public function getData_sugestao()
		{
			return $this->data_sugestao;
		}
		public function getAssunto()
		{
			return $this->assunto;
		}
		public function getCurso()
		{
			return $this->curso;
		}
		public function getLida()
		{
			return $this->lida;
		}
		public function setIdsugestao($idsugestao)
		{
			$this->idsugestao = $idsugestao;
		}
		public function setDescricao($descricao)
		{
			$this->descricao = descricao;
		}
		public function setData_sugestao($data_sugestao)
		{
			$this->data_sugestao = $data_sugestao;
		}
		public function setAssunto($assunto)
		{
			$this->assunto = $assunto;
		}
		public function setCurso($curso)
		{
			$this->curso = $curso;
		}
		
	}
?>