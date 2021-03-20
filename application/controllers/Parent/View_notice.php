<?php

class View_notice extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
    }

    public function index() {

        $this->load->model('Parent/Notice', 'notice');
        $users = $this->notice->all();
        $data = array();
        $data['all'] = $users;
        $this->load->view('Parent/View_notice', $data);
    }
}

?>