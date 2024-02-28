<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

class M_report_trainer extends CI_Model {     
    var $table = 'kandidat';     
    var $table2 = 'batch';
    var $table3 = 'status_akhir_nilai_trainer';
    var $table4 = 'status_nilai_trainer';
    var $table5 = 'item_nilai_trainer';
    var $table6 = 'kategori_nilai_trainer';

    var $column_order = array(null,'nama','area','treg','alamat','kelurahan','kecamatan','kota','propinsi','project','layanan','loker','kota_lahir',
    'tgl_lahir','no_hp1','no_hp2','email','no_ktp','status_nikah','pendidikan','jurusan','nama_sekolah','th_lulus','jenis_kelamin','agama',
    'status','tgl_input','nama_batch','tgl_mulai_batch','tgl_akhir_batch','total_all','status_total_all','lulus'); //set column field database for datatable orderable     
    var $column_search = array('area','nama','no_ktp','no_hp1','nama_batch','tgl_mulai_batch','tgl_akhir_batch'); //set column field database for datatable searchable just firstname , lastname , address are searchable     
    var $order = array('kandidat.id' => 'desc'); // default order 
 
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function nama_trainer()
    {
        $this->db->from($this->table);
        $this->db->where('status','trainer');
        $query = $this->db->get();

        return $query;
    }

    function nama_batch()
    {
        $this->db->from($this->table2);
        $query = $this->db->get();

        return $query;
    }

    public function get_by_id_ss_cs($id)
    {
        $this->db->select('nilai');
        $this->db->from($this->table4);
        $this->db->where('id_trainer',$id);
        $this->db->where('id_item','1');
        $query = $this->db->get();

        return $query->row_array();
    }

    public function get_by_id_ss_ss($id)
    {
        $this->db->select('nilai');
        $this->db->from($this->table4);
        $this->db->where('id_trainer',$id);
        $this->db->where('id_item','2');
        $query = $this->db->get();

        return $query->row_array();
    }

    public function get_by_id_ss_ap($id)
    {
        $this->db->select('nilai');
        $this->db->from($this->table4);
        $this->db->where('id_trainer',$id);
        $this->db->where('id_item','3');
        $query = $this->db->get();

        return $query->row_array();
    }

    public function get_by_id_ss_post($id)
    {
        $this->db->select('nilai');
        $this->db->from($this->table4);
        $this->db->where('id_trainer',$id);
        $this->db->where('id_item','4');
        $query = $this->db->get();

        return $query->row_array();
    }

    public function get_by_id_pk_pp($id)
    {
        $this->db->select('nilai');
        $this->db->from($this->table4);
        $this->db->where('id_trainer',$id);
        $this->db->where('id_item','5');
        $query = $this->db->get();

        return $query->row_array();
    }

    public function get_by_id_pk_ap($id)
    {
        $this->db->select('nilai');
        $this->db->from($this->table4);
        $this->db->where('id_trainer',$id);
        $this->db->where('id_item','6');
        $query = $this->db->get();

        return $query->row_array();
    }

    public function get_by_id_pk_post($id)
    {
        $this->db->select('nilai');
        $this->db->from($this->table4);
        $this->db->where('id_trainer',$id);
        $this->db->where('id_item','7');
        $query = $this->db->get();

        return $query->row_array();
    }

    public function get_by_id_ap_psa($id)
    {
        $this->db->select('nilai');
        $this->db->from($this->table4);
        $this->db->where('id_trainer',$id);
        $this->db->where('id_item','8');
        $query = $this->db->get();

        return $query->row_array();
    }

    public function get_by_id_ap_ap($id)
    {
        $this->db->select('nilai');
        $this->db->from($this->table4);
        $this->db->where('id_trainer',$id);
        $this->db->where('id_item','9');
        $query = $this->db->get();

        return $query->row_array();
    }

    public function get_by_id_ap_post($id)
    {
        $this->db->select('nilai');
        $this->db->from($this->table4);
        $this->db->where('id_trainer',$id);
        $this->db->where('id_item','10');
        $query = $this->db->get();

        return $query->row_array();
    }

    public function get_by_id_p_rp($id)
    {
        $this->db->select('nilai');
        $this->db->from($this->table4);
        $this->db->where('id_trainer',$id);
        $this->db->where('id_item','11');
        $query = $this->db->get();

        return $query->row_array();
    }

    public function get_by_id_p_ap($id)
    {
        $this->db->select('nilai');
        $this->db->from($this->table4);
        $this->db->where('id_trainer',$id);
        $this->db->where('id_item','12');
        $query = $this->db->get();

        return $query->row_array();
    }

    public function get_by_id_p_post($id)
    {
        $this->db->select('nilai');
        $this->db->from($this->table4);
        $this->db->where('id_trainer',$id);
        $this->db->where('id_item','13');
        $query = $this->db->get();

        return $query->row_array();
    }

    public function get_by_id_tendem($id)
    {
        $this->db->select('nilai');
        $this->db->from($this->table4);
        $this->db->where('id_trainer',$id);
        $this->db->where('id_item','14');
        $query = $this->db->get();

        return $query->row_array();
    }

    private function _get_datatables_query()
    {
        
        $injoin1 = $this->table.'.id_batch = '.$this->table2.'.id_batch';
        $injoin2 = $this->table.'.id = '.$this->table3.'.id_trainer';
        $this->db->from($this->table);
        $this->db->join($this->table2, $injoin1,'left');
        $this->db->join($this->table3, $injoin2,'left');
        $this->db->where('kandidat.status','Trainer');

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
        $this->db->where('id',$id);
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
        $this->db->where('id', $id);
        $this->db->delete($this->table);
    }
}