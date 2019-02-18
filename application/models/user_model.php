<?php

class User_model extends CI_Model {
    public function login_user($username, $password){

        $this->db->where('username',$username);
        $this->db->where('password',$password);

        $result = $this->db->get('user_role');

        if($result->num_rows()==1){
            return $result->row(0)->user_id;
        }else{
            return false;
        }
    }
    //Register New Members
    public function register_member($arr){
        $this->db->insert('member',$arr);

        return ($this->db->affected_rows() != 1) ? false : true;

    }
    public function get_Image($user_id){
        $this->db->where('id',$user_id);
        $this->db->select('img_url');
        $user_data = $this->db->get('user');
        if($user_data->num_rows() > 0)
        {
            return $user_data->row(0)->img_url;
        }
        return false;
    }
    public function get_Type($user_id){
        $this->db->where('id',$user_id);
        $this->db->select('type');
        $user_data = $this->db->get('user');
        if($user_data->num_rows() > 0)
        {
            return $user_data->row(0)->type;
        }
        return false;
    }

    public function get_First_Name($user_id){
        $this->db->where('id',$user_id);
        $this->db->select('first_name');
        $user_data = $this->db->get('user');
        if($user_data->num_rows() > 0)
        {
            return $user_data->row(0)->first_name;
        }
        return false;
    }


    public function get_Last_Name($user_id){
        $this->db->where('id',$user_id);
        $this->db->select('last_name');
        $user_data = $this->db->get('user');
        if($user_data->num_rows() > 0)
        {
            return $user_data->row(0)->last_name;
        }
        return false;
    }

    //Get the details of logged user to edit own profile
    public function edit_Profile($user_id){
        $this->db->where('id',$user_id);
        $this->db->select('id,first_name,last_name,email,type,contact_number,imgUrl');
        $user_data = $this->db->get('user');
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
    public function edit_User_Final($id,$first_name,$last_name,$email,$type,$contact_number,$password){

        $data = array(
            'first_name'=>$first_name,
            'last_name'=>$last_name,
            'email'=>$email,
            'contact_number'=>$contact_number,
        );
        $data1 = array(
            'password'=>$password,

        );
        $this->db->where('id', $id);
        $this->db->update('user', $data);
        $this->db->where('user_id', $id);
        $this->db->update('user_role', $data1);


        if($this->db->affected_rows() == 1){
            return true;
        }else{
            return false;
        }
    }

    //Image edit and uplaod

    public function upload_image($file_name,$user_id){
        $data = array(
            'imgUrl'=>$file_name,

        );

        $this->db->where('id', $user_id);
        $this->db->update('user', $data);
        // modify session
        $this->session->set_userdata('imgUrl',$file_name);
        return ($this->db->affected_rows() != 1) ? false : true;
    }
    //Get the number of students in the system
    public function getNumberOfStudents(){
        $this->db->order_by('cid', 'DESC');
        $this->db->where('did', 4);
        $query = $this->db->get('schoolcontacts');
        return $query;
    }
    //Get the number of Schools in the system
    public function getNumberOfSchools(){
        $this->db->order_by('sid', 'DESC');
        $query = $this->db->get('schooldetails');
        return $query;

    }
    //Get the number of Users in the system
    public function getNumberOfUsers(){
        $this->db->order_by('uid', 'DESC');
        $query = $this->db->get('userdetails');
        return $query;

    }
    //Get the number of School Contacts in the system
    public function getNumberOfSchoolContacts(){
        $this->db->order_by('cid', 'DESC');
        $query = $this->db->get('schoolcontacts');
        return $query;

    }
    public function getCountOfCallLogs($start_date,$end_date){
        $this->db->where('date >=', $start_date);
        $this->db->where('date <=', $end_date);
        $this->db->where('category_id', 1);
        $query =  $this->db->get('posts');
        if ( $query->num_rows() > 0 )
        {
            return $query->num_rows();
        }
        else
        {
            return 0;
        }

    }
    public function getCountOfMailLogs($start_date,$end_date){
        $this->db->where('date >=', $start_date);
        $this->db->where('date <=', $end_date);
        $this->db->where('category_id', 3);
        $query =  $this->db->get('posts');
        if ( $query->num_rows() > 0 )
        {
            return $query->num_rows();
        }
        else
        {
            return 0;
        }

    }
    public function getCountOfEmailLogs($start_date,$end_date){
        $this->db->where('date >=', $start_date);
        $this->db->where('date <=', $end_date);
        $this->db->where('category_id', 2);
        $query =  $this->db->get('posts');
        if ( $query->num_rows() > 0 )
        {
            return $query->num_rows();
        }
        else
        {
            return 0;
        }

    }
    public function getCountOfOtherLogs($start_date,$end_date){
        $this->db->where('date >=', $start_date);
        $this->db->where('date <=', $end_date);
        $this->db->where('category_id', 4);
        $query =  $this->db->get('posts');
        if ( $query->num_rows() > 0 )
        {
            return $query->num_rows();
        }
        else
        {
            return 0;
        }

    }

    //Check user is already deleted user or not

    public function check_validity($user_id){
        $this->db->where('id',$user_id);
        $this->db->select('flag');
        $user_data = $this->db->get('user');
        if($user_data->num_rows() > 0)
        {
            return $user_data->row(0)->flag;
        }
        return false;
    }

}

?>
