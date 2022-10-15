<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("America/Guayaquil");

if(isset($mensaje)){
echo"<p><div class='alert alert-success' role='alert'>$mensaje</div></p>";
}
?>

<?php

//ANALISTA
if(isset($this->session->ana_id))
{

if(count($pendientes)==0){
	echo "<p><div class='alert alert-info' role='alert'>
	No tienes ensayos pendientes</div></p>";
}
else {


echo "<p>Ensayos pendientes: <span class='badge badge-pill badge-primary'>".count($pendientes)."</span></p>";

echo "<hr />";

$this->table->set_heading('Muestra', 'Ensayo', 'Tipo muestra', 'Ingreso', 'Entrega','Reportar');
foreach($pendientes as $pen)
{


$this->table->add_row($pen["muestra_cod"], $pen["ens_nombre"], $pen["muestra_tipo"], date('Y-m-d H:m',strtotime($pen["oper_fecha"])), date('Y-m-d', strtotime($pen["oper_fecha"]. ' + 10 days')),anchor('operacion/'.$pen["oper_id"],"Reportar",'class="btn btn-outline-secundary"'));

}

echo $this->table->generate();

}
}



//RESPONSABLE TECNICO
if(isset($this->session->rt_id))
{

echo "<p>Operaciones pendientes: </p>";

echo "<hr />";

$this->table->set_heading('Muestra', 'Ensayo', 'Ingreso', 'Plazo','Analista');




foreach($operaciones as $oper)
{

if($oper["oper_estado"]!='Completado'){

	echo <<<hereDOC
	<input type="hidden" name="oper" value="{$oper["oper_id"]}"/>
hereDOC;

$this->table->add_row($oper["muestra_cod"],$oper["ens_nombre"], date('Y-m-d',strtotime($oper["oper_fecha"])), date('Y-m-d', strtotime($oper["oper_fecha"]. ' + 10 days')),$oper["ana_sigla"]);
}
}

echo $this->table->generate();

}
?>