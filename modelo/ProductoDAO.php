<?php

    include_once 'config/dataBase.php';
    include_once 'Producto.php';
    include_once 'Bebida.php';
    include_once 'Pedido.php';
    include_once 'ProductoPedido.php';


    class ProductoDAO {
        public static function getAllProductos() {
            $conexion = DataBase::connect();
            $stmt = $conexion->query(
                "SELECT producto.ID_Producto,
                categoria_producto.Nombre_Categoria_Producto AS ID_Categoria_Producto,
                producto.Nombre_Producto,
                producto.Precio_Producto,
                producto.Imagen_Producto,
                producto.Descripcion
            FROM producto
            JOIN categoria_producto ON producto.ID_Categoria_Producto = categoria_producto.ID_Categoria_Producto
            where Alcohol is null;"
            );


            $productos = [];
    
            while ($obj = $stmt->fetch_object('Producto')) {
                $productos[] = $obj;
            }

            $stmt = $conexion->query(
                "SELECT producto.ID_Producto,
                categoria_producto.Nombre_Categoria_Producto AS ID_Categoria_Producto,
                producto.Nombre_Producto,
                producto.Precio_Producto,
                producto.Imagen_Producto,
                producto.Descripcion,
                producto.Alcohol
            FROM producto
            JOIN categoria_producto ON producto.ID_Categoria_Producto = categoria_producto.ID_Categoria_Producto
            where Alcohol is not null;"
            );

            while ($obj = $stmt->fetch_object('Bebida')) {
                $productos[] = $obj;
            }

            return $productos;
        }
    
        
        
        public static function getProductoByID($id){

            // Preparamos la consulta
            $conexion = DataBase::connect();
        
            $stmt = $conexion->prepare("SELECT producto.ID_Producto,
            categoria_producto.Nombre_Categoria_Producto AS ID_Categoria_Producto,
            producto.Nombre_Producto,
            producto.Precio_Producto,
            producto.Imagen_Producto,
            producto.Descripcion
            FROM producto
            JOIN categoria_producto ON producto.ID_Categoria_Producto = categoria_producto.ID_Categoria_Producto
            WHERE ID_producto=?");
            $stmt->bind_param("i",$id);
        
            // Ejecutamos la consulta
            $stmt->execute();
            $resultado=$stmt->get_result();
        
            $conexion->close();

            return $resultado->fetch_object('Producto');
        }

        
    }        
?>
