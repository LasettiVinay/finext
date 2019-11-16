<?php 
class Tree_View_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function getUserTree(){
        return $this->db->get('users')->result_array();
        
    }
    public function get_refer_by_id($id){

         return $this->db->get_where('users', array('introducer_id'=>$id))->result_array();
        
    }
     
    public function get_parent_node()
    {
        $query = $this->db->select('*')
        ->group_by('introducer_id')
        ->get('users');
        $result = $query->result_array();
        return $result;
    }
    public function get_child_node($user_id='')
    { /*$query = $this->db->where('introducer_id', $parent_node)
        ->get('registration_detail');
        $result = $query->result_array();
        $parent = $this->db->where('refer_id', $parent_node)->get('registration_detail')->row_array();
        $result['parent']=$parent;
         return $result;*/
         //echo $parent_node;
         //$user_id=$this->db->where('refer_id',$parent_node)->get('users')->row()->id;
         $query = $this->db->get_where('users', array('place_id'=> $user_id, 'row_status!='=>0));
        $result = $query->result_array();
        $parent = $this->db->where('id', $user_id)->get('users')->row_array();
        $result['parent']=$parent;
         return $result;
    }
    public function get_child_node1($parent_node)
    { $query = $this->db->where('refer_id', $parent_node)
        ->get('registration_detail');
        $result = $query->row_array();
         return $result;
    }
    public function get_amount_parent()
    {  $this->load->database();
       $query = $this->db->select('*')
       ->get('register_user');
       $result = $query->result_array();
        
        return $result;
    }
    public function get_amount($inputData){
        $this->db->insert('refer_benifit', $inputData);
        return $insert_id = $this->db->insert_id();
    }
    public function get_total_amount($id){
        $query = $this->db->select('benifitial_id')
        ->select_sum('amount')
        ->group_by('benifitial_id')
        ->where_in('benifitial_id', $id)
        ->get('refer_benifit');
        $result = $query->result_array();
        
        return $result;
    }
    public function get_subchild_node($parent_node){
$query = $this->db->where('place_id', $parent_node)
        ->get('users');
        $result = $query->result_array();
         return $result;
    }
    public function level_summery($parent_node)
    { /*$query = $this->db->where('introducer_id', $parent_node)
        ->get('registration_detail');
        $result = $query->result_array();
        $parent = $this->db->where('refer_id', $parent_node)->get('registration_detail')->row_array();
        $result['parent']=$parent;
         return $result;*/
          $query = $this->db->where('introducer_id', $parent_node)->get('users');
        $result = $query->result_array();
         $active = $this->db->get_where('users', array('active_status'=>1, 'introducer_id'=>$parent_node))->num_rows();
         $inactive = $this->db->get_where('users', array('active_status'=>0))->num_rows();
        
        //$parent = $this->db->where('refer_id', $parent_node)->get('registration_detail')->row_array();
        $result['active']=$active;
        $result['inactive']=$inactive;
         return $result;
    }

     public function get_autopull_child_node($user_id='')
    { /*$query = $this->db->where('introducer_id', $parent_node)
        ->get('registration_detail');
        $result = $query->result_array();
        $parent = $this->db->where('refer_id', $parent_node)->get('registration_detail')->row_array();
        $result['parent']=$parent;
         return $result;*/
         //echo $parent_node;
         //$user_id=$this->db->where('refer_id',$parent_node)->get('users')->row()->id;
        $query = $this->db->where('parent_id', $user_id)->get('autopool_details');
        $result = $query->result_array();
        $parent = $this->db->where('user_id', $user_id)->get('autopool_details')->row_array();
        $result['parent']=$parent;
         return $result;
    }
    
}
?>