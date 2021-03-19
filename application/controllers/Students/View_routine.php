<?php

class View_routine extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
    }

    public function index() {

        $this->load->model('Students/Routine', 'routine');
        $users = $this->routine->all();
        $data = array();
        $data['all'] = $users;
        $this->load->view('Students/View_routine', $data);
    }
}

?>