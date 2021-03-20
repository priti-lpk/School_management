<?php

class View_holiday extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
    }

    public function index() {

        $this->load->model('Parent/Holiday', 'holiday');
        $users = $this->holiday->all();
        $data = array();
        $data['all'] = $users;
        $this->load->view('Parent/View_holiday', $data);
    }
}

?>