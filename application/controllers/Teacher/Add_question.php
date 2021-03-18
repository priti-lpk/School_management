<?php

class Add_question extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url', 'form');
        if ($this->session->userdata('username')) {
            
        } else {
            redirect(base_url(index));
        }
    }

    public function index() {
        $this->load->model('Teacher/Question', 'question');
        $users = $this->question->all();
        $medium = $this->question->get_medium();
        $class = $this->question->get_class();
        $type = $this->question->get_level();
        $data = array();
        $data['all'] = $users;
        $data['medium'] = $medium;
        $data['class'] = $class;
        $data['level'] = $type;
        $this->load->view('Teacher/create_question', $data);
    }

    public function get_class() {
        $this->load->model('Teacher/Question', 'question');
        $medium = $this->input->post('medium');
        $val = $this->question->getcls($medium);
        $output = '<select class="form-control select2 chosen" name="class_id" id="class_id" required="">';
        $output .= '<option>Select Class</option>';
        foreach ($val as $row) {
            $output .= '<option value="' . $row->id . '">' . $row->class_name . '</option>';
        }
        $output .= '</select>';
        echo $output;
    }

    function insert_question() {
        $this->form_validation->set_rules('medium', 'Medium', 'required');
        $this->form_validation->set_rules('class_id', 'Class_id', 'required');
        $this->form_validation->set_rules('level_id', 'level_id', 'required');
        $this->form_validation->set_rules('question', 'question', 'required');
        $this->form_validation->set_rules('option_a', 'option_a', 'required');
        $this->form_validation->set_rules('option_b', 'option_b', 'required');
        $this->form_validation->set_rules('option_c', 'option_c', 'required');
        $this->form_validation->set_rules('option_d', 'option_d', 'required');
        $this->form_validation->set_rules('answer', 'answer', 'required');
        $this->form_validation->set_rules('image', 'image', 'required');
        $this->form_validation->set_rules('mark', 'mark', 'required');
        $this->load->model('Teacher/Question', 'question');
        $this->load->helper(array('form', 'url'));
        $url = $this->do_upload();
        $save = array(
            'medium' => $this->input->post('medium'),
            'class_id' => $this->input->post('class_id'),
            'level_id' => $this->input->post('level_id'),
            'question' => $this->input->post('question'),
            'option_a' => $this->input->post('option_a'),
            'option_b' => $this->input->post('option_b'),
            'option_c' => $this->input->post('option_c'),
            'option_d' => $this->input->post('option_d'),
            'answer' => $this->input->post('answer'),
            'image' => $url,
            'mark' => $this->input->post('mark'),
        );
        $this->question->create($save);
        redirect(base_url() . 'Teacher/Add_question/');
    }

    function getdata_question($id) {
        $this->load->model('Teacher/Question', 'question');
        $users1 = $this->question->edit_id($id);
        $users = $this->question->all();
        $medium = $this->question->get_medium();
        $class_id = $this->question->fetch_class_id($id);
        $type = $this->question->get_level();
        $data = array();
        $data['all'] = $users;
        $data['medium'] = $medium;
        $data['users'] = $users1;
        $data['class'] = $class_id;
        $data['level'] = $type;
        $this->load->view('Teacher/create_question', $data);
    }

    function edit_question($id) {
        $this->load->model('Teacher/Question', 'question');
        $data1 = array();
        $users1 = $this->question->all();
        $users = $this->question->edit_id($id);
        $data['all'] = $users;
        $data['class'] = $users1;
        $this->form_validation->set_rules('medium', 'Medium', 'required');
        $this->form_validation->set_rules('class_id', 'Class_id', 'required');
        $this->form_validation->set_rules('level_id', 'level_id', 'required');
        $this->form_validation->set_rules('question', 'question', 'required');
        $this->form_validation->set_rules('option_a', 'option_a', 'required');
        $this->form_validation->set_rules('option_b', 'option_b', 'required');
        $this->form_validation->set_rules('option_c', 'option_c', 'required');
        $this->form_validation->set_rules('option_d', 'option_d', 'required');
        $this->form_validation->set_rules('answer', 'answer', 'required');
        $this->form_validation->set_rules('image', 'image', 'required');
        $this->form_validation->set_rules('mark', 'mark', 'required');
        $filename = $_FILES["image"]["name"];
        $file_ext = pathinfo($filename, PATHINFO_EXTENSION);
        $image = $id . "." . $file_ext;
        $type = explode('.', $_FILES['image']['name']);
        $type = $type[count($type) - 1];
        $url = "Question/" . $image;
        $config['upload_path'] = './Question/'; //The path where the image will be save
        $config['allowed_types'] = 'jpg|jpeg|png|gif'; //Images extensions accepted
        $config['file_name'] = $image;
        $this->load->library('upload', $config); //Load the upload CI library
        $this->upload->overwrite = true; //image overwrite
        if (!$this->upload->do_upload('image')) {
            $uploadError = array('upload_error' => $this->upload->display_errors());
        }
        $data1 = array(
           'medium' => $this->input->post('medium'),
            'class_id' => $this->input->post('class_id'),
            'level_id' => $this->input->post('level_id'),
            'question' => $this->input->post('question'),
            'option_a' => $this->input->post('option_a'),
            'option_b' => $this->input->post('option_b'),
            'option_c' => $this->input->post('option_c'),
            'option_d' => $this->input->post('option_d'),
            'answer' => $this->input->post('answer'),
            'image' => $image,
            'mark' => $this->input->post('mark'),
        );
        $this->question->update_question($id, $data1);
        redirect(base_url('Teacher/Add_question/'));
    }

    function delete_question($id) {
        $this->load->model('Teacher/Question', 'question');
        $query_get_image = $this->db->get_where('create_question', array('id' => $id));
        foreach ($query_get_image->result() as $record) {
            $filename1 = $record->image;
            $filename .= "Question/" . $filename1;
            if (file_exists($filename)) {
                unlink($filename);
            }
            $this->question->delete_question($id);
            redirect(base_url('Teacher/Add_question'));
        }
    }

    function do_upload() {
        $this->db->select('id');
        $this->db->from('create_question');
        $this->db->order_by('id', 'desc');
        $result = $this->db->get()->row();
        if ($result == '') {
            $last_id = 0;
        } else {
            $last_id = $result->id;
        }
        $id = $last_id + 1;
        $filename = $_FILES["image"]["name"];
        $file_ext = pathinfo($filename, PATHINFO_EXTENSION);
        $image = $id . "." . $file_ext;
        $type = explode('.', $_FILES['image']['name']);
        $type = $type[count($type) - 1];
        $url = "Question/" . $image;
        if (in_array($type, array("jpg", "gif", "png", "jpeg", "PNG", "JPG", "GIF", "JPEG")))
            if (is_uploaded_file($_FILES['image']['tmp_name']))
                if (move_uploaded_file($_FILES['image']['tmp_name'], $url))
                    return $image;
        return "";
    }

}

?>