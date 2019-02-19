<?php
 
class Member_model extends CI_Model {
     
    public function getAllData(){
		$query=$this->db->query("select * from member");
		return $query->result();
		
	}
    //Register Members and Give access credentials to them
    public function register_Member($first_name,$surname,$personal_email,$type,$mobile_1,$imgUrl){

        $data = array(
            'first_name'=>$first_name,
            'last_name'=>$surname,
            'email'=>$personal_email,
            'type'=>$type,
            'contact_number'=>$mobile_1,
            'imgUrl'=>$imgUrl
        );

        $this->db->insert('user',$data);

        return $this->db->insert_id();
    }

    //Assign User Role to them as Member
    public function assign_Member($uid,$username,$password,$type){
        $data = array(
            'user_id'=>$uid,
            'username'=>$username,
            'password'=>$password,
            'type'=>$type,

        );

        $this->db->insert('user_role',$data);

        return ($this->db->affected_rows() != 1) ? false : true;
    }
}
