<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Periode extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Periode_model');
    }
    
    public function index()
    {
        $content['content'] = $this->load->view('periode/index', '', true);
        $this->load->view('_shared/layout', $content);
    }
    public function get()
    {
        echo json_encode($this->Periode_model->get());
    }
    public function post()
    {
        $data = json_decode($this->security->xss_clean($this->input->raw_input_stream), true);
        echo json_encode($this->Periode_model->save($data));
    }
    public function put()
    {
        $data = json_decode($this->security->xss_clean($this->input->raw_input_stream), true);
        echo json_encode($this->Periode_model->update($data));
    }
    public function delete()
    {
        $id = $this->input->get('id');
        echo json_encode($this->Periode_model->delete($id));
    }

}

/* End of file Periode.php */
