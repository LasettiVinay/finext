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
</style>
<div type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modal1" id="b1">Launch Left Modal</div>
<div class="wrapper">
        <!-- Sidebar Holder -->

     
<div class="tree">
	<?php
	//print_r($tree[0]);echo "<br/><br/>";print_r($tree[1]);
/*$child0=$tree[0]['childs'];
$child1=$tree[1]['childs'];
$child2=$tree[2]['childs'];
if(!empty($tree[3])){
$child3=$tree[3]['childs'];
}*/

if(isset($_GET['refer_id'])!=''){
$user_refer=$_GET['refer_id'];

}else{
$user_refer=$this->session->userdata('user_data')['refer_id'];

}

$result=$this->Tree_View_Model->get_child_node($user_refer);

$parent=$result['parent'];
$chaild1='';$chaild2='';$chaild3='';
$subchaild1='';$subchaild2='';$subchaild3='';$subchaild4='';$subchaild5='';$subchaild6='';$subchaild7='';$subchaild8='';$subchaild9='';
for($j=0; $j<count($result); $j++){
if(!empty($result[$j])){
if($result[$j]['position']=='L'){
$chaild1=$result[$j];
$sub_rec1=$this->Tree_View_Model->get_subchild_node($chaild1['refer_id']);

for($i=0;$i<count($sub_rec1);$i++){
if($sub_rec1[$i]['position']=='L'){
	$subchaild1=$sub_rec1[$i];
}elseif($sub_rec1[$i]['position']=='M'){
	$subchaild2=$sub_rec1[$i];
}elseif($sub_rec1[$i]['position']=='R'){
	$subchaild3=$sub_rec1[$i];
}
}
}
if($result[$j]['position']=='M'){
$chaild2=$result[$j];
$sub_rec2=$this->Tree_View_Model->get_subchild_node($chaild2['refer_id']);
for($i=0;$i<count($sub_rec2);$i++){
if($sub_rec2[$i]['position']=='L'){
		if(isset($sub_rec2[$i])){
			$subchaild4=$sub_rec2[$i];
		}
}elseif($sub_rec2[$i]['position']=='M'){
	$subchaild5=$sub_rec2[$i];
}elseif($sub_rec2[$i]['position']=='R'){
	$subchaild6=$sub_rec2[$i];
}
}
}
if($result[$j]['position']=='R'){
$chaild3=$result[$j];
$sub_rec3=$this->Tree_View_Model->get_subchild_node($chaild3['refer_id']);
for($i=0;$i<count($sub_rec3);$i++){
if($sub_rec3[$i]['position']=='L'){
	$subchaild7=$sub_rec3[$i];
}elseif($sub_rec3[$i]['position']=='M'){
	$subchaild8=$sub_rec3[$i];
}elseif($sub_rec3[$i]['position']=='R'){
	$subchaild9=$sub_rec3[$i];
}
}
}
}
}
	?>


	<ul>
		<li>
			<a href="#" ><span  style="color: <?php if($parent['active_status']==1){echo 'green';}elseif($parent['active_status']==0){echo 'red';}elseif($parent['active_status']==2){echo 'Grey';}?>"><i class="fa fa-user" aria-hidden="true"></i><br><?=$parent['name'];?><br><?=$parent['refer_id'];?></span></a>
			<ul>
				
				<li><?php if($chaild1!=''){?><a href="<?php echo base_url();?>member/member/tree_view/?refer_id=<?php echo $chaild1['refer_id']; ?>"><span  style="color: <?php if($chaild1['active_status']==1){echo 'green';}elseif($chaild1['active_status']==0){echo 'red';}elseif($chaild1['active_status']==2){echo 'Grey';}?>"><i class="fa fa-user" aria-hidden="true"></i><br><?=$chaild1['name'];?><br><?=$chaild1['refer_id'];?></span></a><?php }else{?><a target="blank" href="<?php echo base_url(); ?>home/registration/<?php  echo $this->session->userdata('user_data')['refer_id'];?>?place_id=<?php if(empty($_GET['refer_id'])){echo "0"; } else{echo $_GET['refer_id'];} ?>""><span  style="color: Grey"><i class="fa fa-user" aria-hidden="true"></i><br>Refer New Person</span></a><?php }?>
<?php if($chaild1!='' && $chaild2!='' && $chaild3!=''){?>
<ul>
	<li>
	<?php if($subchaild1!=''){?><a href="<?php echo base_url();?>member/member/tree_view/?refer_id=<?php echo $subchaild1['refer_id']; ?>"><span  style="color: <?php if($subchaild1['active_status']==1){echo 'green';}elseif($subchaild1['active_status']==0){echo 'red';}elseif($subchaild1['active_status']==2){echo 'Grey';}?>"><i class="fa fa-user" aria-hidden="true"></i><br><?=$subchaild1['name'];?><br><?=$subchaild1['refer_id'];?></span></a><?php }else{?><a target="blank" href="<?php echo base_url(); ?>home/registration/<?php  echo $this->session->userdata('user_data')['refer_id'];?>?place_id=<?php if(empty($_GET['refer_id'])){echo "0"; } else{echo $_GET['refer_id'];} ?>""><span  style="color: Grey"><i class="fa fa-user" aria-hidden="true"></i><br>Refer New Person</span></a><?php }?>
	</li>
	<li>
		<?php if($subchaild2!=''){?><a href="<?php echo base_url();?>member/member/tree_view/?refer_id=<?php echo $subchaild2['refer_id']; ?>"><span  style="color: <?php if($subchaild2['active_status']==1){echo 'green';}elseif($subchaild2['active_status']==0){echo 'red';}elseif($subchaild2['active_status']==2){echo 'Grey';}?>"><i class="fa fa-user" aria-hidden="true"></i><br><?=$subchaild2['name'];?><br><?=$subchaild2['refer_id'];?></span></a><?php }else{?><a target="blank" href="<?php echo base_url(); ?>home/registration/<?php  echo $this->session->userdata('user_data')['refer_id'];?>?place_id=<?php if(empty($_GET['refer_id'])){echo "0"; } else{echo $_GET['refer_id'];} ?>""><span  style="color: Grey"><i class="fa fa-user" aria-hidden="true"></i><br>Refer New Person</span></a><?php }?>
	</li>
	<li>
		<?php if($subchaild3!=''){?><a href="<?php echo base_url();?>member/member/tree_view/?refer_id=<?php echo $subchaild3['refer_id']; ?>"><span  style="color: <?php if($subchaild3['active_status']==1){echo 'green';}elseif($subchaild3['active_status']==0){echo 'red';}elseif($subchaild3['active_status']==2){echo 'Grey';}?>"><i class="fa fa-user" aria-hidden="true"></i><br><?=$subchaild3['name'];?><br><?=$subchaild3['refer_id'];?></span></a><?php }else{?><a target="blank" href="<?php echo base_url(); ?>home/registration/<?php  echo $this->session->userdata('user_data')['refer_id'];?>?place_id=<?php if(empty($_GET['refer_id'])){echo "0"; } else{echo $_GET['refer_id'];} ?>""><span  style="color: Grey"><i class="fa fa-user" aria-hidden="true"></i><br>Refer New Person</span></a><?php }?>
	</li>
	</ul>

<?php }?>
			</li>
	<li><?php if($chaild2!=''){?><a href="<?php echo base_url();?>member/member/tree_view/?refer_id=<?php echo $chaild2['refer_id']; ?>"><span  style="color: <?php if($chaild2['active_status']==1){echo 'green';}elseif($chaild2['active_status']==0){echo 'red';}elseif($chaild2['active_status']==2){echo 'Grey';}?>"><i class="fa fa-user" aria-hidden="true"></i><br><?=$chaild2['name'];?><br><?=$chaild2['refer_id'];?></span></a><?php }else{?><a target="blank" href="<?php echo base_url(); ?>home/registration/<?php  echo $this->session->userdata('user_data')['refer_id'];?>?place_id=<?php if(empty($_GET['refer_id'])){echo "0"; } else{echo $_GET['refer_id'];} ?>"><span  style="color: Grey"><i class="fa fa-user" aria-hidden="true"></i><br>Refer New Person</span></a><?php }?>
<?php if($chaild1!='' && $chaild2!='' && $chaild3!=''){?>
<ul>
	<li>
		<?php if($subchaild4!=''){?><a href="<?php echo base_url();?>member/member/tree_view/?refer_id=<?php echo $subchaild4['refer_id']; ?>"><span  style="color: <?php if($subchaild4['active_status']==1){echo 'green';}elseif($subchaild4['active_status']==0){echo 'red';}elseif($subchaild4['active_status']==2){echo 'Grey';}?>"><i class="fa fa-user" aria-hidden="true"></i><br><?=$subchaild4['name'];?><br><?=$subchaild4['refer_id'];?></span></a><?php }else{?><a target="blank" href="<?php echo base_url(); ?>home/registration/<?php  echo $this->session->userdata('user_data')['refer_id'];?>?place_id=<?php if(empty($_GET['refer_id'])){echo "0"; } else{echo $_GET['refer_id'];} ?>"><span  style="color: Grey"><i class="fa fa-user" aria-hidden="true"></i><br>Refer New Person</span></a><?php }?>
	</li>
<li>
		<?php if($subchaild6!=''){?><a href="<?php echo base_url();?>member/member/tree_view/?refer_id=<?php echo $subchaild6['refer_id']; ?>"><span  style="color: <?php if($subchaild6['active_status']==1){echo 'green';}elseif($subchaild6['active_status']==0){echo 'red';}elseif($subchaild6['active_status']==2){echo 'Grey';}?>"><i class="fa fa-user" aria-hidden="true"></i><br><?=$subchaild6['name'];?><br><?=$subchaild6['refer_id'];?></span></a><?php }else{?><a target="blank" href="<?php echo base_url(); ?>home/registration/<?php  echo $this->session->userdata('user_data')['refer_id'];?>?place_id=<?php if(empty($_GET['refer_id'])){echo "0"; } else{echo $_GET['refer_id'];} ?>"><span  style="color: Grey"><i class="fa fa-user" aria-hidden="true"></i><br>Refer New Person</span></a><?php }?>
	</li>
	<li>
		<?php if($subchaild6!=''){?><a href="<?php echo base_url();?>member/member/tree_view/?refer_id=<?php echo $subchaild6['refer_id']; ?>"><span  style="color: <?php if($subchaild6['active_status']==1){echo 'green';}elseif($subchaild6['active_status']==0){echo 'red';}elseif($subchaild6['active_status']==2){echo 'Grey';}?>"><i class="fa fa-user" aria-hidden="true"></i><br><?=$subchaild6['name'];?><br><?=$subchaild6['refer_id'];?></span></a><?php }else{?><a target="blank" href="<?php echo base_url(); ?>home/registration/<?php  echo $this->session->userdata('user_data')['refer_id'];?>?place_id=<?php if(empty($_GET['refer_id'])){echo "0"; } else{echo $_GET['refer_id'];} ?>"><span  style="color: Grey"><i class="fa fa-user" aria-hidden="true"></i><br>Refer New Person</span></a><?php }?>
	</li>

	</ul>
<?php } ?></li>
	<li><?php if($chaild3!=''){?><a href="<?php echo base_url();?>member/member/tree_view/?refer_id=<?php echo $chaild3['refer_id']; ?>"><span  style="color: <?php if($chaild3['active_status']==1){echo 'green';}elseif($chaild3['active_status']==0){echo 'red';}elseif($chaild3['active_status']==2){echo 'Grey';}?>"><i class="fa fa-user" aria-hidden="true"></i><br><?=$chaild3['name'];?><br><?=$chaild3['refer_id'];?></span></a><?php }else{?><a target="blank" href="<?php echo base_url(); ?>home/registration/<?php  echo $this->session->userdata('user_data')['refer_id'];?>?place_id=<?php if(empty($_GET['refer_id'])){echo "0"; } else{echo $_GET['refer_id'];} ?>"><span  style="color: Grey"><i class="fa fa-user" aria-hidden="true"></i><br>Refer New Person</span></a><?php }?>
<?php if($chaild1!='' && $chaild2!='' && $chaild3!=''){?>
<ul>
	<li>
		<?php if($subchaild7!=''){?><a href="<?php echo base_url();?>member/member/tree_view/?refer_id=<?php echo $subchaild7['refer_id']; ?>"><span  style="color: <?php if($subchaild7['active_status']==1){echo 'green';}elseif($subchaild7['active_status']==0){echo 'red';}elseif($subchaild7['active_status']==2){echo 'Grey';}?>"><i class="fa fa-user" aria-hidden="true"></i><br><?=$subchaild7['name'];?><br><?=$subchaild7['refer_id'];?></span></a><?php }else{?><a target="blank" href="<?php echo base_url(); ?>home/registration/<?php  echo $this->session->userdata('user_data')['refer_id'];?>?place_id=<?php if(empty($_GET['refer_id'])){echo "0"; } else{echo $_GET['refer_id'];} ?>"><span  style="color: Grey"><i class="fa fa-user" aria-hidden="true"></i><br>Refer New Person</span></a><?php }?>
	</li>
<li>
		<?php if($subchaild8!=''){?><a href="<?php echo base_url();?>member/member/tree_view/?refer_id=<?php echo $subchaild8['refer_id']; ?>"><span  style="color: <?php if($subchaild8['active_status']==1){echo 'green';}elseif($subchaild8['active_status']==0){echo 'red';}elseif($subchaild8['active_status']==2){echo 'Grey';}?>"><i class="fa fa-user" aria-hidden="true"></i><br><?=$chaild3['name'];?><br><?=$subchaild8['refer_id'];?></span></a><?php }else{?><a target="blank" href="<?php echo base_url(); ?>home/registration/<?php  echo $this->session->userdata('user_data')['refer_id'];?>?place_id=<?php if(empty($_GET['refer_id'])){echo "0"; } else{echo $_GET['refer_id'];} ?>"><span  style="color: Grey"><i class="fa fa-user" aria-hidden="true"></i><br>Refer New Person</span></a><?php }?>
	</li>
	<li>
		<?php if($subchaild9!=''){?><a href="<?php echo base_url();?>member/member/tree_view/?refer_id=<?php echo $chaild3['refer_id']; ?>"><span  style="color: <?php if($subchaild9['active_status']==1){echo 'green';}elseif($subchaild9['active_status']==0){echo 'red';}elseif($subchaild9['active_status']==2){echo 'Grey';}?>"><i class="fa fa-user" aria-hidden="true"></i><br><?=$subchaild9['name'];?><br><?=$subchaild9['refer_id'];?></span></a><?php }else{?><a target="blank" href="<?php echo base_url(); ?>home/registration/<?php  echo $this->session->userdata('user_data')['refer_id'];?>?place_id=<?php if(empty($_GET['refer_id'])){echo "0"; } else{echo $_GET['refer_id'];} ?>"><span  style="color: Grey"><i class="fa fa-user" aria-hidden="true"></i><br>Refer New Person</span></a><?php }?></a>
	</li>
	</ul>
<?php } ?></li>
			</ul>
		</li>
	</ul>
	
</div>
</div>
<div>
<ul class="tree-1">

<li style="color:Green" class="tree_view"><i class="fa fa-user" aria-hidden="true"></i> Active</li><br>
	<li style="color:red" class="tree_view"><i class="fa fa-user" aria-hidden="true"></i> Inactive</li><br>
	
	<li style="color:Grey" class="tree_view"><i class="fa fa-user" aria-hidden="true"></i> vacant</li>
	</ul>
	</div>

	<div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="modal1Label" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-left">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span>

                    </button>
                     <h4 class="modal-title" id="modal1Label">Left Modal title</h4>

                </div>
                <div class="modal-body">Some Demo For Modal 1</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>