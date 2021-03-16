<?php

class Add_assignment extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url', 'form');
        if ($this->session->userdata('username')) {
            
        } else {
            redirect(base_url(index));
        }
    }

    public function index() {
        $this->load->model('Teacher/Assignment', 'assignment');
        $users = $this->assignment->all();
        $medium = $this->assignment->get_medium();
        $class = $this->assignment->get_class();
        $asub = $this->assignment->get_all_subject();
        $data = array();
        $data['all'] = $users;
        $data['medium'] = $medium;
        $data['class'] = $class;
        $data['all_sub'] = $asub;
        $this->load->view('Teacher/create_assignment', $data);
    }

    public function get_class() {
        $this->load->model('Teacher/Assignment', 'assignment');
        $medium = $this->input->post('medium');
        $val = $this->assignment->getcls($medium);
        $output = '<select class="form-control select2 chosen" name="class_id" id="create_party" required="" >';
        $output .= '<option>Select Class</option>';
        foreach ($val as $row) {
            $output .= '<option value="' . $row->id . '">' . $row->class_name . '</option>';
        }
        $output .= '</select>';
        echo $output;
    }

    public function get_sub() {
        $this->load->model('Teacher/Assignment', 'assignment');
        $medium = $this->input->post('class');
        $val = $this->assignment->getsub($medium);
        $output = '<select class="form-control select2 chosen" name="subject_id" id="subject_id" required="" >';
        $output .= '<option>Select Subject</option>';
        foreach ($val as $row) {
            $output .= '<option value="' . $row->id . '">' . $row->subject_name . '</option>';
        }
        $output .= '</select>';
        echo $output;
    }

    function insert_assignment() {
        $this->form_validation->set_rules('medium', 'medium', 'required');
        $this->form_validation->set_rules('class_id', 'class_id', 'required');
        $this->form_validation->set_rules('subject_id', 'subject_id', 'required');
        $this->form_validation->set_rules('deadline ', 'deadline ', 'required');
        $this->form_validation->set_rules('file', 'file', 'required');
        $this->load->model('Teacher/Assignment', 'assignment');
        $this->load->helper(array('form', 'url'));
        $url = $this->do_upload();
        $save = array(
            'medium' => $this->input->post('medium'),
            'class_id' => $this->input->post('class_id'),
            'subject_id' => $this->input->post('subject_id'),
            'deadline ' => $this->input->post('deadline'),
            'file' => $url
        );
        $this->assignment->create($save);
        redirect(base_url() . 'Teacher/Add_assignment/');
    }

    function getdata_assignment($id) {
        $this->load->model('Teacher/Assignment', 'assignment');
        $users1 = $this->assignment->edit_id($id);
        $users = $this->assignment->all();
        $medium = $this->assignment->get_medium();
        $class = $this->assignment->fetch_class_id($id);
        $subject = $this->assignment->fetch_subject_id($id);
        $data = array();
        $data['all'] = $users;
        $data['users'] = $users1;
        $data['medium'] = $medium;
        $data['class'] = $class;
        $data['all_sub'] = $subject;
//        print_r($data['all_sub']);
        $this->load->view('Teacher/create_assignment', $data);
    }

    function do_upload() {
        $this->db->select('id');
        $this->db->from('create_assignment');
        $this->db->order_by('id', 'desc');
        $result = $this->db->get()->row();
        if ($result == '') {
            $last_id = 0;
        } else {
            $last_id = $result->id;
        }
        $id = $last_id + 1;
        $filename = $_FILES["file"]["name"];
        $file_ext = pathinfo($filename, PATHINFO_EXTENSION);
        $image = $id . "." . $filename;
        $type = explode('.', $_FILES['file']['name']);
        $type = $type[count($type) - 1];
        $url = "Assignment/" . $image;
        if (in_array($type, array("jpg", "gif", "png", "jpeg", "PNG", "JPG", "GIF", "JPEG", "PDF", "pdf", "DOC", "doc")))
            if (is_uploaded_file($_FILES['file']['tmp_name']))
                if (move_uploaded_file($_FILES['file']['tmp_name'], $url))
                    return $image;
        return "";
    }

}

?>