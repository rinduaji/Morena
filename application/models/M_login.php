<?php 
 
class M_login extends CI_Model{	

    public $table = 'login';

	function cek_login($where){		
		return $this->db->get_where($this->table,$where);
	}	

	function data_login($where){		
		return $this->db->get_where($this->table,$where);
	}
}