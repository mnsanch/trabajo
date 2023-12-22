<!DOCTYPE html>
<html>

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
    
    <section class="container-xxl CircularSTD">
        <?php
        if (isset ($_COOKIE[$_SESSION['idusuario']])) {
            ?>
            <h3>El ultimo pedido te costo <?=$_COOKIE[$_SESSION['idusuario'].'precio']?>€</h3>
            <div class="row">
                <?php
                $id=0;
                foreach ( (PedidosUsuarioDAO::cogerpedido($_COOKIE[$_SESSION['idusuario']])) as $producto) {
                    ?>
                    <div class="col-12 col-md-6 col-lg-4 producto">
                        <div class="imagencontenedor" style="background-image: url('<?=$producto->getImagenProducto()?>');">
                        </div>
                        <h4 class="negrita productonombre mayuscula"><?=$producto->getNombreProducto()?></h4>
                        <p class="productodescripcion mayuscula"><?=$producto->getDescripcion()?></p>
                        <p class="productodescripcion mayuscula">Cantidad: <?=$producto->getCantidad()?></p>
                    </div>
                <?php
                };
                ?>
    
            </div>
            <?php
        }else{
            ?>
            <h2>Nada</h2>
        <?php
        }
        ?>
    </section>

</body>
</html>