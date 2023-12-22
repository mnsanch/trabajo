<?php
    class Calcularprecios{
        public static function calcularpreciofinal($pedidos){
            $preciofinal=0;

            foreach ($pedidos as $pedido){
                $preciofinal += $pedido->getProducto()->getPrecioProducto()*$pedido->getCantidad();
            }
            return number_format($preciofinal, 2);
        }

    }
?>