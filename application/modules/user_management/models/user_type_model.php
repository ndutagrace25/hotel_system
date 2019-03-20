<?php 
defined("BASEPATH") OR exit ("No direct script access allowed");

Class User_type_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    //adding a user type
    public function add_user_type()
    {
        $data = array(
            "user_type_name" => $this->input->post("user_type_name"),
        );

        

        if($this->db->insert("user_type", $data))
        {
            return $this->db->insert_id();
            
        }
        else{
            return false;
        }       
    }

    //displaying all user types
    public function all_user_types()
    {
        
        $this->db->where("deleted",0);
        $user_types = $this->db->get("user_type");
        return $user_types;
    }

    //retrieve one user_type
    public function retrieve_one_user_type($user_type_id)
    {
        $this->db->where("user_type_id",$user_type_id);
        return $this->db->get("user_type");
    }

    //editting a user type
    public function edit_user_type($user_type_id)
    {
        $data = array(
            "user_type_name" => $this->input->post("user_type_name")
        );

        $this->db->set($data);
        $this->db->where("user_type_id",$user_type_id);

        
        if($this->db->update("user_type"))
        {
            return true;
        } else {
            return false;
        }
        
    }

    //function for deleting a record
    public function delete_user_type($user_type_id)
    {
        $this->db->where("user_type_id",$user_type_id);
        $this->db->set("deleted",1);
        

        if($this->db->update("user_type"))
        {
            $undeleted_rows = $this->all_user_types();
            return $undeleted_rows;
        }

    }
}
?>