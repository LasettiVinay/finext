<?php

class Compose_model extends CI_Model
{
    private $table = "compose";
    public function __construct()
    {
        parent::__construct(); 
    }
     
    public function insert_user_details( $inputData)
    {
       $this->db->insert($this->table, $inputData);
       return $insert_id = $this->db->insert_id();
   }

public function get_user_by_id($id){
        return $data = $this->db->get_where($this->table, array('id'=>$id))->row();
    }
    public function get_mails(){
        return $data = $this->db->get_where($this->table, array('deleted' =>0))->result_array();
    }
public function get_email_by_id($id){
        return $data = $this->db->get_where($this->table, array('id'=>$id))->row();
    }
    public function get_emial_by_tomail($email){
    	 return $data = $this->db->order_by('id', 'desc')->get_where($this->table, array('to_email'=>$email))->result_array();
    }
public function get_email_by_email($email){
        return $data = $this->db->order_by('id', 'desc')->get_where($this->table, array('from_email'=>$email))->result_array();
    }














}
?>