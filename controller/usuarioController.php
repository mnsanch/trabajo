<?php

    // Creamos el controlador de pedidos
    session_start();
    include_once 'modelo/Usuario.php';
    include_once 'modelo/UsuarioDAO.php';
    include_once 'modelo/Usuario.php';
    include_once 'modelo/PedidosUsuarioDAO.php';




    class usuarioController {
    
        public function login(){   
            //Llamo al modelo para obtener los datos
            
            //cabecera
            include_once 'vistas/header.php';
            
            // Panel
            include_once 'vistas/panelLogin.php';
            
            //fotter
            include_once 'vistas/footer.php';

        }

        public function modificardatosusuario(){   
            //Llamo al modelo para obtener los datos
            
            //cabecera
            include_once 'vistas/header.php';
            
            // Panel
            include_once 'vistas/panelModificarUsuario.php';
            
            //fotter
            include_once 'vistas/footer.php';

        }


        public function iniciosesion(){
            if (isset($_POST['iniciar'])) {
                $error=true;
                $usuarios = UsarioDAO::validarusuario($_POST['correo'], $_POST['contraseña']);
                if ($usuarios==false){
                    $error=true;
                }
                //cabecera
                include_once 'vistas/header.php';
                
                // Panel
                include_once 'vistas/panelLogin.php';
                
                //fotter
                include_once 'vistas/footer.php';
            }elseif(isset($_POST['registrarse'])){
                //cabecera
                include_once 'vistas/header.php';
                
                // Panel
                include_once 'vistas/panelRegistrarse.php';
                
                //fotter
                include_once 'vistas/footer.php';
            }
        }

        public function verpedido(){
            $pedidos = PedidosUsuarioDAO::cogerpedidosusuario($_SESSION['idusuario']);
            
            //cabecera
            include_once 'vistas/header.php';
                
            // Panel
            include_once 'vistas/panelPedidosUsuario.php';

            //fotter
            include_once 'vistas/footer.php';
        }


        public function crearsesrion(){
            if (isset($_POST['volver'])) {
                $this->login();
            }
            $mirarcorreo = UsarioDAO::comprobarcorreo($_POST['correo']);
            if ($mirarcorreo==false){
                $correo=false;
                 //cabecera
                include_once 'vistas/header.php';
                
                // Panel
                include_once 'vistas/panelRegistrarse.php';
                
                //fotter
                include_once 'vistas/footer.php';
            }else {
                $validar = UsarioDAO::comprobarcontraseña($_POST['contraseña'], $_POST['confirmar_contrasena']);
                if ($validar==true){
                    // Preparamos la consulta
                    $conexion = DataBase::connect();
                    
                    $stmt = $conexion->prepare("
                        INSERT INTO `usuario`(`ID_Categoria_Usuario`, `Nombre_Usuario`, `Correo`, `Direccion`, `telefono`)
                        VALUES ('2',?,?,?,?);
                    ");
                    $stmt->bind_param("sssi",$_POST['nombre'], $_POST['correo'], $_POST['direccion'], $_POST['telefono']);
                    
                    // Ejecutamos la consulta
                    $resultado = $stmt->execute();

                    $stmt = $conexion->prepare("
                    SELECT ID_Usuario FROM `usuario` ORDER BY ID_Usuario DESC LIMIT 1
                    ");

                    $id = $conexion->insert_id;
                        
                    $stmt = $conexion->prepare("
                    INSERT INTO `contraseñas`(`ID_Usuario`, `Contraseña`) VALUES (?,?);
                    ");
                    $stmt->bind_param("is",$id, $_POST['contraseña']);
                    
                    // Ejecutamos la consulta
                    $stmt->execute();
                    $usuarios = UsarioDAO::validarusuario($_POST['correo'], $_POST['contraseña']);
                    $this->login();
                }else {
                    $crear=false;
                    
                    //cabecera
                    include_once 'vistas/header.php';
                    
                    // Panel
                    include_once 'vistas/panelRegistrarse.php';
                    
                    //fotter
                    include_once 'vistas/footer.php';
                }
            }
        }
        public function salirsesion(){
            session_destroy();

                // unset($_SESSION['nombre']);
                // unset($_SESSION['correo']);
                // unset($_SESSION['contraseña']);
                // unset($_SESSION['idusuario']);
            $this->login();
        }

        public function modificarsesion(){

            $usuario = UsarioDAO::modificarusuario($_POST['nombre'], $_POST['correo'], $_POST['direccion'], $_POST['telefono'], $_POST['contraseña'], $_SESSION['idusuario']);

            var_dump($usuario);
            unset($_SESSION['nombre']);
            unset($_SESSION['correo']);
            unset($_SESSION['contraseña']);
            unset($_SESSION['direccion']);
            unset($_SESSION['telefono']);
            unset($_SESSION['idusuario']);
            unset($_SESSION['categoria']);

            $_SESSION['nombre'] = $usuario->getNombreUsuario();
            $_SESSION['correo'] = $usuario->getCorreo();
            $_SESSION['contraseña'] = $usuario->getContraseña();
            $_SESSION['direccion'] = $usuario->getDireccion();
            $_SESSION['telefono'] = $usuario->getTelefono();
            $_SESSION['idusuario'] = $usuario->getIDUsuario();
            $_SESSION['categoria'] = $usuario->getNombreCategoriaUsuario();
            $this->login();
        }

    }
?>