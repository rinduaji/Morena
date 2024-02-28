<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontrak extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('m_kontrak');
    }

    public function index()
    {
        $this->load->helper('url');
        
        $data['kandidat'] = $this->m_kontrak->nama_kandidat();
        
        $this->load->view('navbar');
        $this->load->view('kontrak_view',$data);
    }
 
    public function ajax_list()
    {
        $this->load->helper('url');
 
        $list = $this->m_kontrak->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $m_kontrak) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $m_kontrak->nama;
            $row[] = $m_kontrak->area;
            $row[] = $m_kontrak->treg;
            $row[] = $m_kontrak->no_hp1;
            $row[] = $m_kontrak->email;
            $row[] = $m_kontrak->no_ktp;
            $row[] = $m_kontrak->jenis_kontrak;
            $row[] = $m_kontrak->no_kontrak;
            $row[] = $m_kontrak->perner;
            $row[] = $m_kontrak->status_kontrak;
            $row[] = $m_kontrak->awal_kontrak;
            $row[] = $m_kontrak->akhir_kontrak;
            $row[] = $m_kontrak->jabatan;
            // if($m_kontrak->photo)
            //     $row[] = '<a href="'.base_url('upload/'.$m_kontrak->photo).'" target="_blank"><img src="'.base_url('upload/'.$m_kontrak->photo).'" class="img-responsive" /></a>';
            // else
            //     $row[] = '(No photo)';
 
            //add html for action
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_kontrak('."'".$m_kontrak->id_kontrak."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_kontrak('."'".$m_kontrak->id_kontrak."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
         
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->m_kontrak->count_all(),
                        "recordsFiltered" => $this->m_kontrak->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }
 
    public function ajax_edit($id)
    {
        $data = $this->m_kontrak->get_by_id($id);
        // $data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
        echo json_encode($data);
    }
 
    public function ajax_add()
    {
        $this->_validate();
         
        $data = array(
                'id_kandidat' => $this->input->post('id_kandidat'),
                'jenis_kontrak' => $this->input->post('jenis_kontrak'),
                'no_kontrak' => $this->input->post('no_kontrak'),
                'perner' => $this->input->post('perner'),
                'status_kontrak' => $this->input->post('status_kontrak'),
                'awal_kontrak' => $this->input->post('awal_kontrak'),
                'akhir_kontrak' => $this->input->post('akhir_kontrak'),
                'jabatan' => $this->input->post('jabatan'),
                'upd' => $this->input->post('upd'),
            );
 
        // if(!empty($_FILES['photo']['name']))
        // {
        //     $upload = $this->_do_upload();
        //     $data['photo'] = $upload;
        // }
 
        $insert = $this->m_kontrak->save($data);
 
        echo json_encode(array("status" => TRUE));
    }
 
    public function ajax_update()
    {
        $this->_validate();
        $data = array(
                'id_kandidat' => $this->input->post('id_kandidat'),
                'jenis_kontrak' => $this->input->post('jenis_kontrak'),
                'no_kontrak' => $this->input->post('no_kontrak'),
                'perner' => $this->input->post('perner'),
                'status_kontrak' => $this->input->post('status_kontrak'),
                'awal_kontrak' => $this->input->post('awal_kontrak'),
                'akhir_kontrak' => $this->input->post('akhir_kontrak'),
                'jabatan' => $this->input->post('jabatan'),
                'upd' => $this->input->post('upd'),
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
            // $m_kontrak = $this->m_kontrak->get_by_id($this->input->post('id'));
        //     if(file_exists('upload/'.$m_kontrak->photo) && $m_kontrak->photo)
        //         unlink('upload/'.$m_kontrak->photo);
 
        //     $data['photo'] = $upload;
        // }
 
        $this->m_kontrak->update(array('id_kontrak' => $this->input->post('id_kontrak')), $data);
        echo json_encode(array("status" => TRUE));
    }
 
    public function ajax_delete($id)
    {
        //delete file
        $m_kontrak = $this->m_kontrak->get_by_id($id);
        // if(file_exists('upload/'.$m_kontrak->photo) && $m_kontrak->photo)
        //     unlink('upload/'.$m_kontrak->photo);
         
        $this->m_kontrak->delete_by_id($id);
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
 
        if($this->input->post('id_kandidat') == '')
        {
            $data['inputerror'][] = 'id_kandidat';
            $data['error_string'][] = 'Please select Nama';
            $data['status'] = FALSE;
        }
 
        if($this->input->post('jenis_kontrak') == '')
        {
            $data['inputerror'][] = 'jenis_kontrak';
            $data['error_string'][] = 'Jenis Kontrak is required';
            $data['status'] = FALSE;
        }
 
        if($this->input->post('no_kontrak') == '')
        {
            $data['inputerror'][] = 'no_kontrak';
            $data['error_string'][] = 'NO Kontrak is required';
            $data['status'] = FALSE;
        }
 
        if($this->input->post('perner') == '')
        {
            $data['inputerror'][] = 'perner';
            $data['error_string'][] = 'Perner is required';
            $data['status'] = FALSE;
        }

        if($this->input->post('status_kontrak') == '')
        {
            $data['inputerror'][] = 'status_kontrak';
            $data['error_string'][] = 'Status Kontrak is required';
            $data['status'] = FALSE;
        }

        if($this->input->post('awal_kontrak') == '')
        {
            $data['inputerror'][] = 'awal_kontrak';
            $data['error_string'][] = 'Awal Kontrak is required';
            $data['status'] = FALSE;
        }

        if($this->input->post('akhir_kontrak') == '')
        {
            $data['inputerror'][] = 'akhir_kontrak';
            $data['error_string'][] = 'Akhir Kontrak is required';
            $data['status'] = FALSE;
        }

        if($this->input->post('jabatan') == '')
        {
            $data['inputerror'][] = 'jabatan';
            $data['error_string'][] = 'Jabatan is required';
            $data['status'] = FALSE;
        }

        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    } 
}