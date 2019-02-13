<?php
class Student_search_model extends CI_Model
{

    //Fetch Student Data by searching any Field
    function fetch_student_data($data1){

        $this->db->select('student.id,student.first_name,student.last_name,student.email,student.mobile_number,student.address,student.residence_number,student_ex.value');
        $this->db->from('student');
        $this->db->join('student_ex','student_ex.student_id=student.id','Left');


        if ($data1 != ''){
            $this->db->like('student.first_name', $data1);
            $this->db->or_like('student.last_name', $data1);
            $this->db->or_like('student.email', $data1);
            $this->db->or_like('student.mobile_number', $data1);
            $this->db->or_like('student.address', $data1);
            $this->db->or_like('student.residence_number', $data1);
            $this->db->or_like('student_ex.value', $data1);


        }
        return $this->db->get();
    }
    //Show selected student details for edit
    function edit_Student($id){
        $this->db->where('id',$id);
        $this->db->select('id,first_name,last_name,email,address,mobile_number,residence_number,address,event_id');
        $user_data = $this->db->get('student');
        if($user_data->num_rows() > 0)
        {
            foreach ($user_data->result() as $row)
            {
                $data[] = $row;
            }
            return $data;
        }
        return false;

    }
    function edit_Student_Ex($id){
        $this->db->where('student_id',$id);
        $this->db->select('key,value');
        $user_data = $this->db->get('student_ex');
        if($user_data->num_rows() > 0)
        {
            foreach ($user_data->result() as $row)
            {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
    public function edit_Student_Details($id,$first_name,$last_name,$email,$address,$mobile_number,$residence_number,$event_id){

        $data = array('first_name' => $first_name,'last_name' => $last_name, 'email' => $email , 'address'=> $address , 'mobile_number'=>$mobile_number , 'residence_number'=>$residence_number, 'event_id'=>$event_id );
        $this->db->where('id', $id);
        $this->db->update('student', $data);

        return ($this->db->affected_rows() != 1) ? false : true;

    }

}
?>
