<!DOCTYPE html>
<html>

<head>
    <title>Restaurante Cosmocaixa Inicio</title>
    <meta charset="UTF-8" lang="es" author="Marc Nicolás">
    <meta name="title" content="Restaurante Cosmocaixa">
    <meta name="description" content="Descripción de la WEB">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="css/estilos.css" rel="stylesheet">
</head>

<body>

    <?php
// Verifica si la cookie llamada 'ultimopedido' está establecida
if (isset($_COOKIE['ultimopedido'])) {
    // Imprime un mensaje que muestra el valor de la última compra almacenado en esa cookie
    echo "Lo ultimo que compraste fue: ";
     foreach ( (ProductoPedidoDao::cogerpedido($_COOKIE['ultimopedido'])) as $producto) {
        echo $producto->getCantidad()." ";
        echo $producto->getNombreProducto()." ";
    };
        echo "por un total de ". Calcularprecios::calcularpreciocookie(ProductoPedidoDao::cogerpedido($_COOKIE['ultimopedido']))."€";
    // Elimina la cookie 'ultimopedido'
    setcookie('ultimopedido', '', time() - 3600);
}

    ?>    


    <main>
        <section class="container-xl text-center separacionprincipal">
            <img src="Imagenes/banner.png" class="img-fluid imagenbanner" alt="">
        </section>
        <section class="container CircularSTD separacionprincipal">
            <h3 class="negrita">BIENVENIDO AL RESTAURANTE COSMOCAIXA</h3>
            <p class="separacionsecundaria"> Descubre una experiencia culinaria única en un entorno inspirado en la
                ciencia y la naturaleza.
                Nosencontramos en la calle Isaac Newton, 26, Barcelona. Allí te esperamos.</p>
        </section>
        <section class="container-xl text-center separacionsecundaria">
            <img src="Imagenes/mapa.jpg" class="img-fluid" alt="">
        </section>
        <h3 class="container CircularSTD negrita separacionprincipal">SERVICIOS Y ACCESIBILIDAD</h3>
        <section class="text-start container-lg separacionsecundaria">
            <div class="row LatoWeb">
                <div class="col-12 col-lg-4">
                    <p class="negrita CircularSTD subtitulo">
                        ACCESIBLE PARA USUARIOS CON SILLA DE RUEDAS Y PERSONAS CON MOVILIDAD REDUCIDA
                    </p>
                    <p class="texto">Accesos accesibles para todos</p>
                    <p class="texto">Sillas adaptadas a disposición de los clientes (Servicio limitado a la disponibilidad)</p>
                    <p class="texto">Espacios reservados para personas con movilidad reducida</p>
                    <p class="texto">Baños adaptados</p>
                </div>
                <div class="col-12 col-lg-4">
                    <p class="negrita CircularSTD subtitulo">ACCESIBLE PARA PERSONAS CIEGAS O CON DIFICULTADES VISUALES</p>
                    <p class="texto"> <span class="negrita">Encaminamiento podotáctil:</span> franjas guía de encaminamiento podotáctil desde la entrada hasta los baños y la recepción</p>
                </div>
                <div class="col-12 col-lg-4">
                    <p class="CircularSTD subtitulo">ACCESIBLE PARA PERSONAS SORDAS O CON DIFICULTADES AUDITIVAS</p>
                    <p class="texto"><span class="negrita">Carteles de señalización</span>de la salida y los baños</p>
                    <p class="texto"><span class="negrita">Pizarras</span> a disposición de los clientes para poder comunicarse con los camareros</p>
                    <p class="texto">Accesible para personas con discapacidad mental, intelectual o psíquica</p>
                </div>
            </div>
        </section>
        <h3 class="container CircularSTD negrita separacionprincipal">PLATOS DESTACADOS</h3>
        <section class="container-xxl CircularSTD">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-4 producto">
                    <a href="productos.html" class="nodecoracion producto">
                        <div class="imagencontenedor"
                            style="background-image: url('Imagenes/Bocadillos/albondigas.jpg');"></div>
                        <p class="productocategoria negrita">BOCADILLO GOURMET</p>
                        <h4 class="negrita productonombre">ALBÓNDIGAS</h4>
                        <p class="productodescripcion">BOCADILLO DE ALBÓNDIGA, QUESO RALLADO, PEREJIL, SALSA DE TOMATE.</p>
                    </a>
                    <div class="row">
                        <form class="col-4" action="<?=url.'?controller=producto&action=comprar'?>" method="post"> 
                            <input type="hidden" name="id"  value="12">
                            <button class="botonproducto CircularSTD" type="submit">AÑADIR AL CARRITO</button>
                        </form>
                        <p class="col-1 pt-1 ps-0">6€</p>
                    </div>                    
                </div>
                <div class="col-12 col-md-6 col-lg-4 producto">
                    <a href="productos.html" class="nodecoracion">
                        <div class="imagencontenedor" style="background-image: url('Imagenes/Bocadillos/falafel.jpg');">
                        </div>
                        <p class="productocategoria negrita">BOCADILLO VEGANO</p>
                        <h4 class="negrita productonombre">FALAFEL</h4>
                        <p class="productodescripcion">BOCADILLO DE BOLSA DE FALAFEL, LECHUGA, TOMATE, CEBOLLA, SALSA DE TAHINI.</p>
                    </a>
                    <div class="row">
                        <form class="col-4" action="<?=url.'?controller=producto&action=comprar'?>" method="post"> 
                            <input type="hidden" name="id"  value="9">
                            <button class="botonproducto CircularSTD" type="submit">AÑADIR AL CARRITO</button>
                        </form>
                        <p class="col-1 pt-1 ps-0">6€</p>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4 producto">
                    <a href="productos.html" class="nodecoracion">
                        <div class="imagencontenedor"
                            style="background-image: url('Imagenes/Bocadillos/calamares.jpg');">
                        </div>
                        <p class="productocategoria negrita">BOCADILLO CALIENTE</p>
                        <h4 class="negrita productonombre negritas">CALAMARES</h4>
                        <p class="productodescripcion">BOCADILLO DE CALAMARES.</p>
                    </a>
                    <div class="row">
                        <form class="col-4" action="<?=url.'?controller=producto&action=comprar'?>" method="post"> 
                            <input type="hidden" name="id"  value="8">
                            <button class="botonproducto CircularSTD" type="submit">AÑADIR AL CARRITO</button>
                        </form>
                        <p class="col-1 pt-1 ps-0">6€</p>
                    </div>
                </div>
            </div>
        </section>
        <h3 class="container CircularSTD negrita separacionprincipal">PREGUNTAS FREQUENTES</h3>
        <section class="text-start container-lg separacionsecundaria">
            <div class="row LatoWeb">
                <div class="col-12 col-lg-4">
                    <p class="negrita CircularSTD subtitulo">
                        ¿TIENEN OPCIONES PARA VEGANOS?
                    </p>
                    <p class="texto">Si, contamos con una amplia variedad de opciones, preparadas con ingredientes frescos y sabrosos para garantizar una experiencia culinaria deliciosa y satisfactoria.</p>
                </div>
                <div class="col-12 col-lg-4">
                    <p class="negrita CircularSTD subtitulo">
                        ¿OFRECEN SERVICIOS PARA LLEVAR O ENTREGA A DOMICILIO?
                    </p>
                    <p class="texto">Sí, en nuestro restaurante ofrecemos tanto servicio para llevar como entrega a domicilio para que pueda disfrutar de nuestros deliciosos platos.</p>
                    <p class="texto">Lo único que tienes que hacer es especificar-lo a la hora de comprar.</p>
                </div>
                <div class="col-12 col-lg-4">
                    <p class="negrita CircularSTD subtitulo">
                        ¿PUEDO HACER MODIFICACIONES EN LOS PLATOS DEL MENÚ?
                    </p>
                    <p class="texto">Estamos encantados de personalizar nuestros platos para adaptarlos a sus gustos individuales.</p>
                    <p class="texto">Puede solicitar modificaciones, como quitar ingredientes específicos o agregar extras a cualquiera de nuestros platos del menú. </p>
                    <p class="texto">Sin embargo, tenga en cuenta que algunas modificaciones pueden tener un costo adicional</p>
                </div>
            </div>
        </section>
    </main>
</body>

</html>