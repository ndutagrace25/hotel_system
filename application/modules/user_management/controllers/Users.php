<?php
defined ("BASEPATH") OR exit ("No direct script access allowed");
 
Class Users extends MX_Controller {

public function __construct() {
    parent:: __construct();
   // $this->load->model("user_management/users_model");
    $this->load->model("site/site_model");
}

    public function index()
    {
        //$x =$this->load->view("user_management/add_user");
       
        $data = array("title" => $this->site_model->display_page_title(),
                     "content" => $this->load->view("test")
                    );
                    //echo json_encode($data); die();
       $this->load->view("site/layouts/layout", $data);
       
    }

}
?>