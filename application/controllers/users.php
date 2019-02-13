<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {


    public function user_login(){
        $this->load->view('Login_form');


    }
    public function register_member(){
        $this->load->view('Member_Registration_form');


    }
    public function user_register(){
        $this->load->view('Register_form');
    }
    public function changeImage(){
        $image = $this->input->get('image');
        $this->load->view('Edit_Profile_Image',$image);
    }

    public function login(){

        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $this->load->model('user_model');
        $user_id = $this->user_model->login_user($username,$password);
        $validity_status = $this->user_model->check_validity($user_id);
        if($validity_status == 1){
            if($user_id){
                $user_image = $this->user_model->get_Image($user_id);
                $type = $this->user_model->get_Type($user_id);
                $firstName = $this->user_model->get_First_Name($user_id);
                $lastName = $this->user_model->get_Last_Name($user_id);
//            $sid = $this->user_model->get_School_ID($user_id);
//            if($sid == 'false'){
//                $sid = '*';
//            }
                $fullName = $firstName." ".$lastName;
                $user_data = array(
                    'user_id' => $user_id,
                    'username' => $username,
                    'imgUrl' => $user_image,
                    'type' => $type,
                    'fullname' => $fullName,
//                'sid' => $sid,
                    'logged_in' => true
                );

                $this->session->set_userdata($user_data);
                $this->session->set_flashdata('login_success','you are now logged in');
                $this->load->view('Home',$user_data);
            }else{


                $this->session->set_flashdata('login_failed','Username or Password is incorrect... Try again..');
                redirect('Welcome/login');
            }

        }else{
            $this->session->set_flashdata('login_failed','Username or Password is incorrect... Try again..');
            redirect('Welcome/login');
        }



    }

    public function logout(){
        //destroy the session
        $this->session->sess_destroy();
        redirect('Welcome/index');
    }
    public function editProfile(){
        $user_id = $this->session->userdata('user_id');
        if($user_id){
            $this->load->model('user_model');
            if(!$this->user_model->edit_Profile($user_id)){
                //User available in user table but unavailable in user_details table cannot happen
                //$this->load->view('error_404');
            }else{
                $data['instant_req'] = $this->user_model->edit_Profile($user_id);
                $this->load->view('Edit_user_profile',$data);
            }


        }
    }
    public function editUserProfile(){

        $id = $this->input->post('id');
        $first_name = $this->input->post('firstname');
        $last_name = $this->input->post('lastname');
        $email = $this->input->post('email');
        $type = $this->input->post('type');
        $contact_number = $this->input->post('contactnumber');
        $password = $this->input->post('password');


        $this->load->model('user_model');

        $user_id = $this->user_model->edit_User_Final($id,$first_name,$last_name,$email,$type,$contact_number,$password);

        $this->session->set_flashdata('edit_success','Details Successfully Changed');
        $this->editProfile();
    }

}
