<!DOCTYPE html>
<html>


<header class="CircularSTD">
    <section class="container-xl">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="<?=url.'?controller=producto'?>">
                    <div class="logo"></div>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <form class="d-flex  me-auto mb-2 mb-lg-0" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                    <ul class="navbar-nav">
                        <li class="nav-item ">
                            <a class="nav-link active botonheader" aria-current="page" href="<?=url.'?controller=producto'?>">INICIO</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active botonheader" aria-current="page"
                                href="<?=url.'?controller=producto&action=productos'?>">PRODUCTOS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active botonheader" aria-current="page" href="<?=url.'?controller=producto&action=compra'?>">
                                <img class="carrito" src="Imagenes/Iconos/carro-de-la-carretilla.png " alt="">
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active botonheader" aria-current="page" href="<?=url.'?controller=usuario&action=login'?>">
                                <img class="carrito" src="Imagenes/Iconos/usuario.png " alt="">
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </section>
</header>
</html>