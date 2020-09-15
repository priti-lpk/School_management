<?php

class Add_event extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url', 'form');
        if ($this->session->userdata('username')) {
            
        } else {
            redirect(base_url(index));
        }
    }

    public function index() {
        $this->load->model('Event', 'event');
        $users = $this->event->all();
        $data = array();
        $data['all'] = $users;
        $this->load->view('create_event', $data);
    }

    function insert_event() {
        $this->form_validation->set_rules('title', 'title', 'required');
        $this->form_validation->set_rules('date', 'date', 'required');
        $this->form_validation->set_rules('photo', 'photo', 'required');
        $this->form_validation->set_rules('details', 'details', 'required');
        $this->load->model('Event', 'event');
        $this->load->helper(array('form', 'url'));
        $url = $this->do_upload();
        $save = array(
            'title' => $this->input->post('title'),
            'date' => $this->input->post('date'),
            'photo' => $url,
            'details' => $this->input->post('details'),
        );
        $this->event->create($save);
        redirect(base_url() . 'Add_event/');
    }

    function getdata_event($id) {
        $this->load->model('Event', 'event');
        $users1 = $this->event->edit_id($id);
        $users = $this->event->all();
        $data = array();
        $data['all'] = $users;
        $data['users'] = $users1;
        $this->load->view('create_event', $data);
    }

    function edit_event($id) {
        $this->load->model('Event', 'event');
        $data1 = array();
        $users1 = $this->event->all();
        $users = $this->event->edit_id($id);
        $data['all'] = $users;
        $data['class'] = $users1;
        $this->form_validation->set_rules('title', 'title', 'required');
        $this->form_validation->set_rules('date', 'date', 'required');
        $this->form_validation->set_rules('photo', 'photo', 'required');
        $this->form_validation->set_rules('details', 'details', 'required');
        $filename = $_FILES["photo"]["name"];
        $file_ext = pathinfo($filename, PATHINFO_EXTENSION);
        $image = $id . "." . $file_ext;
        $type = explode('.', $_FILES['photo']['name']);
        $type = $type[count($type) - 1];
        $url = "Event/" . $image;
        $config['upload_path'] = './Event/'; //The path where the image will be save
        $config['allowed_types'] = 'jpg|jpeg|png|gif'; //Images extensions accepted
        $config['file_name'] = $image;
        $this->load->library('upload', $config); //Load the upload CI library
        $this->upload->overwrite = true; //image overwrite
        if (!$this->upload->do_upload('photo')) {
            $uploadError = array('upload_error' => $this->upload->display_errors());
        }
        $data1 = array(
            'title' => $this->input->post('title'),
            'date' => $this->input->post('date'),
            'photo' => $image,
            'details' => $this->input->post('details'),
        );
        $this->event->update_event($id, $data1);
        redirect(base_url('Add_event/'));
    }

    function delete_event($id) {
        $this->load->model('Event', 'event');
        $query_get_image = $this->db->get_where('create_event', array('id' => $id));
        foreach ($query_get_image->result() as $record) {
            $filename1 = $record->photo;
            $filename .= "Event/" . $filename1;
            if (file_exists($filename)) {
                unlink($filename);
            }
            $this->event->delete_event($id);
            redirect(base_url('Add_event'));
        }
    }

    function do_upload() {
        $this->db->select('id');
        $this->db->from('create_event');
        $this->db->order_by('id', 'desc');
        $result = $this->db->get()->row();
        if ($result == '') {
            $last_id = 0;
        } else {
            $last_id = $result->id;
        }
        $id = $last_id + 1;
        $filename = $_FILES["photo"]["name"];
        $file_ext = pathinfo($filename, PATHINFO_EXTENSION);
        $image = $id . "." . $file_ext;
        $type = explode('.', $_FILES['photo']['name']);
        $type = $type[count($type) - 1];
        $url = "Event/" . $image;
        if (in_array($type, array("jpg", "gif", "png", "jpeg", "PNG", "JPG", "GIF", "JPEG")))
            if (is_uploaded_file($_FILES['photo']['tmp_name']))
                if (move_uploaded_file($_FILES['photo']['tmp_name'], $url))
                    return $image;
        return "";
    }

}

?>