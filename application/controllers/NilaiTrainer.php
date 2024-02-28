<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NilaiTrainer extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('M_nilai_trainer');
        $this->load->model('M_form_interview_hr');
		// $this->load->library(array('excel','session'));
        // $this->load->model('m_import_excel');
    }

    public function index()
    {
        $this->load->helper('url');
        $data['trainer'] = $this->M_nilai_trainer->nama_trainer();
        $data['pilih_batch'] = $this->M_nilai_trainer->nama_batch();
        $data['kategori_nilai_trainer'] = $this->M_nilai_trainer->get_kategori_nilai_trainer();
        $data['item_nilai_trainer'] = $this->M_nilai_trainer->get_item_nilai_trainer();
        
        $this->load->view('navbar');
        $this->load->view('nilai_trainer_view', $data);

        // $data = array(
		// 	'list_data'	=> $this->ImportModel->getData()
		// );
		// $this->load->view('import_excel.php',$data);
    }

    public function ajax_add()
    {
        // $this->_validate();
        $data_nilai = array();
        $angka = $this->input->post('angka');
        // print_r($angka);

        for($i = 0; $i < $angka; $i++) {
            if($i == '2' || $i == '5') {
                $data_nilai[$i] = array(
                    'id_trainer' => $this->input->post('id_trainer'),
                    'id_item' => $this->input->post('id_item['.$i.']'),
                    'nilai' => $this->input->post('hasil_nilai_huruf['.$i.']'),
                    'absen1' => $this->input->post('nilai_huruf['.$i.'][0]'),
                    'absen2' => $this->input->post('nilai_huruf['.$i.'][1]'),
                    'lup' => date("Y-m-d"),
                    'upd' => $this->input->post('upd'),
                );   
            }
            elseif($i == '8' || $i == '11') {
                $data_nilai[$i] = array(
                    'id_trainer' => $this->input->post('id_trainer'),
                    'id_item' => $this->input->post('id_item['.$i.']'),
                    'nilai' => $this->input->post('hasil_nilai_huruf['.$i.']'),
                    'absen1' => $this->input->post('nilai_huruf['.$i.']'),
                    'lup' => date("Y-m-d"),
                    'upd' => $this->input->post('upd'),
                );
            }
            else {
                $data_nilai[$i] = array(
                        'id_trainer' => $this->input->post('id_trainer'),
                        'id_item' => $this->input->post('id_item['.$i.']'),
                        'nilai' => $this->input->post('hasil_nilai_huruf['.$i.']'),
                        'jawaban' => $this->input->post('nilai_huruf['.$i.']'),
                        'lup' => date("Y-m-d"),
                        'upd' => $this->input->post('upd'),
                );
            }
        }

        
        $this->db->where('id_trainer', $this->input->post('id_trainer'));
        $num = $this->db->count_all_results('status_nilai_trainer');

        if($num > 0) {
            for($i = 0; $i < $angka; $i++) {
                $this->M_nilai_trainer->update_status_nilai(array('id_trainer' => $this->input->post('id_trainer') , 'id_item' => $this->input->post('id_item['.$i.']')), $data_nilai[$i]);
            }
        }
        else {
            for($i = 0; $i < $angka; $i++) {
                $this->M_nilai_trainer->save($data_nilai[$i]);
            }
        }

        if($this->input->post('masuk_existing') == "Ya") {
            $data_status_kandidat = array(
                'status' => 'Existing'
            ); 

            $data_status = array(
                'id_trainer' => $this->input->post('id_trainer'),
                'total_all' => $this->input->post('nilai'),
                'status_total_all' => $this->input->post('status_nilai'),
                'lup' => date("Y-m-d"),
                'upd' => $this->input->post('upd'),
                'lulus' => 'Lulus',
            );
        }
        else {
            $data_status_kandidat = array(
                'status' => 'Trainer'
            );

            $data_status = array(
                'id_trainer' => $this->input->post('id_trainer'),
                'total_all' => $this->input->post('nilai'),
                'status_total_all' => $this->input->post('status_nilai'),
                'lup' => date("Y-m-d"),
                'upd' => $this->input->post('upd'),
                'lulus' => 'Tidak Lulus',
            );
        }

        $this->db->where('id_trainer', $this->input->post('id_trainer'));
        $num1 = $this->db->count_all_results('status_akhir_nilai_trainer');
        if($num1 > 0 ) {
            $this->M_nilai_trainer->update_status_akhir_nilai(array('id_trainer' => $this->input->post('id_trainer')), $data_status);
        }
        else {
            $this->M_nilai_trainer->save_status($data_status);
        }

        $this->M_nilai_trainer->update_status(array('id' => $this->input->post('id_trainer')), $data_status_kandidat);

        if( $data_status_kandidat['status'] == 'Existing') {
            redirect(site_url('ReportKaryawan'));
        }
        else {
            redirect(site_url('ReportTrainer'));
        }
        
    }

    public function ajax_edit($id)
    {
        $data = $this->M_nilai_trainer->get_by_id($id);
        // $data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
        echo json_encode($data);
    }

    public function ajax_edit_nilai_trainer($id)
    {
        $data = $this->M_nilai_trainer->get_by_id($id);
        // $data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
        echo json_encode($data);
    }
}