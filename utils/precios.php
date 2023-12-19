<?php
    class Calcularprecios{
        public static function calcularpreciofinal($pedidos){
            $preciofinal=0;

            foreach ($pedidos as $pedido){
                $preciofinal += $pedido->getProducto()->getPrecioProducto()*$pedido->getCantidad();
            }
            return number_format($preciofinal, 2);
        }

        public static function calcularpreciocookie($pedidos){
            $preciocookie=0;

            foreach ($pedidos as $pedido){
                $preciocookie += $pedido->getPrecioProducto();
            }
            return number_format($preciocookie, 2);
        }
    }

?>