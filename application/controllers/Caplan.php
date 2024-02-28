<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Caplan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('m_caplan');
    }

    public function index()
    {
        $this->load->helper('url');
        
        $this->load->view('navbar');
        $this->load->view('caplan_view');
    }
 
    public function ajax_list()
    {
        $this->load->helper('url');
 
        $list = $this->m_caplan->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $m_caplan) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $m_caplan->area;
            $row[] = $m_caplan->layanan;
            $row[] = $m_caplan->jumlah_caplan;
            $row[] = $m_caplan->tgl_input;
            $row[] = $m_caplan->upd;
            $row[] = $m_caplan->tgl_awal;
            $row[] = $m_caplan->tgl_akhir;
            // if($m_caplan->photo)
            //     $row[] = '<a href="'.base_url('upload/'.$m_caplan->photo).'" target="_blank"><img src="'.base_url('upload/'.$m_caplan->photo).'" class="img-responsive" /></a>';
            // else
            //     $row[] = '(No photo)';
 
            //add html for action
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_caplan('."'".$m_caplan->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_caplan('."'".$m_caplan->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
         
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->m_caplan->count_all(),
                        "recordsFiltered" => $this->m_caplan->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }
 
    public function ajax_edit($id)
    {
        $data = $this->m_caplan->get_by_id($id);
        // $data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
        echo json_encode($data);
    }
 
    public function ajax_add()
    {
        $this->_validate();
         
        $data = array(
                'area' => $this->input->post('area'),
                'layanan' => $this->input->post('layanan'),
                'jumlah_caplan' => $this->input->post('jumlah_caplan'),
                'tgl_input' => $this->input->post('tgl_input'),
                'upd' => $this->input->post('upd'),
                'tgl_awal' => $this->input->post('tgl_awal'),
                'tgl_akhir' => $this->input->post('tgl_akhir'),
            );
 
        // if(!empty($_FILES['photo']['name']))
        // {
        //     $upload = $this->_do_upload();
        //     $data['photo'] = $upload;
        // }
        $total_cek_tanggal = $this->m_caplan->cek_tanggal_caplan($this->input->post('tgl_awal'), $this->input->post('tgl_akhir'),
        $this->input->post('area'), $this->input->post('layanan'));
        if($total_cek_tanggal > 0 ) {
            echo json_encode(array("status" => TRUE, "cek" => "ada"));
        }
        else {
            $insert = $this->m_caplan->save($data);
            echo json_encode(array("status" => TRUE));
        }
    }
 
    public function ajax_update()
    {
        $this->_validate();
        $data = array(
                'area' => $this->input->post('area'),
                'layanan' => $this->input->post('layanan'),
                'jumlah_caplan' => $this->input->post('jumlah_caplan'),
                'tgl_input' => $this->input->post('tgl_input'),
                'upd' => $this->input->post('upd'),
                'tgl_awal' => $this->input->post('tgl_awal'),
                'tgl_akhir' => $this->input->post('tgl_akhir'),
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
            // $m_caplan = $this->m_caplan->get_by_id($this->input->post('id'));
        //     if(file_exists('upload/'.$m_caplan->photo) && $m_caplan->photo)
        //         unlink('upload/'.$m_caplan->photo);
 
        //     $data['photo'] = $upload;
        // }
 
        $this->m_caplan->update(array('id' => $this->input->post('id')), $data);
        echo json_encode(array("status" => TRUE));
    }
 
    public function ajax_delete($id)
    {
        //delete file
        $m_caplan = $this->m_caplan->get_by_id($id);
        // if(file_exists('upload/'.$m_caplan->photo) && $m_caplan->photo)
        //     unlink('upload/'.$m_caplan->photo);
         
        $this->m_caplan->delete_by_id($id);
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
 
        if($this->input->post('area') == '')
        {
            $data['inputerror'][] = 'area';
            $data['error_string'][] = 'Area is required';
            $data['status'] = FALSE;
        }

        if($this->input->post('layanan') == '')
        {
            $data['inputerror'][] = 'layanan';
            $data['error_string'][] = 'Layanan is required';
            $data['status'] = FALSE;
        }

        if($this->input->post('jumlah_caplan') == '')
        {
            $data['inputerror'][] = 'jumlah_caplan';
            $data['error_string'][] = 'Jumlah caplan is required';
            $data['status'] = FALSE;
        }

        if($this->input->post('tgl_input') == '')
        {
            $data['inputerror'][] = 'tgl_input';
            $data['error_string'][] = 'Tanggal Input is required';
            $data['status'] = FALSE;
        }

        if($this->input->post('upd') == '')
        {
            $data['inputerror'][] = 'upd';
            $data['error_string'][] = 'UPD is required';
            $data['status'] = FALSE;
        }

        if($this->input->post('tgl_awal') == '')
        {
            $data['inputerror'][] = 'tgl_awal';
            $data['error_string'][] = 'Tanggal Awal is required';
            $data['status'] = FALSE;
        }

        if($this->input->post('tgl_akhir') == '')
        {
            $data['inputerror'][] = 'tgl_akhir';
            $data['error_string'][] = 'Tanggal Akhir is required';
            $data['status'] = FALSE;
        }
 
        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }
 
}