<?php

    include_once 'config/dataBase.php';
    include_once 'Producto.php';
    include_once 'Pedido.php';
    include_once 'ProductoPedido.php';


    class ProductoPedidoDAO {
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
            SELECT pedido_producto.ID_Pedido, pedido_producto.Cantidad, producto.Nombre_Producto, producto.Precio_Producto
            FROM pedido_producto
            JOIN producto ON pedido_producto.ID_Producto = producto.ID_Producto
            WHERE pedido_producto.ID_Pedido = ?
            ");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $resultado = $stmt->get_result();

            $productos = [];
    
            while ($obj = $resultado->fetch_object('ProductoPedido')) {
                $productos[] = $obj;
            }
            return $productos;
        }
    }        
?>
