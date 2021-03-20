<?php

class View_event extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
    }

    public function index() {

        $this->load->model('Parent/Event', 'event');
        $users = $this->event->all();
        $data = array();
        $data['all'] = $users;
        $this->load->view('Parent/View_event', $data);
    }
}

?>