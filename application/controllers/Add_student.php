<?php

class Add_student extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url', 'form');
        if ($this->session->userdata('username')) {
            
        } else {
            redirect(base_url(index));
        }
    }

    public function index() {
        $this->load->model('Student', 'student');
        $users = $this->student->all();
        $medium = $this->student->get_medium();
        $class = $this->student->get_class();
        $asub = $this->student->get_section();
        $data = array();
        $data['all'] = $users;
        $data['medium'] = $medium;
        $data['class'] = $class;
        $data['all_sub'] = $asub;
        $this->load->view('create_student', $data);
    }

    public function get_class() {
        $this->load->model('Student', 'student');
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
        $this->load->model('Student', 'student');
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
        $this->load->model('Student', 'student');
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
        redirect(base_url() . 'Add_student/');
    }

    function getdata_student($id) {
        $this->load->model('Student', 'student');
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
        $this->load->view('create_student', $data);
    }

    function edit_student($id) {
        $this->load->model('Student', 'student');
        $data1 = array();
        $users1 = $this->student->all();
        $users = $this->student->edit_id($id);
        $data['all'] = $users;
        $data['class'] = $users1;
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
        $filename = $_FILES["s_image"]["name"];
        if ($filename == '') {
            $data1 = array(
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
                'username' => $this->input->post('username'),
                'password' => md5($this->input->post('password')),
            );
        } else {
            $file_ext = pathinfo($filename, PATHINFO_EXTENSION);
            $image = $id . "." . $file_ext;
            $type = explode('.', $_FILES['s_image']['name']);
            $type = $type[count($type) - 1];
            $url = "Student/" . $image;
            $config['upload_path'] = './Student/'; //The path where the image will be save
            $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|doc|docx'; //Images extensions accepted
            $config['file_name'] = $image;
            $this->load->library('upload', $config); //Load the upload CI library
            $this->upload->overwrite = true; //image overwrite
            if (!$this->upload->do_upload('s_image')) {
                $uploadError = array('upload_error' => $this->upload->display_errors());
            }
            $data1 = array(
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
                's_image' => $image,
                'username' => $this->input->post('username'),
                'password' => md5($this->input->post('password')),
            );
        }

        $this->student->update_student($id, $data1);
        redirect(base_url() . 'Add_student/');
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