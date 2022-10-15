<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if(isset($mensaje)){
echo"<p><div class='alert alert-success' role='alert'>$mensaje</div></p>";
}
?>
<p></p>

<?php
//ANALISTA
if(isset($this->session->ana_id))
{
echo"<p>Operaciones</p>";

echo"<p>".anchor('pendientes/','Ensayos pendientes ('.count($pendientes).')','class="btn btn-outline-primary"')."</p>";
echo"<p>".anchor('realizados/','Ensayos realizados','class="btn btn-outline-primary"')."</p>";

echo"<p>Contraseña</p>";

echo"<p>".anchor('contrasena/','Cambiar contraseña','class="btn btn-outline-primary"')."</p>";
}

else

{
//RECEPCIÓN
if(isset($this->session->rec_id))
{
echo"<p>Solicitudes de trabajo</p>";
echo"<p>".anchor('solicitud/','Nueva','class="btn btn-outline-primary"')."</p>";
echo"<p>".anchor('operaciones/','Historial','class="btn btn-outline-primary"')."</p>";

echo"<p>Resultados de ensayos</p>";
echo"<p>".anchor('resultados/','Ver','class="btn btn-outline-primary"')."</p>";


echo"<p>Servicios</p>";
echo"<p>".anchor('servicios/','Ver','class="btn btn-outline-primary"')."</p>";

echo"<p>Contraseña</p>";
echo"<p>".anchor('contrasena/','Cambiar','class="btn btn-outline-primary"')."</p>";

}


//RT
if(isset($this->session->rt_id))
{

//echo"<p><h5>Proformas</h5></p>";
//echo"<p>".anchor('/','Nueva proforma','class="btn btn-outline-primary"')."</p>";
//echo"<p>".anchor('/','Historial proformas','class="btn btn-outline-primary"')."</p>";

//echo"<p><h5>Solicitud de trabajo</h5></p>";
//echo"<p>".anchor('/','Nueva solicitud','class="btn btn-outline-primary"')."</p>";
//echo"<p>".anchor('/','Historial solicitudes','class="btn btn-outline-primary"')."</p>";

echo"<p><h5>Operaciones</h5></p>";
echo"<p>".anchor('operaciones/','Registro de operaciones','class="btn btn-outline-primary"')."</p>";
echo"<p>".anchor('pendientes/','Operaciones pendientes','class="btn btn-outline-primary"')."</p>";

echo"<p>Contraseña</p>";
echo"<p>".anchor('contrasena/','Cambiar','class="btn btn-outline-primary"')."</p>";

//echo"<p><h5>Clientes</h5></p>";
//echo"<p>".anchor('/','Nuevo cliente','class="btn btn-outline-primary"')."</p>";
//echo"<p>".anchor('/','Clientes','class="btn btn-outline-primary"')."</p>";

}


}

?>