<?php
class Contact_Model extends CI_Model
{
	  public function __construct()
    {
        parent::__construct();
    }
public function insert_contact($inputData){
	  return $this->db->insert('contact_us',$inputData);
    //return $insert_id = $this->db->insert_id();
}
} 
?>