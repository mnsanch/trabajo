<?php

    include_once 'config/dataBase.php';
    include_once 'PedidosUsuario.php';


    class PedidosUsuarioDAO {
        public static function guardarpedido() {
            $conexion = DataBase::connect();
            // Asignar valores a los parámetros
            $idUsuario =  $_SESSION['idusuario']; 
            $precio = Calcularprecios::calcularpreciofinal($_SESSION['selecciones']);
            $fechaActual = date("Y-m-d");
            
            // Preparar la consulta con marcadores de posición
            $stmt = $conexion->prepare("
                INSERT INTO PEDIDO (ID_Usuario, Precio_Pedido, Fecha_Pedido)
                VALUES (?, ?, ?)
            ");
        
            // Vincular los parámetros
            $stmt->bind_param("ids", $idUsuario, $precio, $fechaActual);
            
            
            // Ejecutar la consulta
            $resultado = $stmt->execute();
        
            $stmt = $conexion->prepare("
            SELECT ID_Pedido FROM `pedido` ORDER BY ID_Pedido DESC LIMIT 1
            ");

            $id = $conexion->insert_id;
            
            foreach ($_SESSION['selecciones'] as $pedido) {
                $cantidad = $pedido->getCantidad();
                $productos = $pedido->getProducto()->getIDProducto();
                $stmt = $conexion->prepare("
                INSERT INTO PEDIDO_PRODUCTO (ID_Pedido, ID_Producto, Cantidad)
                VALUES
                (?, ?, ?)
                ");
                $stmt->bind_param("iii", $id, $productos, $cantidad);
                $stmt->execute();
            }
            
            return $id;
        }

        public static function cogerpedido($id){
            $conexion = DataBase::connect();
            $stmt = $conexion->prepare("
            SELECT pedido.ID_Pedido, pedido.Precio_Pedido, pedido_producto.Cantidad, producto.Nombre_Producto, producto.Imagen_Producto, producto.Descripcion 
            FROM pedido 
            JOIN pedido_producto ON pedido.ID_Pedido = pedido_producto.ID_Pedido
            JOIN producto  ON pedido_producto.ID_Producto = producto.ID_Producto
            WHERE pedido_producto.ID_Pedido = ?
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

        public static function cogerpedidosusuario($id){
            $conexion = DataBase::connect();
            $stmt = $conexion->prepare("
            SELECT pedido.ID_Pedido, pedido.Precio_Pedido, pedido_producto.Cantidad, producto.Nombre_Producto, producto.Imagen_Producto, producto.Descripcion 
            FROM pedido 
            JOIN pedido_producto ON pedido.ID_Pedido = pedido_producto.ID_Pedido
            JOIN producto  ON pedido_producto.ID_Producto = producto.ID_Producto
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
