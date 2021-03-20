<?php

class View_syllabus extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
    }

    public function index() {

        $this->load->model('Parent/Syllabus', 'syllabus');
        $users = $this->syllabus->all();
        $data = array();
        $data['all'] = $users;
        $this->load->view('Parent/View_syllabus', $data);
    }
}

?>