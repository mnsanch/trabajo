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
<body class="">

  <div class="contenedorlogin separacionprincipal">
    <?php
      if (isset($_SESSION['correo'])) {
        ?>
      <h1>Hola <?php echo $_SESSION['nombre']?></h1>
      <div class="row separacionsecundaria">
        <form class="col-6 ps-5" action="<?=url.'?controller=usuario&action=modificardatosusuario'?>" method="post">
          <button class="botonproducto ms-2" type="submit">Modificar Datos</button>
        </form>
        <form class="col-6 ps-5" action="<?=url.'?controller=usuario&action=verpedido'?>" method="post">
          <button class="botonproducto ms-2" type="submit">Ver Pedidos</button>
        </form>
        <form class="col-6 ps-5" action="<?=url.'?controller=usuario&action=iniciosesion'?>" method="post">
          <button class="botonproducto ms-2" type="submit">Registrarse</button>
        </form>
        <form class="col-6 ps-5" action="<?=url.'?controller=usuario&action=salirsesion'?>" method="post">
          <button class="botonproducto ms-2" type="submit">Cerrar Sesión</button>
        </form>
      </div>
      <?php
      }else{
        if (isset($error) && $error==true){
          ?>
          <h1>Error</h1>
          <?php
        }else{
        ?>
    <h1 >Iniciar Sesión</h1>
    <?php
        }
    ?>
    <p class="logo"></p>
    <form class="" action="<?=url.'?controller=usuario&action=iniciosesion'?>" method="post">
      <label for="email">Correo electronico:</label>
      <input class="inputlogin" type="email" id="correo" name="correo" required>

      <label class="separacionsecundaria" for="password">Contraseña:</label>
      <input class="inputlogin" type="password" id="contraseña" name="contraseña" required>
      <div class="row justify-content-center separacionsecundaria">
        <button class="botonproducto  me-2" name="iniciar" type="submit">Iniciar Sesión</button>
        <button class="botonproducto ms-2" name="registrarse" type="submit">Registrarse</button>
      </div>
    </form>

  <?php
      }
    ?>
  </div>

</body>
</html>
