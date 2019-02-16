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


                $this->session->set_flashdata('login_failed','Invalid Username or Password');
                redirect('Welcome/login');
            }

        }else{
            $this->session->set_flashdata('login_failed','Invalid Username or Password');
            redirect('Welcome/login');
        }



    }
    public function member_register(){
        $title = $this->input->post('title');
        $first_name = $this->input->post('first_name');
        $surname = $this->input->post('surname');
        $full_name = $this->input->post('full_name');
        $nic = $this->input->post('nic');
        $passport_no= $this->input->post('passport_no');
        $mobile_1 = $this->input->post('mobile_1');
        $mobile_2 = $this->input->post('mobile_2');
        $personal_email = $this->input->post('personal_email');
        $office_email = $this->input->post('office_email');
        $res_address1 = $this->input->post('res_address1');
        $res_address2 = $this->input->post('res_address2');
        $res_city = $this->input->post('res_city');
        $res_district= $this->input->post('res_district');
        $res_phone= $this->input->post('res_phone');
        $designation= $this->input->post('designation');
        $Office_address1 = $this->input->post('Office_address1');
        $Office_address2 = $this->input->post('Office_address2');
        $Office_city = $this->input->post('Office_city');
        $Office_district = $this->input->post('Office_district');
        $country = $this->input->post('country');
        $enrolment = $this->input->post('enrolment');
        $completion = $this->input->post('completion');
        $graduation = $this->input->post('graduation');
        $student_no = $this->input->post('student_no');
        $speciality = $this->input->post('speciality');
        $experience = $this->input->post('experience');

        $member_image = 'x.jpg';
        $payment_image = 'y.jpg';



        $member_data = array(
            'title' => $title,
            'first_name ' => $first_name,
            'surname' => $surname,
            'name_in_full' => $full_name,
            'nic_no' => $nic,
            'passport_no' => $passport_no,
            'mobile_1' => $mobile_1,
            'mobile_2' => $mobile_2,
            'personal_email' => $personal_email,
            'official_email' => $office_email,
            'residence_address_1' => $res_address1,
            'residence_address_2' => $res_address2,
            'residence_city' => $res_city,
            'resicence_district' => $res_district,
            'residence_phone_no' => $designation,
            'designation' => $designation,
            'official_address_1' => $Office_address1,
            'official_address_2' => $Office_address2,
            'official_city' => $Office_city,
            'official_district' => $Office_district,
            'country' => $country,
            'enrolement_year_pim' => $enrolment,
            'completion_year_pim' => $completion,
            'year_of_graduation' => $graduation,
            'pim_student_no' => $student_no,
            'speciality' => $speciality,
            'experienced_industries' => $experience,
            'member_image' => $member_image,
            'payment_image' => $payment_image

        );
        $this->load->model('user_model');
        $result = $this->user_model->register_member($member_data);

        if($result){
            $this->session->set_flashdata('member_success','Successfully Registered to the System. Membership Pending...');
            $this->register_member();

        }else{
            $this->session->set_flashdata('member_failed','Failed to Register to the System');
            $this->register_member();

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
