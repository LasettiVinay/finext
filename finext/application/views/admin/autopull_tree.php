<style>
/*Now the CSS*/
* {margin: 0; padding: 0;}

.tree ul { 
	padding-top: 20px; position: relative;
	
	transition: all 0.5s;
	-webkit-transition: all 0.5s;
	-moz-transition: all 0.5s;
}

.tree li {
    float: left;
    text-align: center;
    list-style-type: none;
    position: relative;
    /*padding: 14px 5px 0 2px;*/
    padding: 21px 6px 0px 4px;
    transition: all 0.5s;
    -webkit-transition: all 0.5s;
    -moz-transition: all 0.5s;
}
ul ul a {
    font-size: 0.9em !important;
   padding-left: 10px !important; 
    background: none; 
}
ul.tree-1 {
    display: inline-flex;
    /* margin: 10px 16px; */
}li.tree_view {
       margin: 10px 254px 25px 22px;
    margin-top: 34px;
}

/*We will use ::before and ::after to draw the connectors*/

.tree li::before, .tree li::after{
	content: '';
	position: absolute; top: 0; 
	right: 50%;
	border-top: 1px solid #ccc;
	width: 50%; height: 20px;
}
.tree li::after{
	right: auto; left: 50%;
	border-left: 1px solid #ccc;
}

/*We need to remove left-right connectors from elements without 
any siblings*/
.tree li:only-child::after, .tree li:only-child::before {
	display: none;
}

/*Remove space from the top of single children*/
.tree li:only-child{ padding-top: 0;}

/*Remove left connector from first child and 
right connector from last child*/
.tree li:first-child::before, .tree li:last-child::after{
	border: 0 none;
}
/*Adding back the vertical connector to the last nodes*/
.tree li:last-child::before{
	border-right: 1px solid #ccc;
	border-radius: 0 5px 0 0;
	-webkit-border-radius: 0 5px 0 0;
	-moz-border-radius: 0 5px 0 0;
}
.tree li:first-child::after{
	border-radius: 5px 0 0 0;
	-webkit-border-radius: 5px 0 0 0;
	-moz-border-radius: 5px 0 0 0;
}

/*Time to add downward connectors from parents*/
.tree ul ul::before{
	content: '';
	position: absolute; top: 0; 
	left: 50%;
	border-left: 1px solid #ccc;
	width: 0; height: 20px;
}

.tree li a{
	border: 1px solid #ccc;
    /*padding: 2px 2px;*/
    padding: 8px 2px;
	text-decoration: none;
	color: #666;
	font-family: arial, verdana, tahoma;
	font-size: 11px;
	display: inline-block;
	
	border-radius: 5px;
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	
	transition: all 0.5s;
	-webkit-transition: all 0.5s;
	-moz-transition: all 0.5s;
}

/*Time for some hover effects*/
/*We will apply the hover effect the the lineage of the element also*/
.tree li a:hover, .tree li a:hover+ul li a {
	background: #c8e4f8; color: #000; border: 1px solid #94a0b4;
}
/*Connector styles on hover*/
.tree li a:hover+ul li::after, 
.tree li a:hover+ul li::before, 
.tree li a:hover+ul::before, 
.tree li a:hover+ul ul::before{ 
	border-color:  #94a0b4;
}
.wrapper{
	width: 100%;
}
</style>
<div class="row">
	<form action="" method="GET" class="form-inline mx-auto search-form">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="user_id" required="" style="border: 1px solid;" autocomplete="off">
                        <button class="btn btn-style my-2 my-sm-0" type="submit">Search</button>
                    </form>
</div>
 <div class="wrapper">
        <!-- Sidebar Holder -->
       
