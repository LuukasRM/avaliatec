<?php

require_once "models/Conexao.class.php";
require_once "models/Assunto.class.php";
require_once "models/AssuntoDAO.class.php";


    class assuntoController
    {

        public function buscar_todos()
        {
            $assuntoDAO = new AssuntoDAO();
            $retorno = $assuntoDAO->buscar_todos();
            if(is_array($retorno))
            {
                require_once "views/listar_assuntos.php";
            }
            else
            {
                echo $retorno;
            }
        }


        public function edit_assunto()
        {
            $erro = "";
            if($_GET)
            {
                $assunto = new Assunto($_GET["id"]);
                $assuntoDAO = new AssuntoDAO();
                $ret = $assuntoDAO->buscar_Um($assunto);
                require_once "views/edit_assunto.php";
                
            }
            else
            {
                header("location:listar_assuntos.php");
            }
            if($_POST)
            {
                if(empty($_POST["descritivo"]))
                {
                    $erro = "Preencha o descritivo do assunto";
                }
                else
                {
                    
                    $assunto = new Assunto($_POST["id"],$_POST["descritivo"]);
                    $assuntoDAO = new AssuntoDAO();
                    $retorno = $assuntoDAO->alterar($assunto);
                    header("location:index.php?controle=assuntoController&metodo=buscar_todos&msg=$retorno");
                }
            }
        }


        public function novo_assunto()
        {
            $erro = "";
            if($_POST)
            {
                if(empty($_POST["descritivo"]))
                {
                    $erro = "Preencha o descritivo do assunto";
                }
                else
                {
                    $assunto = new Assunto(descritivo:$_POST["descritivo"]);
                    $assuntoDAO = new AssuntoDAO();
                    $retorno = $assuntoDAO->inserir($assunto);
                    header("location:index.php?controle=assuntoController&metodo=buscar_todos&msg=$retorno");
                }
            }
            require_once "views/form_assunto.php";
        }
    }//fim da classe