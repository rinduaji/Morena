<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

class M_nilai_trainer extends CI_Model {     
    var $table = 'kandidat';
    var $table1 = 'kategori_nilai_trainer'; 
    var $table2 = 'item_nilai_trainer';
    var $table3 = 'status_nilai_trainer'; 
    var $table4 = 'status_akhir_nilai_trainer';  
    var $table5 = 'batch';    
 
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function nama_trainer()
    {
        $this->db->from($this->table);
        $this->db->where('status','Trainer');
        $query = $this->db->get();

        return $query;
    }

    function nama_batch()
    {
        $this->db->from($this->table5);
        $query = $this->db->get();

        return $query;
    }

    function nama_interview_hr()
    {
        $injoin1 = $this->table.'.id = '.$this->table4.'.id_kandidat';
        $this->db->from($this->table);
        $this->db->join($this->table4, $injoin1);
        $this->db->where('status','Interview User');
        $this->db->where('hasil_wawancara','Diterima');
        $query = $this->db->get();

        return $query;
    }

    public function get_by_id($id)
    {
        // $injoin1 = $this->table.'.id_batch = '.$this->table5.'.id_batch';
        // $this->db->from($this->table);
        // $this->db->join($this->table5, $injoin1);
        // $this->db->where('id',$id);
        $injoin1 = $this->table.'.id_batch = '.$this->table5.'.id_batch';
        $injoin2 = $this->table.'.id = '.$this->table3.'.id_trainer';
        $injoin3 = $this->table.'.id = '.$this->table4.'.id_trainer';
        $this->db->from($this->table);
        $this->db->join($this->table5, $injoin1, 'left');
        $this->db->join($this->table3, $injoin2, 'left');
        $this->db->join($this->table4, $injoin3, 'left');
        $this->db->where('id',$id);
        $query = $this->db->get();

        return $query->result();
    }

    public function get_by_id_nilai_trainer($id)
    {
        $injoin1 = $this->table.'.id_batch = '.$this->table5.'.id_batch';
        $injoin2 = $this->table.'.id = '.$this->table3.'.id_trainer';
        $injoin3 = $this->table.'.id = '.$this->table4.'.id_trainer';
        $this->db->from($this->table);
        $this->db->join($this->table5, $injoin1, 'left');
        $this->db->join($this->table3, $injoin2, 'left');
        $this->db->join($this->table4, $injoin3, 'left');
        $this->db->where('id',$id);
        $query = $this->db->get();

        return $query->row();
    }

    public function get_kategori_nilai_trainer()
    {
        $this->db->from($this->table1);
        $this->db->where('status','1');
        $query = $this->db->get();

        return $query;
    }

    public function get_item_nilai_trainer()
    {
        $this->db->from($this->table2);
        $this->db->where('status','1');
        $query = $this->db->get();

        return $query;
    }

    public function save($data)
    {
        $this->db->insert($this->table3, $data);
        return $this->db->insert_id();
    }

    public function update_status_nilai($where, $data)
    {
        $this->db->update($this->table3, $data, $where);
        return $this->db->affected_rows();
    }

    public function update_status_akhir_nilai($where, $data)
    {
        $this->db->update($this->table4, $data, $where);
        return $this->db->affected_rows();
    }

    public function save_status($data)
    {
        $this->db->insert($this->table4, $data);
        return $this->db->insert_id();
    }

    public function update_status($where, $data)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }

    public function update_status_batch($where, $data)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }
}