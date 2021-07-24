<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kriteria extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kriteria_model');
    }
    
    public function index()
    {
        $content['content'] = $this->load->view('kriteria/index', '', true);
        $this->load->view('_shared/layout', $content);
    }
    public function get()
    {
        echo json_encode($this->Kriteria_model->get());
    }
    public function post()
    {
        $data = json_decode($this->security->xss_clean($this->input->raw_input_stream), true);
        echo json_encode($this->Kriteria_model->save($data));
    }
    public function postsub()
    {
        $data = json_decode($this->security->xss_clean($this->input->raw_input_stream), true);
        echo json_encode($this->Kriteria_model->saveSub($data));
    }
    public function put()
    {
        $data = json_decode($this->security->xss_clean($this->input->raw_input_stream), true);
        echo json_encode($this->Kriteria_model->update($data));
    }
    public function putsub()
    {
        $data = json_decode($this->security->xss_clean($this->input->raw_input_stream), true);
        echo json_encode($this->Kriteria_model->updateSub($data));
    }
    public function delete($id= null)
    {
        echo json_encode($this->Kriteria_model->delete($id));
    }
    public function deleteSub($id= null)
    {
        echo json_encode($this->Kriteria_model->deleteSub($id));
    }

}

/* End of file Kriteria.php */
