<?php
class User_Search_Model extends CI_Model
{
    function fetch_data($data1,$data2,$data3)
    {

        if($data3 == 1){
            $this->db->select('user.email,user.first_name,user.last_name,user.type,user.id,user.contact_number,user.flag,user_role.username');
            $this->db->from('user');
            $this->db->join('user_role','user_role.user_id=user.id','Left');
            //$this->db->where('user.flag',1);

            if ($data1 != '' || $data2 != '' || $data3 != '' ){
                $this->db->like('user.first_name', $data1);
                $this->db->like('user.type', $data2);

            }

            $this->db->order_by('id', 'DESC');
            return $this->db->get();

        }else if($data3 == 2){
            $this->db->select('user.email,user.first_name,user.last_name,user.type,user.id,user.contact_number,user.flag,user_role.username');
            $this->db->from('user');
            $this->db->join('user_role','user_role.user_id=user.id');
            $this->db->where('user.flag',1);

            if ($data1 != '' || $data2 != '' || $data3 != '' ){
                $this->db->like('user.first_name', $data1);
                $this->db->like('user.type', $data2);

            }

            $this->db->order_by('id', 'DESC');
            return $this->db->get();

        }else if($data3 == 3){
            $this->db->select('user.email,user.first_name,user.last_name,user.type,user.id,user.contact_number,user.flag,user_role.username');
            $this->db->from('user');
            $this->db->join('user_role','user_role.user_id=user.id','Left');
            $this->db->where('user_role.username',null);

            if ($data1 != '' || $data2 != '' || $data3 != '' ){
                $this->db->like('user.first_name', $data1);
                $this->db->like('user.type', $data2);

            }

            $this->db->order_by('id', 'DESC');
            return $this->db->get();

        }else if($data3 == 4){
            $this->db->select('user.email,user.first_name,user.last_name,user.type,user.id,user.contact_number,user.flag,user_role.username');
            $this->db->from('user');
            $this->db->join('user_role','user_role.user_id=user.id');
            $this->db->where('user.flag',0);

            if ($data1 != '' || $data2 != '' || $data3 != '' ){
                $this->db->like('user.first_name', $data1);
                $this->db->like('user.type', $data2);

            }

            $this->db->order_by('id', 'DESC');
            return $this->db->get();

        }


    }
    //get the users those who has not access to the system (Not Assigned)
    function fetch_assign_users($data1,$data2,$data3){

        $this->db->select('user.email,user.first_name,user.last_name,user.type,user.id,user_role.username');
        $this->db->from('user');
        $this->db->join('user_role','user_role.user_id=user.id','Left');
        $this->db->where('user_role.username', null);


        if ($data1 != '' || $data2 != '' || $data3 != '' ){
            $this->db->like('user.first_name', $data1);
            $this->db->like('user.type', $data2);

        }

        $this->db->order_by('id', 'DESC');
        return $this->db->get();
    }

    //Fetch Student Data by searching any Field
    function fetch_student_data($data1){
        $this->db->select('student.id,student.first_name,student.last_name,student.email,student.contact_number,student.address,events.title');
        $this->db->from('student');
        $this->db->join('events','events.id=student.event_id','Left');


        if ($data1 != ''){
            $this->db->like('student.first_name', $data1);
            $this->db->like('student.last_name', $data1);
            $this->db->like('student.email', $data1);
            $this->db->like('student.contact_number', $data1);
            $this->db->like('student.address', $data1);
            $this->db->like('events.title', $data1);


        }
        return $this->db->get();
    }
    function fetch_username($data1){

//        $this->db->select("*");
//        $this->db->from("user_role");

        if ($data1 != ''){
//          $this->db->like('type', $data1);

            $this->db->select('*'); // <-- There is never any reason to write this line!
            $this->db->from('user_role');
            $this->db->join('user', 'user_role.user_id = user.id');
            $this->db->like('user_role.type', $data1);
            $this->db->like('user.flag', 0);

            $query = $this->db->get();

        }
        return $query;

//        $this->db->order_by('uid', 'DESC');
//        return $this->db->get();
    }

}
?>
