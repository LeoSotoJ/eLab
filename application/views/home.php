<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8"/>	
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"  />

<title><?php 
if(isset($title)) {
	echo "$title - eLab";
}
else {
	echo "eLab";
}
?>
</title>
<?php
//Necesita cargar helper html
echo link_tag('css/bootstrap.min.css');
echo link_tag('css2/estilos.css');
?>

</head>
<body>

<div class="container">

<!-- <a href="<?php echo base_url('/'); ?>"> <img alt="Inicio" src="<?php echo base_url('images/ico.jpg'); ?>"> </a> -->





<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


<!--<p>Introduce tu nombre de usuario y contraseña</p>

 -->

<?php echo form_open('login'); 
?>

<p>
<h2 style="text-align:left">eLab</h2>
<hr>

<?php 
if(isset($error)){
	echo <<<hereDOC
<p><div class="alert alert-danger" role="alert">
<strong>$error</strong>
</div></p>
hereDOC;
}
?>


<label for ="usuario">Modo</label> <br>
<select name="modo" style="background-color:GhostWhite;font-weight:normal;">
   
       <option value="1">Analista</option>
       <option value="2">Recepción</option>
       <option value="3">Técnico</option>
   </select>
</p>

<p>
<label for ="usuario">Usuario</label> <br>
<input type="text" name="usuario" id="usuario"/>
</p>

<p>
<label for ="contrasena">Contraseña</label> <br>
<input type="password" name="contrasena" id="contrasena"/>
</p>

<p>
<input type="submit" value="Acceder" class="btn btn-outline-primary"/>
</p>
<?php echo form_close(); 
?>





<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<hr />
<p> <FONT size="2" COLOR="gray">@ LS <br> </FONT></p>
</div>
</body>