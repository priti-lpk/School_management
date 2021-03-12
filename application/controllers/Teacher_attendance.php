<?php

class Teacher_attendance extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url', 'form');
        if ($this->session->userdata('username')) {
            
        } else {
            redirect(base_url(index));
        }
    }

    public function index() {
//        
        $this->load->view('teacher_attendance');
    }

    public function insert_teacher_attendance() {
        $this->load->model('Teacher_att', 'teacher_att');
        $this->form_validation->set_rules('date', 'date', 'required');
        $this->form_validation->set_rules('t_id', 't_id', 'required');
        $this->form_validation->set_rules('t_attendance', 't_attendance', 'required');
        $this->load->helper(array('form', 'url'));
        $date = $this->input->post('date');

        $data = $this->teacher_att->check_attandance($date[0]);
        $count = sizeof($data);

        if (($count != 0)) {
            $totalrow = count($this->input->post('t_id'));
            $k = 1;
            for ($i = 0; $i < $totalrow; $i++) {
                $date = $this->input->post('date');
                $t_id = $this->input->post('t_id');
                $t_attendance = $this->input->post('t_attendance' . $k);
                $arr[$i] = $t_attendance;
                $id = $t_id[$i];
                $data = array(
                    'date' => $date[$i],
                    't_id' => $t_id[$i],
                    't_attendance' => $arr[$i][0]
                );
                $k++;
                $this->teacher_att->update_attandance($data, $date[0], $id);
            }
            redirect(base_url() . 'Teacher_attendance/');
        } else {

            $totalrow = count($this->input->post('t_id'));
            $k = 1;
            for ($i = 0; $i < $totalrow; $i++) {
                $date = $this->input->post('date');
                $t_id = $this->input->post('t_id');
                $t_attendance = $this->input->post('t_attendance' . $k);
                $arr[$i] = $t_attendance;
                $save = array(
                    'date' => $date[$i],
                    't_id' => $t_id[$i],
                    't_attendance' => $arr[$i][0]
                );
                $k++;
                $this->teacher_att->create($save);
            }
            redirect(base_url() . 'Teacher_attendance/');
        }
    }

    function check_attandance() {
        $this->load->model('Teacher_att', 'teacher_att');
        $date = $this->input->get('date');
        $teacher = $this->teacher_att->fetch_teacher();
        $data = array();
        $data['all'] = $teacher;
        $data['date'] = $date;
        $data['check_attandance'] = $this->teacher_att->check_attandance($date);
        $this->load->view('teacher_attendance', $data);
    }

}

?>