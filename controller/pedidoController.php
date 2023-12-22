<?php

    // Creamos el controlador de pedidos
    include_once 'modelo/Pedido.php';
    include_once 'modelo/PedidosUsuarioDAO.php';




    class pedidoController {
    
        public function confirmar(){
            if (!isset($_SESSION['correo'])) {
            usuarioController::login();
            }else {
            // te almacena el pedido en la base de datos pedidoDAO que guarda en BBDD
            // borramos sesion pedido
            $idpedido = PedidosUsuarioDAO::guardarpedido();
            
            //guardo la coockie
            setcookie($_SESSION['idusuario'],$idpedido,time()+3600);
            setcookie($_SESSION['idusuario'].'precio',($precio = Calcularprecios::calcularpreciofinal($_SESSION['selecciones'])),time()+3600);
            unset($_SESSION['selecciones']);
            productoController::index();        
            }
        }

        public function ultimopedido() {
            // Verifica si la cookie llamada 'ultimopedido' está establecida
            //cabecera
            include_once 'vistas/header.php';
                    
            // Panel
            include_once 'vistas/panelUltimoPedido.php';
                    
            //fotter
            include_once 'vistas/footer.php';
        }

    
    }
?>