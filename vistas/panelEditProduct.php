
<?php
include_once 'controller/productoController.php';
?>

<form action=<?=url.'controller=producto&action=editProduct'?> method='post'>
    <input type='hidden' name='id' value="<?php echo $id?>">
    <input name='idDis' disabled value="<?php echo $id?>">
    <input name='nombre' value="<?php echo $producto?>">
    <button type='submit' name='edit'> Editar </button>
</form>
   
