<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

class M_bpjs extends CI_Model {     
    var $table = 'bpjs';
    var $table2 = 'kandidat';  
    var $column_order = array(null,'nama','area','treg','no_hp1','email','no_ktp','no_kk','bpjs_kesehatan','bpjs_tenagakerja','nik',
    'nama_k','jenis_kelamin_k','status_hubungan_k','kepemilikan_bpjs','bpjs_join_perusahaan','photo',null); //set column field database for datatable orderable     
    var $column_search = array('area','nama','no_ktp','no_hp1','no_ktp','no_kk','bpjs_kesehatan','bpjs_tenagakerja','nik'); //set column field database for datatable searchable just firstname , lastname , address are searchable     
    var $order = array('kandidat.id, bpjs.id_bpjs' => 'desc'); // default order 
 
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function nama_kandidat()
    {  
        $this->db->from($this->table2);
        $this->db->where('status','Existing');
        $query = $this->db->get();
        return $query;
    }

    private function _get_datatables_query()
    {
        $injoin2 = $this->table2.'.id = '.$this->table.'.id_karyawan_onboard';
        $this->db->from($this->table2);
        $this->db->join($this->table, $injoin2,'right');
        $this->db->where('status','Existing');

        $i = 0;
    
        foreach ($this->column_search as $item) // loop column 
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {
                
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
        
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function get_by_id($id)
    {
        $this->db->from($this->table);
        $this->db->where('id_bpjs',$id);
        $query = $this->db->get();

        return $query->row();
    }

    public function save($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function update($where, $data)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }

    public function delete_by_id($id)
    {
        $this->db->where('id_bpjs', $id);
        $this->db->delete($this->table);
    }
}