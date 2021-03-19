<?php

class View_subject extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
    }

    public function index() {

        $this->load->model('Students/Subject', 'subject');
        $users = $this->subject->all();
        $data = array();
        $data['all'] = $users;
        $this->load->view('Students/View_subject', $data);
    }
}

?>