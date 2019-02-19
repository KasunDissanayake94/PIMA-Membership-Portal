<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class adminController extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model('adminModel');
        $this->load->library('excel');
    }

    public function UserRegistration(){
        $this->load->view('UserRegistration');
    }
    public function userView(){
        $this->load->view('ViewUser');
    }
    public function manageUser(){
        $this->load->view('ManageUser');
    }
    public function createFormFields(){
        $this->load->view('CreateFormFields');
    }
    public function uploadEventDetails(){
        $this->load->view('UploadEventDetails');
    }
    public function createQuestionnaire(){
        $this->load->view('CreateQuestionnaire');
    }
    public function generateReports(){
        $this->load->view('Generatereports');
    }
    public function viewLogs(){
        $this->load->view('ViewLogs');
    }
    public function studentGroups(){
        $this->load->view('StudentGroups');
    }

    public function createEvent(){
        $this->load->model('adminModel');
        $data['forms_for_event'] = $this->adminModel->selectFormsForEvent();
        $this->load->view('CreateEvent',$data);
    }
    public function createForms(){
        $this->load->view('CreateForms');
    }
    public function viewGroups(){
        $this->load->view('ViewGroups');
    }
    public function assignUsers(){
        $this->load->view('assignUsers');
    }
    public function importStudents(){
//        $this->load->view('ImportStudentsList');

        $this->load->model('adminModel');
        $event_names =$this->adminModel->selectEventList();
        $data['event_names'] = $event_names;
        $data['type'] = 1; //Type of input process(Import)
        $this->load->view('SelectEventName',$data);
    }
