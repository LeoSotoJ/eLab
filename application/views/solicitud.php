<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("America/Guayaquil");
if(isset($mensaje)){
echo"<p><div class='alert alert-success' role='alert'>$mensaje</div></p>";
}
?>
<p></p>

<h5 align="left">Solicitud de trabajo</h5>
<?php

echo"<hr />";

echo form_open('');
echo validation_errors();

echo <<<hereDOC

<p><label for="muestra">Código de muestra:</label><br><input type="text" name="muestra" id="muestra" value=""/></p>
<p><label for="tipo">Tipo de muestra:</label><br><input type="text" name="tipo" id="tipo" value=""/></p>
<p><label for="obs">Observación:</label><br><textarea name="obs" id="obs" rows="2" cols="30" value=""> </textarea></p>

hereDOC;

//<p><label for="solicitud"><strong>Solicitud No:</strong></label><input type="text" name="solicitud" id="solicitud" value=""/></p>
//<p><label for="cliente"><strong>Cliente:</strong></label><input type="text" name="cliente" id="cliente" value="Cliente eLab" disabled/></p>


echo"<p><strong>Ensayos:</strong></p>";


foreach ($ensayos as $e) {

	echo <<<hereDOC
	<p><input type="checkbox" name="ens_id[]" value="{$e["ens_id"]}" /> <label for="{$e["ens_cod"]}" title="{$e["ens_cod"]}"> {$e["ens_nombre"]} - {$e["ens_tecnica"]}</label></p>
	
hereDOC;

}
echo '<p><input type="submit" name="actualizar" value="Enviar" class="btn btn-outline-primary"/>';
echo form_close();
echo"<p>".anchor('menu/','Atrás','class="btn btn-outline-secondary"')."</p>";


?>


