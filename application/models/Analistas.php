<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Analistas extends CI_Model{

public function login($usuario,$contrasena) 
{
	$this->db->where('ana_email', $usuario);
	$this->db->where('ana_contrasena', $contrasena);
	return $this->db->get('analistas')->first_row();
}

public function get_one($ana_id)
{
	$this->db->where('ana_id',$ana_id);
	return $this->db->get('analistas')->first_row('array');	
}

public function update($ana_id,$analista)
{
$this->db->where('ana_id',$ana_id);
$this->db->update('analistas',$analista);
}

}