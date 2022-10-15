<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("America/Guayaquil");
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
<?php
echo"<p>".anchor('salir/','Salir','class="btn float-right btn-outline-secondary"')."</p>"." ";
echo"<p>".anchor('menu/','Menú','class="btn float-right btn-outline-primary mr-1"')."</p>";
?>

<!--<a href="<?php echo base_url('/'); ?>"> <img alt="Inicio" src="<?php echo base_url('images/logo.jpg'); ?>"> </a> -->
<a href="<?php echo base_url('/'); ?>"> Inicio </a>
<hr>




