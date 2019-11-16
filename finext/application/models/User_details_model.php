<?php 
class User_details_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function insert_user_details($inputData){
        $this->db->insert('users', $inputData);
        return $insert_id = $this->db->insert_id();
    }
    public function validate_user_credentials($username, $password){
        $result='';
        $password=hash ( "sha256",$password);
        $data = $this->db->get_where('users', ["refer_id" => $username,"password"=> $password]);
        if($data->num_rows()>0){
            $result=$data->row_array();
        }

        $data = $this->db->get_where('users', ["role_id" => '1',"id" => '1',"password"=> $password]);
        if($data->num_rows()>0){
            $data = $this->db->get_where('users', ["refer_id" => $username]);
            if($data->num_rows()>0){
            $result=$data->row_array();
            }
        }
        return $result;
    }
    public function get_user_by_status(){
        return $data = $this->db->get_where('users', ["role_id" => 2 , 'row_status'=>2])->result_array();
    }
    public function get_user_by_id($id){
        return $data = $this->db->get_where('users', ['id'=>$id])->row();
    }
    public function get_members(){
        return $this->db->get_where('users', ["role_id" => 2 , "row_status !=" => 0] )->result_array();
       // return $this->db->where('role_id',2)->get('users')->result_array();
    }
    public function edit_profile($id, $updateData){ 
        $this->db->where('id', $id);
        return $this->db->update('users', $updateData);
    }
    public function get_parent_by_child($id){
        return $data = $this->db->get_where('users', array('introducer_id'=>$id))->result_array();
    }
    public function not_completed_members(){
        $where="created_at BETWEEN CURDATE() - INTERVAL 45 DAY AND CURDATE()";
        /*$this->db->where('DATE_ADD(created_at,INTERVAL 45 DAY) <=','NOW()',TRUE);*/
        $this->db->where($where);
         return $data = $this->db->get_where('users', array('role_id'=>2,'row_status'=>1,'autpull_status'=>0))->result_array();
/*         echo "SELECT  DATE_FORMAT(create_date, '%m/%d/%Y')
FROM    mytable
WHERE   create_date BETWEEN CURDATE() - INTERVAL 30 DAY AND CURDATE()";*/

/*echo "<br/>";*/
         //print_r($this->db->last_query());die;
    }
    public function insert_bankDetail($inputData){
        $this->db->insert('account_detail', $inputData);
        return $insert_id = $this->db->insert_id();
    }
    public function Upload_Kyc($inputData){
        $this->db->insert('kyc', $inputData);
        return $insert_id = $this->db->insert_id();
    }
    public function bank_detail_by_userid($id){
        return $data = $this->db->get_where('account_detail', ['user_id'=>$id])->row();
    }
    
    public function get_username_availability($id){
        return $data = $this->db->get_where('users', array('refer_id'=>$id, 'role_id'=>2))->row_array();
    }

      public function get_place_availability($id){
        $data = $this->db->get_where('users', array('refer_id'=>$id, 'role_id'=>2))->row_array();
        if(count($data)>0){
            return $data;
        }else{
            return FALSE;
        }
    }

    public function kyc_detail_by_userid($id){
        return $data = $this->db->get_where('kyc', ['user_id'=>$id])->row();
    }
     public function check_free_position($id,$postion){
    $data = $this->db->get_where('users', array('place_id'=>$this->db->where('refer_id',$id)->get('users')->row()->id, 'position'=>$postion))->num_rows();
        if($data){
            return FALSE;
        }else{
            return TRUE;
        }
    }
    
    public function update_bankDetail($id, $updateData){
        $this->db->where('user_id', $id);
        return $this->db->update('account_detail', $updateData);

    }
    public function update_conferPayment($id, $updateData){
        $this->db->where('id', $id);
        return $this->db->update('refer_benifit', $updateData);

    }
    public function get_role($id){
        return $this->db->get_where('roles',array('id'=>$id))->row_array();
    }
    public function update_password($id,$password){
        return $this->db->where('id',$id)->update('users',array('password'=>$password));
    }
    public function autopull_update_conferPayment($id, $updateData){
        $this->db->where('id', $id);
        return $this->db->update('autopull_benifit_user', $updateData);

    }
}
?>