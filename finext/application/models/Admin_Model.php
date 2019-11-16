<?php 
class Admin_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
public function insert_officialuser_details($inputData){
    $this->db->insert('official_users', $inputData);
    return $insert_id = $this->db->insert_id();
}
public function get_officeal_user(){
    return $this->db->get('official_users')->result_array();
}
 public function update_oficial_user($id, $updateData){
        $this->db->where('id', $id);
        return $this->db->update('official_users', $updateData);

    }

}
?>