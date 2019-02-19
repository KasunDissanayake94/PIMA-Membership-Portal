<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MemberController extends CI_Controller {


function index(){
		$this->load->model('member_model');
		$data['userdata'] = $this->member_model->getAllData();
        $this->load->view("member_view",$data);
    }

}