<?php

class View_leave extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
    }

    public function index() {

        $this->load->model('Teacher/Leave', 'leave');
        $users = $this->leave->all();
        $data = array();
        $data['all'] = $users;
        $this->load->view('Teacher/View_leave', $data);
    }

    public function SendLeaveReply() {
        $this->load->model('Teacher/Leave', 'leave');
        $id = $this->input->post('leave_id');
        $data = array(
            'leave_reply' => $this->input->post('leave_reply'),
        );
        $result = $this->leave->SendReply($id, $data);
       // echo $result;
        $responce = array();

        if ($result == '1') {
            $responce = array("status" => TRUE, "msg" => "Operation Successful!");
        } else {

            $responce = array("status" => FALSE, "msg" => "Oops Operation Fail");
        }
       // print_r($responce);
        echo json_encode($responce);
    }

}

?>