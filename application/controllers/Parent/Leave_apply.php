<?php

class Leave_apply extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url', 'form');
        if ($this->session->userdata('username')) {
            
        } else {
            redirect(base_url(index));
        }
    }

    public function index() {
        $this->load->model('Parent/Leave', 'leave');
        $users = $this->leave->all();
        $data = array();
        $data['all'] = $users;
        $this->load->view('Parent/Leave_apply', $data);
    }

    function insert_leave() {
        $this->form_validation->set_rules('date', 'date', 'required');
        $this->form_validation->set_rules('leave_msg', 'leave_msg', 'required');
        $this->form_validation->set_rules('leave_file', 'leave_file', 'required');
        $this->load->model('Parent/Leave', 'leave');
        $this->load->helper(array('form', 'url'));
        $this->db->select('*');
        $this->db->from('parents_master');
        $this->db->where('username=', $this->session->userdata('username'));
        $users1 = $this->db->get()->row_array();
        $this->db->select('*');
        $this->db->from('student_master');
        $this->db->where('id=', $users1['s_id']);
        $users = $this->db->get()->row_array();
        $url = $this->do_upload();
        $save = array(
            'medium_id' => $users['medium'],
            'class_id' => $users['class_id'],
            'section_id' => $users['section_id'],
            's_id' => $users['id'],
            'date' => $this->input->post('date'),
            'leave_msg' => $this->input->post('leave_msg'),
            'leave_file' => $url,
        );
        $this->leave->create($save);
        redirect(base_url() . 'Parent/Leave_apply');
    }

    function getdata_leave($id) {
        $this->load->model('Parent/Leave', 'leave');
        $users1 = $this->leave->edit_id($id);
        $users = $this->leave->all();
        $data = array();
        $data['all'] = $users;
        $data['users'] = $users1;
        $this->load->view('Parent/Leave_apply', $data);
    }

    function edit_leave($id) {
        $this->load->model('Parent/Leave', 'leave');
        $data1 = array();
        $users1 = $this->leave->all();
        $users = $this->leave->edit_id($id);
        $data['all'] = $users;
        $data['class'] = $users1;
        $this->form_validation->set_rules('date', 'date', 'required');
        $this->form_validation->set_rules('leave_msg', 'leave_msg', 'required');
        $this->form_validation->set_rules('leave_file', 'leave_file', 'required');
        $filename = $_FILES["leave_file"]["name"];
        if ($filename == '') {
            $data1 = array(
                'date' => $this->input->post('date'),
                'leave_msg' => $this->input->post('leave_msg'),
            );
        } else {
            $file_ext = pathinfo($filename, PATHINFO_EXTENSION);
            $image = $id . "." . $file_ext;
            $type = explode('.', $_FILES['leave_file']['name']);
            $type = $type[count($type) - 1];
            $url = "Leave/" . $image;
            $config['upload_path'] = './Leave/'; //The path where the image will be save
            $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|doc|docx'; //Images extensions accepted
            $config['file_name'] = $image;
            $this->load->library('upload', $config); //Load the upload CI library
            $this->upload->overwrite = true; //image overwrite
            if (!$this->upload->do_upload('leave_file')) {
                $uploadError = array('upload_error' => $this->upload->display_errors());
            }
            $data1 = array(
                'date' => $this->input->post('date'),
                'leave_msg' => $this->input->post('leave_msg'),
                'leave_file' => $image,
            );
        }

        $this->leave->update_leave($id, $data1);
        redirect(base_url('Parent/Leave_apply/'));
    }

    function delete_leave($id) {
        $this->load->model('Parent/Leave', 'leave');
        $query_get_image = $this->db->get_where('create_leave', array('id' => $id));
        foreach ($query_get_image->result() as $record) {
            $filename1 = $record->leave_file;
            $filename .= "Leave/" . $filename1;
            if (file_exists($filename)) {
                unlink($filename);
            }
            $this->leave->delete_leave($id);
            redirect(base_url('Parent/Leave_apply/'));
        }
    }

    function do_upload() {
        $this->db->select('id');
        $this->db->from('create_leave');
        $this->db->order_by('id', 'desc');
        $result = $this->db->get()->row();
        if ($result == '') {
            $last_id = 0;
        } else {
            $last_id = $result->id;
        }
        $id = $last_id + 1;
        $filename = $_FILES["leave_file"]["name"];
        $file_ext = pathinfo($filename, PATHINFO_EXTENSION);
        $image = $id . "." . $file_ext;
        $type = explode('.', $_FILES['leave_file']['name']);
        $type = $type[count($type) - 1];
        $url = "Leave/" . $image;
        if (in_array($type, array("jpg", "gif", "png", "jpeg", "PNG", "JPG", "GIF", "JPEG", "pdf", "PDF", "doc", "DOC","docx")))
            if (is_uploaded_file($_FILES['leave_file']['tmp_name']))
                if (move_uploaded_file($_FILES['leave_file']['tmp_name'], $url))
                    return $image;
        return "";
    }

}

?>