<?php

class Add_teacher extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url', 'form');
        if ($this->session->userdata('username')) {
            
        } else {
            redirect(base_url(index));
        }
    }

    public function index() {
        $this->load->model('Teacher', 'teacher');
        $users = $this->teacher->all();
        $data = array();
        $data['all'] = $users;
        $this->load->view('create_teacher', $data);
    }

    function insert_teacher() {
        $this->form_validation->set_rules('t_fname', 't_fname', 'required');
        $this->form_validation->set_rules('t_lastname', 't_lastname', 'required');
        $this->form_validation->set_rules('t_mobno', 't_mobno', 'required');
        $this->form_validation->set_rules('village', 'village', 'required');
        $this->form_validation->set_rules('taluka', 'taluka', 'required');
        $this->form_validation->set_rules('district', 'district', 'required');
        $this->form_validation->set_rules('state', 'state', 'required');
        $this->form_validation->set_rules('pincode', 'pincode', 'required');
        $this->form_validation->set_rules('address', 'address', 'required');
        $this->form_validation->set_rules('t_religion', 't_religion', 'required');
        $this->form_validation->set_rules('joining_date', 'joining_date', 'required');
        $this->form_validation->set_rules('t_image', 't_image', 'required');
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');
        $this->load->model('Teacher', 'teacher');
        $this->load->helper(array('form', 'url'));
        $url = $this->do_upload();
        $save = array(
            't_fname' => $this->input->post('t_fname'),
            't_lastname' => $this->input->post('t_lastname'),
            't_mobno' => $this->input->post('t_mobno'),
            'village' => $this->input->post('village'),
            'taluka' => $this->input->post('taluka'),
            'district' => $this->input->post('district'),
            'state' => $this->input->post('state'),
            'pincode' => $this->input->post('pincode'),
            'address' => $this->input->post('address'),
            't_religion' => $this->input->post('t_religion'),
            'joining_date' => $this->input->post('joining_date'),
            't_image' => $url,
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password')),
        );
        $this->teacher->create($save);
        redirect(base_url() . 'Add_teacher/');
    }

    function getdata_teacher($id) {
        $this->load->model('Teacher', 'teacher');
        $users1 = $this->teacher->edit_id($id);
        $users = $this->teacher->all();
        $data = array();
        $data['all'] = $users;
        $data['users'] = $users1;
        $this->load->view('create_teacher', $data);
    }

    function edit_teacher($id) {
        $this->load->model('Teacher', 'teacher');
        $data1 = array();
        $users1 = $this->teacher->all();
        $users = $this->teacher->edit_id($id);
        $data['all'] = $users;
        $data['class'] = $users1;
        $this->form_validation->set_rules('t_fname', 't_fname', 'required');
        $this->form_validation->set_rules('t_lastname', 't_lastname', 'required');
        $this->form_validation->set_rules('t_mobno', 't_mobno', 'required');
        $this->form_validation->set_rules('village', 'village', 'required');
        $this->form_validation->set_rules('taluka', 'taluka', 'required');
        $this->form_validation->set_rules('district', 'district', 'required');
        $this->form_validation->set_rules('state', 'state', 'required');
        $this->form_validation->set_rules('pincode', 'pincode', 'required');
        $this->form_validation->set_rules('address', 'address', 'required');
        $this->form_validation->set_rules('t_religion', 't_religion', 'required');
        $this->form_validation->set_rules('joining_date', 'joining_date', 'required');
        $this->form_validation->set_rules('t_image', 't_image', 'required');
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');
        $filename = $_FILES["t_image"]["name"];
        $file_ext = pathinfo($filename, PATHINFO_EXTENSION);
        $image = $id . "." . $file_ext;
        $type = explode('.', $_FILES['t_image']['name']);
        $type = $type[count($type) - 1];
        $url = "Teachers/" . $image;
        $config['upload_path'] = './Teacher/'; //The path where the image will be save
        $config['allowed_types'] = 'jpg|jpeg|png|gif'; //Images extensions accepted
        $config['file_name'] = $image;
        $this->load->library('upload', $config); //Load the upload CI library
        $this->upload->overwrite = true; //image overwrite
        if (!$this->upload->do_upload('t_image')) {
            $uploadError = array('upload_error' => $this->upload->display_errors());
        }
        $data1 = array(
            't_fname' => $this->input->post('t_fname'),
            't_lastname' => $this->input->post('t_lastname'),
            't_mobno' => $this->input->post('t_mobno'),
            'village' => $this->input->post('village'),
            'taluka' => $this->input->post('taluka'),
            'district' => $this->input->post('district'),
            'state' => $this->input->post('state'),
            'pincode' => $this->input->post('pincode'),
            'address' => $this->input->post('address'),
            't_religion' => $this->input->post('t_religion'),
            'joining_date' => $this->input->post('joining_date'),
            't_image' => $image,
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password')),
        );
        $this->teacher->update_teacher($id, $data1);
        redirect(base_url('Add_teacher/'));
    }

    function delete_teacher($id) {
        $this->load->model('Teacher', 'teacher');
        $query_get_image = $this->db->get_where('teacher_master', array('id' => $id));
        foreach ($query_get_image->result() as $record) {
            $filename1 = $record->t_image;
            $filename .= "Teacher/" . $filename1;
            if (file_exists($filename)) {
                unlink($filename);
            }
            $this->teacher->delete_teacher($id);
            redirect(base_url('Add_teacher'));
        }
    }

    function do_upload() {
        $this->db->select('id');
        $this->db->from('teacher_master');
        $this->db->order_by('id', 'desc');
        $result = $this->db->get()->row();
        if ($result == '') {
            $last_id = 0;
        } else {
            $last_id = $result->id;
        }
        $id = $last_id + 1;
        $filename = $_FILES["t_image"]["name"];
        $file_ext = pathinfo($filename, PATHINFO_EXTENSION);
        $image = $id . "." . $file_ext;
        $type = explode('.', $_FILES['t_image']['name']);
        $type = $type[count($type) - 1];
        $url = "Teachers/" . $image;
        if (in_array($type, array("jpg", "gif", "png", "jpeg", "PNG", "JPG", "GIF", "JPEG")))
            if (is_uploaded_file($_FILES['t_image']['tmp_name']))
                if (move_uploaded_file($_FILES['t_image']['tmp_name'], $url))
                    return $image;
        return "";
    }

}

?>