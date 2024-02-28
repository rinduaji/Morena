<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Resign extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('m_resign');
    }

    public function index()
    {
        $this->load->helper('url');
        
        $data['kandidat'] = $this->m_resign->nama_kandidat();
        
        $this->load->view('navbar');
        $this->load->view('resign_view',$data);
    }
 
    public function ajax_list()
    {
        $this->load->helper('url');
 
        $list = $this->m_resign->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $m_resign) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $m_resign->nama;
            $row[] = $m_resign->area;
            $row[] = $m_resign->treg;
            $row[] = $m_resign->no_hp1;
            $row[] = $m_resign->email;
            $row[] = $m_resign->no_ktp;
            $row[] = $m_resign->ibu_kandung;
            $row[] = $m_resign->npwp;
            $row[] = $m_resign->norek_bank;
            $row[] = $m_resign->nama_bank;
            $row[] = $m_resign->nama_pemilik;
            $row[] = $m_resign->join_date;
            $row[] = $m_resign->end_date;
            $row[] = $m_resign->status;
            $row[] = $m_resign->keterangan_resign;
            // if($m_resign->photo)
            //     $row[] = '<a href="'.base_url('upload/'.$m_resign->photo).'" target="_blank"><img src="'.base_url('upload/'.$m_resign->photo).'" class="img-responsive" /></a>';
            // else
            //     $row[] = '(No photo)';
 
            //add html for action
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_resign('."'".$m_resign->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>';
         
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->m_resign->count_all(),
                        "recordsFiltered" => $this->m_resign->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }
 
    public function ajax_edit($id)
    {
        $data = $this->m_resign->get_by_id($id);
        // $data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
        echo json_encode($data);
    }
 
    public function ajax_add()
    {
        $this->_validate();
         
        $data = array(
                'keterangan_resign' => $this->input->post('keterangan_resign'),
                'tgl_resign' => date("Y-m-d"),
                'status' => 'Resign',
            );
 
        // if(!empty($_FILES['photo']['name']))
        // {
        //     $upload = $this->_do_upload();
        //     $data['photo'] = $upload;
        // }
 
        $insert = $this->m_resign->save($data);
 
        echo json_encode(array("status" => TRUE));
    }
 
    public function ajax_update()
    {
        $this->_validate();
        $data = array(
                'keterangan_resign' => $this->input->post('keterangan_resign'),
                'tgl_resign' => date("Y-m-d"),
                'status' => 'Resign',
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
            // $m_resign = $this->m_resign->get_by_id($this->input->post('id'));
        //     if(file_exists('upload/'.$m_resign->photo) && $m_resign->photo)
        //         unlink('upload/'.$m_resign->photo);
 
        //     $data['photo'] = $upload;
        // }
 
        $this->m_resign->update(array('id' => $this->input->post('id')), $data);
        echo json_encode(array("status" => TRUE));
    }
 
    public function ajax_delete($id)
    {
        //delete file
        $m_resign = $this->m_resign->get_by_id($id);
        // if(file_exists('upload/'.$m_resign->photo) && $m_resign->photo)
        //     unlink('upload/'.$m_resign->photo);
         
        $this->m_resign->delete_by_id($id);
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
 
        // if($this->input->post('keterangan_resign') == '')
        // {
        //     $data['inputerror'][] = 'keterangan_resign';
        //     $data['error_string'][] = 'Masukkan Keterangan Resign';
        //     $data['status'] = FALSE;
        // }

        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    } 
}