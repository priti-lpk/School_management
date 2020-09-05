<?php

class Add_section extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url', 'form');
        if ($this->session->userdata('username')) {
            
        } else {
            redirect(base_url(index));
        }
    }

    public function index() {
        $this->load->model('Section', 'section');
        $users = $this->section->all();
        $medium = $this->section->get_medium();
//        $class = $this->section->get_class();
        $data = array();
        $data['class'] = $users;
        $data['medium'] = $medium;
        $this->load->view('create_section',$data);
    }

}

?>