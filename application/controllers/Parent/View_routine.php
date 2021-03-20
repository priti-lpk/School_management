<?php

class View_routine extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
    }

    public function index() {

        $this->load->model('Parent/Routine', 'routine');
        $users = $this->routine->all();
        $data = array();
        $data['all'] = $users;
        $this->load->view('Parent/View_routine', $data);
    }
}

?>