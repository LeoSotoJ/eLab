<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("America/Guayaquil");

class Operaciones extends CI_Model{

public function oper_ana($ana_id) {
	$this->db->where('ae_ana_id', $ana_id);
	$this->db->where('oper_eliminado','0');
	$this->db->order_by('oper_mues_id', 'ASC');
	return $this->db->get('oper_text')->result_array();
}
public function pen_ana($ana_id) {

	$this->db->where('ae_ana_id', $ana_id);
	$this->db->where('oper_eliminado','0');
	$this->db->where('oper_estado', 'Pendiente');
	$this->db->order_by('oper_fecha', 'ASC');
	return $this->db->get('oper_text')->result_array();
	
}

public function rea_ana($ana_id) {

	$this->db->where('oper_ana_id', $ana_id);
	$this->db->where('oper_eliminado','0');
	$this->db->where('oper_estado', 'Completado');
	$this->db->order_by('oper_freporte', 'DESC');
	$this->db->limit(100); 
	return $this->db->get('oper_text')->result_array();
	
}


public function get($oper_id)
{
$this->db->where('oper_id',$oper_id);
return $this->db->get('oper_text')->first_row('array');
}

public function reportar($oper_id,$oper)
{
$this->db->where('oper_id', $oper_id);
$this->db->update('operaciones',$oper);
}

public function ensayos()
{
$this->db->where('ens_est','1');
$this->db->order_by('ens_nombre');
return $this->db->get('ensayos')->result_array();
}

function fetch_data($query)
	{
		if($query != '')
		{
			$this->db->select('*');
			$this->db->from('ensayos');
			$this->db->where("ens_est = 1 AND (ens_nombre LIKE '%" .$query."%' OR ens_cod LIKE '%" .$query."%' OR ens_metodo LIKE '%" .$query."%' OR ens_acred LIKE '%" .$query."%')");
			
			//$this->db->where("(e.ens_est=0) AND (e.ens_nombre LIKE $query OR e.ens_cod LIKE $query OR e.ens_metodo LIKE $query OR e.ens_acred LIKE $query)");
			//$this->db->like('ens_id', $query);
			//$this->db->or_like('ens_nombre', $query);
			//$this->db->or_like('ens_cod', $query);
			//$this->db->or_like('ens_metodo', $query);
			//$this->db->or_like('ens_acred', $query);

			//$this->db->where("(v.is_delete = false AND v.start_date <= NOW()) AND (v.title LIKE '$keywords' OR  v.title_tw LIKE '$keywords' OR v.title_cn LIKE '$keywords' OR vt.tag LIKE '$keywords')");
		
		}
		else
		{
			$this->db->select('*');
			$this->db->from('ensayos');
			$this->db->where('ens_est',1);

		}
		
		$this->db->order_by('ens_nombre', 'ASC');
		return $this->db->get();
	}

function fetch_resultados($query)
	{
		$this->db->select("*");
		$this->db->from("oper_text");
		$this->db->where('oper_eliminado','0');
		if($query != '')
		{
			$this->db->like('muestra_cod', $query);
			$this->db->or_like('ens_nombre', $query);

		}
		$this->db->order_by('muestra_cod', 'ASC');
		$this->db->order_by('ens_nombre', 'ASC');
		$this->db->limit(500); 
		return $this->db->get();
	}


public function ins_mues($muestra)
{
$this->db->insert('muestras',$muestra);
}

public function get_mues_id($muestra_cod)
{
$this->db->where('muestra_cod',$muestra_cod);
return $this->db->get('muestras')->first_row('array');
}


public function ins_oper($operaciones,$muestra_id,$obs)
{
	$i=0;
foreach ($operaciones['ens_id'] as $ens_id) {
	$operacion=array(
		'oper_ens_id'=>$ens_id,
		'oper_mues_id'=>$muestra_id['muestra_id'],
		'oper_fecha'=>date("Y-m-d H:i:s"),
		'oper_sol_obs'=>$obs,
		);
	$this->db->insert('operaciones',$operacion);
	$i++;
}
}

public function get_operaciones(){	

	$this->db->where('oper_eliminado','0');
	$this->db->order_by('oper_id','DESC');
	$this->db->limit(50); 
	return $this->db->get('oper_text')->result_array();
}


public function get_pendientes(){	

	$this->db->where('oper_eliminado','0');
	$this->db->where('oper_estado','Pendiente');
	$this->db->order_by('oper_id','DESC');
	return $this->db->get('oper_text')->result_array();
}

public function eliminado($oper_id,$elim){
	$this->db->where('oper_id',$oper_id);
	$this->db->update('operaciones',$elim);
}



}