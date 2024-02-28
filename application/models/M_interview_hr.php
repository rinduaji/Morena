<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

class M_interview_hr extends CI_Model {     
    var $table = 'kandidat';     
    var $table2 = 'interview_status_hr';

    var $column_order = array(null,'nama','area','treg','alamat','kelurahan','kecamatan','kota','propinsi','project','layanan','loker','kota_lahir',
    'tgl_lahir','no_hp1','no_hp2','email','no_ktp','status_nikah','pendidikan','jurusan','nama_sekolah','th_lulus','jenis_kelamin','agama',
    'status','tgl_input','rencana_posisi','pengalaman_kerja','jenis_interview','nilai','status_nilai','saran_posisi','hasil_wawancara','lup','user_interview'); //set column field database for datatable orderable     
    var $column_search = array('area','nama','no_ktp','no_hp1'); //set column field database for datatable searchable just firstname , lastname , address are searchable     
    var $order = array('id' => 'desc'); // default order 
 
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    private function _get_datatables_query()
    {
        
        $injoin1 = $this->table.'.id = '.$this->table2.'.id_kandidat';
        $this->db->from($this->table);
        $this->db->join($this->table2, $injoin1);
        $this->db->where('status','Interview User');
        $this->db->where('jenis_interview','HR');

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