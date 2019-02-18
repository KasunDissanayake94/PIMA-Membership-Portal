<?php

class Upload extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }

    public function index()
    {
        $this->load->view('upload_form', array('error' => ' ' ));
    }

    public function do_upload()
    {
        $config['upload_path']          = './assets/img/profileImages/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 1000;
        $config['max_width']            = 2000;
        $config['max_height']           = 2000;

        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('userfile'))
        {
            $error = array('error' => $this->upload->display_errors());

            $this->session->set_flashdata('image_upload_failed','Image Upload Failed');
            $this->load->view('edit_Profile_Image');
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());
            //Update image url data here
            $file_name = $this->upload->data('file_name');
            $user_id = $this->session->userdata('user_id');
            $this->load->model('user_model');
            //Upload and update Image url in database
            if($this->user_model->upload_image($file_name,$user_id)){
                $this->session->set_flashdata('image_upload_success','Image Successfully Uploaded!');
                redirect("users/editProfile");
            }else{
                $this->session->set_flashdata('image_upload_failed','Image Upload Failed');
                $this->load->view('edit_Profile_Image');
            }

        }

    }
}
?>