<?php

class Exam_attendance extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url', 'form');
        if ($this->session->userdata('username')) {
            
        } else {
            redirect(base_url(index));
        }
    }

    public function index() {
        $date = $this->input->GET('date');
        $medium_id = $this->input->GET('medium');
        $class_id = $this->input->GET('class_id');
        $section_id = $this->input->GET('section_id');
        $exam_id = $this->input->GET('exam_id');
        $subject_id = $this->input->GET('subject_id');
        $this->load->model('Exam_att', 'exam_att');
        $student = $this->exam_att->fetch_student($medium_id, $class_id, $section_id);
        $medium = $this->exam_att->get_medium();
        $class = $this->exam_att->get_class();
        $asub = $this->exam_att->get_section();
        $exam = $this->exam_att->get_exam();
        $subject = $this->exam_att->get_subject();
        $data = array();
        $data['all'] = $student;
        $data['date'] = $date;
        $data['medium'] = $medium;
        $data['class'] = $class;
        $data['all_sub'] = $asub;
        $data['exam'] = $exam;
        $data['subject'] = $subject;
        $data['medium_id'] = $medium_id;
        $data['class_id'] = $class_id;
        $data['section_id'] = $section_id;
        $data['exam_id'] = $exam_id;
        $data['subject_id'] = $subject_id;
        $this->load->view('Teacher/exam_attendance', $data);
    }

    public function insert_exam_attendance() {
        $this->load->model('Exam_att', 'exam_att');
        $this->form_validation->set_rules('date', 'date', 'required');
        $this->form_validation->set_rules('s_id', 's_id', 'required');
        $this->form_validation->set_rules('stu_attendance', 'stu_attendance', 'required');
        $this->form_validation->set_rules('medium_id', 'medium_id', 'required');
        $this->form_validation->set_rules('class_id', 'class_id', 'required');
        $this->form_validation->set_rules('section_id', 'section_id', 'required');
        $this->form_validation->set_rules('exam_id', 'exam_id', 'required');
        $this->form_validation->set_rules('subject_id', 'subject_id', 'required');
        $this->load->helper(array('form', 'url'));
        $date = $this->input->post('date');

        $data = $this->exam_att->check_attandance($date[0]);
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
                $exam_id = $this->input->post('exam_id');
                $subject_id = $this->input->post('subject_id');
                $s_attendance = $this->input->post('stu_attendance' . $k);
                $arr[$i] = $s_attendance;
                $id = $s_id[$i];
                $data = array(
                    'date' => $date[$i],
                    's_id' => $s_id[$i],
                    'medium_id' => $medium_id[$i],
                    'class_id' => $class_id[$i],
                    'section_id' => $section_id[$i],
                    'stu_attendance' => $arr[$i][0],
                    'exam_id' => $exam_id[$i],
                    'subject_id' => $subject_id[$i]
                );
                $k++;
                $this->exam_att->update_attandance($data, $date[0], $id);
            }
            redirect(base_url() . 'Teacher/Exam_attendance/');
        } else {
            $totalrow = count($this->input->post('s_id'));
            $k = 1;
            for ($i = 0; $i < $totalrow; $i++) {
                $date = $this->input->post('date');
                $s_id = $this->input->post('s_id');
                $medium_id = $this->input->post('medium_id');
                $class_id = $this->input->post('class_id');
                $section_id = $this->input->post('section_id');
                $exam_id = $this->input->post('exam_id');
                $subject_id = $this->input->post('subject_id');
                $s_attendance = $this->input->post('stu_attendance' . $k);
                $arr[$i] = $s_attendance;
                $save = array(
                    'date' => $date[$i],
                    's_id' => $s_id[$i],
                    'medium_id' => $medium_id[$i],
                    'class_id' => $class_id[$i],
                    'section_id' => $section_id[$i],
                    'stu_attendance' => $arr[$i][0],
                    'exam_id' => $exam_id[$i],
                    'subject_id' => $subject_id[$i]
                );
                $k++;
                $this->exam_att->create($save);
            }
            redirect(base_url() . 'Teacher/Exam_attendance/');
        }
    }

    function check_attandance() {
        $this->load->model('Teacher/Exam_att', 'exam_att');
        $date = $this->input->GET('date');
        $medium_id = $this->input->GET('medium');
        $class_id = $this->input->GET('class_id');
        $section_id = $this->input->GET('section_id');
        $exam_id = $this->input->GET('exam_id');
        $subject_id = $this->input->GET('subject_id');
        $medium = $this->exam_att->get_medium();
        $class = $this->exam_att->get_class();
        $asub = $this->exam_att->get_section();
        $exam = $this->exam_att->get_exam();
        $subject = $this->exam_att->get_subject();
        $student = $this->exam_att->fetch_student($medium_id, $class_id, $section_id);
        $data = array();
        $data['all'] = $student;
        $data['date'] = $date;
        $data['medium'] = $medium;
        $data['class'] = $class;
        $data['all_sub'] = $asub;
        $data['exam'] = $exam;
        $data['subject'] = $subject;
        $data['medium_id'] = $medium_id;
        $data['class_id'] = $class_id;
        $data['section_id'] = $section_id;
        $data['exam_id'] = $exam_id;
        $data['subject_id'] = $subject_id;
        $data['check_attandance'] = $this->exam_att->check_attandance($date);
        $this->load->view('Teacher/exam_attendance', $data);
    }

}

?>