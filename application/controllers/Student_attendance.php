<?php

class Student_attendance extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url', 'form');
        if ($this->session->userdata('username')) {
            
        } else {
            redirect(base_url(index));
        }
    }

    public function index() {
        $this->load->model('Student_att', 'student_att');
        $medium = $this->student_att->get_medium();
        $class = $this->student_att->get_class();
        $asub = $this->student_att->get_section();
        $data['medium'] = $medium;
        $data['class'] = $class;
        $data['all_sub'] = $asub;
        $this->load->view('student_attendance', $data);
    }

    public function insert_student_attendance() {
        $this->load->model('Student_att', 'student_att');
        $this->form_validation->set_rules('date', 'date', 'required');
        $this->form_validation->set_rules('s_id', 's_id', 'required');
        $this->form_validation->set_rules('s_attendance', 's_attendance', 'required');
        $this->form_validation->set_rules('medium_id', 'medium_id', 'required');
        $this->form_validation->set_rules('class_id', 'class_id', 'required');
        $this->form_validation->set_rules('section_id', 'section_id', 'required');
        $this->load->helper(array('form', 'url'));
        $date = $this->input->post('date');
        $data = $this->student_att->check_attandance($date[0]);
        $count = sizeof($data);
        if (($count != 0)) {
            $totalrow = count($this->input->post('s_id'));
            $k = 1;
            for ($i = 0; $i < $totalrow; $i++) {
                $date = $this->input->post('date');
                $s_id = $this->input->post('s_id');
                $medium_id = $this->input->post('medium_id');
                $class_id = $this->input->post('class_id');
                $section_id = $this->input->post('section_id');
                $s_attendance = $this->input->post('s_attendance' . $k);
                $arr[$i] = $s_attendance;
                $id = $s_id[$i];
                $data = array(
                    'date' => $date[$i],
                    's_id' => $s_id[$i],
                    'medium_id' => $medium_id[$i],
                    'class_id' => $class_id[$i],
                    'section_id' => $section_id[$i],
                    's_attendance' => $arr[$i][0]
                );
                $k++;
                $this->student_att->update_attandance($data, $date[0], $id);
            }
            redirect(base_url() . 'Student_attendance/');
        } else {
            $totalrow = count($this->input->post('s_id'));
            $k = 1;
            for ($i = 0; $i < $totalrow; $i++) {
                $date = $this->input->post('date');
                $s_id = $this->input->post('s_id');
                $medium_id = $this->input->post('medium_id');
                $class_id = $this->input->post('class_id');
                $section_id = $this->input->post('section_id');
                $s_attendance = $this->input->post('s_attendance' . $k);
                $arr[$i] = $s_attendance;
                $save = array(
                    'date' => $date[$i],
                    's_id' => $s_id[$i],
                    'medium_id' => $medium_id[$i],
                    'class_id' => $class_id[$i],
                    'section_id' => $section_id[$i],
                    's_attendance' => $arr[$i][0]
                );
                $k++;
                $this->student_att->create($save);
            }
            redirect(base_url() . 'Student_attendance/');
        }

    }

    function check_attandance() {
        $date = $this->input->GET('date');
        $medium_id = $this->input->GET('medium');
        $class_id = $this->input->GET('class_id');
        $section_id = $this->input->GET('section_id');
        $this->load->model('Student_att', 'student_att');
        $student = $this->student_att->fetch_student($medium_id, $class_id, $section_id);
        $medium = $this->student_att->get_medium();
        $class = $this->student_att->get_class();
        $asub = $this->student_att->get_section();
        $data = array();
        $data['all'] = $student;
        $data['date'] = $date;
        $data['medium'] = $medium;
        $data['class'] = $class;
        $data['all_sub'] = $asub;
        $data['medium_id'] = $medium_id;
        $data['class_id'] = $class_id;
        $data['section_id'] = $section_id;
        $data['check_attandance'] = $this->student_att->check_attandance($date);
//        print_r($data['check_attandance']);
        $this->load->view('student_attendance', $data);
    }

}

?>