<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

class M_form_interview_hr extends CI_Model {     
    var $table = 'kandidat';
    var $table1 = 'interview_kategori_hr'; 
    var $table2 = 'interview_item_hr';
    var $table3 = 'interview_nilai_hr'; 
    var $table4 = 'interview_status_hr';    
    var $table5 = 'pengawakan_user_interview';
 
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function nama_kandidat()
    {
        $this->db->from($this->table);
        $this->db->where('status','kandidat');
        $query = $this->db->get();

        return $query;
    }

    function nama_pengawakan($area,$layanan)
    {
        $this->db->from($this->table5);
        $this->db->where('area',$area);
        $this->db->where('layanan',$layanan);
        $query = $this->db->get();

        return $query;
    }
    

    function nama_interview_hr($nama)
    {
        $injoin1 = $this->table.'.id = '.$this->table4.'.id_kandidat';
        $this->db->from($this->table);
        $this->db->join($this->table4, $injoin1);
        $this->db->where('status','Interview User');
        $this->db->where('hasil_wawancara','Diterima');
        $this->db->where('user_interview',$nama);
        $query = $this->db->get();

        return $query;
    }

    public function get_by_id($id)
    {
        $this->db->from($this->table);
        $this->db->where('id',$id);
        $query = $this->db->get();

        return $query->row();
    }

    public function get_interview_kategori_hr()
    {
        $this->db->from($this->table1);
        $this->db->where('status','1');
        $query = $this->db->get();

        return $query;
    }

    public function get_interview_item_hr()
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
}