<?php

class View_assignment extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
    }

    public function index() {

        $this->load->model('Students/Assignment', 'assignment');
        $users = $this->assignment->all();
        $data = array();
        $data['all'] = $users;
        $this->load->view('Students/View_assignment', $data);
    }
}

?>