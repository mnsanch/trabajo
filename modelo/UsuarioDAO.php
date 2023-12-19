<?php

    include_once 'config/dataBase.php';
    include_once 'Usuario.php';


    class UsarioDAO {
        public static function getAllUsuarios() {
            $conexion = DataBase::connect();
            $stmt = $conexion->query(
                "SELECT usuario.ID_Usuario,
                usuario.Nombre_Usuario,
                usuario.Correo,
                usuario.Direccion,
                usuario.Telefono,
                contraseñas.contraseña,
                categoria_usuario.Nombre_Categoria_Usuario
                FROM usuario
                JOIN contraseñas on usuario.ID_Usuario = contraseñas.ID_Usuario
                JOIN categoria_usuario on usuario.ID_Categoria_Usuario = categoria_usuario.ID_Categoria_Usuario"
            );


            $usuarios = [];
    
            while ($obj = $stmt->fetch_object('Usuario')) {
                $usuarios[] = $obj;
            }
            return $usuarios;
        }
    
        
        
        public static function getUsuarioByID($id){

            // Preparamos la consulta
            $conexion = DataBase::connect();
        
            $stmt = $conexion->prepare(
                "SELECT usuario.ID_Usuario,
                usuario.Nombre_Usuario,
                usuario.Correo,
                usuario.Direccion,
                usuario.Telefono,
                contraseñas.contraseña,
                categoria_usuario.Nombre_Categoria_Usuario
                FROM usuario
                JOIN contraseñas on usuario.ID_Usuario = contraseñas.ID_Usuario
                JOIN categoria_usuario on usuario.ID_Categoria_Usuario = categoria_usuario.ID_Categoria_Usuario
                WHERE usuario.ID_Usuario=?"
                );
            $stmt->bind_param("i",$id);
        
            // Ejecutamos la consulta
            $stmt->execute();
            $resultado=$stmt->get_result();
        
            $conexion->close();

            return $resultado->fetch_object('Usuario');
        }

        public static function validarusuario($correo, $contraseña){

            // Preparamos la consulta
            $usuarios = UsarioDAO::getAllUsuarios();
            $correobd=false;
            $contraseñabd=false;
            foreach ($usuarios as $usuario) {
                if ($usuario->getCorreo()==$correo) {
                    $correobd=true;                    
                }
                if ($correobd==true && $usuario->getContraseña()==$contraseña) {
                    $contraseñabd=true;
                }
                if ($correobd==true&&$contraseñabd==true) {
                    $_SESSION['nombre'] = $usuario->getNombreUsuario();
                    $_SESSION['correo'] = $usuario->getCorreo();
                    $_SESSION['contraseña'] = $usuario->getContraseña();
                    $_SESSION['direccion'] = $usuario->getDireccion();
                    $_SESSION['telefono'] = $usuario->getTelefono();
                    $_SESSION['idusuario'] = $usuario->getIDUsuario();
                    $_SESSION['categoria'] = $usuario->getNombreCategoriaUsuario();
                    return true;
                }
                $correobd=false;
            }
            return false;

        }

        public static function modificarusuario($nombre, $correo, $direccion, $telefono, $contraseña, $id){

            
            // Preparamos la consulta
            $conexion = DataBase::connect();
        
            $stmt = $conexion->prepare(
                "UPDATE
                    usuario
                JOIN contraseñas ON usuario.ID_Usuario = contraseñas.ID_Usuario
                SET
                    usuario.Nombre_Usuario = ?,
                    usuario.Correo = ?,
                    usuario.Direccion = ?,
                    usuario.Telefono = ?,
                    contraseñas.Contraseña = ?
                WHERE
                    contraseñas.ID_Usuario = ?"
                );
            $stmt->bind_param("sssisi",$nombre, $correo, $direccion, $telefono, $contraseña, $id);
            
            $stmt->execute();

            // Preparamos la consulta
            $usuario = UsarioDAO::getUsuarioByID($id);
            return $usuario;



            // $correobd=false;
            // $contraseñabd=false;
            // foreach ($usuarios as $usuario) {
            //     if ($usuario->getCorreo()==$correo) {
            //         $correobd=true;                    
            //     }
            //     if ($correobd==true && $usuario->getContraseña()==$contraseña) {
            //         $contraseñabd=true;
            //     }
            //     if ($correobd==true&&$contraseñabd==true) {
            //         $_SESSION['nombre'] = $usuario->getNombreUsuario();
            //         $_SESSION['correo'] = $usuario->getCorreo();
            //         $_SESSION['contraseña'] = $usuario->getContraseña();
            //         $_SESSION['direccion'] = $usuario->getDireccion();
            //         $_SESSION['telefono'] = $usuario->getTelefono();
            //         $_SESSION['idusuario'] = $usuario->getIDUsuario();
            //         $_SESSION['categoria'] = $usuario->getNombreCategoriaUsuario();
            //         return true;
            //     }
            //     $correobd=false;
            // }
            // return false;

        }
        
    public static function comprobarcontraseña($contraseña, $contraseñaconfirmada){
        if ($contraseña==$contraseñaconfirmada) {
            return true;
        }else{
            return false;
        }
    }

    public static function comprobarcorreo($correo){
        $usuarios = UsarioDAO::getAllUsuarios();
        foreach ($usuarios as $usuario) {
            if ($usuario->getCorreo()==$correo) {
                return false;                    
            }
    }
    return true;
    }
}   
?>
