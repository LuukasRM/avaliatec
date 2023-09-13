<?php  

        require_once "models/Conexao.class.php";
        require_once "models/Curso.class.php";
        require_once "models/CursoDAO.class.php";



        if(!isset($_SESSION))
        session_start();

        class cursoController
        {

            public function buscar_todos()

            {
                $cursoDAO = new CursoDAO();
                $retorno = $cursoDAO->buscar_todos();
                if(is_array($retorno))
                {
                    require_once "views/listar_cursos.php";
                }
                else
                {
                    echo $retorno;
                }
            }

            public function form_curso()
            {
            if($_POST)
            {
                if(empty($_POST["nome"]))
                {
                    $erro = "Preencha o nome do curso";
                }
                else
                {
                    
                    $curso = new Curso(nome:$_POST["nome"], situacao:"Ativo");
                    $cursoDAO = new CursoDAO();
                    $retorno = $cursoDAO->inserir($curso);
                    header("location:index.php?controle=cursoController&metodo=buscar_todos");
                }

                
            }
            require_once "views/form_curso.php";
            }
            public function alterar_curso()
            {
                $erro = "";
                if($_GET)
                {
                    $curso = new curso($_GET["id"]);
                    $cursoDAO = new cursoDAO();
                    $ret = $cursoDAO->buscar_Um($curso);
                    require_once "views/edit_curso.php";
                }
                else
                {
                    header("location:listar_cursos.php");
                }
                
                if($_POST)
                {
                    if(empty($_POST["nome"]))
                    {
                        $erro = "Preencha o nome do curso";
                    }
                    else
                    {
                        
                        $curso = new curso(idcurso:$_POST["id"], nome:$_POST["nome"]);
                        $cursoDAO = new cursoDAO();
                        $retorno = $cursoDAO->alterar($curso);
                        header("location:index.php?controle=cursoController&metodo=buscar_todos");
                    }
                }
            }
            public function mudar_situacao()
            {
                if($_GET)
                {
                    $curso = new Curso(idcurso:$_GET["id"], situacao:$_GET["situacao"]);
                    $cursoDAO = new CursoDAO();
                    $retorno = $cursoDAO->alterar_situacao($curso);
                    header("location:index.php?controle=cursoController&metodo=buscar_todos&msg=$retorno");
                }
                else
                {
                    header("location:index.php?controle=cursoController&metodo=buscar_todos");
                }
            }
            
        }//fim da classe