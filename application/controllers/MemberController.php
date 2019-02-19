<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MemberController extends CI_Controller {


function index(){
		$this->load->model('member_model');
		$data['userdata'] = $this->member_model->getAllData();
        $this->load->view("member_view",$data);
    }
    //Add Members to the System and Give Access to the System
    public function registerMemberToSystem(){
        $id = $this->input->post('id');
        $first_name = $this->input->post('first_name');
        $surname = $this->input->post('surname');
        $mobile_1 = $this->input->post('mobile_1');
        $personal_email = $this->input->post('personal_email');
        $imgUrl = $this->input->post('imgUrl');
        $type = 'Member';
        $username = 'Member'.$id;
        $password = 123;

        $this->load->model("Member_model");
        $user_id = $this->Member_model->register_Member($first_name,$surname,$personal_email,$type,$mobile_1,$imgUrl);
        if($user_id){
            $result = $this->Member_model->assign_Member($user_id,$username,$password,$type);
            if($result){
                echo 'Done';
                die();
                //Member table eke flag eka 1 krnna
            }else{
                echo 'Error';
                die();

            }

        }else{
            echo 'Error';
            die();

        }

    }

}