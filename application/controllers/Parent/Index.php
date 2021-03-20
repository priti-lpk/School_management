<?php

class Index extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
    }

    public function index() {

        $this->load->view('Parent/index');
    }

    function verifyUser() {

        $username = $this->input->post('user_username');
        $password = md5($this->input->post('user_pass'));

        $this->load->model('Parent/LoginModel');

        if ($this->LoginModel->Loginn($username, $password)) {
            $this->session->set_userdata('username', $username);
            redirect(base_url('Parent/Index/dashboard'));
        } else {

            $data = array(
                'msg' => 'Authentication Fail!'
            );
            $this->session->set_flashdata('msg', 'Authentication Fail!');
            redirect(base_url('Parent/Index/'));
        }
    }

    public function dashboard() {
        $this->load->view('Parent/Dashboard');
    }

}

?>