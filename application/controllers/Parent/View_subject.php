<?php

class View_subject extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
    }

    public function index() {

        $this->load->model('Parent/Subject', 'subject');
        $users = $this->subject->all();
        $data = array();
        $data['all'] = $users;
        $this->load->view('Parent/View_subject', $data);
    }
}

?>