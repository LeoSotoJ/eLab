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
echo "<p>Últimos ensayos realizados:</p>";

echo "<hr />";

$this->table->set_heading('Muestra', 'Ensayo', 'Resultado','Unidad', 'Reporte');
foreach($realizados as $rea)
{
$this->table->add_row($rea["muestra_cod"],$rea["ens_nombre"], $rea["oper_resultado"],$rea["oper_unidad"],date('Y-m-d',strtotime($rea["oper_freporte"])));
}

echo $this->table->generate();

}
?>