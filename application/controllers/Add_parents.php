<?php

class Add_parents extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url', 'form');
        if ($this->session->userdata('username')) {
            
        } else {
            redirect(base_url(index));
        }
    }

    public function index() {
        $this->load->model('Parents', 'parents');
        $users = $this->parents->all();
        $medium = $this->parents->get_medium();
        $class = $this->parents->get_class();
        $asub = $this->parents->get_student();
        $data = array();
        $data['all'] = $users;
        $data['medium'] = $medium;
        $data['class'] = $class;
        $data['all_stu'] = $asub;
        $this->load->view('create_parents', $data);
    }

    public function get_class() {
        $this->load->model('Parents', 'parents');
        $medium = $this->input->post('medium');
        $val = $this->parents->getcls($medium);
        $output = '<select class="form-control select2 chosen" name="class_id" id="create_party" required="" >';
        $output .= '<option>Select Class</option>';
        foreach ($val as $row) {
            $output .= '<option value="' . $row->id . '">' . $row->class_name . '</option>';
        }
        $output .= '</select>';
        echo $output;
    }

    public function get_sub() {
        $this->load->model('Parents', 'parents');
        $medium = $this->input->post('class');
        $val = $this->parents->getsub($medium);
        $output = '<select class="form-control select2 chosen" name="s_id" id="subject_id" required="" >';
        $output .= '<option>Select Student</option>';
        foreach ($val as $row) {
            $output .= '<option value="' . $row['id'] . '">' . $row['s_surname'] . ' ' . $row['s_name'] . ' ' . $row['s_fathername'] . '</option>';
        }
        $output .= '</select>';
        echo $output;
    }

    function insert_parents() {
        $this->form_validation->set_rules('p_fname', 'p_fname', 'required');
        $this->form_validation->set_rules('p_mname', 'p_mname', 'required');
        $this->form_validation->set_rules('p_surname', 'p_surname', 'required');
        $this->form_validation->set_rules('s_mothername', 's_mothername', 'required');
        $this->form_validation->set_rules('p_mobno1', 'p_mobno1', 'required');
        $this->form_validation->set_rules('p_mobno2', 'p_mobno2', 'required');
        $this->form_validation->set_rules('village', 'village', 'required');
        $this->form_validation->set_rules('taluka', 'taluka', 'required');
        $this->form_validation->set_rules('district', 'district', 'required');
        $this->form_validation->set_rules('state', 'state', 'required');
        $this->form_validation->set_rules('pin_code', 'pin_code', 'required');
        $this->form_validation->set_rules('address', 'address', 'required');
        $this->form_validation->set_rules('proof', 'proof', 'required');
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');
        $this->form_validation->set_rules('medium', 'medium', 'required');
        $this->form_validation->set_rules('class_id', 'class_id', 'required');
        $this->form_validation->set_rules('s_id', 's_id', 'required');
        $this->load->model('Parents', 'parents');
        $this->load->helper(array('form', 'url'));
        $url = $this->do_upload();
        $save = array(
            'p_fname' => $this->input->post('p_fname'),
            'p_mname' => $this->input->post('p_mname'),
            'p_surname' => $this->input->post('p_surname'),
            's_mothername' => $this->input->post('s_mothername'),
            'p_mobno1' => $this->input->post('p_mobno1'),
            'p_mobno2' => $this->input->post('p_mobno2'),
            'village' => $this->input->post('village'),
            'taluka' => $this->input->post('taluka'),
            'district' => $this->input->post('district'),
            'state' => $this->input->post('state'),
            'pin_code' => $this->input->post('pin_code'),
            'address' => $this->input->post('address'),
            'proof' => $url,
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password')),
            'medium' => $this->input->post('medium'),
            'class_id' => $this->input->post('class_id'),
            's_id' => $this->input->post('s_id'),
        );
        $this->parents->create($save);
        redirect(base_url() . 'Add_parents/');
    }

    function getdata_parents($id) {
        $this->load->model('Parents', 'parents');
        $users1 = $this->parents->edit_id($id);
        $users = $this->parents->all();
        $medium = $this->parents->get_medium();
        $class = $this->parents->fetch_class_id($id);
        $asub = $this->parents->fetch_stu_id($id);
        $data = array();
        $data['all'] = $users;
        $data['users'] = $users1;
        $data['class'] = $class;
        $data['medium'] = $medium;
        $data['all_stu'] = $asub;
        $this->load->view('create_parents', $data);
    }

    function edit_parents($id) {
        $this->load->model('Parents', 'parents');
        $data1 = array();
        $users1 = $this->parents->all();
        $users = $this->parents->edit_id($id);
        $data['all'] = $users;
        $data['class'] = $users1;
        $this->form_validation->set_rules('p_fname', 'p_fname', 'required');
        $this->form_validation->set_rules('p_mname', 'p_mname', 'required');
        $this->form_validation->set_rules('p_surname', 'p_surname', 'required');
        $this->form_validation->set_rules('s_mothername', 's_mothername', 'required');
        $this->form_validation->set_rules('p_mobno1', 'p_mobno1', 'required');
        $this->form_validation->set_rules('p_mobno2', 'p_mobno2', 'required');
        $this->form_validation->set_rules('village', 'village', 'required');
        $this->form_validation->set_rules('taluka', 'taluka', 'required');
        $this->form_validation->set_rules('district', 'district', 'required');
        $this->form_validation->set_rules('state', 'state', 'required');
        $this->form_validation->set_rules('pin_code', 'pin_code', 'required');
        $this->form_validation->set_rules('address', 'address', 'required');
        $this->form_validation->set_rules('proof', 'proof', 'required');
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');
        $this->form_validation->set_rules('medium', 'medium', 'required');
        $this->form_validation->set_rules('class_id', 'class_id', 'required');
        $this->form_validation->set_rules('s_id', 's_id', 'required');
        $filename = $_FILES["proof"]["name"];
        if ($filename == '') {
            $data1 = array(
                'p_fname' => $this->input->post('p_fname'),
                'p_mname' => $this->input->post('p_mname'),
                'p_surname' => $this->input->post('p_surname'),
                's_mothername' => $this->input->post('s_mothername'),
                'p_mobno1' => $this->input->post('p_mobno1'),
                'p_mobno2' => $this->input->post('p_mobno2'),
                'village' => $this->input->post('village'),
                'taluka' => $this->input->post('taluka'),
                'district' => $this->input->post('district'),
                'state' => $this->input->post('state'),
                'pin_code' => $this->input->post('pin_code'),
                'address' => $this->input->post('address'),
                'username' => $this->input->post('username'),
                'password' => md5($this->input->post('password')),
                'medium' => $this->input->post('medium'),
                'class_id' => $this->input->post('class_id'),
                's_id' => $this->input->post('s_id'),
            );
        } else {
            $file_ext = pathinfo($filename, PATHINFO_EXTENSION);
            $image = $id . "." . $file_ext;
            $type = explode('.', $_FILES['proof']['name']);
            $type = $type[count($type) - 1];
            $url = "Parents/" . $image;
            $config['upload_path'] = './Parents/'; //The path where the image will be save
            $config['allowed_types'] = 'jpg|jpeg|png|gif'; //Images extensions accepted
            $config['file_name'] = $image;
            $this->load->library('upload', $config); //Load the upload CI library
            $this->upload->overwrite = true; //image overwrite
            if (!$this->upload->do_upload('proof')) {
                $uploadError = array('upload_error' => $this->upload->display_errors());
            }
            $data1 = array(
                'p_fname' => $this->input->post('p_fname'),
                'p_mname' => $this->input->post('p_mname'),
                'p_surname' => $this->input->post('p_surname'),
                's_mothername' => $this->input->post('s_mothername'),
                'p_mobno1' => $this->input->post('p_mobno1'),
                'p_mobno2' => $this->input->post('p_mobno2'),
                'village' => $this->input->post('village'),
                'taluka' => $this->input->post('taluka'),
                'district' => $this->input->post('district'),
                'state' => $this->input->post('state'),
                'pin_code' => $this->input->post('pin_code'),
                'address' => $this->input->post('address'),
                'proof' => $image,
                'username' => $this->input->post('username'),
                'password' => md5($this->input->post('password')),
                'medium' => $this->input->post('medium'),
                'class_id' => $this->input->post('class_id'),
                's_id' => $this->input->post('s_id'),
            );
        }
        $this->parents->update_parents($id, $data1);
        redirect(base_url('Add_parents/'));
    }

    function delete_parents($id) {
        $this->load->model('Parents', 'parents');
        $query_get_image = $this->db->get_where('parents_master', array('id' => $id));
        foreach ($query_get_image->result() as $record) {
            $filename1 = $record->proof;
            $filename .= "Parents/" . $filename1;
            if (file_exists($filename)) {
                unlink($filename);
            }
            $this->parents->delete_parents($id);
            redirect(base_url('Add_parents'));
        }
    }

    function do_upload() {
        $this->db->select('id');
        $this->db->from('parents_master');
        $this->db->order_by('id', 'desc');
        $result = $this->db->get()->row();
        if ($result == '') {
            $last_id = 0;
        } else {
            $last_id = $result->id;
        }
        $id = $last_id + 1;
        $filename = $_FILES["proof"]["name"];
        $file_ext = pathinfo($filename, PATHINFO_EXTENSION);
        $image = $id . "." . $file_ext;
        $type = explode('.', $_FILES['proof']['name']);
        $type = $type[count($type) - 1];
        $url = "Parents/" . $image;
        if (in_array($type, array("jpg", "gif", "png", "jpeg", "PNG", "JPG", "GIF", "JPEG", "pdf", "PDF", "doc", "DOC")))
            if (is_uploaded_file($_FILES['proof']['tmp_name']))
                if (move_uploaded_file($_FILES['proof']['tmp_name'], $url))
                    return $image;
        return "";
    }

}

?>