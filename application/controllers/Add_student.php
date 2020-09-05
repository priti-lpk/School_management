<?php

class Add_student extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url', 'form');
        if ($this->session->userdata('username')) {
            
        } else {
            redirect(base_url(index));
        }
    }

    public function Index() {
        $this->load->model('Purchase', 'purchase');
        $this->load->view('create_student');
    }

}

?>