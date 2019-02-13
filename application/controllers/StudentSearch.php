<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StudentSearch extends CI_Controller {

    function index()
    {
        $this->load->view('ManageStudents');
    }

    function fetchStudent()
    {
        $output = '';
        $search_name1 = '';

        $this->load->model('Student_search_model');
        if(true)
        {
            $search_name1 = $this->input->post('search_name');

        }
        $data = $this->Student_search_model->fetch_student_data($search_name1);
        $output .= '
  <div class="table-responsive">
     <table class="table table-bordered table-striped">
      <tr>
       <th>First Name</th>
       <th>Last Name</th>
       <th>Email</th>
       <th>Address</th>
       <th>Mobile Number</th>
       <th>Residence Number</th>
       <th>View More Details</th>
      </tr>
  ';
        if($data->num_rows() > 0)
        {
            foreach($data->result() as $row)
            {
                $output .= '
      <tr>
       <td>'.$row->first_name.'</td>
       <td>'.$row->last_name.'</td>
       <td>'.$row->email.'</td>
       <td>'.$row->address.'</td>
       <td>'.$row->mobile_number.'</td>
       <td>'.$row->residence_number.'</td>
       
       <td class="text-center"><p><a href="'.base_url().'StudentSearch/userEdit?student_id='.$row->id.'"><button class="btn btn-success btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" data-placement="top" rel="tooltip"><i class="fas fa-edit">More</i>
</button></p></td></a>

      </tr>
      
      

    ';
            }
        }
        else
        {
            $output .= '<tr>
       <td colspan="5">No Data Found</td>
      </tr>';
        }
        $output .= '</table>';
        echo $output;
    }

    //Edit Student Details
    function userEdit(){

        if($this->input->get()){
            $id = $this->input->get('student_id');
            $this->load->model('Student_search_model');
            $data['student_data'] = $this->Student_search_model->edit_Student($id);
            $data['student_ex_data'] = $this->Student_search_model->edit_Student_Ex($id);
            $this->load->view('EditStudent',$data);


        }

    }
    function editStudentBasicDetails(){
        $id = $this->input->post('id');
        $event_id = $this->input->post('event_id');
        $first_name= $this->input->post('first_name');
        $last_name = $this->input->post('last_name');
        $email = $this->input->post('email');
        $address = $this->input->post('address');
        $mobile_number = $this->input->post('mobile_number');
        $residence_number = $this->input->post('residence_number');
        $this->load->model('Student_search_model');
        $result = $this->Student_search_model->edit_Student_Details($id,$first_name,$last_name,$email,$address,$mobile_number,$residence_number,$event_id);
        if($result){
            $this->session->set_flashdata('success','Student Details Edit Successfully!');
            $data['student_data'] = $this->Student_search_model->edit_Student($id);
            $data['student_ex_data'] = $this->Student_search_model->edit_Student_Ex($id);
            $this->load->view('EditStudent',$data);
        }else{
            $this->session->set_flashdata('failed','Student Details Edit Failed!');
            $data['student_data'] = $this->Student_search_model->edit_Student($id);
            $data['student_ex_data'] = $this->Student_search_model->edit_Student_Ex($id);
            $this->load->view('EditStudent',$data);
        }

;
    }

}
