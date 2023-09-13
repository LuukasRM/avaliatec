<?php

require_once "models/Conexao.class.php";
require_once "models/Assunto.class.php";
require_once "models/AssuntoDAO.class.php";
require_once "models/Curso.class.php";
require_once "models/CursoDAO.class.php";
require_once "models/Sugestao.class.php";
require_once "models/SugestaoDAO.class.php";

    class sugestaoController
    {
        public function inserir_sugestao()
        {
            $erro = false;
            $erro1 = "";
            $erro2 = "";
            $erro3 = "";


            

            $cursoDAO = new CursoDAO();
            $curso = new Curso(situacao:"Ativo");
            $retorno = $cursoDAO->buscar_todos_Ativos($curso);

            $assuntoDAO = new AssuntoDAO();
            $retorno2 = $assuntoDAO->buscar_todos();


            if($_POST)
            {
                if(empty($_POST["descricao"]))
                {
                    $erro3 = "Preencha a sugestão";
                    $erro = true;
                }
                
                if($_POST["curso"] == "0")
                {
                    $erro2 = "Escolha um curso ou Geral";
                    $erro = true;
                }
                
                if($_POST["assunto"] == "0")
                {
                    $erro1 = "Escolha um assunto";
                    $erro = true;
                }
                if(!$erro)
                {
                    
                    $assunto = new Assunto($_POST["assunto"]);
                    $curso = new Curso($_POST["curso"]);
                    $sugestao = new Sugestao(descricao:$_POST["descricao"], data_sugestao:date("Y-m-d"), assunto:$assunto, curso:$curso, lida:"N");
                    $sugestaoDAO = new SugestaoDAO();
                    $retorno = $sugestaoDAO->inserir($sugestao);
                    header("location:index.php");
                    
                }
                }
            require_once "views/form_sugestao.php";

        }


        public function buscar_todas()
        {
            $sugestao = new Sugestao(lida:"N");
            $sugestaoDAO = new SugestaoDAO();
            $retorno = $sugestaoDAO->buscar_todas($sugestao);
            if(is_array($retorno))
            {
                require_once "views/listar_sugestoes.php";
            }
            else
            {
                echo $retorno;
            }
        }

        public function excluir_todas()
        {
            $sugestaoDAO = new SugestaoDAO();
            $retorno = $sugestaoDAO->excluir_todas();
            header("location:index.php?controle=sugestaoController&metodo=buscar_todas&msg=$retorno");
        }

        public function excluir_sugestao()
        {
            if($_GET)
            {
                $sugestao = new Sugestao($_GET["id"]);
                $sugestaoDAO = new SugestaoDAO();
                $retorno = $sugestaoDAO->excluir($sugestao);
                header("location:index.php?controle=sugestaoController&metodo=buscar_todas&msg=$retorno");
            }
            else
            {
                header("location:index.php");
            }
        }

        public function lida_todas()
        {
            $sugestao = new Sugestao(lida:"S");
            $sugestaoDAO = new SugestaoDAO();
            $retorno = $sugestaoDAO->alterar_todas($sugestao);
            header("location:index.php?controle=sugestaoController&metodo=buscar_todas&msg=$retorno");
        
        }

        public function lida_sugestao()
        {
            if($_GET)
            {
                $sugestao = new Sugestao(idsugestao:$_GET["id"], lida:"S");
                
                
                $sugestaoDAO = new SugestaoDAO();
                $retorno = $sugestaoDAO->alterar($sugestao);
                header("location:index.php?controle=sugestaoController&metodo=buscar_todas&msg=$retorno");
            }
            else
            {
                header("lolocation:index.php?controle=sugestaoController&metodo=buscar_todas");
            }
        }


    }// fim da classe