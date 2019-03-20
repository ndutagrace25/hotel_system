<?php
defined ("BASEPATH") OR exit ("No direct script access allowed");
 
Class User_types extends MX_Controller {

public function __construct() {
    parent:: __construct();   
    $this->load->model("site/site_model");
    $this->load->model("user_type_model");
}

//displaying all user types    
public function index()
    {
        $v_data ["all_user_types"] = $this->user_type_model->all_user_types();
        $data = array("title" => $this->site_model->display_page_title(),
        "content" => $this->load->view("all_user_types", $v_data, true)
       );
     
        $this->load->view("site/layouts/layout", $data);
    
    }

        //add a user type
    public function add_user_type()
    {
        $this->form_validation->set_rules("user_type_name", "User Type Name", "required");

        if ($this->form_validation->run())
        {
            $this->user_type_model->add_user_type();
            $this->session->set_flashdata("success_message", "New User type has been added");

            redirect("user_management/user_types");
           
        }
        else{
            $this->session->set_flashdata("error_message", "Unable to add user type");
        }

            

        $data = array("title" => $this->site_model->display_page_title(),
                     "content" => $this->load->view("add_user_type")
                    );
                  
       $this->load->view("site/layouts/layout", $data);

    }

    //edditing a user type
    public function edit_user_type($user_type_id)
    {
        $this->form_validation->set_rules("user_type_name", "User Type Name", "required");

        if($this->form_validation->run())
        {
            $user_type_id = $this->user_type_model->edit_user_type($user_type_id);
            $this->session->set_flashdata("success_message", "User type updated successfully");
            redirect("user_management/user_types");
        }
        else{
            $this->session->set_flashdata("error_message", "Failed to update user type");
        }

        //get data for the user type with the passed user_type_id from the model
        $one_user_type = $this->user_type_model->retrieve_one_user_type($user_type_id);

        if($one_user_type->num_rows()>0)
        {
            $row = $one_user_type->row();
            $user_type_id = $row->user_type_id;
            $user_type_name = $row->user_type_name;
        }

        $v_data = array(
            "user_type_id"=>$user_type_id,
            "user_type_name"=>$user_type_name
        );

        $data = array("title" => $this->site_model->display_page_title(),
                     "content" => $this->load->view("edit_user_type", $v_data, true)
                    );
                  
       $this->load->view("site/layouts/layout", $data);
    }
   

}
?>