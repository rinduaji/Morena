<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

class M_resign extends CI_Model {     
    var $table = 'karyawan_onboard';
    var $table2 = 'kandidat';
    var $table3 = 'bpjs';  
    var $table4 = 'kontrak'; 
    var $column_order = array(null,'nama','area','treg','no_hp1','email','no_ktp','ibu_kandung','npwp','no_kk','bpjs_kesehatan',
    'bpjs_tenagakerja','norek_bank','nama_bank','nama_pemilik','join_date','end_date','jenis_kontrak','no_kontrak','perner',
    'status_kontrak','awal_kontrak','akhir_kontrak','jabatan','status','keterangan_resign',null); //set column field database for datatable orderable     
    var $column_search = array('area','status','nama','no_ktp','no_hp1','no_ktp','npwp','bpjs_kesehatan','bpjs_tenagakerja','norek_bank','no_kontrak','perner'); //set column field database for datatable searchable just firstname , lastname , address are searchable     
    var $order = array('kandidat.id, bpjs.id_bpjs, kontrak.id_kontrak' => 'desc'); // default order 
 
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function nama_kandidat()
    {
        $query = $this->db->get($this->table2);
        return $query;
    }

    private function _get_datatables_query()
    {
        $injoin1 = $this->table2.'.id = '.$this->table.'.user_id';
        $injoin2 = $this->table2.'.id = '.$this->table3.'.id_karyawan_onboard';
        $injoin3 = $this->table2.'.id = '.$this->table4.'.id_kandidat';
        $this->db->select('kandidat.id,kandidat.nama,kandidat.area,kandidat.treg,kandidat.no_hp1,kandidat.email,kandidat.no_ktp,karyawan_onboard.ibu_kandung,
        karyawan_onboard.npwp,bpjs.no_kk,bpjs.bpjs_kesehatan,bpjs.bpjs_tenagakerja,karyawan_onboard.norek_bank,karyawan_onboard.nama_bank,karyawan_onboard.nama_pemilik,
        karyawan_onboard.join_date,karyawan_onboard.end_date,kontrak.jenis_kontrak,kontrak.no_kontrak,kontrak.perner,
        kontrak.status_kontrak,kontrak.awal_kontrak,kontrak.akhir_kontrak,kontrak.jabatan,kandidat.status,kandidat.keterangan_resign');
        $this->db->from($this->table2);
        $this->db->join($this->table, $injoin1,'left');
        $this->db->join($this->table3, $injoin2,'left');
        $this->db->join($this->table4, $injoin3,'left');
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
        $this->db->from($this->table2);
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
        $this->db->update($this->table2, $data, $where);
        return $this->db->affected_rows();
    }

    public function delete_by_id($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->table);
    }
}