//    public function selectEventList(){
//        $event_id = $this->input->get('event_id');
//        $this->load->model('adminModel');
//        $event_names =$this->adminModel->selectEventList($event_id);
//        $data['event_names'] = $event_names;
//
//    }
    public function addStudent(){
//        $this->load->view('AddStudent');

        $this->load->model('adminModel');
        $event_names =$this->adminModel->selectEventList();
        $data['event_names'] = $event_names;
        $data['type'] = 2; //Type of input process(Manually Input)
        $this->load->view('SelectEventName',$data);
    }
    public function selectEventToForm(){
        $event_id = $this->input->get('event_id');
        $type = $this->input->get('type');
        $this->load->model('adminModel');
        $data['instant_req'] = $this->adminModel->selectFormsForSelectedEvent($event_id);
        $data['type'] = $type;
        $data['event_id'] = $event_id;
        $this->load->view('SelectEvent',$data);

    }
    public function manageStudents(){
//        $this->load->view('ManageStudents');
        $this->load->view('ManageStudents');
    }
    public function userEdit(){
        if($this->input->get()){
            $id = $this->input->get('user_id');
            $this->load->model('adminModel');
            $data['instant_req'] = $this->adminModel->edit_User($id);
            $this->load->view('EditUser',$data);


        }

    }

    public  function userDelete(){
        if($this->input->get())
        {

            $id = $this->input->get('user_id');
            $this->load->model('adminModel');
            $result = $this->adminModel->delete_User($id);
            if($result){
                $this->manageUser();
            }else{
                echo 'xxcvvd';
                die();
            }

        }


    }
    public function createNewEvent(){
        $name = $this->input->post('name');
        $date = $this->input->post('date');
        $venue = $this->input->post('venue');
        $file_name = $this->input->post('file_name');

        $this->load->model('adminModel');
        $insert_id = $this->adminModel->createEvent($name,$date,$venue,$file_name);
        $result= $this->adminModel->assignEventToForm($insert_id,$file_name);

        if($result){
            $this->session->set_flashdata('add_success','Event Added Successfully!');
            $this->createEvent();
        }else{
            $this->session->set_flashdata('add_failed','Failed to Add Event!');
            $this->createEvent();
        }

    }

    public function addStudentsForEvent(){
        $form_id = $this->input->get('form_id');
        $event_id = $this->input->get('event_id');
        $this->load->model('adminModel');
        $fixed_result = $this->adminModel->assignFormFixed($form_id);
        $form_title =$this->adminModel->getFormName($form_id);
        $data['form_name'] = $form_title;
        $data['form_id'] = $form_id;
        $data['event_id'] = $event_id;

        $type = $this->input->get('type');
        if($type == 1){
            $this->load->view('importStudentsList',$data);
        }else if($type == 2){
            $data['form_field_result'] =$this->adminModel->getFormFields($form_id);
            $this->load->view('AddStudentManually',$data);
        }

    }

    public function printExcelSheet(){
        $form_id = $this->input->get('form_id');
        $event_id = $this->input->get('event_id');
        $this->load->model("adminModel");
        $result = $this->adminModel->getKeys($form_id);
        $form_name = $this->adminModel->getFormName($form_id);
        $this->load->library("excel");
        $object = new PHPExcel();

        $object->setActiveSheetIndex(0);

        $table_columns = array("First Name", "Last Name", "Email", "Mobile Number" , "Residence Number", "Address");
        if($result->num_rows() > 0)
        {
            foreach($result->result() as $row)
            {
                $column =  $row->name;
                array_push($table_columns,$column);
            }}


        $column = 0;
        foreach($table_columns as $field)
        {
            $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
            $column++;
        }
        $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'.$form_name.'.xls"');
        $object_writer->save('php://output');

    }
    public function registerUser(){
        $this->form_validation->set_rules('firstname','First Name','required');
        $this->form_validation->set_rules('lastname','Last Name','required');
        $this->form_validation->set_rules('email','Email','required');
        $this->form_validation->set_rules('type','Type','required');
        $this->form_validation->set_rules('contactnumber','Contact Number','required');

        //echo form_open_multipart('upload/do_upload');


        if($this->form_validation->run()== FALSE){
            $this->session->set_flashdata('register_failed','Please fill all the fields');
            $this->load->view('UserRegistration');

        }else if ($this->input->post('password') != $this->input->post('confirmpassword')) {
            $this->session->set_flashdata('register_failed','Please add the same password');
            $this->load->view('UserRegistration');
        }
        else{
            $firstname = $this->input->post('firstname');
            $lastname = $this->input->post('lastname');
            $email = $this->input->post('email');
            $type = $this->input->post('type');
            $contact_number = $this->input->post('contactnumber');
            $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            $image_url = $this->input->post('imageurl');
            if(!$image_url){
                $image_url = 'user.jpg';
            }

            $this->load->model('adminModel');
            $user_id = $this->adminModel->register_User($firstname,$lastname,$email,$type,$contact_number,$password,$image_url);

            if($user_id){
                $this->session->set_flashdata('register_success','User Registered Successfully!');
                $this->load->view('UserRegistration');

            }else{
                $this->session->set_flashdata('register_failed','Failed to Register User.Try again..');
                $this->load->view('UserRegistration');
            }




        }
    }
    public function editUser(){
        $this->form_validation->set_rules('firstname','First Name','required');
        $this->form_validation->set_rules('lastname','Last Name','required');
        $this->form_validation->set_rules('email','Email','required');
        $this->form_validation->set_rules('type','Type','required');
        $this->form_validation->set_rules('contactnumber','Contact Number','required');
        $this->form_validation->set_rules('password','Password','required');
        $this->form_validation->set_rules('confirmpassword','Confirm Password','required');

        //echo form_open_multipart('upload/do_upload');


        if($this->form_validation->run()== FALSE){
            $this->session->set_flashdata('register_failed','Please fill all the fields');
            $this->load->view('EditUser');

        }else if ($this->input->post('password') != $this->input->post('confirmpassword')) {
            $this->session->set_flashdata('register_failed','Please add the same password');
            $this->load->view('EditUser');
        }
        else{
            $id = $this->input->post('id');
            $firstname = $this->input->post('firstname');
            $lastname = $this->input->post('lastname');
            $email = $this->input->post('email');
            $type = $this->input->post('type');
            $contact_number = $this->input->post('contactnumber');
            $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);

            $this->load->model('adminModel');
            $user_id = $this->adminModel->edit_User_Final($id,$firstname,$lastname,$email,$type,$contact_number,$password);

            $this->load->view('ViewUser');

        }
    }

    public function createNewLogin(){
        if($this->input->get()){
            $id = $this->input->get('user_id');
            //pass user id and status whether this user is a new user or assign to already alocated user
            $this->load->model('adminModel');
            $data['instant_req'] = $this->adminModel->edit_User($id);
            $this->load->view('CreateNewLogin',$data);
        }
    }
    public function createExistingLogin(){
        $id = $this->input->get('user_id');
        $this->load->model('adminModel');
        $data['instant_req'] = $this->adminModel->edit_User($id);
        $this->load->view('CreateExistingLogin',$data);
    }

    public function assignNewUser(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $uid = $this->input->post('uid');
        $type = $this->input->post('userType');

        $this->load->model('adminModel');
        $user_id = $this->adminModel->assign_User($uid,$username,$password,$type);

        if($user_id){
            $this->session->set_flashdata('register_success','User Assigned Successfully!');
            $this->load->view('AssignUsers');

        }else{
            $this->session->set_flashdata('register_failed','Failed to Asign User');
            $this->load->view('AssignUsers');
        }
    }
    //Assign already registered user
    public function assignExistingUser(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $uid = $this->input->post('uid');
        //Admin wants to change the password too or not
        if($password != null){
            $this->load->model('adminModel');
            $user_id = $this->adminModel->assign_ExUserwithPassword($uid,$username,$password);

            if($user_id){
                $this->session->set_flashdata('register_success','User Assigned Successfully!');
                $this->load->view('AssignUsers');

            }else{
                $this->session->set_flashdata('register_failed','Failed to Asign User');
                $this->load->view('AssignUsers');
            }
        }else{
            $this->load->model('adminModel');
            $user_id = $this->adminModel->assign_ExUser($uid,$username);

            if($user_id){
                $this->session->set_flashdata('register_success','User Assigned Successfully!');
                $this->load->view('AssignUsers');

            }else{
                $this->session->set_flashdata('register_failed','Failed to Asign User');
                $this->load->view('AssignUsers');
            }

        }

    }



    //Excel Import
    public function fetch()
    {
        $data = $this->adminModel->select();
        $output = '
  <h3 align="center">Total Users - '.$data->num_rows().'</h3>
  <table class="table table-striped table-bordered">
   <tr>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Email</th>
    <th>Type</th>
    <th>Contact Number</th>
   </tr>
  ';
        foreach($data->result() as $row)
        {
            $output .= '
   <tr>
    <td>'.$row->firstname.'</td>
    <td>'.$row->lastname.'</td>
    <td>'.$row->email.'</td>
    <td>'.$row->type.'</td>
    <td>'.$row->contact_number.'</td>
   </tr>
   ';
        }
        $output .= '</table>';
        echo $output;
    }

    public function import()
    {
        if (isset($_FILES["file"]["name"]) && $_POST['form_id']) {
            $form_id = $_POST['form_id'];
            $event_id = $_POST['event_id'];
            $path = $_FILES["file"]["tmp_name"];
            $object = PHPExcel_IOFactory::load($path);
            //Get the Table Columns
            $this->load->model("adminModel");
            $result = $this->adminModel->getKeys($form_id);
            $table_columns = array("First Name", "Last Name", "Email", "Mobile Number", "Residence Number" , "Address");
            if($result->num_rows() > 0)
            {
                foreach($result->result() as $row)
                {
                    $column =  $row->name;
                    array_push($table_columns,$column);
                }
            }
            $highestColumn = sizeof($table_columns);
            $data_insertion_status = 0; //Success 1 => Duplicate Found
            $duplicate_array = [];
            $duplicate_additional_data = [];
            $verify_correct_file = 1; //Correct File

            foreach ($object->getWorksheetIterator() as $worksheet) {
                $highestRow = $worksheet->getHighestRow();

                }
                //Check the correct Form format
            $row_number = 0;
            for($col = 0; $col < $highestColumn; $col++){

                $title_name = $worksheet->getCellByColumnAndRow($col, $row_number)->getValue();
                $table_columns_title_name = $table_columns[$col];

                if($title_name != $table_columns_title_name){
                    $verify_correct_file = 0; //Wrong File
                }

            }
            if($verify_correct_file == 0){
                echo 'Please Upload Correct Excel File';
            }else{
                for ($row = 2; $row <= $highestRow; $row++) {
                    $first_name = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                    $last_name = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                    $email = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                    $mobile_number = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                    $residence_number = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                    $address = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                    $event_id = $event_id;

                    //Check Duplicates
                    $result = $this->adminModel->check_Duplicates($mobile_number,$residence_number);

                    if($result){
                        //This array for frontend development
                        unset($message);
                        $message[] = array(
                            'Old' => $result[0]->first_name.' '.$result[0]->last_name,
                            'New' =>$first_name." ".$last_name,
                        );

                        unset($Old_Data);
                        //Put old data to an array
                        $Old_Data[] = array(
                            'id' => $result[0]->id ,
                            'first_name' => $first_name,
                            'last_name' => $last_name,
                            'email' => $email,
                            'mobile_number' => $mobile_number,
                            'residence_number' => $residence_number,
                            'address' => $address,
                            'event_id' => $event_id,
                        );
                        //This array for  backend development
                        unset($duplicate_fields);
                        $duplicate_fields[] = array(
                            'Old' => $result,
                            'New' =>$Old_Data,
                        );


                        $additional_data = 0;
                        $data_insertion_status = 1;
                        echo "Duplicate Found : ",  json_encode($message), "\n";
                        array_push($duplicate_array,$duplicate_fields);
                        //Get additional data respect to duplicate field
                        for($col = 6; $col < $highestColumn; $col++){

                            //Get the Additional Data set
                            //$check_element_name = $table_columns[$col];
                            //$check_element_value = $worksheet->getCellByColumnAndRow($col, $row)->getValue();
                            //$result1 = $this->adminModel->check_option($check_element_name,$check_element_value);
                            //unset($duplicate_additional_data);
                            $duplicate_additional_data[] = array(
                                'student_id' => $result[0]->id,
                                'key' => $table_columns[$col],
                                'value' => $worksheet->getCellByColumnAndRow($col, $row)->getValue(),
                            );
                            //Type 1 -> Data inserted from Excel Sheet
                        }

                    }else{
                        unset($data);

                        //Check New Options and add them to Database

                        $data[] = array(
                            'first_name' => $first_name,
                            'last_name' => $last_name,
                            'email' => $email,
                            'mobile_number' => $mobile_number,
                            'residence_number' => $residence_number,
                            'address' => $address,
                            'event_id' => $event_id,
                        );

                        $last_row = $this->adminModel->insert($data);

                        //Get the Additional Data set
                        unset($additional_data);


                        for($col = 6; $col < $highestColumn; $col++){

                            //Get the Additional Data set
                            $check_element_name = $table_columns[$col];
                            $check_element_value = $worksheet->getCellByColumnAndRow($col, $row)->getValue();
                            $result1 = $this->adminModel->check_option($check_element_name,$check_element_value);

                            $additional_data[] = array(
                                'student_id' => $last_row,
                                'key' => $table_columns[$col],
                                'value' => $worksheet->getCellByColumnAndRow($col, $row)->getValue(),
                                'type' => 1,

                            );
                            //Type 1 -> Data inserted from Excel Sheet
                        }

                        $this->adminModel->insert_additional_data($additional_data);
                        $data_insertion_status = 0;



                    }


                }
            }




            if($data_insertion_status == 0 && $verify_correct_file == 1){
                echo 'Data Successfully Inserted to the System';
                    }

            }
        $this->load->library('session');
        $_SESSION['duplicate'] = $duplicate_array;
        $_SESSION['duplicate_additional_data'] = $duplicate_additional_data;

        }
        public function addStudentManually(){

            $form_id = $this->input->post('form_id');
            $event_id = $this->input->post('event_id');

            $this->load->model("adminModel");
            $result = $this->adminModel->get_Additional_Fields($form_id);
            $additional_fields = array();
            $additional_fields_values = array();

            $first_name = $this->input->post('first_name');
            $last_name = $this->input->post('last_name');
            $email = $this->input->post('email');
            $mobile_number = $this->input->post('mob_number');
            $residence_number = $this->input->post('res_number');
            $address = $this->input->post('address');
            $insertion_type = 1;    //No 1 is Manually Insertion Data No 2 is Insert Data from Excel Sheet
            $count = 0;
            //Add data to the Student Table and Check Duplicates
            $this->load->model('adminModel');
            $result_duplicates = $this->adminModel->check_Duplicates($mobile_number,$residence_number);
            if($result_duplicates){
                $form_title =$this->adminModel->getFormName($form_id);
                $data['form_name'] = $form_title;
                $data['form_id'] = $form_id;
                $data['event_id'] = $event_id;
                $data['form_field_result'] =$this->adminModel->getFormFields($form_id);
                $this->session->set_flashdata('failed','This Student Already in the System!');
                $this->load->view('AddStudentManually',$data);

            }else{
                $result_row = $this->adminModel->add_Student_Data($first_name,$last_name,$email,$mobile_number,$residence_number,$address,$event_id);
                $count = $result_row;

                foreach($result as $row)
                {
                    $var = $row->name;
                    $var1 = strtolower(str_replace(" ","_",$var));
                    $value = $this->input->post($var1);
                    $real_value = '';
                    if (is_array($value)){
                        foreach ($value as $item){
                            $real_value = $real_value.$item.'_';
                        }
                        $value = $real_value;

                    }

                    //Add data to Student Ex table
                    $message = $this->adminModel->add_Student_Ex_Data($count,$var,$value,$insertion_type);

                }
                if($message){
                    $form_title =$this->adminModel->getFormName($form_id);
                    $data['form_name'] = $form_title;
                    $data['form_id'] = $form_id;
                    $data['event_id'] = $event_id;
                    $data['form_field_result'] =$this->adminModel->getFormFields($form_id);
                    $this->session->set_flashdata('success','Student Added Successfully!');
                    $this->load->view('AddStudentManually',$data);
                }else{
                    $form_title =$this->adminModel->getFormName($form_id);
                    $data['form_name'] = $form_title;
                    $data['form_id'] = $form_id;
                    $data['event_id'] = $event_id;
                    $data['form_field_result'] =$this->adminModel->getFormFields($form_id);
                    $this->session->set_flashdata('failed','Failed to Add Student!');
                    $this->load->view('AddStudentManually',$data);
                }
            }


        }
        public function check_duplicates(){
            $this->load->view('ManageDuplicates');

        }
        public function manageDulpicates(){

            if(isset($_POST['str_var'])){
                $str_var = $_POST["str_var"];
                $array_var = unserialize(base64_decode($str_var));
                foreach ($array_var as $item){
                    $result = $this->adminModel->update_Extra_duplicate_Fields($item['student_id'],$item['key'],$item['value']);
                }


            }
            if(isset($_POST['duplicates_id'])){
                $dup_id_array = $this->input->post('duplicates_id');
                $duplicate_solved_status = 0; //Failed

                foreach ($dup_id_array as $dup_id_array=>$value) {
                    if(isset($_POST[$value.'real_array_first_name'])){
                        $real_first_name = $this->input->post($value.'real_array_first_name');
                        $real_last_name = $this->input->post($value.'real_array_last_name');
                        $real_email = $this->input->post($value.'real_array_email');
                        $real_address = $this->input->post($value.'real_array_address');

                        $this->load->model("adminModel");
                        $result = $this->adminModel->update_duplicate_fields($value,$real_first_name[0],$real_last_name[0],$real_email[0],$real_address[0]);

                        if($result){
                            $duplicate_solved_status = 1;
                        }else{
                            $duplicate_solved_status = 0;
                        }
                    }
                }

                if($duplicate_solved_status == 1){
                    $this->session->set_flashdata('success1','Duplicates Solved Successfully!');
                    $this->importStudents();


                }else{
                    $this->session->set_flashdata('success1','Duplicates Solved Successfully!');
                    $this->importStudents();
                }
            }


        }

        //Thanushi
    public function viewEvents(){
        $this->load->model('adminModel');
        $data['events'] = $this->adminModel->fetchEvents();

        $this->load->view('ViewEvents', $data);
    }
    public function mainGroups(){
        $this->load->model('adminModel');
        $data['main_groups'] = $this->adminModel->fetchMainGroups();

        $this->load->view('MainGroups', $data);
    }
    public function subGroups(){
        $this->load->model('adminModel');
        $data['sub_groups'] = $this->adminModel->fetchSubGroups();

        $this->load->view('SubGroups', $data);
    }

    public function eventParticipants(){
        if($this->input->get())
        {
            $event_id = $this->input->get('event_id');

            $this->load->model('adminModel');
            $data['event_det'] = $this->adminModel->fetchSingleEvent($event_id);
            $data['participants'] = $this->adminModel->fetchEventparticipants($event_id);
            $data['main_groups'] = $this->adminModel->fetchMainGroups();
            $data['TLEs'] = $this->adminModel->fetchTLES();

            $this->load->view('EventParticipants', $data);

        }
    }


    public function addStudentsMG($student_id, $group_id)
    {
        $this->load->model('adminModel');
        $this->adminModel->addStudentsMG($student_id, $group_id);

    }


    public function createMainGroup()
    {
        $event_id = $this->input->get('event_id');

        if(isset($_POST['newgroup']))
        {
            if(!empty($_POST['student_id']))
            {
                $title = $_POST['title'];
                $tme = $_POST['tme'];

                $this->load->model('adminModel');
                $group_id = $this->adminModel->newMainGroup($title, $tme);

                $student_id = $_POST['student_id'];

                $this->addStudentsMG($student_id, $group_id);

                $data['event_det'] = $this->adminModel->fetchSingleEvent($event_id);
                $data['participants'] = $this->adminModel->fetchEventparticipants($event_id);
                $data['TLEs'] = $this->adminModel->fetchTLES();
                $data['main_groups'] = $this->adminModel->fetchMainGroups();

                $this->load->view('EventParticipants', $data);
            }
        }
    }

    public function addToExistingGroup()
    {
        $event_id = $this->input->get('event_id');
        if(isset($_POST['submittwo']))
        {
            if(!empty($_POST['student_id']))
            {
                $student_id = $_POST['student_id'];
                $group_id = $_POST['group_id'];

                $this->load->model('adminModel');
                $this->adminModel->moveStudentsMG($group_id,$student_id);

                $data['event_det'] = $this->adminModel->fetchSingleEvent($event_id);
                $data['participants'] = $this->adminModel->fetchEventparticipants($event_id);
                $data['TLEs'] = $this->adminModel->fetchTLES();
                $data['main_groups'] = $this->adminModel->fetchMainGroups();

                $this->load->view('EventParticipants', $data);

            }
        }
    }

    public function groupsOfTme()
    {
        $output = '';
        $tme_id = '';

        $this->load->model('adminModel');
        if($this->input->post('id'))
        {
            $tme_id = $this->input->post('id');
        }
        $data = $this->adminModel->fetchTleGroups($tme_id);

        if($data->num_rows() > 0 )
        {

            foreach($data->result() as $row)
            {
                $output .= "<li class=\"list-group-item\">$row->title</li>";
            }
        }else
        {

            //$output .= "<li class=\"list-group-item\">No groups found</li>";
        }
        echo $output;
    }

    public function removeStudentsOfMG()
    {
        if(isset($_POST['submit']))
        {
            if(!empty($_POST['student_id']))
            {
                $group_id = $_GET['group_id'];

                $this->load->model('adminModel');
                $this->adminModel->removeStudentsOfMG($_POST['student_id']);

                $data['tme_name'] = $this->adminModel->fetchMainGroupTmeName($group_id);
                $data['group_title'] = $_GET['group_title'];
                $data['gid'] = $_GET['group_id'];
                $data['members'] = $this->adminModel->fetchGroupMembers($group_id);
                $data['TLEs'] = $this->adminModel->fetchTLES();
                $data['main_groups'] = $this->adminModel->fetchOtherMainGroups($group_id);

                $this->load->view('ViewMainGroup', $data);
            }
        }
    }

    public function removeStudentsOfSG()
    {
        if(isset($_POST['submit']))
        {
            if(!empty($_POST['student_id']))
            {
                $group_id = $_GET['group_id'];

                $this->load->model('adminModel');
                $this->adminModel->removeStudentsOfSG($_POST['student_id']);

                $data['tme_name'] = $this->adminModel->fetchSubGroupCCName($group_id);
                $data['group_title'] = $_GET['group_title'];
                $data['gid'] = $_GET['group_id'];
                $data['members'] = $this->adminModel->fetchGroupMembers($group_id);
                $data['CCs'] = $this->adminModel->fetchCourseCounselors();

                $this->load->view('ViewSubGroup', $data);

            }
        }
    }

    public function moveStudentsMG()
    {
        if(isset($_POST['submitOne']))
        {
            if(!empty($_POST['student_id']))
            {
                $group_id = $_GET['group_id'];

                $this->load->model('adminModel');
                $this->adminModel->moveStudentsMG($_POST['newgroup_id'],$_POST['student_id']);

                $data['tme_name'] = $this->adminModel->fetchMainGroupTmeName($group_id);
                $data['group_title'] = $_GET['group_title'];
                $data['gid'] = $_GET['group_id'];
                $data['members'] = $this->adminModel->fetchGroupMembers($group_id);
                $data['TLEs'] = $this->adminModel->fetchTLES();
                $data['main_groups'] = $this->adminModel->fetchOtherMainGroups($group_id);

                $this->load->view('ViewMainGroup', $data);
            }
        }
    }

    public function viewMainGroup()
    {
        if($this->input->get())
        {
            $group_id= $this->input->get('group_id');
            $data['group_title'] = $this->input->get('group_title');
            $data['tme_name'] = $this->input->get('tme_name');
            $data['gid'] = $this->input->get('group_id');

            $this->load->model('adminModel');
            $data['members'] = $this->adminModel->fetchGroupMembers($group_id);
            $data['TLEs'] = $this->adminModel->fetchTLES();
            $data['main_groups'] = $this->adminModel->fetchOtherMainGroups($group_id);

            $this->load->view('ViewMainGroup', $data);
        }

    }

    public function viewSubGroup()
    {
        if($this->input->get())
        {
            $group_id= $this->input->get('group_id');
            $data['group_title'] = $this->input->get('group_title');
            $data['tme_name'] = $this->input->get('tme_name');
            $data['gid'] = $this->input->get('group_id');

            $this->load->model('adminModel');
            $data['members'] = $this->adminModel->fetchSubGroupMembers($group_id);
            $data['CCs'] = $this->adminModel->fetchCourseCounselors();

            $this->load->view('ViewSubGroup', $data);
        }
    }

    public function changeTme()
    {
        if(!empty($_POST['tme']))
        {
            $user_id = $_POST['tme'];
            $group_id = $_GET['group_id'];

            $this->load->model('adminModel');
            $this->adminModel->changeTme($user_id,$group_id);

            $data['tme_name'] = $this->adminModel->fetchTmeName($user_id);
            $data['group_title'] = $_GET['group_title'];
            $data['gid'] = $_GET['group_id'];
            $data['members'] = $this->adminModel->fetchGroupMembers($group_id);
            $data['TLEs'] = $this->adminModel->fetchTLES();
            $data['main_groups'] = $this->adminModel->fetchOtherMainGroups($group_id);

            $this->load->view('ViewMainGroup', $data);

        }

    }

    public function changeCC()
    {
        if(!empty($_POST['cc']))
        {
            $user_id = $_POST['cc'];
            $group_id = $_GET['group_id'];

            $this->load->model('adminModel');
            $this->adminModel->changeCC($user_id,$group_id);

            $data['tme_name'] = $this->adminModel->fetchTmeName($user_id);
            $data['group_title'] = $_GET['group_title'];
            $data['gid'] = $_GET['group_id'];
            $data['members'] = $this->adminModel->fetchSubGroupMembers($group_id);
            $data['CCs'] = $this->adminModel->fetchCourseCounselors();

            $this->load->view('ViewSubGroup', $data);

        }

    }

    //create sub group

    public function createSubGroup()
    {
        $this->load->model('adminModel');
        $data['keys'] = $this->adminModel->fetchKeys();

        $this->load->view('CreateSubGroup', $data);
    }

    public function filterOptions()
    {
        $output = "";

        $criteria = $this->input->post('criteria[]');

        $this->load->model('adminModel');
        $values= $this->adminModel->filterOptions($criteria);

        foreach($criteria as $x)
        {
            $output .= "<div class=\"col-4\"><div class=\"input-group mb-3\">";

            $key_name = $this->adminModel->fetchKeyName($x);

            $output .= "<div class=\"input-group-prepend\">
                            <label class=\"input-group-text\" for=\"inputGroupSelect01\">$key_name</label>
                        </div>
                        <select class=\"custom-select\" name=\"option[]\" id=\"inputGroupSelect01\">
                        <option  value=\"choose\" selected>choose</option>";

            foreach($values->result() as $row)
            {
                if($row->id == $x)
                {
                    $output .= "<option  value=\"$row->value\">$row->value</option>";
                }

            }

            $output .= "</select>
                        </div>
                        </div>";
        }
        $output .= "<div class=\"float-left\">
                    <input type=\"submit\" name=\"submitoptions\" class=\"btn btn-sm btn-outline-secondary\" value=\"Apply\"/></div>";
        echo $output;

    }

    public function getFilteredStudents()
    {
        if(isset($_POST['submitoptions']))
        {
            // if(!empty($_POST['option']))
            // {
            //     $query = "SELECT student.first_name, student.last_name, student.email, student.mobile_number,
            //     student.residence_number, student.address, student_ex.key, student_ex.value FROM student
            //     LEFT JOIN student_ex ON student.id=student_ex.student_id WHERE student_ex.value = ";

            //     foreach($_POST['option'] as $x)
            //     {
            //         if($x == "choose")
            //         {
            //             $query .= "";
            //         }
            //         else
            //         {
            //             $query .= "'".$x."'";
            //             $query .= " OR ";
            //         }
            //     }
            //}
        }
        // $query .= "student_ex.value IS NULL;";

        $query = "SELECT student.id, student.first_name, student.last_name, student.email, student.mobile_number, 
        student.residence_number, student.address, student_ex.key, student_ex.value FROM student
        LEFT JOIN student_ex ON student.id=student_ex.student_id WHERE student_ex.value='USA' INTERSECT 
        SELECT student.id, student.first_name, student.last_name, student.email, student.mobile_number, 
        student.residence_number, student.address, student_ex.key, student_ex.value FROM student
        LEFT JOIN student_ex ON student.id=student_ex.student_id WHERE student_ex.value='United Kingdom'";

        $this->load->model('adminModel');
        $data['filtered_students'] = $this->adminModel->fetchFilteredStudents($query);

        $this->load->view('FilteredStudents', $data);
    }

    public function viewAllStudents()
    {
        $this->load->model('adminModel');
        $data['student'] = $this->adminModel->fetchAllStudents();
        $data['TLEs'] = $this->adminModel->fetchTLES();
        $data['main_groups'] = $this->adminModel->fetchMainGroups();

        $this->load->view('CreateMainGroup', $data);
    }

    public function moveToExistingGroup()
    {
        if(isset($_POST['submittwo']))
        {
            if(!empty($_POST['student_id']))
            {
                $student_id = $_POST['student_id'];
                $group_id = $_POST['group_id'];

                $this->load->model('adminModel');
                $this->adminModel->moveStudentsMG($group_id,$student_id);

                $data['student'] = $this->adminModel->fetchAllStudents();
                $data['TLEs'] = $this->adminModel->fetchTLES();
                $data['main_groups'] = $this->adminModel->fetchMainGroups();

                $this->load->view('CreateMainGroup', $data);

            }
        }
    }

    public function createNewMainGroup()
    {
        if(isset($_POST['newgroup']))
        {
            if(!empty($_POST['student_id']))
            {
                $title = $_POST['title'];
                $tme = $_POST['tme'];

                $this->load->model('adminModel');
                $group_id = $this->adminModel->newMainGroup($title, $tme);

                $student_id = $_POST['student_id'];

                $this->addStudentsMG($student_id, $group_id);

                $data['student'] = $this->adminModel->fetchAllStudents();
                $data['TLEs'] = $this->adminModel->fetchTLES();
                $data['main_groups'] = $this->adminModel->fetchMainGroups();

                $this->load->view('CreateMainGroup', $data);
            }
        }
    }

    public function viewSubGroupQuestionnaire()
    {
        $group_id= $this->input->get('group_id');
        $data['group_title'] = $this->input->get('group_title');
        $data['tme_name'] = $this->input->get('tme_name');
        $data['gid'] = $this->input->get('group_id');

        $this->load->model('adminModel');
        $data['questionnaire'] = $this->adminModel->fetchSubGroupQuestionnaire($group_id);
        $data['other_ques'] = $this->adminModel->fetchOtherQuestionnaireSG($group_id);


        $this->load->view('SubGroupQuestionnaire', $data);
    }

    public function viewMainGroupQuestionnaire()
    {
        $group_id= $this->input->get('group_id');
        $data['group_title'] = $this->input->get('group_title');
        $data['tme_name'] = $this->input->get('tme_name');
        $data['gid'] = $this->input->get('group_id');

        $this->load->model('adminModel');
        $data['questionnaire'] = $this->adminModel->fetchMainGroupQuestionnaire($group_id);
        $data['other_ques'] = $this->adminModel->fetchOtherQuestionnaireMG($group_id);

        $this->load->view('MainGroupQuestionnaire', $data);
    }

    public function removeMGQuestionnaire()
    {
        if(isset($_POST['submitOne']))
        {
            if(!empty($_POST['questionnaire_id']))
            {
                $group_id= $this->input->get('group_id');
                $data['group_title'] = $this->input->get('group_title');
                $data['tme_name'] = $this->input->get('tme_name');
                $data['gid'] = $this->input->get('group_id');
                $questionnaire_id = $_POST['questionnaire_id'];

                $this->load->model('adminModel');
                $this->adminModel->removeMGQuestionnaire($group_id,$questionnaire_id);

                $data['questionnaire'] = $this->adminModel->fetchMainGroupQuestionnaire($group_id);
                $data['other_ques'] = $this->adminModel->fetchOtherQuestionnaireMG($group_id);

                $this->load->view('MainGroupQuestionnaire', $data);

            }
        }
    }

    public function removeSGQuestionnaire()
    {
        if(isset($_POST['submitOne']))
        {
            if(!empty($_POST['questionnaire_id']))
            {
                $group_id= $this->input->get('group_id');
                $data['group_title'] = $this->input->get('group_title');
                $data['tme_name'] = $this->input->get('tme_name');
                $data['gid'] = $this->input->get('group_id');
                $questionnaire_id = $_POST['questionnaire_id'];

                $this->load->model('adminModel');
                $this->adminModel->removeSGQuestionnaire($group_id,$questionnaire_id);

                $data['questionnaire'] = $this->adminModel->fetchSubGroupQuestionnaire($group_id);
                $data['other_ques'] = $this->adminModel->fetchOtherQuestionnaireSG($group_id);

                $this->load->view('SubGroupQuestionnaire', $data);

            }
        }
    }

    public function addMGQuestionnaire()
    {
        if(isset($_POST['submitTwo']))
        {
            $group_id= $this->input->get('group_id');
            $data['group_title'] = $this->input->get('group_title');
            $data['tme_name'] = $this->input->get('tme_name');
            $data['gid'] = $this->input->get('group_id');
            $questionnaire_id = $_POST['questionnaire'];

            $this->load->model('adminModel');
            $this->adminModel->addMGQuestionnaire($group_id,$questionnaire_id);

            $data['questionnaire'] = $this->adminModel->fetchMainGroupQuestionnaire($group_id);
            $data['other_ques'] = $this->adminModel->fetchOtherQuestionnaireMG($group_id);

            $this->load->view('MainGroupQuestionnaire', $data);
        }
    }

    public function addSGQuestionnaire()
    {
        if(isset($_POST['submitTwo']))
        {
            $group_id= $this->input->get('group_id');
            $data['group_title'] = $this->input->get('group_title');
            $data['tme_name'] = $this->input->get('tme_name');
            $data['gid'] = $this->input->get('group_id');
            $questionnaire_id = $_POST['questionnaire'];

            $this->load->model('adminModel');
            $this->adminModel->addSGQuestionnaire($group_id,$questionnaire_id);

            $data['questionnaire'] = $this->adminModel->fetchSubGroupQuestionnaire($group_id);
            $data['other_ques'] = $this->adminModel->fetchOtherQuestionnaireSG($group_id);

            $this->load->view('SubGroupQuestionnaire', $data);

        }
    }

    public function deleteMainGroup()
    {
        $group_id = $this->input->get('group_id');
        echo $group_id;

        $this->load->model('adminModel');
        $this->adminModel->deleteMainGroup($group_id);

        $data['main_groups'] = $this->adminModel->fetchMainGroups();

        $this->load->view('MainGroups', $data);
    }

    public function deleteSubGroup()
    {
        $group_id = $this->input->get('group_id');
        echo $group_id;

        $this->load->model('adminModel');
        $this->adminModel->deleteSubGroup($group_id);

        $data['sub_groups'] = $this->adminModel->fetchSubGroups();

        $this->load->view('SubGroups', $data);
    }
    public function manageMembershipRequests(){
        $this->load->model('adminModel');
        $data['requests'] = $this->adminModel->getMembershipRequests();
        $this->load->view('requestMembership',$data);

    }
    public function RegisterNewMember(){
        if($this->input->get()) {
            $id = $this->input->get('user_id');
            $this->load->model('adminModel');
            $data['member'] = $this->adminModel->getMemberDetails($id);
            $this->load->view('viewMoreMemberDetails',$data);
        }
    }












    }
