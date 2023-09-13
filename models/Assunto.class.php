<?php
	class Assunto
	{
		public function __construct(private int $idassunto = 0, private string $descritivo = ""){}
		
		public function getIdassunto()
		{
			return $this->idassunto;
		}
		public function getDescritivo()
		{
			return $this->descritivo;
		}
		public function setIdassunto($idassunto)
		{
			$this->idassunto = $idassunto;
		}
		public function setDescritivo($descritivo)
		{
			$this->descritivo = $descritivo;
		}
		
	}
?>