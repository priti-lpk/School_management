<?php

class Teacher_att extends CI_Model {

    public function fetch_teacher() {
        $query = $this->db->query("SELECT * FROM `teacher_master`");
        return $query->result_array();
//        return $this->db->last_query();
    }

    function create($data) { {
            $this->db->insert('teacher_attendance_sheet', $data);
            $emp_id = $this->db->insert_id();
        }
        return $emp_id;
    }

    function check_attandance($date) { {
            $this->db->select('*');
            $this->db->from('teacher_attendance_sheet');
            $this->db->where('date', $date);
            $this->db->order_by('t_id', 'asc');
            $query = $this->db->get();
            return $query->result_array();
        }
    }

    public function update_attandance($data, $date, $id) {
        $this->db->where('date', $date);
        $this->db->where('t_id', $id);
        $this->db->update('teacher_attendance_sheet', $data);
    }

}
?>

