<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

class M_dashboard extends CI_Model {     
    var $table = 'cv';     
    var $column_order = array(null,'area','layanan','jumlah_cv','tgl_input','upd','tgl_awal','tgl_akhir',null); //set column field database for datatable orderable     
    var $column_search = array('area','layanan','jumlah_cv','tgl_input','upd','tgl_awal','tgl_akhir'); //set column field database for datatable searchable just firstname , lastname , address are searchable     
    var $order = array('id' => 'desc'); // default order 
 
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // function count_filtered()
    // {
    //     $this->_get_datatables_query();
    //     $query = $this->db->get();
    //     return $query->num_rows();
    // }

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

    
    public function sum_caplan($bulan_tahun,$area,$layanan)
    {
        $tanggalAwal = $bulan_tahun.'-01';
        $tanggalAkhir = $bulan_tahun.'-31';
        $query = $this->db->query("SELECT a.jumlah_caplan, b.total_existing_agent, c.total_resign_agent FROM
        (SELECT jumlah_caplan FROM caplan WHERE tgl_awal <= '$tanggalAwal' AND tgl_akhir >= '$tanggalAkhir' AND area = '$area' AND layanan = '$layanan') as a
        JOIN
        (SELECT COUNT(*) AS total_existing_agent
        FROM kandidat
        WHERE status = 'Existing'
        AND area = '$area'
        AND layanan = '$layanan') as b
        JOIN
        (SELECT COUNT(*) AS total_resign_agent
        FROM kandidat
        WHERE status = 'Resign'
        AND area = '$area'
        AND layanan = '$layanan'
        AND MONTH(tgl_input) = MONTH('$bulan_tahun')
        AND YEAR(tgl_input) = YEAR('$bulan_tahun')) as c
        ");

        return $query->row();
    }

    public function sum_cv($bulan_tahun,$area,$layanan)
    {
        $this->db->select('SUM(jumlah_cv) as total_cv');
        $this->db->from($this->table);
        $this->db->where('MONTH(tgl_input)', date('m',strtotime($bulan_tahun)));
        $this->db->where('YEAR(tgl_input)', date('Y',strtotime($bulan_tahun)));
        $this->db->where('area', $area);
        $this->db->where('layanan', $layanan);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function total_training($bulan_tahun,$area,$layanan)
    {
        $injoin1 = 'kandidat.id_batch = batch.id_batch';
        
        $this->db->select('COUNT(*) as total, batch.nama_batch as nama_batch');
        $this->db->from('kandidat');
        $this->db->join('batch', $injoin1);
        $this->db->where('kandidat.status', 'Trainer');
        // $query = $this->db->get();
        $this->db->where('MONTH(batch.lup)', date('m',strtotime($bulan_tahun)));
        $this->db->where('YEAR(batch.lup)', date('Y',strtotime($bulan_tahun)));
        $this->db->where('kandidat.area', $area);
        $this->db->where('kandidat.layanan', $layanan);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function total_existing($bulan_tahun,$area,$layanan)
    {
        $this->db->from('kandidat');
        $this->db->where('status', 'Existing');
        $this->db->where('kandidat.area', $area);
        $this->db->where('kandidat.layanan', $layanan);
        // $this->db->where('MONTH(tgl_input)', date('m',strtotime($bulan_tahun)));
        // $this->db->where('YEAR(tgl_input)', date('Y',strtotime($bulan_tahun)));
        // $query = $this->db->get();

        return $this->db->count_all_results();
    }

    public function total_resign($bulan_tahun,$area,$layanan)
    {
        $this->db->from('kandidat');
        $this->db->where('status', 'Resign');
        $this->db->where('kandidat.area', $area);
        $this->db->where('kandidat.layanan', $layanan);
        $this->db->where('MONTH(tgl_input)', date('m',strtotime($bulan_tahun)));
        $this->db->where('YEAR(tgl_input)', date('Y',strtotime($bulan_tahun)));
        // $query = $this->db->get();

        return $this->db->count_all_results();
    }

    public function total_komposisi($area, $layanan)
    {
        $this->db->select('user_interview, COUNT(*) AS jumlah');
        $this->db->from('kandidat');
        $this->db->where('status', 'Existing');
        $this->db->where('user_interview <>', '');
        $this->db->where('area', $area);
        $this->db->where('layanan', $layanan);
        $this->db->group_by('user_interview');
        $this->db->order_by("user_interview", "asc");
        $query = $this->db->get();
        return $query->result_array();
    }

    public function total_setiap_proses_diterima($bulan_tahun,$area, $layanan) {
        $query = $this->db->query("SELECT a.total_cv, b.jumlah_kandidat, c.jumlah_interview_hr, d.jumlah_interview_user, e.jumlah_trainer FROM
        (SELECT sum(jumlah_cv) as total_cv FROM cv WHERE MONTH(tgl_awal) = MONTH('$bulan_tahun') AND YEAR(tgl_awal) = YEAR('$bulan_tahun') AND area='$area' AND layanan='$layanan') as a
        JOIN 
        (SELECT count(*) as jumlah_kandidat FROM kandidat WHERE status='Kandidat' AND MONTH(tgl_input) = MONTH('$bulan_tahun') AND YEAR(tgl_input) = YEAR('$bulan_tahun') AND area='$area' AND layanan='$layanan') as b
        JOIN
        (SELECT count(*) as jumlah_interview_hr FROM kandidat as a INNER JOIN interview_status_hr as b ON a.id = b. id_kandidat 
        WHERE a.status='Interview HR' AND MONTH(b.lup) = MONTH('$bulan_tahun') AND YEAR(b.lup) = YEAR('$bulan_tahun') AND b.jenis_interview = 'HR' AND b.hasil_wawancara = 'Diterima' AND a.area='$area' AND a.layanan='$layanan' ) as c
        JOIN
        (SELECT count(*) as jumlah_interview_user FROM kandidat as a INNER JOIN interview_status_hr as b ON a.id = b. id_kandidat 
        WHERE a.status='Interview User' AND MONTH(b.lup) = MONTH('$bulan_tahun') AND YEAR(b.lup) = YEAR('$bulan_tahun') AND b.jenis_interview = 'User' AND b.hasil_wawancara = 'Diterima' AND a.area='$area' AND a.layanan='$layanan' ) as d
        JOIN
        (SELECT count(*) as jumlah_trainer FROM kandidat as a INNER JOIN status_akhir_nilai_trainer as b ON a.id = b. id_trainer
        WHERE a.status='Trainer' AND MONTH(b.lup) = MONTH('$bulan_tahun') AND YEAR(b.lup) = YEAR('$bulan_tahun') AND b.lulus = 'Ya' AND a.area='$area' AND a.layanan='$layanan') as e");
        return $query->row();
    }

    public function total_setiap_proses_ditolak($bulan_tahun,$area, $layanan) {
        $query = $this->db->query("SELECT a.total_cv, b.jumlah_kandidat, c.jumlah_interview_hr, d.jumlah_interview_user, e.jumlah_trainer FROM
        (SELECT sum(jumlah_cv) as total_cv FROM cv WHERE MONTH(tgl_awal) = MONTH('$bulan_tahun') AND YEAR(tgl_awal) = YEAR('$bulan_tahun') AND area='$area' AND layanan='$layanan') as a
        JOIN 
        (SELECT count(*) as jumlah_kandidat FROM kandidat WHERE status='Kandidat' AND MONTH(tgl_input) = MONTH('$bulan_tahun') AND YEAR(tgl_input) = YEAR('$bulan_tahun') AND area='$area' AND layanan='$layanan') as b
        JOIN
        (SELECT count(*) as jumlah_interview_hr FROM kandidat as a INNER JOIN interview_status_hr as b ON a.id = b. id_kandidat 
        WHERE a.status='Interview HR' AND a.area='$area' AND a.layanan='$layanan' AND MONTH(b.lup) = MONTH('$bulan_tahun') AND YEAR(b.lup) = YEAR('$bulan_tahun') AND b.jenis_interview = 'HR' AND b.hasil_wawancara = 'Ditolak'  ) as c
        JOIN
        (SELECT count(*) as jumlah_interview_user FROM kandidat as a INNER JOIN interview_status_hr as b ON a.id = b. id_kandidat 
        WHERE a.status='Interview User' AND a.area='$area' AND a.layanan='$layanan' AND MONTH(b.lup) = MONTH('$bulan_tahun') AND YEAR(b.lup) = YEAR('$bulan_tahun') AND b.jenis_interview = 'User' AND b.hasil_wawancara = 'Ditolak'  ) as d
        JOIN
        (SELECT count(*) as jumlah_trainer FROM kandidat as a INNER JOIN status_akhir_nilai_trainer as b ON a.id = b. id_trainer
        WHERE a.status='Trainer' AND a.area='$area' AND a.layanan='$layanan' AND MONTH(b.lup) = MONTH('$bulan_tahun') AND YEAR(b.lup) = YEAR('$bulan_tahun') AND b.lulus = 'Tidak') as e");

        return $query->row();
    }

    public function total_presentase_training($bulan_tahun,$area, $layanan) {
        $query = $this->db->query("SELECT a.total_lulus, b.total_proses_training FROM
        (SELECT COUNT(*) as total_lulus FROM kandidat as a INNER JOIN status_akhir_nilai_trainer as b ON a.id = b.id_trainer 
        WHERE a.status='Trainer' AND a.area ='$area' AND a.layanan='$layanan' AND MONTH(b.lup) = MONTH('$bulan_tahun') AND YEAR(b.lup) = YEAR('$bulan_tahun') AND b.lulus = 'Ya') as a
        JOIN 
        (SELECT COUNT(*) as total_proses_training FROM kandidat as a INNER JOIN status_akhir_nilai_trainer as b ON a.id = b.id_trainer 
        WHERE a.status='Trainer' AND a.area ='$area' AND a.layanan='$layanan' AND MONTH(b.lup) = MONTH('$bulan_tahun') AND YEAR(b.lup) = YEAR('$bulan_tahun') AND b.lulus = 'Tidak') as b");

        return $query->row();
    }
}