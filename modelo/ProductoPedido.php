<?php
    class ProductoPedido {
        protected $ID_Pedido;
        protected $Cantidad;
        protected $Nombre_Producto;
        protected $Precio_Producto;

        public function __construct (){
        }




        /**
         * Get the value of ID_Pedido
         */
        public function getIDPedido()
        {
                return $this->ID_Pedido;
        }

        /**
         * Set the value of ID_Pedido
         */
        public function setIDPedido($ID_Pedido): self
        {
                $this->ID_Pedido = $ID_Pedido;

                return $this;
        }

        /**
         * Get the value of Cantidad
         */
        public function getCantidad()
        {
                return $this->Cantidad;
        }

        /**
         * Set the value of Cantidad
         */
        public function setCantidad($Cantidad): self
        {
                $this->Cantidad = $Cantidad;

                return $this;
        }

        /**
         * Get the value of Nombre_Producto
         */
        public function getNombreProducto()
        {
                return $this->Nombre_Producto;
        }

        /**
         * Set the value of Nombre_Producto
         */
        public function setNombreProducto($Nombre_Producto): self
        {
                $this->Nombre_Producto = $Nombre_Producto;

                return $this;
        }

        /**
         * Get the value of Precio_Producto
         */
        public function getPrecioProducto()
        {
                return $this->Precio_Producto;
        }

        /**
         * Set the value of Precio_Producto
         */
        public function setPrecioProducto($Precio_Producto): self
        {
                $this->Precio_Producto = $Precio_Producto;

                return $this;
        }
        }
?>