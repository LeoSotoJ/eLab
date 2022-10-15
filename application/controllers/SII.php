<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SII extends CI_Controller {

public function __construct()
{
	parent::__construct();
	$this->load->helper('html');	
}

public function index()
{
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('session');
		if(isset($this->session->ana_id) or isset($this->session->rec_id) or isset($this->session->rt_id))
		{
			redirect('menu/');
		}
		else
		{
		
		$data=array(
		'view'=>'home',
		'error'=>$this->session->flashdata('error'),
		);
		$this->load->view('home',$data);
		}
	}
	 


function contrasena()

{
		$this->load->library('session');
		$this->load->helper('url');
		
		if(!$this->is_logged())
		{
			redirect("/");
		}
		$this->load->database();	

		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('contrasena', 'Contrasena', 'required|min_length[8]|alpha_numeric');
		$this->form_validation->set_rules('confirma_contrasena', 'Confirm Password', 'required|matches[contrasena]');

		if(isset($this->session->ana_id))
		{
			
					$this->load->model('Analistas');

		if ($this->form_validation->run())
                {
					$analista=array(
					'ana_contrasena'=>md5($this->input->post('contrasena').''),
					//Encryption key can be modified at installation
					);
					
				$this->Analistas->update($this->session->ana_id,$analista);
				$this->session->set_flashdata('mensaje', 'Se ha actualizado la contraseña');
					
					redirect('menu');
					return;
				}
		else
				{
				//$analista=$this->Analistas->get_one($this->session->ana_id);
				
				$analista=array(
				    'ana_id'=>$this->session->ana_id,
					'ana_contrasena'=>'',
					);
				}

			$data=array(
					'view'=>'contraseña',
					'title'=>'Contraseña',
					'analista'=>$analista,
					);

                }
		
		
		if(isset($this->session->rec_id))
		{

			$this->load->model('Recepcion');
		if ($this->form_validation->run())
                {
					$recepcion=array(
					'rec_contrasena'=>md5($this->input->post('contrasena').'eLab4267'),
					);
					
				$this->Recepcion->update($this->session->rec_id,$recepcion);
				$this->session->set_flashdata('mensaje', 'Se ha actualizado la contraseña');
					
					redirect('menu');
					return;
				}
		else
				{
				$recepcion=array(
				    'rec_id'=>$this->session->rec_id,
					'rec_contrasena'=>'',
					);
				}

			$data=array(
					'view'=>'contraseña',
					'title'=>'Contraseña',
					'recepcion'=>$recepcion,
					);

                
		}
		
		
		if(isset($this->session->rt_id))
		{

		$this->load->model('Tecnico');
			
		if ($this->form_validation->run())
                
				{
				$tecnico=array(
				'rt_contrasena'=>md5($this->input->post('contrasena').'eLab4267'),
				);
				
				$this->Tecnico->update($this->session->rt_id,$tecnico);
				$this->session->set_flashdata('mensaje', 'Se ha actualizado la contraseña');
				
				redirect('menu');
				return;
				
				}
		else
				{
				$tecnico=array(
				    'rt_id'=>$this->session->rt_id,
					'rt_contrasena'=>'',
					);
				}

			$data=array(
					'view'=>'contraseña',
					'title'=>'Contraseña',
					'tecnico'=>$tecnico,
					);

                
		}
		
		
		$this->load->view('template',$data);
		
}

//busqueda de servicios
function fetch()
	{
		
		$this->load->database();	
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->helper('file');
		$this->load->helper('form');
		$output = '';
		$query = '';
		$this->load->model('Operaciones');
		if($this->input->post('query'))
		{
			$query = $this->input->post('query');
		}
		$data = $this->Operaciones->fetch_data($query);
		
		//<table class="table table-bordered table-striped"> 
		
		$output .= '
		<div class="table-responsive">
					<table class="table table-bordered table-striped table-sm">
					
						<tr>
							<th>Código</th>
							<th>Ensayo</th>
							<th>Técnica</th>
							<th>Rango</th>
							<th>Acreditación</th>
							<th>Matriz</th>
							
						</tr>
		';
		
		// <th>Seleccionar</th>
		//<td> <p><input type="checkbox" name="ens_id[]" value="{$row["ens_id"]}" /></p></td>
		
		if($data->num_rows() > 0)
		{
			foreach($data->result() as $row)
			{
				$output .= '
						<tr>
							<td style="width: 5%">'.$row->ens_cod.'</td>
							<td style="width: 30%">'.$row->ens_nombre.'</td>
							<td style="width: 20%">'.$row->ens_tecnica.'</td>
							<td style="width: 20%">'.$row->ens_rango_inf. " a ". $row->ens_rango_sup." ". $row->ens_unidad.'</td>
							<td style="width: 5%">'.$row->ens_acred.'</td>
							<td style="width: 10%">'.$row->ens_acred_matriz.'</td>
							
						</tr>
				';
			}
		}
		else
		{
			$output .= '<tr>
							<td colspan="5">No hay resultados para la búsqueda</td>
						</tr>';
		}
		$output .= '</table>';
		echo $output;

	}



public function resultados()

{

	$this->load->library('session');
	$this->load->helper('url');
	$this->load->library('table');
	
	if(!$this->is_logged()) 	
	{ 
	redirect("/");	
	}

	$this->load->helper('form');
	$this->load->database();
	$this->load->model('Operaciones');

	if(isset($this->session->ana_id))
	{
	
	}



	if(isset($this->session->rec_id))
	{
	

	}


	if(isset($this->session->rt_id))
	{
	
	}



	$data=array(
	'view'=>'resultados',
	'title'=>'Resultados',
	);

$this->load->view('template',$data);
}



//busqueda de resultados
function fetch_r()
	{
		
		$this->load->database();	
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->helper('file');
		$this->load->helper('form');
		$output = '';
		$query = '';
		$this->load->model('Operaciones');
		if($this->input->post('query'))
		{
			$query = $this->input->post('query');
		}
		$data = $this->Operaciones->fetch_resultados($query);
		$output .= '
		<div class="table-responsive">
					<table class="table table-bordered table-striped table-sm">
						<tr>
							<th>Muestra</th>
							<th>Ensayo</th>
							<th>Método</th>			
							<th>Resultado</th>
							<th>Unidad</th>
						</tr>
		';
		
		// <th>Seleccionar</th>
		//<td> <p><input type="checkbox" name="ens_id[]" value="{$row["ens_id"]}" /></p></td>
		
		//<td>'.anchor('borrar/'.$row->oper_id,"Eliminar",'class="btn btn-outline-secundary"').'</td>
		
		if($data->num_rows() > 0)
		{
			foreach($data->result() as $row)
			{
				$output .= '
						<tr>
							<td>'.$row->muestra_cod.'</td>
							<td>'.$row->ens_nombre.'</td>
							<td>'.$row->ens_metodo.'</td>
							<td>'.$row->oper_resultado.'</td>
							<td>'.$row->oper_unidad.'</td>
						</tr>
				';
			}
		}
		else
		{
			$output .= '<tr>
							<td colspan="5">No hay resultados para la búsqueda</td>
						</tr>';
		}
		$output .= '</table>';
		echo $output;

	}




public function login()
{
		$this->load->database();	
		$this->load->library('session');
		$this->load->helper('url');
	
		//Si es analista
		
		if($this->input->post('modo')==1)
		{
		$this->load->model('Analistas');

			if($this->input->post('usuario')!=''&&$this->input->post('contrasena')!='')
			{
				$analista=$this->Analistas->login($this->input->post('usuario'),md5($this->input->post('contrasena').'eLab4267'));
				if(empty($analista))
				{
					$data=array(
					'view'=>'home',
					'error'=>'El usuario no existe',
					);
					$this->session->set_flashdata('error', 'Analista no registrado');
					redirect("/");
				}
				else
				{
					$this->session->ana_id=$analista->ana_id;
					redirect("menu/");
				}
			}
			else
			{
				$this->session->set_flashdata('error', 'Escribe el usuario y contraseña');
				header("Location: index");
			}		
			}
		
		else
			{
			//Si es recepción
			if($this->input->post('modo')==2)
			{
				
			$this->load->model('Recepcion');
			
				if($this->input->post('usuario')!=''&&$this->input->post('contrasena')!='')
			{
				$recepcion=$this->Recepcion->login($this->input->post('usuario'),md5($this->input->post('contrasena').'eLab4267'));
				if(empty($recepcion))
				{
					$data=array(
					'view'=>'menu',
					'error'=>'El usuario no existe',
					);
					$this->session->set_flashdata('error', 'Usuario no registrado');
					redirect("/");
				}
				else
				{
					$this->session->rec_id=$recepcion->rec_id;
					redirect("menu/");
				}
			}
			else
			{
				$this->session->set_flashdata('error', 'Escribe el usuario y contraseña');
				header("Location: index");
			}
			}
			else
				if($this->input->post('modo')==3)
			{
				
			$this->load->model('Tecnico');
			
				if($this->input->post('usuario')!=''&&$this->input->post('contrasena')!='')
			{
				$tecnico=$this->Tecnico->login($this->input->post('usuario'),md5($this->input->post('contrasena').'eLab4267'));
				if(empty($tecnico))
				{
					$data=array(
					'view'=>'menu',
					'error'=>'El usuario no existe',
					);
					$this->session->set_flashdata('error', 'Usuario no registrado');
					redirect("/");
				}
				else
				{
					$this->session->rt_id=$tecnico->rt_id;
					redirect("menu/");
				}
			}
			else
			{
				$this->session->set_flashdata('error', 'Escribe el usuario y contraseña');
				header("Location: index");
			}
			}

		}

	}
	
public function menu()
{
	$this->load->database();
	$this->load->library('session');
	$this->load->helper('url');
	if(!$this->is_logged()) 	
	{
	redirect("/");
	}
	$this->load->database();
	$this->load->model('Menu');
	$this->load->helper('url');
	

	//ANALISTA
	if(isset($this->session->ana_id))

		{

		$this->load->model('Operaciones');
		$data=array(
		'view'=>'menu',
		'title'=>'Menú',
		'mensaje'=>$this->session->flashdata('mensaje'),
		'pendientes'=>$this->Operaciones->pen_ana($this->session->ana_id),
		);

		}



	//RECPECIÓN

		if(isset($this->session->rec_id))

		{
		$data=array(
		'view'=>'menu',
		'title'=>'Menú',
		'mensaje'=>$this->session->flashdata('mensaje'),
		);

		}


		//RESPONSABLE TECNICO 

		if(isset($this->session->rt_id))

		{
		$data=array(
		'view'=>'menu',
		'title'=>'Menú',
		'mensaje'=>$this->session->flashdata('mensaje'),
		);

		}


	$this->load->view('template',$data);


}
		
public function pendientes()

{

	$this->load->library('session');
	$this->load->helper('url');
	$this->load->library('table');
	
	if(!$this->is_logged()) 	
	{ 
	redirect("/");	
	}
	$this->load->helper('form');
	$this->load->database();
	$this->load->model('Operaciones');
	$this->load->helper('url');
	
	if(isset($this->session->ana_id))
	{
	
	$data=array(
	'view'=>'pendientes',
	'title'=>'Pendientes',
	'mensaje'=>$this->session->flashdata('mensaje'),
	'pendientes'=>$this->Operaciones->pen_ana($this->session->ana_id),
	);

	}


	if(isset($this->session->rt_id))
	{
	
	$data=array(
	'view'=>'pendientes',
	'title'=>'Operaciones',
	'mensaje'=>$this->session->flashdata('mensaje'),
	'operaciones'=>$this->Operaciones->get_pendientes(),
	);

	}

	
$this->load->view('template',$data);
	
}

public function realizados()

{

	$this->load->library('session');
	$this->load->helper('url');
	$this->load->library('table');
	
	if(!$this->is_logged()) 	
	{ 
	redirect("/");	
	}
	$this->load->helper('form');
	$this->load->database();
	$this->load->model('Operaciones');
	$this->load->helper('url');
	
	if(isset($this->session->ana_id))
	{
	
	$data=array(
	'view'=>'realizados',
	'title'=>'Realizados',
	'realizados'=>$this->Operaciones->rea_ana($this->session->ana_id),
	);

	}

	
$this->load->view('template',$data);
	
}

public function operacion($oper_id)
{
		
	$this->load->library('session');
	$this->load->helper('url');
	
	if(!$this->is_logged()) 	
	{ 
	redirect("/");	
	}
	

if(isset($this->session->ana_id))
	{


	$this->load->database();
	$this->load->model('Operaciones');
	$this->load->helper('url');	


//Valida que se la operación que se muestra sea del analista y que esté como pendiente
	
$operacion=$this->Operaciones->get($oper_id);

if($operacion['ana_id']!=$this->session->ana_id or $operacion['oper_estado']!='Pendiente' or $operacion['oper_eliminado']!='0')
{
redirect('/');
return;	

}


	$this->load->helper('form');
	$this->load->library('form_validation');
	

	$this->form_validation->set_rules('resultado', 'Resultado', 'required|numeric', array('required' => 'El campo Resultado es requerido.','numeric'=>'El campo Resultado sólo puede ser un valor numérico.'));
	$this->form_validation->set_rules('unidad', 'Unidad', 'required', array('required' => 'El campo Unidad es requerido.'));
	$this->form_validation->set_rules('fecha', 'Fecha', 'required|callback_val_fecha_ejec',array('required' => 'El campo Fecha de ejecución es requerido.'));
                  
		if ($this->form_validation->run())			
			{
				
		$oper=array(
			'oper_id'=>$oper_id,
			'oper_ana_id'=>$operacion['ana_id'],
			'oper_resultado'=>$this->input->post('resultado'),
			'oper_unidad'=>$this->input->post('unidad'),
			'oper_fejec'=>$this->input->post('fecha'),
			'oper_freporte'=> date("Y-m-d H:i:s"),
			'oper_ejec_obs'=>$this->input->post('obs'),
			'oper_estado'=>'Completado',
		);
		
		
		$this->Operaciones->reportar($oper_id,$oper);
		$this->session->set_flashdata('mensaje', 'Tu resultado se ha reportado');
		redirect('pendientes/');
		return;	
		}

		else

		{
			//validacion incorrecta
					
			
			if($this->input->post('actualizar')!='')
					{
						
					
						$op=$this->Operaciones->get($oper_id);
						$oper=array(
						'oper_id'=>$oper_id,
						'muestra_cod'=>$op['muestra_cod'],
						'ens_nombre'=>$op['ens_nombre'],
						'oper_resultado'=>$this->input->post('resultado'),
						'ens_unidad'=>$this->input->post('unidad'),
						'oper_fejec'=>$this->input->post('fecha'),
						'oper_ejec_obs'=>$this->input->post('obs'),
						
		);
						
					}

					else
					{
						//La primera vez que se muestra la pag
						$oper=$this->Operaciones->get($oper_id);
						}

		}
			
		$data=array(
		'view'=>'operacion',
		'title'=>'Operacion',
		'oper'=>$oper,
		);
		

//condicionar si es su muestra y si no ha sido completada



$this->load->view('template',$data);


}

else 

{ 
redirect("/");	
}

}




//validación para fecha de ejecución en formulario de reporte de resultados
public function val_fecha_ejec($fecha)
        {
				$hoy= date("Y-m-d");
                if ($fecha > $hoy)
                {
                        $this->form_validation->set_message('val_fecha_ejec', 'El campo Fecha de ejecución no puede ser mayor a la fecha actual.');
                        return FALSE;
                }
                else
                {
                        return TRUE;
                }
        }




public function solicitud()

{

	$this->load->library('session');
		$this->load->helper('url');
	$this->load->library('table');
	
	if(!$this->is_logged()) 	
	{ 
	redirect("/");	
	}

if(isset($this->session->rec_id))
	{
		
	$this->load->database();
	$this->load->model('Operaciones');
	$this->load->helper('url');
	$this->load->helper('form');
	$this->load->library('form_validation');

	$this->form_validation->set_rules('muestra', 'Muestra', 'required');
	$this->form_validation->set_rules('tipo','Tipo','required');

	$ensayos=$this->Operaciones->ensayos();

if ($this->form_validation->run())
{

	//Inserta codig de muestra en la Tabla muestras y asigna un ID
	$muestra=array(
		'muestra_cod'=>$this->input->post('muestra'),
		'muestra_tipo'=>$this->input->post('tipo'),
		);
		
	$obs=$this->input->post('obs');

	$this->Operaciones->ins_mues($muestra);

	//colecta la info del post
	$operaciones=$this->input->post();
	unset($operaciones['actualizar']);
	
	//echo '<pre>';
	//print_r($operaciones);
	//echo '</pre>';
	//exit();

	//Recupera el ID asignado a la muestra
	$muestra_cod=$this->input->post('muestra');
	$muestra_id=$this->Operaciones->get_mues_id($muestra_cod);

	//Inserta la operacion
	$this->Operaciones->ins_oper($operaciones,$muestra_id,$obs);


	$this->session->set_flashdata('mensaje', 'Solicitud de trabajo enviada exitosamente');
					
	redirect('menu/');
	return;	
}







	$data=array(
	'view'=>'solicitud',
	'title'=>'Solicitud',
	'ensayos'=>$ensayos,
	//'pendientes'=>$this->Operaciones->pen_ana($this->session->ana_id),
	);

$this->load->view('template',$data);

}


else

{ 
redirect("/");	
}


}





function servicios()


{

	$this->load->library('session');
	$this->load->helper('url');
	$this->load->library('table');
	
	if(!$this->is_logged()) 	
	{ 
	redirect("/");	
	}

	$this->load->helper('form');
	$this->load->database();
	$this->load->model('Operaciones');

	if(isset($this->session->ana_id))
	{
	
	}



	if(isset($this->session->rec_id))
	{
	

	}


	if(isset($this->session->rt_id))
	{
	
	}



	$data=array(
	'view'=>'servicios',
	'title'=>'Servicios',
	);

$this->load->view('template',$data);
}



public function operaciones()

{

	$this->load->library('session');
	$this->load->helper('url');
	$this->load->library('table');
	
	if(!$this->is_logged()) 	
	{ 
	redirect("/");	
	}
	$this->load->helper('form');
	$this->load->database();
	$this->load->model('Operaciones');
	$this->load->helper('url');
	
//RECEPCIÓN

if(isset($this->session->rec_id))
	{
	
	$data=array(
	'view'=>'operaciones',
	'title'=>'Operaciones',
	'mensaje'=>$this->session->flashdata('mensaje'),
	'operaciones'=>$this->Operaciones->get_operaciones(),
	);

	}


//TÉCNICO

if(isset($this->session->rt_id))
	{
	
	$data=array(
	'view'=>'operaciones',
	'title'=>'Operaciones',
	'mensaje'=>$this->session->flashdata('mensaje'),
	'operaciones'=>$this->Operaciones->get_operaciones(),
	);

	}

	
$this->load->view('template',$data);
	




}



public function borrar($oper_id)
{
	
	$this->load->library('session');
	$this->load->helper('url');
	$this->load->database();
	$this->load->model('Operaciones');
		
		//Cambia la visibilidad de la operacion, no se elimna el registro de la db
		
		$elim=array(
		'oper_eliminado'=>1,
		'oper_elimfecha'=>date("Y-m-d H:i:s"),
		);
		
		//echo $res_id;
		$this->Operaciones->eliminado($oper_id,$elim);	
			
		$this->session->set_flashdata('mensaje', 'La operacion se ha eliminado');
		redirect("menu/");
	
	}


public function salir()
{
		//se necesita libreria de session para iniciar y el helper para usar el redirect
		$this->load->library('session');
		$this->load->helper('url');
		$this->session->sess_destroy();
		redirect("/");
	}
	
private function is_logged()
{
		if (isset ($this->session->ana_id))
		{
			return isset($this->session->ana_id);
		}
		else
		{
			if (isset ($this->session->rec_id))
			{
			return isset($this->session->rec_id);
			}
			else
		{
			if (isset ($this->session->rt_id))
			{
			return isset($this->session->rt_id);
			}
			
		}

}
}
}

//'Pendiente' en la function de operacion