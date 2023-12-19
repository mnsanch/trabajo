<!DOCTYPE html>
<html>

<head>
    <title>Restaurante Cosmocaixa Carrito</title>
    <meta charset="UTF-8" lang="es" author="Marc Nicolás">
    <meta name="title" content="Restaurante Cosmocaixa">
    <meta name="description" content="Descripción de la WEB">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="css/estilos.css" rel="stylesheet">
    
</head>

<body class="Nunito_Sans">
<section class="container-xxl">
<?php
    if (isset($_SESSION['selecciones'])){
        if (count($_SESSION['selecciones'])==0) {
            unset($_SESSION['selecciones']);
        }
    }
    
    if (!isset($_SESSION['selecciones'])){
        ?>
            <div class="row fondocarrito separacioncarrito">
            <div class="col-6 col-sm-2">
            <img src="Imagenes/imagen compra.jpg" class="imagencompra" alt="">
            </div>
            <div class="col-4 fondocarrito d-flex align-items-center">
                <h3 class="d-felx align-content-center negrita">EL CARRITO SE ENCUENTRA VACIO</h3> 
            </div>
        </div>
        <?php
    }else {?>
        <div class="row fondocarrito separacioncarrito">
            <div class="col-6 col-sm-2">
            <img src="Imagenes/imagen compra.jpg" class="imagencompra" alt="">
            </div>
            <div class="col-4 fondocarrito">
                <h3 class="d-felx align-content-center negrita">RESTAURANTE COSMOCAIXA</h3>
                <p>Para llevar</p>   
            </div>
        </div>

    <?php
        $hr=true;
        include_once 'utils/precios.php';
            $posicion=0;
            foreach ($_SESSION['selecciones'] as $pedido) {
                if ($hr==true) {
                    ?>
                    <div class="row py-0 my-0">
                        <div class="col-8 py-0 my-0"></div>
                        <form action="" class="col-2">
                            <button class="botoncompra editareliminar py-0 my-0 negrita"><img class="imageneditareliminar" src="Imagenes/Iconos/lapiz rojo.png" alt=""> Editar selección</button>
                        </form>
                        <form action="<?=url.'?controller=producto&action=borrartodo'?>" class="col-2" method="post">
                            <button class="botoncompra editareliminar separacionborrar py-0 my-0 negrita"><img class="imageneditareliminar"src="Imagenes/Iconos/basura.png" alt="">Borrar todo</button>
                        </form>
                    </div>
                    <?php
                }
                if ($hr==false) {
                ?>
                <hr>
                <?php
            }
            $hr=false;
    ?>
        
        <div class="row">
            <img class="col-4 col-sm-2" src="<?=$pedido->getProducto()->getImagenProducto()?>" alt="">
            <h4 class="col-4 col-sm-5 d-flex align-items-center"><?=$pedido->getProducto()->getNombreProducto()?></h4>
            <div class="row col-1 d-flex align-items-center">
                <p class="col-6"><?=$pedido->getCantidad()?></p>
                <form action="<?=url.'?controller=producto&action=sumarrestar'?>" class="col-6" method="post">
                    <button class="botoncompra" type="submit" name="mas" value="<?=$posicion?>">+</button>
                    <button class="botoncompra" type="submit" name="menos"value="<?=$posicion?>">-</button>
                </form>
            </div>
            <div class="d-flex align-items-center col-4">
                <div class="col-3">
                  <p class="justify-content-end row">General</p>
                  <p class="negrita justify-content-end row">Subtotal</p>
                </div>
                <div class="col-4"></div>
                <div class="col-3">
                    <p class="justify-content-end row"><?=$pedido->getProducto()->getPrecioProducto()?>€</p>   
                    <p class="negrita justify-content-end row"><?=$pedido->getProducto()->getPrecioProducto()?>€</p>
                </div>
                <div class="col-2">
                <form action="<?=url.'?controller=producto&action=borrar'?>" class="col-6" method="post">
                    <button class="botoncompra" type="submit" name="borrar" value="<?=$posicion?>"><img class="imageneditareliminar ms-4 mb-4" src="Imagenes/Iconos/basura.png" alt=""></button>
                </form>
                <form action="<?=url.'?controller=prducto&action=editar'?>" class="col-6" method="post">
                    <button class="botoncompra" type="submit" name="borrar" value="<?=$posicion?>"><img class="imageneditareliminar ms-4 mb-3" src="Imagenes/Iconos/lapiz rojo.png" alt=""></button>
                </form>
                </div>
                
            </div>
        
        </div>    


            <p></p>
            <?php
            $posicion+=1;
        }
    ?>
        <div class="row separacioncarrito">
            <div class="col-8 fondocarrito"></div>
            <div class="col-4 row fondocarrito">
                <h3 class="col-5 pe-4 totalcompra justify-content-end row negrita">Total a pagar</h3>
                <div class="col-1"></div>
                <h3 class="col-6 pe-1 totalcompra justify-content-end row negrita"><?=Calcularprecios::calcularpreciofinal($_SESSION['selecciones'])?>€</h3>
            </div>
        </div>
        <div class="row CircularSTD separacionsecundaria">

            <form class="col-12 col-sm-6 px-0" action="<?=url.'?controller=producto&action=productos'?>" method="post"> 
                <button class="botonproductovolver negrita " type="submit">CONTINUAR COMPRANDO</button>
            </form>
            <form class="col-12 col-sm-6 text-end" action="<?=url.'?controller=pedido&action=confirmar'?>" method="post"> 
                <button class="botoncomprar negrita" type="submit">COMPRAR</button>
            </form>
        </div>
        <?php
    }
    ?>
    </section>
    

</body>
</html>