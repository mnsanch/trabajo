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
    

<div class="contenedorlogin separacionprincipal col-10 col-sm-5">
    <h1>Crear Pedido</h1>
    <form action="<?=url.'?controller=pedido&action=crearpedido'?>" method="post">

        <label for="producto">Usuario:</label>
        <select class="inputlogin" id="usuario" name="usuario" required>
            <?php
            foreach ($usuarios as $usuario) {
                ?>
            <option value="<?=$usuario->getIDUsuario()?>"><?=$usuario->getNombreUsuario()?></option>
            <?php
            }
            ?>
        </select>
        <!-- Desplegable con las categorias que puede ser el producto -->
        <label for="producto">Producto:</label>
        <select class="inputlogin" id="producto" name="producto" required>
            <?php
            foreach ($productos as $producto) {
                ?>
            <option value="<?=$producto->getIDProducto()?>"><?=$producto->getNombreProducto()?></option>
            <?php
            }
            ?>
        </select>

        <!-- Campos para poner la cantidad -->
        <label class="separacionsecundaria" for="cantidad">Cantidad:</label>
        <input class="inputlogin" type="number" id="cantidad" name="cantidad" required>

     
        <!-- Botones para volver a la pagina anterior o para crear el producto -->
        <div class="row justify-content-center separacionsecundaria">
            <a class="botonproducto" href="<?=url.'?controller=pedido&action=modificarpedidos'?>">Volver</a>
            <button class="botonproducto ms-5" type="submit">Crear Producto</button>
        </div>
    </form>
</div>

</body>
</html>
