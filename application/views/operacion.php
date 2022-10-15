<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("America/Guayaquil");


echo "<p><strong>Reporte de resultado</strong></p>";
echo "<hr />";
if(isset($mensaje)){
echo"<p><div class='alert alert-success' role='alert'>$mensaje</div></p>";
}
echo form_open('');
echo validation_errors();
//<p><label for="operacion"><strong>Operacion:</strong></label><input type="text" disabled="disabled" name="operacion" id="operacion" value="{$oper["oper_id"]}" /></P>

echo <<<hereDOC
<p>Muestra y ensayo</p>
<p><input type="text" disabled="disabled" name="muestra" id="muestra" value="{$oper["muestra_cod"]}" /><label for="ensayo"></label><input type="text" disabled="disabled" name="ensayo" id="ensayo" value="{$oper["ens_nombre"]}" /></P>
<p>Resultado y unidad</p>
<p><input type="text" class="text-right" name="resultado" id="resultado" value="{$oper["oper_resultado"]}" /><label for="unidad"></label><input type="text" name="unidad" id="unidad" value="{$oper["ens_unidad"]}" /></P>
<p>Fecha de ejecución</p>
<p><input type="date" name="fecha" id="fecha" value="{$oper["oper_fejec"]}" /></P>
<p><label for="obs">Observación:</label><br><textarea name="obs" id="obs" rows="2" cols="30" value=""> </textarea></p>

hereDOC;

echo '<p><input type="submit" name="actualizar" value="Reportar" class="btn btn-outline-primary""/>';
echo form_close();



?>