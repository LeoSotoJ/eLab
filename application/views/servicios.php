<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("America/Guayaquil");
echo"<p></p>";
?>



				<h5 align="left">Servicios</h5><br />
				<div class="form-group">
					<div class="input-group">
						<input type="text" name="search_text" id="search_text" placeholder="Buscar por detalle de servicio" class="form-control" />
					</div>
				</div>
				<br />
				<div id="result"></div>
				<div style="clear:both"></div>
			<br />
	
<script>
$(document).ready(function(){

	load_data();

	function load_data(query)
	{
		$.ajax({
			url:"<?php echo base_url(); ?>fetch",
			method:"POST",
			data:{query:query},
			success:function(data){
				$('#result').html(data);
			}
		})
	}

	$('#search_text').keyup(function(){
		var search = $(this).val();
		if(search != '')
		{
			load_data(search);
		}
		else
		{
			load_data();
		}
	});
});
</script>

<?php
echo"<p>".anchor('menu/','Atrás','class="btn btn-outline-secondary"')."</p>";
?>