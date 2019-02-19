<?php
 
class Member_model extends CI_Model {
     
    public function getAllData(){
		$query=$this->db->query("select * from member");
		return $query->result();
		
	}
}
