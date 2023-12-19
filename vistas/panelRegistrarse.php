<!DOCTYPE html>
<html lang="es">
<head>
    <title>Restaurante Cosmocaixa Productos</title>
    <meta charset="UTF-8" lang="es" author="Marc Nicolás">
    <meta name="title" content="Restaurante Cosmocaixa">
    <meta name="description" content="Descripción de la WEB">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="css/estilos.css" rel="stylesheet">
</head>
<body>

<div class="contenedorlogin separacionprincipal">
<?php
  if (isset($correo) && $correo==false){
  ?>
    <h1>Correo no valido</h1>
    <?php
  }elseif (isset($crear) && $crear==false){
  ?>
    <h1>Contraseñas no coinciden</h1>
    <?php
  }else{
    ?>
    <h1 >Registro de Usuario</h1>
    <?php
  }
    ?>
    <p class="logo"></p>
    <form action="<?=url.'?controller=usuario&action=crearsesrion'?>" method="post">
      
      <label for="nombre">Nombre:</label>
      <input class="inputlogin" type="text" id="nombre" name="nombre" required>      

      <label class="separacionsecundaria" for="correo">Correo electrónico:</label>
      <input class="inputlogin" type="email" id="correo" name="correo" value="<?=$_POST['correo']?>" required>

      <label class="separacionsecundaria" for="direccion">Dirección:</label>
      <input class="inputlogin" type="text" id="direccion" name="direccion" required>

      <label class="separacionsecundaria" for="telefono">Telefono:</label>
      <input class="inputlogin" type="number" id="telefono" name="telefono" required>

      <label class="separacionsecundaria" for="password">Contraseña:</label>
      <input class="inputlogin" type="password" id="contraseña" name="contraseña" value="<?=$_POST['contraseña']?>" required>
      
      <label class="separacionsecundaria" for="confirmar_contrasena">Confirmar Contraseña:</label>
      <input class="inputlogin" type="password" id="confirmar_contrasena" name="confirmar_contrasena" required>
      <div class="row justify-content-center separacionsecundaria">
        <a class="botonproducto" href="<?=url.'?controller=usuario&action=login'?>">Volver</a>
        <button class="botonproducto ms-5" type="submit" name="registrar">Registrar</button>
      </div>
    </form>
  </div>

</body>
</html>
