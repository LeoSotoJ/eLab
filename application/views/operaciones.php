<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if(isset($mensaje)){
echo"<p><div class='alert alert-success' role='alert'>$mensaje</div></p>";
}
?>

<h5 align="left">Historial de operaciones</h5>

<?php

//RECEPCIÓN
if(isset($this->session->rec_id))
{
echo "<hr />";

$this->table->set_heading('Muestra', 'Ensayo', 'Ingreso', 'Estado','Eliminar');

foreach($operaciones as $oper)
{

	echo <<<hereDOC
	<input type="hidden" name="oper" value="{$oper["oper_id"]}"/>
hereDOC;


if ($oper["oper_estado"]!='Completado')
{
	$eliminar=anchor('borrar/'.$oper["oper_id"],"Eliminar",'class="btn btn-outline-secundary"');
}
else
{
	$eliminar='';
}

$this->table->add_row($oper["muestra_cod"],$oper["ens_nombre"], $oper["oper_fecha"], $oper["oper_estado"],$eliminar);

}

echo $this->table->generate();
echo "<hr />";


}

//RESPONSABLE TECNICO
if(isset($this->session->rt_id))
{

echo "<hr />";

$this->table->set_heading('Muestra', 'Ensayo', 'Ingreso', 'Estado','Analista');

foreach($operaciones as $oper)
{

	echo <<<hereDOC
	<input type="hidden" name="oper" value="{$oper["oper_id"]}"/>
hereDOC;


$this->table->add_row($oper["muestra_cod"],$oper["ens_nombre"], $oper["oper_fecha"], $oper["oper_estado"],$oper["ana_sigla"]);

}

echo $this->table->generate();

}



?>