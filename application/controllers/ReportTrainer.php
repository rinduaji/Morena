<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportTrainer extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('m_report_trainer');
    }

    public function index()
    {
        $this->load->helper('url');
        
        $data['batch'] = $this->m_report_trainer->nama_batch();
        
        $this->load->view('navbar');
        $this->load->view('report_trainer_view', $data);
    }
 
    public function ajax_list()
    {
        $this->load->helper('url');
 
        $list = $this->m_report_trainer->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $list_report_trainer) {
            $ss_cs = $this->m_report_trainer->get_by_id_ss_cs($list_report_trainer->id);
            $ss_ss = $this->m_report_trainer->get_by_id_ss_ss($list_report_trainer->id);
            $ss_ap = $this->m_report_trainer->get_by_id_ss_ap($list_report_trainer->id);
            $ss_post = $this->m_report_trainer->get_by_id_ss_post($list_report_trainer->id);

            $pk_pp = $this->m_report_trainer->get_by_id_pk_pp($list_report_trainer->id);
            $pk_ap = $this->m_report_trainer->get_by_id_pk_ap($list_report_trainer->id);
            $pk_post = $this->m_report_trainer->get_by_id_pk_post($list_report_trainer->id);

            $ap_psa = $this->m_report_trainer->get_by_id_ap_psa($list_report_trainer->id);
            $ap_ap = $this->m_report_trainer->get_by_id_ap_ap($list_report_trainer->id);
            $ap_post = $this->m_report_trainer->get_by_id_ap_post($list_report_trainer->id);

            $p_rp = $this->m_report_trainer->get_by_id_p_rp($list_report_trainer->id);
            $p_ap = $this->m_report_trainer->get_by_id_p_ap($list_report_trainer->id);
            $p_post = $this->m_report_trainer->get_by_id_p_post($list_report_trainer->id);

            $tendem = $this->m_report_trainer->get_by_id_tendem($list_report_trainer->id);
            
            
            $no++;
            $row = array();
            $row[] = $no;
            
            $row[] = $list_report_trainer->nama;
            $row[] = $list_report_trainer->area;
            $row[] = $list_report_trainer->treg;
            $row[] = $list_report_trainer->alamat;
            $row[] = $list_report_trainer->kelurahan;
            $row[] = $list_report_trainer->kecamatan;
            $row[] = $list_report_trainer->kota;
            $row[] = $list_report_trainer->propinsi;
            $row[] = $list_report_trainer->project;
            $row[] = $list_report_trainer->layanan;
            $row[] = $list_report_trainer->loker;
            $row[] = $list_report_trainer->kota_lahir;
            $row[] = $list_report_trainer->tgl_lahir;
            $row[] = $list_report_trainer->no_hp1;
            $row[] = $list_report_trainer->no_hp2;
            $row[] = $list_report_trainer->email;
            $row[] = $list_report_trainer->no_ktp;
            $row[] = $list_report_trainer->status_nikah;
            $row[] = $list_report_trainer->pendidikan;
            $row[] = $list_report_trainer->jurusan;
            $row[] = $list_report_trainer->nama_sekolah;
            $row[] = $list_report_trainer->th_lulus;
            $row[] = $list_report_trainer->jenis_kelamin;
            $row[] = $list_report_trainer->agama;
            $row[] = $list_report_trainer->status;
            $row[] = $list_report_trainer->tgl_input;
            $row[] = $list_report_trainer->nama_batch;
            $row[] = $list_report_trainer->tgl_mulai_batch;
            $row[] = $list_report_trainer->tgl_akhir_batch;

            $row[] = $ss_cs['nilai'];
            $row[] = $ss_ss['nilai'];
            $row[] = $ss_ap['nilai'];
            $row[] = $ss_post['nilai'];

            $row[] = $pk_pp['nilai'];
            $row[] = $pk_ap['nilai'];
            $row[] = $pk_post['nilai'];

            $row[] = $ap_psa['nilai'];
            $row[] = $ap_ap['nilai'];
            $row[] = $ap_post['nilai'];

            $row[] = $p_rp['nilai'];
            $row[] = $p_ap['nilai'];
            $row[] = $p_post['nilai'];

            $row[] = $tendem['nilai'];

            $row[] = $list_report_trainer->total_all;
            $row[] = $list_report_trainer->status_total_all;
            $row[] = $list_report_trainer->lulus;
            // if($m_report_trainer->photo)
            //     $row[] = '<a href="'.base_url('upload/'.$m_report_trainer->photo).'" target="_blank"><img src="'.base_url('upload/'.$m_report_trainer->photo).'" class="img-responsive" /></a>';
            // else
            //     $row[] = '(No photo)';
 
            //add html for action
            // $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_batch_trainer('."'".$list_report_trainer->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>';
         
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->m_report_trainer->count_all(),
                        "recordsFiltered" => $this->m_report_trainer->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }
 
    public function ajax_edit($id)
    {
        $data = $this->m_report_trainer->get_by_id($id);
        // $data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
        echo json_encode($data);
    }
 
    public function ajax_add()
    {
        $this->_validate();
         
        $data = array(
                'id_batch' => $this->input->post('id_batch'),
            );
 
        // if(!empty($_FILES['photo']['name']))
        // {
        //     $upload = $this->_do_upload();
        //     $data['photo'] = $upload;
        // }
 
        $insert = $this->m_report_trainer->save($data);
 
        echo json_encode(array("status" => TRUE));
    }
 
    public function ajax_update()
    {
        $this->_validate();
        $data = array(
                'id_batch' => $this->input->post('id_batch'),
            );
 
        // if($this->input->post('remove_photo')) // if remove photo checked
        // {
        //     if(file_exists('upload/'.$this->input->post('remove_photo')) && $this->input->post('remove_photo'))
        //         unlink('upload/'.$this->input->post('remove_photo'));
        //     $data['photo'] = '';
        // }
 
        // if(!empty($_FILES['photo']['name']))
        // {
        //     $upload = $this->_do_upload();
             
            //delete file
            // $m_report_trainer = $this->m_report_trainer->get_by_id($this->input->post('id'));
        //     if(file_exists('upload/'.$m_report_trainer->photo) && $m_report_trainer->photo)
        //         unlink('upload/'.$m_report_trainer->photo);
 
        //     $data['photo'] = $upload;
        // }
 
        $this->m_report_trainer->update(array('id' => $this->input->post('id')), $data);
        echo json_encode(array("status" => TRUE));
    }
 
    public function ajax_delete($id)
    {
        //delete file
        $m_report_trainer = $this->m_report_trainer->get_by_id($id);
        // if(file_exists('upload/'.$m_report_trainer->photo) && $m_report_trainer->photo)
        //     unlink('upload/'.$m_report_trainer->photo);
         
        $this->m_report_trainer->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }
 
    private function _do_upload()
    {
        $config['upload_path']          = 'upload/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 100; //set max size allowed in Kilobyte
        $config['max_width']            = 1000; // set max width image allowed
        $config['max_height']           = 1000; // set max height allowed
        $config['file_name']            = round(microtime(true) * 1000); //just milisecond timestamp fot unique name
 
        $this->load->library('upload', $config);
 
        if(!$this->upload->do_upload('photo')) //upload and validate
        {
            $data['inputerror'][] = 'photo';
            $data['error_string'][] = 'Upload error: '.$this->upload->display_errors('',''); //show ajax error
            $data['status'] = FALSE;
            echo json_encode($data);
            exit();
        }
        return $this->upload->data('file_name');
    }
 
    private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;
 
        if($this->input->post('id_batch') == '')
        {
            $data['inputerror'][] = 'id_batch';
            $data['error_string'][] = 'Please select Nama Batch';
            $data['status'] = FALSE;
        }

        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    } 
}