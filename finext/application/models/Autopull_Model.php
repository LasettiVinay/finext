<?php class Autopull_Model extends CI_Model
{
    
    // public function add_user_in_autopool($inputData){
    //     $this->db->insert('autopool_user', $inputData);
    //     return $insert_id = $this->db->insert_id();
        
    // }
    // public function get_autopull_user(){
    //     return $this->db->get('autopool_user')->row();
    // }
    public function add_user_in_autopooltree($inputData){
        $this->db->insert('autopool_tree', $inputData);
        return $insert_id = $this->db->insert_id();
        
    }
    public function get_autopoolTree_user(){
        return $this->db->get('autopool_tree')->row();
    }
    public function add_user_inss_autopooltree($inputData){
        $this->db->insert('autopool_tree', $inputData);
        return $insert_id = $this->db->insert_id();
        
    }
     public function official_user(){
      return $this->db->get('official_users')->result_array();
    }
    public function official_user_by_id($id){
        return $this->db->get_where('official_users', ['id'=>$id])->row();

    }
    public function edit_official_user_detail($id, $updateData){
          $this->db->where('id', $id);
        return $this->db->update('official_users', $updateData);
    }
    // public function get_autopull_user($id){
    //     $this->db->select('*')
    //     ->from('autopool_user')
    //     ->join('registration_detail', 'autopool_user.user_id = registration_detail.id')
    //     ->where('refer_benifit.benifitial_id', $id);
    //     $query = $this->db->get();
    //     return $query->result();
    // }

    public function get_benifitial_user($id=''){
        $this->db->select('*, autopull_benifit_user.id,autopull_benifit_user.id as a_id, autopull_benifit_user.amount, autopull_benifit_user.row_status')
        ->from('autopull_benifit_user')
        ->join('users', 'autopull_benifit_user.child_id = users.refer_id')
        ->where('autopull_benifit_user.parent_id', $id);
        $query = $this->db->order_by('autopull_benifit_user.id','DESC')->get();
        return $query->result();
    }
    public function get_total_amount($id){
        $query = $this->db->select('parent_id')
        ->select_sum('amount')
        ->group_by('parent_id')
        ->where_in('parent_id', $id)
        ->get('autopull_benifit_user');
        $result = $query->row();
         
        return $result;
    }
}

?>