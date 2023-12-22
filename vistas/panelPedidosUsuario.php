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
        <div class="row">
            <?php
            $id=0;
                foreach ($pedidos as $pedido) {
                    
                    if ($id!=$pedido->getIDPedido()) {
                        if ($id==0){
                            $id=$pedido->getIDPedido(); 
                        }else{
                        ?>
                            <hr class="separacionsecundaria">
                            <?php
                            $id=$pedido->getIDPedido();
                        }
                        ?>
                        <h4 class="negrita productonombre mayuscula separacionsecundaria">El precio de este pedido fue de <?=$pedido->getPrecioPedido()?>€</h4>
                        <?php
                    }
            ?>

            <div class="col-12 col-md-6 col-lg-4 producto">
                <div class="imagencontenedor" style="background-image: url('<?=$pedido->getImagenProducto()?>');">
                </div>
                <h4 class="negrita productonombre mayuscula"><?=$pedido->getNombreProducto()?></h4>
                <p class="productodescripcion mayuscula"><?=$pedido->getDescripcion()?></p>
                <p class="productodescripcion mayuscula">Cantidad: <?=$pedido->getCantidad()?></p>
            </div>
            <?php
                }
            ?>
        </div>
    </section>

</body>
</html>