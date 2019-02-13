<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Newform extends CI_Controller {

    public function createAForm(){
        $this->load->view('dynamicform/create_form');
    }
      
    // save form name 
    public function saveFormName(){
        if(isset($_POST['formname'])){
           $data['formname'] = $_POST['formname'];
           $this->load->model('formmodel');
           
            $form_id = $this->formmodel->saveFormName($data);
		
           if($form_id){

               $this->select_form($form_id);
           }else{
	
			$this->session->set_flashdata('msg', '<div class="alert alert-danger  text-center"> Some error occured... Try Again!!!...</div>');
			redirect('/newform/createAForm', 'refresh');
			  
           }
           
        }
    }
    public function select_form($form_id){
        // get the currnt all key names
        $this->load->model('formmodel');
        $data['currentKeyNames'] = $this->formmodel->getCurrentKeyNames();
        // get the form id
		$data['form_id'] = $form_id;

       if($data['currentKeyNames']){
			$this->load->view('dynamicform/select_form',$data);
	   }else{

		$this->session->set_flashdata('msg', '<div class="alert alert-danger  text-center"> Some error occured... Try Again!!!...</div>');
		$this->load->view('dynamicform/select_form',$data);
	   }
       
       

    }
    public function saveFormFieldNameAndType(){
         // get the form id
         if(isset($_POST['form_id'])){
            $formId = $_POST['form_id'];
            
        }

        $selectedElementKeys = array();
        // store selected checkboxes in form_field table
        if(isset($_POST['checkboxarr'])){
            // create an arry to store selected elements/form checkbox
 

         foreach($_POST['checkboxarr'] as $keyId){
            // insert to form_field table
    
           
          $formFieldTable['form_id'] = $formId;
          $formFieldTable['key_id'] = $keyId;
          
          // set the keys_id global variable as the result from keys table
          $this->load->model('formmodel');
          $k = $this->formmodel->saveInFormFieldTable($formFieldTable);
         

         }
        
        }


        // start with dynamic fields




        if(isset($_POST['oparr'])){
            
       
            foreach($_POST['oparr'] as $row){
                // lets insert form_field_name in keys_table
              $form_field_name = $row[0];
              $type = $row[1];      
              
            //   if type textbox
              if($type =='textbox'){

                // insert in form_element table
                $this->load->model('formmodel');
                 $formElementId = $this->formmodel->saveInFormElement(1);

                // insert in keys_table
                $keyId = $this->formmodel->saveInKeysTable( $formElementId, $form_field_name);
                // insert in form_field table
                 $form_field_result = $this->formmodel->saveInFormField( $formId, $keyId);
                
               
              }
            // if type dropdown
            else if($type == 'dropdown'){
                // go throuth the array and make the option string
                $startElement = 0;
                $optionString = '';
                foreach($row as $item){
                    if($startElement>=2){
                       $optionString .= $item.'_';
                    }else{
                        $startElement++;
                    }
     
                }
                     // insert in form_element table
                $this->load->model('formmodel');
                $formElementId = $this->formmodel->saveInFormElementWithOptions(2,$optionString);

               // insert in keys_table
               $keyId = $this->formmodel->saveInKeysTable( $formElementId, $form_field_name);
               // insert in form_field table
                $form_field_result = $this->formmodel->saveInFormField( $formId, $keyId);


            
            }
            // if type checkbox
            else if($type == 'checkbox'){
                // go throuth the array and make the option string
                $startElement = 0;
                $optionString = '';
                foreach($row as $item){
                    if($startElement>=2){
                       $optionString .= $item.'_';
                    }else{
                        $startElement++;
                    }
     
                }
                     // insert in form_element table
                $this->load->model('formmodel');
                $formElementId = $this->formmodel->saveInFormElementWithOptions(3,$optionString);

               // insert in keys_table
               $keyId = $this->formmodel->saveInKeysTable( $formElementId, $form_field_name);
               // insert in form_field table
                $form_field_result = $this->formmodel->saveInFormField( $formId, $keyId);

            
            }
        }
	}
	$this->session->set_flashdata('inserted', '<div class="alert alert-success  text-center">  Successfully Created The Form.....</div>');
    redirect('/newform/createAForm', 'refresh');
    // ---------finish with extra fields---------------------------

}

public function changeOptionView($x=null){
	if($x){
		$form_id = $x;
	}else{
		$form_id= $this->uri->segment(3);
	}
    

    $this->load->model('formmodel');
     $options['textFields'] = $this->formmodel->getTextFields();
     $options['dropdown'] =$this->formmodel->getDropDowns();
     $options['checkbox'] =$this->formmodel->getCheckBoxes();
    $options['form_id'] = $form_id;

	if($options){
		$this->load->view('dynamicform/optionView',$options);
	}else{
	
		$this->session->set_flashdata('noOptions', '<div class="alert alert-success  text-center">  No Existing Form Fields To Change.....</div>');
    	redirect('/newform/select_form/'.$form_id);
	}

    
    
}


public function saveNewOptions($form_element_id, $name, $form_id){

    $data = array('form_element_id' => $form_element_id, 'name'=> $name, 'form_id'=> $form_id);
    $this->load->view('dynamicform/addOptionView',$data);

}
public function saveExtraField(){
    $this->load->model('formmodel');

   
    if(isset($_POST['form_element_id'])){
        $form_element_id = $_POST['form_element_id'];
        $form_id = $_POST['form_id'];
        if(isset($_POST['extraOption'])){
            $option = '';
            foreach($_POST['extraOption'] as $field){
              $option .= $field.'_';
                
            }
            $data['form_element_id'] = $form_element_id;
           
            $oldOptionArray=$this->formmodel->getOptionString($data);
           
            $newOptions = '';
            $newOptions = $oldOptionArray.$option;
            $data['options'] = $newOptions;
            $this->formmodel->updateOptions($data);
			
			$this->session->set_flashdata('newoptionsaved', '<div class="alert alert-success  text-center">  New Option Field Is Added....</div>');
			// redirect("/newform/changeOptionView/".$form_id, 'refresh');
			$this->changeOptionView($form_id);

        }else{
            $this->changeOptionView($form_id);
        }
    }else{
        $this->session->set_flashdata('newoptionnotsaved', '<div class="alert alert-success  text-center">  Some error occured... Try Again!!!...</div>');
        $this->changeOptionView($form_id);
    }
}

}