<?php
	if(isset($_GET['user_id'])!='')
	{
		$refer_id=$_GET['user_id'];
		if($this->session->userdata('login_type')=='member')
		{
			$u_created_at=$this->db->where('parent_id',$this->session->userdata('refer_id'))->get('autopool_details')->row()->created_at;
			$this->db->where('created_at >=',$u_created_at);
		}
		$user_refer=$this->db->where('user_id',$refer_id)->get('autopool_details')->row()->user_id;
	}
	else
	{
		if($this->session->userdata('login_type')=='admin')
		{
			$user_refer='FX18408433';
		}
		else if($this->session->userdata('login_type')=='member')
		{
			$user_refer=$this->session->userdata('refer_id');
			//$user_refer=$this->db->where('user_id',$this->session->userdata('refer_id'))->get('autopool_details')->row()->parent_id;
		}
	}
	if(!empty($user_refer))
	{
		$result=$this->Tree_View_Model->get_autopull_child_node($user_refer);
		// echo "<pre>";
		// print_r($this->db->last_query());
		$parent=$result['parent'];
		$user=substr($parent['user_id'], 0,4);
		if($user=='FX18')
		{
			$officical=$this->db->get_where('official_users', array('refer_id'=>$parent['user_id']))->row();
			$parent_name=$officical->name;
		}
		else
		{
			$user=$this->db->get_where('users', array('refer_id'=>$parent['user_id']))->row();
			$parent_name=$user->name;
		}
		$chaild1='';
		$chaild2='';
		$chaild3='';
		$child4='';
		for($j=0; $j<count($result); $j++){
			if(!empty($result[$j]))
			{
				$users=substr($result[$j]['user_id'], 0,4);
				if($users=='FX18'){
					$officical=$this->db->get_where('official_users', array('refer_id'=>$result[$j]['user_id']))->row();
					$user_name[$j]=$officical->name;
				}else
				{
					$user=$this->db->get_where('users', array('refer_id'=>$result[$j]['user_id']))->row();
					$user_name[$j]=$user->name;
				}

				if($result[$j]['position']=='1'){
					$chaild1=$result[$j];
				}
				if($result[$j]['position']=='2'){
					$chaild2=$result[$j];
				}
				if($result[$j]['position']=='3'){
					$chaild3=$result[$j];
				}
				if($result[$j]['position']=='4'){
					$chaild4=$result[$j];
				}

			}
		}

	?>
			<!-- Page Content Holder -->


	<div class="tree">
		<?php $users=$this->db->get('official_users')->result_array();?>

		<ul>
			<li>
				<a href="#">
					<?php
						if($parent['row_status']==1)
						{
							echo '<img class"tree" src="'.base_url().'uploads/active.jpg ">';
						}
						elseif($parent['row_status']==2)
						{
							echo '<img class"tree" src="'.base_url().'uploads/inactive.jpg ">';
						}
						elseif($parent['row_status']=='3')
						{
							echo '<img class"tree" src="'.base_url().'uploads/vacant.jpg ">';
						}
					?>
					<?php
						$fx_id=substr($parent['user_id'], 0,4);
						$display_id = $parent['user_id'];
						if($fx_id == "FX18")
						{
							$officical_user_info=$this->db->get_where('official_users', array('refer_id'=>$parent['user_id']))->row();
							if ($officical_user_info->display_id)
							{
								$display_id = $officical_user_info->display_id;
							}
						}
					?>
					<br><?= str_replace("FX18","FX19", $display_id); ?><br><?php echo $parent_name;?>
				</a>
		<ul>
			<li>
				<?php
				if($chaild1!='')
				{
					?>
					<a href="<?php echo base_url();?>autopool_tree?user_id=<?php echo $chaild1['user_id'];?>">
						<?php
						if($chaild1['row_status']==1)
						{
							echo '<img class"tree" src="'.base_url().'uploads/active.jpg ">';
						}
						elseif($chaild1['row_status']==2)
						{
							echo '<img class"tree" src="'.base_url().'uploads/inactive.jpg ">';
						}
						else
						{
							echo '<img src="'.base_url().'uploads/vacant.jpg ">';
						}
						?>
					<?php
						$fx_id=substr($chaild1['user_id'], 0,4);
						$chaild1_id = $chaild1['user_id'];
						if($fx_id == "FX18")
						{
							$chaild1_id_info=$this->db->get_where('official_users', array('refer_id'=>$chaild1_id))->row();
							if ($chaild1_id_info->display_id)
							{
								$chaild1_id = $chaild1_id_info->display_id;
							}
						}
					?>
					<br><?=str_replace("FX18","FX19", $chaild1_id); ?><br><?php echo $user_name[0];?>
					</a>
					<?php
				}
				else
				{
					?> <a href="#"><img class="tree" src="<?php base_url(); ?>uploads/vacant.jpg"></a><?php } ?>

			</li>
			<li>
				<?php
					if($chaild2!='')
					{
						?>
						<a href="<?php echo base_url();?>autopool_tree?user_id=<?php echo $chaild2['user_id'];?>">
							<?php
							if($chaild2['row_status']==1)
							{
								echo '<img class"tree" src="'.base_url().'uploads/active.jpg ">';
							}
							elseif($chaild2['row_status']==2)
							{
								echo '<img class"tree" src="'.base_url().'uploads/inactive.jpg ">';
							}
							else
							{
								echo '<img class"tree"src="'.base_url().'uploads/vacant.jpg ">';
							}?>
							<?php
								$fx_id=substr($chaild2['user_id'], 0,4);
								$chaild2_id = $chaild2['user_id'];
								if($fx_id == "FX18")
								{
									$chaild2_id_info=$this->db->get_where('official_users', array('refer_id'=>$chaild2_id))->row();
									if ($chaild2_id_info->display_id)
									{
										$chaild2_id = $chaild2_id_info->display_id;
									}
								}
							?>
							<br><?=str_replace("FX18","FX19",$chaild2_id); ?><br><?php echo $user_name[1];?>
						</a>
						<?php
					}
					else
					{
						?> <a href="#"><img src="<?php base_url(); ?>uploads/vacant.jpg"></a><?php
					} ?>
			</li>
			<li>
				<?php
					if($chaild3!='')
					{
						?>
						<a href="<?php echo base_url();?>autopool_tree?user_id=<?php echo $chaild3['user_id'];?>"><?php
							if($chaild3['row_status']==1)
							{
								echo '<img src="'.base_url().'uploads/active.jpg ">';
							}
							elseif($chaild3['row_status']==2)
							{
								echo '<img src="'.base_url().'uploads/inactive.jpg ">';
							}
							else
							{
								echo '<img src="'.base_url().'uploads/vacant.jpg ">';
							}
							?>
							<?php
								$fx_id=substr($chaild3['user_id'], 0,4);
								$chaild3_id = $chaild3['user_id'];
								if($fx_id == "FX18")
								{
									$chaild3_id_info=$this->db->get_where('official_users', array('refer_id'=>$chaild3_id))->row();
									if ($chaild3_id_info->display_id)
									{
										$chaild3_id = $chaild3_id_info->display_id;
									}
								}
							?>
							<br><?=str_replace("FX18","FX19",$chaild3_id); ?><br><?php echo $user_name[2];?>
						</a>
						<?php
					}
					else
					{
						?>
						<a href="#"><img class="tree" src="<?php base_url(); ?>uploads/vacant.jpg"></a><?php
					} ?>
		</li>
		<li>
		<?php
			if($chaild4!='')
			{
				?>
				<a href="<?php echo base_url();?>autopool_tree?user_id=<?php echo $chaild4['user_id'];?>"><?php
				if($chaild4['row_status']==1)
				{
					echo '<img class"tree" src="'.base_url().'uploads/active.jpg ">';
				}
				elseif($chaild4['row_status']==2)
				{
					echo '<img class"tree" src="'.base_url().'uploads/inactive.jpg ">';
				}
				else
				{
					echo '<img class"tree" src="'.base_url().'uploads/vacant.jpg ">';
				}
				?>
				<?php
					$fx_id=substr($chaild4['user_id'], 0,4);
					$chaild4_id = $chaild4['user_id'];
					if($fx_id == "FX18")
					{
						$chaild4_id_info=$this->db->get_where('official_users', array('refer_id'=>$chaild4_id))->row();
						if ($chaild4_id_info->display_id)
						{
							$chaild4_id = $chaild4_id_info->display_id;
						}
					}
				?>
				<br><? echo str_replace("FX18","FX19",$chaild4_id); ?><br><?php echo $user_name[3];?>
		</a>
		<?php } else{?> <a href="#"><img class="tree" src="<?php base_url(); ?>uploads/vacant.jpg"></a><?php } ?>
		</li>
	</ul>
</li>
</ul>


		</div>
		<?php
	}
	else
	{
		echo "This ID is not Available";
	}
?>
</div>



<br>
