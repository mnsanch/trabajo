<?php

    include_once 'config/dataBase.php';
    include_once 'PedidosUsuario.php';


    class PedidosUsuarioDAO {
                public static function cogerpedidosusuario($id){
            $conexion = DataBase::connect();
            $stmt = $conexion->prepare("
            SELECT pedido.ID_Pedido, pedido.Precio_Pedido, pedido_producto.Cantidad, producto.Nombre_Producto, producto.Imagen_Producto, producto.Descripcion 
            FROM pedido 
            JOIN pedido_producto JOIN producto 
            WHERE producto.ID_Producto = pedido_producto.ID_Producto and pedido.ID_Pedido = pedido_producto.ID_Pedido and pedido.ID_Usuario = ?
            ");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $resultado = $stmt->get_result();

            $productos = [];
    
            while ($obj = $resultado->fetch_object('PedidosUsuario')) {
                $productos[] = $obj;
            }
            return $productos;
        }
    }        
?>
