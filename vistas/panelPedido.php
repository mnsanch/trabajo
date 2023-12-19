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
            $contador=2;
                foreach ($productos as $producto) {
                    $contador++;
                    if ($contador%3==0){
                    ?>
                        <h3 class="container CircularSTD negrita separacionprincipal">SERVICIOS Y ACCESIBILIDAD</h3>
                    <?php
                    }
                    ?>

            <div class="col-12 col-md-6 col-lg-4 producto">
                <a href="productos.html" class="nodecoracion">
                    <div class="imagencontenedor" style="background-image: url('<?=$producto->getImagenProducto()?>');">
                    </div>
                    <p class="productocategoriaproducto negrita mayuscula"><?=$producto->getIDCategoriaProducto()?></p>
                    <h4 class="negrita productonombre mayuscula"><?=$producto->getNombreProducto()?></h4>
                    <p class="productodescripcion mayuscula"><?=$producto->getDescripcion()?></p>
                    <?php
                        if (method_exists($producto, 'getAlcohol')) {
                            if ($producto->getAlcohol() == 1) {
                                echo "tiene alcohol";
                            } else {
                                echo "no tiene alcohol";
                            }
                        }
                    ?>
                </a>
                <div class="row">
                    <form class="col-4" action="<?=url.'?controller=producto&action=comprar'?>" method="post"> 
                        <input type="hidden" name="id"  value="<?=$producto->getIDProducto()?>">
                        <button class="botonproductoproducto" type="submit">AÑADIR AL CARRITO</button>
                    </form>
                    <p class="col-1 pt-1 ps-0"><?=$producto->getPrecioProducto()?>€</p>
                </div>
            </div>
            <?php
                }
            ?>
        </div>
    </section>

</body>
</html>