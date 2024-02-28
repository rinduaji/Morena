<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FormInterviewHR extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('M_form_interview_hr');
		// $this->load->library(array('excel','session'));
        // $this->load->model('m_import_excel');
    }

    public function index()
    {
        $this->load->helper('url');
        $data['kandidat'] = $this->M_form_interview_hr->nama_kandidat();
        $data['interview_kategori_hr'] = $this->M_form_interview_hr->get_interview_kategori_hr();
        $data['interview_item_hr'] = $this->M_form_interview_hr->get_interview_item_hr();
        
        $this->load->view('navbar');
        $this->load->view('form_interview_hr_view', $data);

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
            $data_nilai[$i] = array(
                    'id_kandidat' => $this->input->post('id_kandidat'),
                    'id_item' => $this->input->post('id_item['.$i.']'),
                    'nilai' => $this->input->post('hasil_nilai_huruf['.$i.']'),
                    'lup' => date("Y-m-d"),
                    'upd' => $this->input->post('upd'),
                    'jenis_interview' => 'HR',
                    'deskripsi' => $this->input->post('deskripsi['.$i.']'),
                    'status_nilai' => $this->input->post('nilai_huruf['.$i.']'),
            );
        }

        for($i = 0; $i < $angka; $i++) {
            $this->M_form_interview_hr->save($data_nilai[$i]);
        }

        $data_status = array(
            'id_kandidat' => $this->input->post('id_kandidat'),
            'nilai' => $this->input->post('nilai'),
            'status_nilai' => $this->input->post('status_nilai'),
            'saran_posisi' => $this->input->post('saran_posisi'),
            'hasil_wawancara' => $this->input->post('hasil_wawancara'),
            'lup' => date("Y-m-d"),
            'upd' => $this->input->post('upd'),
            'jenis_interview' => 'HR',
        );

        $data_status_kandidat = array(
            'status' => 'Interview User',
            'user_interview' => $this->input->post('user_interview'),
        );
        

        $this->M_form_interview_hr->save_status($data_status);
        $this->M_form_interview_hr->update_status(array('id' => $this->input->post('id_kandidat')), $data_status_kandidat);

        redirect(site_url('InterviewHr'));
        // print_r($data_nilai[20]);


        // $data_nilai = array(
        //         'nilai' => $this->input->post('nilai'),
        //         'status_nilai' => $this->input->post('status_nilai'),
        //         'saran_posisi' => $this->input->post('saran_posisi'),
        //         'hasil_wawancara' => $this->input->post('hasil_wawancara'),
        //         'lup' => date("Y-m-d"),
        //         'upd' => 'aji',
        //         'id_kandidat' => $this->input->post('id_kandidat'),
        // );
 
        // if(!empty($_FILES['photo']['name']))
        // {
        //     $upload = $this->_do_upload();
        //     $data['photo'] = $upload;
        // }
 
        // $insert = $this->m_form_interview_hr->save($data);
 
        // echo json_encode(array("status" => TRUE));
    }

    public function ajax_edit($id)
    {
        $data = $this->M_form_interview_hr->get_by_id($id);
        // $data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
        echo json_encode($data);
    }

    public function ajax_edit_pengawakan()
    {
        $area = $this->input->post('area',TRUE);
        $layanan = $this->input->post('layanan',TRUE);
        $data = $this->M_form_interview_hr->nama_pengawakan($area,$layanan)->result();
        // $data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
        echo json_encode($data);
    }
}