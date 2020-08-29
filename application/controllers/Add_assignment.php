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
        $this->load->view('create_assignment');
    }

}
?>
<script type="text/javascript">
    $(document).ready(function () {
        $('.chosen').select2();
    });
</script>