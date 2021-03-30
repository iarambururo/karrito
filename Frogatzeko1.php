<!DOCTYPE html>
<html lang="es-ES">
<head>
<meta charset='utf-8'>
<head>
<body>

<form id="buscador" name="buscador" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>"> 
    <input id="buscar" name="buscar" type="search" placeholder="Buscar aquí..." autofocus >
    <input type="submit" name="buscador" class="boton peque aceptar" value="buscar">
</form>
<?php
// Resultado, número de registros y contenido.
echo $registros;
echo $texto;
?>
</body>
</html>
