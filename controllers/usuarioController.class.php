<?php   

    require_once "models/Conexao.class.php";
    require_once "models/Usuario.class.php";
    require_once "models/UsuarioDAO.class.php";

    if(!isset($_SESSION))
        session_start();

    class usuarioController
        {
            public function login()
            {
            $msg = "";
            if($_POST)
            {
                
                
                //verificar preenchimento
                if($_POST["email"] == "" || $_POST["senha"] == "")
                {
                    $msg ="Dados Obrigatórios";
                }
                
                
                //se não tiver erro 
            
                if($msg ==  "")
                {
                    //verificar usuario e senha no BD
                    $usuario = new Usuario(email:$_POST["email"], senha:md5($_POST["senha"]));
                    
                    $usuarioDAO = new UsuarioDAO();
                    $retorno = $usuarioDAO->autenticar($usuario);
                    if(is_array($retorno) && count($retorno) > 0)
                    {
                      //é um usuário
                      $_SESSION["nome"] = $retorno[0]->nome;
                      $_SESSION["idusuario"] = $retorno[0]->idusuario;
                      header("location:index.php");
                    }
                    else
                    {
                        $msg = "Verificar os dados digitados";
                    }
                }
            }
            
            require_once "views/login.php";
            }

            public function logout()
            {
                $_SESSION = array();
                session_destroy();
                header("location:index.php");
            }


            public function edit_usuario()
            {
                $msg = "";
                $error = array();

                if(isset($_SESSION["idusuario"]))
                {
                    $usuario = new Usuario($_SESSION["idusuario"]);
                    $usuarioDAO = new UsuarioDAO();
                    $ret = $usuarioDAO->buscar_Um($usuario);
                }
                else
                {
                    header("location:index.php");
                }
                if($_POST)
                {
                    //validar os dados
                    $usuario->setNome($_POST["nome"]);
                    $usuario->setEmail($_POST["email"]);
                    $usuarioDAO = new UsuarioDAO();
                    $msg = $usuarioDAO->alterar($usuario);
                    
                    
                }
                require_once "views/edit_usuario.php";
            }

            public function alterar_senha()
                {
                    $msg = "";
                    $error = array();	
                    if($_POST)
                    {
                        $usuario = new Usuario(idusuario:$_SESSION["idusuario"], senha:md5($_POST["senha"]));
                        $usuarioDAO = new UsuarioDAO();
                        $retorno = $usuarioDAO->alterar_senha($usuario);
                    }
                require_once "views/alterar_senha.php";
                }
            

        }// fim da classe