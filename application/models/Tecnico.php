<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tecnico extends CI_Model{

public function login($usuario,$contrasena) {
	
	$this->db->where('rt_email', $usuario);
	$this->db->where('rt_contrasena', $contrasena);
	
	return $this->db->get('tecnico')->first_row();
}


public function get_one($rt_id)
{
	$this->db->where('rt_id',$rt_id);
	return $this->db->get('tecnico')->first_row('array');	
}

public function update($rt_id,$tecnico)
{
$this->db->where('rt_id',$rt_id);
$this->db->update('tecnico',$tecnico);
}


}