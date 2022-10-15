<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recepcion extends CI_Model{

public function login($usuario,$contrasena) {
	
	$this->db->where('rec_email', $usuario);
	$this->db->where('rec_contrasena', $contrasena);
	
	return $this->db->get('recepcion')->first_row();
}

public function get_one($rec_id)
{
	$this->db->where('rec_id',$rec_id);
	return $this->db->get('recepcion')->first_row('array');	
}

public function update($rec_id,$recepcion)
{
$this->db->where('rec_id',$rec_id);
$this->db->update('recepcion',$recepcion);
}

}