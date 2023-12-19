<?php

    // Creamos el controlador de pedidos
    include_once 'modelo/ProductoDAO.php';
    include_once 'modelo/UsuarioDAO.php';
    include_once 'modelo/Pedido.php';
    include_once 'utils/precios.php';





    class productoController {
    
        public function index(){    
            //Llamo al modelo para obtener los datos
            
            //cabecera
            include_once 'vistas/header.php';
            
            // Panel
            include_once 'vistas/panelHome.php';
            
            //fotter
            include_once 'vistas/footer.php';

        }

        public function productos(){
        
            //Llamo al modelo para obtener los datos
            $productos = ProductoDAO::getAllProductos();            
            //cabecera
            include_once 'vistas/header.php';
            
            // Panel
            include_once 'vistas/panelPedido.php';
            
            //fotter
            include_once 'vistas/footer.php';

        }

        public function compra(){
           //Llamo al modelo para obtener los datos
           
            //cabecera
            include_once 'vistas/header.php';
            
            // Panel
            include_once 'vistas/panelCompra.php';
            
            //fotter
            include_once 'vistas/footer.php';

        }
        
        public function comprar(){
            if (!isset($_SESSION['selecciones'])){
                $_SESSION['selecciones']= array();
                $pedido = new Pedido(ProductoDAO::getProductoByID($_POST['id']));
                array_push($_SESSION['selecciones'],$pedido);
            }else {
                $pedido = new Pedido(ProductoDAO::getProductoByID($_POST['id']));
                array_push($_SESSION['selecciones'],$pedido);
            }
        
            
            $this->productos();

        }

        public function sumarrestar(){

            if (isset($_POST['mas'])) {
                $pedido = $_SESSION['selecciones'][$_POST['mas']];
                $pedido->setCantidad($pedido->getCantidad()+1);
            }elseif(isset($_POST['menos'])){
                $pedido = $_SESSION['selecciones'][$_POST['menos']];
                if ($pedido->getCantidad()==1){
                    unset($_SESSION['selecciones'][$_POST['menos']]);
                    
                    //se reindexa el array
                    $_SESSION['selecciones']=array_values($_SESSION['selecciones']);
                }else {
                    $pedido->setCantidad($pedido->getCantidad()-1);
                }
            }
           
            $this->compra();

        }

        public function borrar(){

            unset($_SESSION['selecciones'][$_POST['borrar']]);
            $_SESSION['selecciones'] = array_values($_SESSION['selecciones']);


            $this->compra();

        }
        
        public function borrartodo(){
            unset($_SESSION['selecciones']);
           
            $this->compra();
        }


    }
?>