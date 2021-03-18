<?php

class Add_student extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url', 'form');
        $this->load->library('session');
//        if ($this->session->userdata('username')) {
//            
//        } else {
//            redirect(base_url(index));
//        }
    }

    public function index() {
        $this->load->model('Teacher/Student', 'student');
        $users = $this->student->all();
        $medium = $this->student->get_medium();
        $class = $this->student->get_class();
        $asub = $this->student->get_section();
        $data = array();
        $data['all'] = $users;
        $data['medium'] = $medium;
        $data['class'] = $class;
        $data['all_sub'] = $asub;
        $this->load->view('Teacher/create_student', $data);
    }

    public function get_class() {
        $this->load->model('Teacher/Student', 'student');
        $medium = $this->input->post('medium');
        $val = $this->student->getcls($medium);
        $output = '<select class="form-control select2 chosen" name="class_id" id="create_party" required="" >';
        $output .= '<option>Select Class</option>';
        foreach ($val as $row) {
            $output .= '<option value="' . $row->id . '">' . $row->class_name . '</option>';
        }
        $output .= '</select>';
        echo $output;
    }

    public function get_sub() {
        $this->load->model('Teacher/Student', 'student');
        $medium = $this->input->post('class');
        $val = $this->student->getsub($medium);
        $output = '<select class="form-control select2 chosen" name="section_id" id="subject_id" required="" >';
        $output .= '<option>Select Section</option>';
        foreach ($val as $row) {
            $output .= '<option value="' . $row->id . '">' . $row->section_name . '</option>';
        }
        $output .= '</select>';
        echo $output;
    }

    function insert_student() {
        $this->form_validation->set_rules('medium', 'medium', 'required');
        $this->form_validation->set_rules('s_grno', 's_grno', 'required');
        $this->form_validation->set_rules('s_surname', 's_surname', 'required');
        $this->form_validation->set_rules('s_name ', 's_name ', 'required');
        $this->form_validation->set_rules('s_fathername', 's_fathername', 'required');
        $this->form_validation->set_rules('s_address', 's_address', 'required');
        $this->form_validation->set_rules('s_dob', 's_dob', 'required');
        $this->form_validation->set_rules('s_religion', 's_religion', 'required');
        $this->form_validation->set_rules('class_id ', 'class_id ', 'required');
        $this->form_validation->set_rules('section_id', 'section_id', 'required');
        $this->form_validation->set_rules('blood_group', 'blood_group', 'required');
        $this->form_validation->set_rules('s_image', 's_image', 'required');
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');
        $this->load->model('Teacher/Student', 'student');
        $this->load->helper(array('form', 'url'));
        $url = $this->do_upload();
        $save = array(
            'medium' => $this->input->post('medium'),
            's_grno' => $this->input->post('s_grno'),
            's_surname' => $this->input->post('s_surname'),
            's_name ' => $this->input->post('s_name'),
            's_fathername' => $this->input->post('s_fathername'),
            's_address' => $this->input->post('s_address'),
            's_dob' => $this->input->post('s_dob'),
            's_religion ' => $this->input->post('s_religion'),
            'class_id' => $this->input->post('class_id'),
            'section_id' => $this->input->post('section_id'),
            'blood_group' => $this->input->post('blood_group'),
            's_image' => $url,
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password')),
        );
        $this->student->create($save);
        redirect(base_url() . 'Teacher/Add_student/');
    }

    function getdata_student($id) {
        $this->load->model('Teacher/Student', 'student');
        $users1 = $this->student->edit_id($id);
        $users = $this->student->all();
        $medium = $this->student->get_medium();
        $class = $this->student->fetch_class_id($id);
        $subject = $this->student->fetch_section_id($id);
        $data = array();
        $data['all'] = $users;
        $data['users'] = $users1;
        $data['medium'] = $medium;
        $data['class'] = $class;
        $data['all_sub'] = $subject;
//        print_r($data['all_sub']);
        $this->load->view('Teacher/create_student', $data);
    }

    function do_upload() {
        $this->db->select('id');
        $this->db->from('student_master');
        $this->db->order_by('id', 'desc');
        $result = $this->db->get()->row();
        if ($result == '') {
            $last_id = 0;
        } else {
            $last_id = $result->id;
        }
        $id = $last_id + 1;
        $filename = $_FILES["s_image"]["name"];
        $file_ext = pathinfo($filename, PATHINFO_EXTENSION);
        $image = $id . "." . $filename;
        $type = explode('.', $_FILES['s_image']['name']);
        $type = $type[count($type) - 1];
        $url = "Student/" . $image;
        if (in_array($type, array("jpg", "gif", "png", "jpeg", "PNG", "JPG", "GIF", "JPEG", "PDF", "pdf", "DOC", "doc")))
            if (is_uploaded_file($_FILES['s_image']['tmp_name']))
                if (move_uploaded_file($_FILES['s_image']['tmp_name'], $url))
                    return $image;
        return "";
    }

}

?>