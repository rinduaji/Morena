<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('m_dashboard');
    }

	public function index()
	{
		// $data['total_caplan'] = $this->m_dashboard->sum_caplan();
		// $data['total_cv'] = $this->m_dashboard->sum_cv();
		// $data['total_training'] = $this->m_dashboard->total_training();
		// $data['total_existing'] = $this->m_dashboard->total_existing();
		// $data['total_resign'] = $this->m_dashboard->total_resign();
		$this->load->view('navbar');
		$this->load->view('dashboard_view');
	}

	public function ajax_total_caplan($bulan_tahun, $area = 'Malang', $layanan = 'TAM CRL')
    {
		if(strpos($area, '%20') !== false) {
			$area = str_replace("%20"," ",$area);
		}

		if(strpos($layanan, '%20') !== false) {
			$layanan = str_replace("%20"," ",$layanan);
		}
		
		$data = $this->m_dashboard->sum_caplan($bulan_tahun, $area, $layanan);
	    echo json_encode($data);
	}

	public function ajax_total_cv($bulan_tahun, $area = 'Malang', $layanan = 'TAM CRL')
    {
		if(strpos($area, '%20') !== false) {
			$area = str_replace("%20"," ",$area);
		}

		if(strpos($layanan, '%20') !== false) {
			$layanan = str_replace("%20"," ",$layanan);
		}

		$data = $this->m_dashboard->sum_cv($bulan_tahun, $area, $layanan);
	    echo json_encode($data);
	}

	public function ajax_total_training($bulan_tahun, $area = 'Malang', $layanan = 'TAM CRL')
    {
		if(strpos($area, '%20') !== false) {
			$area = str_replace("%20"," ",$area);
		}

		if(strpos($layanan, '%20') !== false) {
			$layanan = str_replace("%20"," ",$layanan);
		}

		$data = $this->m_dashboard->total_training($bulan_tahun, $area, $layanan);
	    echo json_encode($data);
	}

	public function ajax_total_existing($bulan_tahun, $area = 'Malang', $layanan = 'TAM CRL')
    {
		if(strpos($area, '%20') !== false) {
			$area = str_replace("%20"," ",$area);
		}

		if(strpos($layanan, '%20') !== false) {
			$layanan = str_replace("%20"," ",$layanan);
		}

		$data = $this->m_dashboard->total_existing($bulan_tahun, $area, $layanan);
	    echo json_encode($data);
	}

	public function ajax_total_resign($bulan_tahun, $area = 'Malang', $layanan = 'TAM CRL')
    {
		if(strpos($area, '%20') !== false) {
			$area = str_replace("%20"," ",$area);
		}

		if(strpos($layanan, '%20') !== false) {
			$layanan = str_replace("%20"," ",$layanan);
		}

		$data = $this->m_dashboard->total_resign($bulan_tahun, $area, $layanan);
	    echo json_encode($data);
	}


	public function ajax_komposisi($area = 'Malang', $layanan = 'TAM CRL')
    {
		if(strpos($area, '%20') !== false) {
			$area = str_replace("%20"," ",$area);
		}

		if(strpos($layanan, '%20') !== false) {
			$layanan = str_replace("%20"," ",$layanan);
		}
		

        $data = $this->m_dashboard->total_komposisi($area, $layanan);
		// print_r($data);
        // $data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
        echo json_encode($data);
    }

	public function ajax_total_setiap_proses_diterima($bulan_tahun,$area = 'Malang', $layanan = 'TAM CRL')
    {
		if(strpos($area, '%20') !== false) {
			$area = str_replace("%20"," ",$area);
		}

		if(strpos($layanan, '%20') !== false) {
			$layanan = str_replace("%20"," ",$layanan);
		}

        $data = $this->m_dashboard->total_setiap_proses_diterima($bulan_tahun,$area, $layanan);
        // $data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
        echo json_encode($data);
    }

	public function ajax_total_setiap_proses_ditolak($bulan_tahun,$area = 'Malang', $layanan = 'TAM CRL')
    {
		if(strpos($area, '%20') !== false) {
			$area = str_replace("%20"," ",$area);
		}

		if(strpos($layanan, '%20') !== false) {
			$layanan = str_replace("%20"," ",$layanan);
		}

        $data = $this->m_dashboard->total_setiap_proses_ditolak($bulan_tahun,$area, $layanan);
        // $data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
        echo json_encode($data);
    }

	public function ajax_total_presentase_training($bulan_tahun, $area = 'Malang', $layanan = 'TAM CRL')
    {
		if(strpos($area, '%20') !== false) {
			$area = str_replace("%20"," ",$area);
		}

		if(strpos($layanan, '%20') !== false) {
			$layanan = str_replace("%20"," ",$layanan);
		}

        $data = $this->m_dashboard->total_presentase_training($bulan_tahun,$area, $layanan);
        // $data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
        echo json_encode($data);
    }
}
