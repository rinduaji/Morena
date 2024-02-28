<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BatchTrainer extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('m_batch_trainer');
    }

    public function index()
    {
        $this->load->helper('url');
        
        $data['batch'] = $this->m_batch_trainer->nama_batch();
        
        $this->load->view('navbar');
        $this->load->view('batch_trainer_view', $data);
    }
 
    public function ajax_list()
    {
        $this->load->helper('url');
 
        $list = $this->m_batch_trainer->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $m_batch_trainer) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $m_batch_trainer->nama;
            $row[] = $m_batch_trainer->area;
            $row[] = $m_batch_trainer->treg;
            $row[] = $m_batch_trainer->alamat;
            $row[] = $m_batch_trainer->kelurahan;
            $row[] = $m_batch_trainer->kecamatan;
            $row[] = $m_batch_trainer->kota;
            $row[] = $m_batch_trainer->propinsi;
            $row[] = $m_batch_trainer->project;
            $row[] = $m_batch_trainer->layanan;
            $row[] = $m_batch_trainer->loker;
            $row[] = $m_batch_trainer->kota_lahir;
            $row[] = $m_batch_trainer->tgl_lahir;
            $row[] = $m_batch_trainer->no_hp1;
            $row[] = $m_batch_trainer->no_hp2;
            $row[] = $m_batch_trainer->email;
            $row[] = $m_batch_trainer->no_ktp;
            $row[] = $m_batch_trainer->status_nikah;
            $row[] = $m_batch_trainer->pendidikan;
            $row[] = $m_batch_trainer->jurusan;
            $row[] = $m_batch_trainer->nama_sekolah;
            $row[] = $m_batch_trainer->th_lulus;
            $row[] = $m_batch_trainer->jenis_kelamin;
            $row[] = $m_batch_trainer->agama;
            $row[] = $m_batch_trainer->status;
            $row[] = $m_batch_trainer->tgl_input;
            $row[] = $m_batch_trainer->nama_batch;
            $row[] = $m_batch_trainer->tgl_mulai_batch;
            $row[] = $m_batch_trainer->tgl_akhir_batch;
            // if($m_batch_trainer->photo)
            //     $row[] = '<a href="'.base_url('upload/'.$m_batch_trainer->photo).'" target="_blank"><img src="'.base_url('upload/'.$m_batch_trainer->photo).'" class="img-responsive" /></a>';
            // else
            //     $row[] = '(No photo)';
 
            //add html for action
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_batch_trainer('."'".$m_batch_trainer->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>';
         
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->m_batch_trainer->count_all(),
                        "recordsFiltered" => $this->m_batch_trainer->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }
 
    public function ajax_edit($id)
    {
        $data = $this->m_batch_trainer->get_by_id($id);
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
 
        $insert = $this->m_batch_trainer->save($data);
 
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
            // $m_batch_trainer = $this->m_batch_trainer->get_by_id($this->input->post('id'));
        //     if(file_exists('upload/'.$m_batch_trainer->photo) && $m_batch_trainer->photo)
        //         unlink('upload/'.$m_batch_trainer->photo);
 
        //     $data['photo'] = $upload;
        // }
 
        $this->m_batch_trainer->update(array('id' => $this->input->post('id')), $data);
        echo json_encode(array("status" => TRUE));
    }
 
    public function ajax_delete($id)
    {
        //delete file
        $m_batch_trainer = $this->m_batch_trainer->get_by_id($id);
        // if(file_exists('upload/'.$m_batch_trainer->photo) && $m_batch_trainer->photo)
        //     unlink('upload/'.$m_batch_trainer->photo);
         
        $this->m_batch_trainer->delete_by_id($id);
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