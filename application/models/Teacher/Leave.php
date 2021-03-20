<?php

class Leave extends CI_Model {

    public function all() {
        $this->db->select('*');
        $this->db->from('create_leave');
        $users2 = $this->db->get()->result_array();
        return $users2;
    }

    public function SendReply($id, $data) {
        $this->db->where("id", $id);
        $this->db->update("create_leave", $data);
        //return $this->db->last_query();'
        if ($this->db->trans_status() == FALSE) {
            return false;
        } else {
            return true;
        }
    }

}

?>