<?php 
class Benifit_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function get_all_benifitial_user(){
        $this->db->select('*,refer_benifit.refer_id as b_refer_id,refer_benifit.introducer_id as b_introducer_id,refer_benifit.amount')
        ->from('refer_benifit')
        ->join('users', 'refer_benifit.refer_id = users.id');
        $query = $this->db->order_by('refer_benifit.id','DESC')->get();
        return $query->result();
      
    }
    public function get_benifitial_user($id=''){
        if($this->session->userdata('login_type')=='admin'){
        /*$this->db->select('*, refer_benifit.id, refer_benifit.amount, refer_benifit.row_status')
        ->from('refer_benifit')
        ->join('users', 'refer_benifit.refer_id = users.id');
        $query = $this->db->get();*/
        $this->db->select('*,u.refer_id,u.name,refer_benifit.id as a_id,refer_benifit.introducer_id as a_introducer_id,refer_benifit.row_status');
        $this->db->from('refer_benifit')->join('users as u', 'refer_benifit.refer_id = u.id');
        $query=$this->db->order_by('refer_benifit.id','DESC')->get();
        }elseif($this->session->userdata('login_type')=='member'){
        $this->db->select('*, refer_benifit.id,refer_benifit.id as a_id, refer_benifit.amount, refer_benifit.row_status')
        ->from('refer_benifit')
        ->join('users', 'refer_benifit.refer_id = users.id')
        ->where('refer_benifit.introducer_id', $id);
        $query = $this->db->order_by('refer_benifit.id','DESC')->get();
        }
        return $query->result();
    }
    public function get_total_amount($id){
        $query = $this->db->select('introducer_id')
        ->select_sum('amount')
        ->group_by('introducer_id')
        ->where_in('introducer_id', $id)
        ->get('refer_benifit');
        $result = $query->row();
         
        return $result;
    }
    public function give_donation_user($id){
         $this->db->select('refer_benifit.*,users.name,users.email,users.city,users.mobile,users.refer_id')
        ->from('refer_benifit')
        ->join('users', 'refer_benifit.introducer_id = users.id')
        ->where('refer_benifit.refer_id', $id);
        $query = $this->db->get();
        return $query->result_array();
       
    }
    public function bankdetail($id){
        return $this->db->get_where('account_detail', array('user_id'=>$id))->result_array();
    }
    public function bdetail($id){
        return $this->db->get_where('account_detail', array('user_id'=>$id))->row_array();
    }
}
?>