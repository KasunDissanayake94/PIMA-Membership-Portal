<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Newformquestion extends CI_Controller {

    public function createAForm(){
        $this->load->view('dynamicformquestion/create_form');
    }
      
    // save form name 
    public function saveFormName(){
        if(isset($_POST['formname'])){
           $data['formname'] = $_POST['formname'];
           $this->load->model('formmodelquestion');
           
            $form_id = $this->formmodelquestion->saveFormName($data);
		
           if($form_id){
               $this->select_form($form_id);
           }else{
	
			$this->session->set_flashdata('msg', '<div class="alert alert-danger  text-center"> Some error occured... Try Again!!!...</div>');
			redirect('/newformquestionquestion/createAForm', 'refresh');
			  
           }
           
        }
    }
    public function select_form($form_id){
        // get the currnt all key names
        $this->load->model('formmodelquestion');
        $data['currentKeyNames'] = $this->formmodelquestion->getCurrentKeyNames();
        // get the form id
		$data['form_id'] = $form_id;

       if($data['currentKeyNames']){
			$this->load->view('dynamicformquestion/select_form',$data);
	   }else{

		$this->session->set_flashdata('msg', '<div class="alert alert-danger  text-center"> Some error occured... Try Again!!!...</div>');
		$this->load->view('dynamicformquestion/select_form',$data);
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
          $this->load->model('formmodelquestion');
          $k = $this->formmodelquestion->saveInFormFieldTable($formFieldTable);
         

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
                $this->load->model('formmodelquestion');
                 $formElementId = $this->formmodelquestion->saveInFormElement(1);

                // insert in keys_table
                $keyId = $this->formmodelquestion->saveInKeysTable( $formElementId, $form_field_name);
                // insert in form_field table
                 $form_field_result = $this->formmodelquestion->saveInFormField( $formId, $keyId);
                
               
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
                $this->load->model('formmodelquestion');
                $formElementId = $this->formmodelquestion->saveInFormElementWithOptions(2,$optionString);

               // insert in keys_table
               $keyId = $this->formmodelquestion->saveInKeysTable( $formElementId, $form_field_name);
               // insert in form_field table
                $form_field_result = $this->formmodelquestion->saveInFormField( $formId, $keyId);


            
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
                $this->load->model('formmodelquestion');
                $formElementId = $this->formmodelquestion->saveInFormElementWithOptions(3,$optionString);

               // insert in keys_table
               $keyId = $this->formmodelquestion->saveInKeysTable( $formElementId, $form_field_name);
               // insert in form_field table
                $form_field_result = $this->formmodelquestion->saveInFormField( $formId, $keyId);

            
            }
        }
	}
	$this->session->set_flashdata('inserted', '<div class="alert alert-success  text-center">  Successfully Created The Form.....</div>');
    redirect('/newformquestion/createAForm', 'refresh');
    // ---------finish with extra fields---------------------------

}

public function changeOptionView($x=null){
	if($x){
		$form_id = $x;
	}else{
		$form_id= $this->uri->segment(3);
	}
    

    $this->load->model('formmodelquestion');
     $options['textFields'] = $this->formmodelquestion->getTextFields();
     $options['dropdown'] =$this->formmodelquestion->getDropDowns();
	 $options['checkbox'] =$this->formmodelquestion->getCheckBoxes();

     $options['form_id'] = $form_id;

	if($options){
		$this->load->view('dynamicformquestion/optionView',$options);
	}else{
	
		$this->session->set_flashdata('noOptions', '<div class="alert alert-success  text-center">  No Existing Form Fields To Change.....</div>');
    	redirect('/newformquestion/select_form/'.$form_id);
	}

    
    
}


public function saveNewOptions($form_element_id, $name=null, $form_id){

    $data = array('form_element_id' => $form_element_id, 'name'=> $name, 'form_id'=> $form_id);
	$this->load->view('dynamicformquestion/addOptionView',$data);


}
public function saveExtraField(){
    $this->load->model('formmodelquestion');

   
    if(isset($_POST['form_element_id'])){
        $form_element_id = $_POST['form_element_id'];
        $form_id = $_POST['form_id'];
        if(isset($_POST['extraOption'])){
            $option = '';
            foreach($_POST['extraOption'] as $field){
              $option .= $field.'_';
                
            }
            $data['form_element_id'] = $form_element_id;
           
            $oldOptionArray=$this->formmodelquestion->getOptionString($data);
           
            $newOptions = '';
            $newOptions = $oldOptionArray.$option;
            $data['options'] = $newOptions;
            $this->formmodelquestion->updateOptions($data);
			
			$this->session->set_flashdata('newoptionsaved', '<div class="alert alert-success  text-center">  New Option Field Is Added....</div>');
			// redirect("/newformquestion/changeOptionView/".$form_id, 'refresh');
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
