<?php

    // Creamos el controlador de pedidos
    include_once 'modelo/Pedido.php';
    include_once 'modelo/ProductoPedidoDAO.php';




    class pedidoController {
    
        public function confirmar(){
            if (!isset($_SESSION['correo'])) {
            usuarioController::login();
            }else {
            // te almacena el pedido en la base de datos pedidoDAO que guarda en BBDD
            // borramos sesion pedido
            $idpedido = ProductoPedidoDao::guardarpedido();
            unset($_SESSION['selecciones']);
            $hola = $_SESSION['nombre'];
            //guardo la coockie
            setcookie('.',$idpedido,time()+3600);
            setcookie($_SESSION['idusuario'],$_SESSION['idusuario'],time()+3600);


            productoController::index();        
        }

    }
}
?>