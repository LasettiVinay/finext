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
    padding: 21px 15px 0px 0px;
    transition: all 0.5s;
    -webkit-transition: all 0.5s;
    -moz-transition: all 0.5s;
}
ul ul a {
    font-size: 0.9em !important;
    padding-left: 30px !important;
    background: #2077a2;
    border-bottom: none;
}
ul ul a {
    font-size: 0.9em !important;
   padding-left: 0px !important; 
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
img{
	width:50%;
}
.tree li a{
	/*border: 1px solid #ccc;*/
    /*padding: 2px 2px;*/
    padding: 0px 0px;
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

.new_user{
	font-size: 11px;
}
/*Time for some hover effects*/
/*We will apply the hover effect the the lineage of the element also*/
/*.tree li a:hover, .tree li a:hover+ul li a {
	background: #c8e4f8; color: #000; 
}*/
/*Connector styles on hover*/
.tree li a:hover+ul li::after, 
.tree li a:hover+ul li::before, 
.tree li a:hover+ul::before, 
.tree li a:hover+ul ul::before{
	border-color:  #94a0b4;
}




/*Tooltip*/


i.tip {
    cursor: text;
    /*font: italic 90% Georgia;*/
    /* background: floralwhite; */
    background-clip: padding-box;
    box-shadow: 0 0px 2px rgba(0, 0, 0, 0.5);
    border: 2px solid darkcyan;
    border-radius: 5px;
    position: absolute;
    width: auto;
    height: auto;
    padding: 10px;
    margin-left: 40px;
    left: auto;
    top: 1px;
    /* margin-top: -8%; */
    right: auto;
    visibility: hidden;
    opacity: 0;
    -webkit-transition: opacity 0.5s linear;
    -ms-transition: opacity 0.5s linear;
    -o-transition: opacity 0.5s linear;
    transition: opacity 0.5s linear;
    color: black;
}
.tool:hover > i {
    visibility: visible;
    opacity: 1;
    z-index: 9999;
    background: white;
}
.tool > i:before, .tool > i:after {
    content: "";
    position: absolute;
    border-top: 5px solid transparent;
    border-bottom: 5px solid transparent;
    border-left: 5px solid transparent;
    bottom: 20px;
    left: -19px;
    right: auto;
}
</style>

<!-- <div class="emailcontainer">
  <p><label>p_refer :</label>p_name</p>
<p><label>p_name : </label>p_address</p>
<p><label>p_activatedate : </label>p_gender</p>
<p><label>Designation : </label>p_design</p>
<p><label>Age : </label>p_age</p>
</div> -->
<div class="row">
	<form action="" method="GET" class="form-inline mx-auto search-form">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="refer_id" required="" style="border: 1px solid;" autocomplete="off">
                        <button class="btn btn-style my-2 my-sm-0" type="submit">Search</button>
                    </form>
</div>
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
$refer_id=$_GET['refer_id'];
if($this->session->userdata('login_type')=='member'){
$u_created_at=$this->db->where('refer_id',$this->session->userdata('refer_id'))->get('users')->row()->created_at;
$this->db->where('created_at >=',$u_created_at);
}
$user_refer=$this->db->where('refer_id',$refer_id)->get('users')->row()->id;
}else{
	if($this->session->userdata('login_type')=='admin'){
		$user_refer=11;
	}else if($this->session->userdata('login_type')=='member'){
//$user_refer=$this->session->userdata('refer_id');
$user_refer=$this->db->where('refer_id',$this->session->userdata('refer_id'))->get('users')->row()->id;
	}
}
if(!empty($user_refer)){
$result=$this->Tree_View_Model->get_child_node($user_refer);

$parent=$result['parent'];
$chaild1='';$chaild2='';$chaild3='';
$subchaild1='';$subchaild2='';$subchaild3='';$subchaild4='';$subchaild5='';$subchaild6='';$subchaild7='';$subchaild8='';$subchaild9='';
for($j=0; $j<count($result); $j++){
if(!empty($result[$j])){
if($result[$j]['position']=='L'){
$chaild1=$result[$j];
$sub_rec1=$this->Tree_View_Model->get_subchild_node($chaild1['id']);

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
$sub_rec2=$this->Tree_View_Model->get_subchild_node($chaild2['id']);
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
$sub_rec3=$this->Tree_View_Model->get_subchild_node($chaild3['id']);
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
			<a href="#" >
				<span class="button-text contactme tool" id="<?php echo $parent['refer_id']; ?>"><?php if($parent['row_status']==1){echo '<img class"tree" src="'.base_url().'uploads/active.jpg ">';}elseif($parent['row_status']==2){echo '<img src="'.base_url().'uploads/inactive.jpg ">';}elseif($parent['row_status']=='3'){echo '<img  class"tree" src="'.base_url().'uploads/vacant.jpg ">';}?>
				<br><?=$parent['name'];?><br><?=$parent['refer_id'];?>
				   <i class="tip"></i>
				
				</span></a>
			<ul>
				
				<li><?php if($chaild1!='' ){?><a href="<?php if($chaild1!='' && $chaild2!='' && $chaild3!='' && $chaild1['row_status']!=2){ echo base_url();?>admin_tree_view?refer_id=<?php echo $chaild1['refer_id']; } else{echo "#"; } ?>"><span class="button-text contactme new_user tool" id="<?php echo $chaild1['refer_id']; ?>"><?php if($chaild1['row_status']==1){echo '<img class"tree" src="'.base_url().'uploads/active.jpg ">';}elseif($chaild1['row_status']==2){echo '<img src="'.base_url().'uploads/inactive.jpg ">';}elseif($chaild1['row_status']=='3'){echo '<img class"tree" src="'.base_url().'uploads/vacant.jpg ">';}else{echo '<img  class"tree" src="'.base_url().'uploads/vacant.jpg ">';}?><br><?=$chaild1['name'];?><br><?=$chaild1['refer_id'];?><i class="tip"></i></span></a> <?php }else{?>
					<a target="blank" href="<?php if($parent['row_status']==2){echo "#";}else{echo base_url(); ?>home/registration/<?php  echo $this->crud_model->generate_encryption_key($this->session->userdata('refer_id'));?>?place_id=<?php if(empty($_GET['refer_id'])){echo "0"; } else{echo $_GET['refer_id'];}} ?>""><span class="new_user"  style="color: Grey"><img src='<?php echo base_url();?>uploads/vacant.jpg'><br>Refer New Person</span></a><?php }?>
<?php if($chaild1!='' && $chaild2!='' && $chaild3!=''){?>
<ul>
	<li>
	<?php if($subchaild1!=''){?><a href="<?php echo base_url();?>admin_tree_view?refer_id=<?php echo $subchaild1['refer_id']; ?>"><span class="button-text contactme tool new_user" id="<?php echo $subchaild1['refer_id']; ?>"> <?php if($subchaild1['row_status']==1){echo '<img src="'.base_url().'uploads/active.jpg ">';}elseif($subchaild1['row_status']==2){echo '<img class"tree" src="'.base_url().'uploads/inactive.jpg ">';}elseif($subchaild1['row_status']=='3'){echo '<img class"tree" src="'.base_url().'uploads/vacant.jpg ">';}elseif($subchaild1['row_status']==''){echo '<img src="'.base_url().'uploads/vacant.jpg ">';}?><br><?=$subchaild1['name'];?><br><?=$subchaild1['refer_id'];?><i class="tip"></i></span></a><?php }else{?><a target="blank" href="<?php if($chaild1['row_status']==2){echo "#";}else{echo base_url(); ?>home/registration/<?php  echo $this->crud_model->generate_encryption_key($this->session->userdata('refer_id'));?>?place_id=<?php if(empty($_GET['refer_id'])){echo "0"; } else{echo $_GET['refer_id'];}} ?>"><span  style="color: Grey" class="new_user"><img src='<?php echo base_url();?>uploads/vacant.jpg'><br>Refer New Person</span></a><?php }?>
	</li>
	<li>
		<?php if($subchaild2!=''){?><a href="<?php echo base_url();?>admin_tree_view?refer_id=<?php echo $subchaild2['refer_id']; ?>"><span class="button-text contactme tool new_user" id="<?php echo $subchaild2['refer_id']; ?>"><?php if($subchaild2['row_status']==1){echo '<img class"tree" src="'.base_url().'uploads/active.jpg ">';}elseif($subchaild2['row_status']==2){echo '<img class"tree" src="'.base_url().'uploads/inactive.jpg ">';}elseif($subchaild2['row_status']=='3'){echo '<img  class"tree" src="'.base_url().'uploads/vacant.jpg ">';}else{echo '<img src="'.base_url().'uploads/vacant.jpg ">';}?><br><?=$subchaild2['name'];?><br><?=$subchaild2['refer_id'];?><i class="tip"></i></span></a><i class="tip"></i><?php }else{?><a target="blank" href="<?php if($chaild1['row_status']==2){echo "#";}else{echo base_url(); ?>home/registration/<?php  echo $this->crud_model->generate_encryption_key($this->session->userdata('refer_id'));?>?place_id=<?php if(empty($_GET['refer_id'])){echo "0"; } else{echo $_GET['refer_id'];}} ?>"><span  style="color: Grey" class="new_user"><img src='<?php echo base_url();?>uploads/vacant.jpg'><br>Refer New Person</span></a><?php }?>
	</li>
	<li>
		<?php if($subchaild3!=''){?><a href="<?php echo base_url();?>admin_tree_view?refer_id=<?php echo $subchaild3['refer_id']; ?>"><span class="button-text contactme tool new_user" id="<?php echo $subchaild3['refer_id']; ?>"><?php if($subchaild3['row_status']==1){echo '<img  class"tree" src="'.base_url().'uploads/active.jpg ">';}elseif($subchaild3['row_status']==2){echo '<img src="'.base_url().'uploads/inactive.jpg ">';}elseif($subchaild2['row_status']=='3'){echo '<img class"tree" src="'.base_url().'uploads/vacant.jpg ">';}else{echo '<img src="'.base_url().'uploads/vacant.jpg ">';}?><br><?=$subchaild3['name'];?><br><?=$subchaild3['refer_id'];?><i class="tip"></i></span></a><i class="tip"></i><?php }else{?><a target="blank" href="<?php if($chaild1['row_status']==2){echo "#";}else{echo base_url(); ?>home/registration/<?php  echo $this->crud_model->generate_encryption_key($this->session->userdata('refer_id'));?>?place_id=<?php if(empty($_GET['refer_id'])){echo "0"; } else{echo $_GET['refer_id'];}} ?>"><span class="new_user" ><img src='<?php echo base_url();?>uploads/vacant.jpg'><br>Refer New Person</span></a><?php }?>
	</li>
	</ul>

<?php }?>
			</li>
	<li><?php if($chaild2!=''){?><a href="<?php  if($chaild1!='' && $chaild2!='' && $chaild3!=''  && $chaild2['row_status']!=2){ echo base_url();?>admin_tree_view?refer_id=<?php echo $chaild2['refer_id']; } else{echo "#"; } ?>"><span class="button-text contactme tool new_user" id="<?php echo $chaild2['refer_id']; ?>" ><?php if($chaild2['row_status']==1){echo '<img src="'.base_url().'uploads/active.jpg ">';}elseif($chaild2['row_status']==2){echo '<img src="'.base_url().'uploads/inactive.jpg ">';}elseif($chaild2['row_status']=='3'){echo '<img src="'.base_url().'uploads/vacant.jpg ">';}else{echo '<img class"tree" src="'.base_url().'uploads/vacant.jpg ">';}?><br><?=$chaild2['name'];?><br><?=$chaild2['refer_id'];?><i class="tip"></i></span></a><i class="tip"></i><?php }else{?><a target="blank" href="<?php if($parent['row_status']==2){echo "#";}else{echo base_url(); ?>home/registration/<?php  echo $this->crud_model->generate_encryption_key($this->session->userdata('refer_id'));?>?place_id=<?php if(empty($_GET['refer_id'])){echo "0"; } else{echo $_GET['refer_id'];}} ?>"><span  style="color: Grey" class="new_user"><img class"tree" src='<?php echo base_url();?>uploads/vacant.jpg' ><br>Refer New Person</span></a><?php }?>
<?php if($chaild1!='' && $chaild2!='' && $chaild3!=''){?>
<ul>
	<li>
		<?php if($subchaild4!=''){?><a href="<?php echo base_url();?>admin_tree_view?refer_id=<?php echo $subchaild4['refer_id']; ?>"><span class="button-text contactme new_user tool" id="<?php echo $subchaild4['refer_id']; ?>"><?php if($subchaild4['row_status']==1){echo '<img class"tree" src="'.base_url().'uploads/active.jpg ">';}elseif($subchaild4['row_status']==2){echo '<img src="'.base_url().'uploads/inactive.jpg ">';}elseif($subchaild4['row_status']=='3'){echo '<img class"tree" src="'.base_url().'uploads/vacant.jpg ">';}else{echo '<img src="'.base_url().'uploads/vacant.jpg ">';}?><br><?=$subchaild4['name'];?><br><?=$subchaild4['refer_id'];?><i class="tip"></i></span></a><?php }else{?><a target="blank" href="<?php if($chaild2['row_status']==2){echo "#";}else{echo base_url(); ?>home/registration/<?php  echo $this->crud_model->generate_encryption_key($this->session->userdata('refer_id'));?>?place_id=<?php if(empty($_GET['refer_id'])){echo "0"; } else{echo $_GET['refer_id'];}} ?>"><span class="new_user"><img  class"tree" src='<?php echo base_url();?>uploads/vacant.jpg'><br>Refer New Person</span></a><?php }?>
	</li>
<li>
		<?php if($subchaild5!=''){?><a href="<?php echo base_url();?>admin_tree_view?refer_id=<?php echo $subchaild5['refer_id']; ?>"><span class="button-text contactme new_user tool" id="<?php echo $subchaild5['refer_id']; ?>"><?php if($subchaild5['row_status']==1){echo '<img src="'.base_url().'uploads/active.jpg ">';}elseif($subchaild5['row_status']==2){echo '<img src="'.base_url().'uploads/inactive.jpg ">';}elseif($subchaild5['row_status']=='3'){echo '<img src="'.base_url().'uploads/vacant.jpg ">';}else{echo '<img class"tree" src="'.base_url().'uploads/vacant.jpg ">';}?><br><?=$subchaild5['name'];?><br><?=$subchaild5['refer_id'];?><i class="tip"></i></span></a><i class="tip"></i><?php }else{?><a target="blank" href="<?php if($chaild2['row_status']==2){echo "#";}else{echo base_url(); ?>home/registration/<?php  echo $this->crud_model->generate_encryption_key($this->session->userdata('refer_id'));?>?place_id=<?php if(empty($_GET['refer_id'])){echo "0"; } else{echo $_GET['refer_id'];}} ?>"><span class="new_user" ><img src='<?php echo base_url();?>uploads/vacant.jpg'><br>Refer New Person</span></a><?php } ?>
	</li>
	<li>
		<?php if($subchaild6!=''){?><a href="<?php echo base_url();?>admin_tree_view?refer_id=<?php echo $subchaild6['refer_id']; ?>"><span class="button-text contactme new_user tool" id="<?php echo $subchaild6['refer_id']; ?>"><?php if($subchaild6['row_status']==1){echo '<img class"tree" src="'.base_url().'uploads/active.jpg ">';}elseif($subchaild6['row_status']==2){echo '<img  class"tree" src="'.base_url().'uploads/inactive.jpg ">';}elseif($subchaild6['row_status']=='3'){echo '<img class"tree" src="'.base_url().'uploads/vacant.jpg ">';}else{echo '<img class"tree" src="'.base_url().'uploads/vacant.jpg ">';}?><br><?=$subchaild6['name'];?><br><?=$subchaild6['refer_id'];?><i class="tip"></i></span></a><i class="tip"></i><?php }else{?><a target="blank" href="<?php if($chaild2['row_status']==2){echo "#";}else{echo base_url(); ?>home/registration/<?php  echo $this->crud_model->generate_encryption_key($this->session->userdata('refer_id'));?>?place_id=<?php if(empty($_GET['refer_id'])){echo "0"; } else{echo $_GET['refer_id'];}} ?>"><span class="new_user"><img class"tree" src='<?php echo base_url();?>uploads/vacant.jpg'><br>Refer New Person</span></a><?php }?>
	</li>

	</ul>
<?php } ?></li>
	<li><?php if($chaild3!=''){?><a href="<?php  if($chaild1!='' && $chaild2!='' && $chaild3!='' && $chaild3['row_status']!=2){ echo base_url();?>admin_tree_view?refer_id=<?php echo $chaild3['refer_id']; } else{echo "#"; }  ?>"><span class="tool button-text contactme new_user" id="<?php echo $chaild3['refer_id']; ?>"><?php if($chaild3['row_status']==1){echo '<img class"tree" src="'.base_url().'uploads/active.jpg ">';}elseif($chaild3['row_status']==2){echo '<img class"tree" src="'.base_url().'uploads/inactive.jpg ">';}elseif($chaild3['row_status']=='3'){echo '<img class"tree" src="'.base_url().'uploads/vacant.jpg ">';}else{echo '<img src="'.base_url().'uploads/vacant.jpg ">';}?><br><?=$chaild3['name'];?><br><?=$chaild3['refer_id'];?><i class="tip"></i></span></a><i class="tip"></i><?php }else{?><a target="blank" href="<?php if($parent['row_status']==2){echo "#";}else{echo base_url(); ?>home/registration/<?php  echo $this->crud_model->generate_encryption_key($this->session->userdata('refer_id'));?>?place_id=<?php if(empty($_GET['refer_id'])){echo "0"; } else{echo $_GET['refer_id'];}} ?>""><span class="new_user"><img class"tree" src='<?php echo base_url();?>uploads/vacant.jpg'><br>Refer New Person</span></a><?php }?>
<?php if($chaild1!='' && $chaild2!='' && $chaild3!=''){?>
<ul>
	<li>
		<?php if($subchaild7!=''){?><a href="<?php echo base_url();?>admin_tree_view?refer_id=<?php echo $subchaild7['refer_id']; ?>"><span class="button-text tool contactme new_user" id="<?php echo $subchaild7['refer_id']; ?>" ><?php if($subchaild7['row_status']==1){echo '<img class"tree" src="'.base_url().'uploads/active.jpg ">';}elseif($subchaild7['row_status']==2){echo '<img src="'.base_url().'uploads/inactive.jpg ">';}elseif($subchaild7['row_status']=='3'){echo '<img class"tree" src="'.base_url().'uploads/vacant.jpg ">';}else{echo '<img class"tree" src="'.base_url().'uploads/vacant.jpg ">';}?><br><?=$subchaild7['name'];?><br><?=$subchaild7['refer_id'];?><i class="tip"></i></span></a><i class="tip"></i><?php }else{?><a target="blank" href="<?php echo base_url(); ?>home/registration/<?php  echo $this->crud_model->generate_encryption_key($this->session->userdata('refer_id'));?>?place_id=<?php if(empty($_GET['refer_id'])){echo "0"; } else{echo $_GET['refer_id'];} ?>"><span  style="color: Grey" class="new_user"><img class"tree" src='<?php echo base_url();?>uploads/vacant.jpg'><br>Refer New Person</span></a><?php }?>
	</li>
<li>
		<?php if($subchaild8!=''){?><a href="<?php echo base_url();?>admin_tree_view?refer_id=<?php echo $subchaild8['refer_id']; ?>"><span class="button-text tool contactme new_user" id="<?php echo $subchaild8['refer_id']; ?>"><?php if($subchaild8['row_status']==1){echo '<img src="'.base_url().'uploads/active.jpg ">';}elseif($subchaild8['row_status']==2){echo '<img src="'.base_url().'uploads/inactive.jpg ">';}elseif($subchaild8['row_status']=='3'){echo '<img src="'.base_url().'uploads/vacant.jpg ">';}else{echo '<img src="'.base_url().'uploads/vacant.jpg ">';}?><br><?=$subchaild8['name'];?><br><?=$subchaild8['refer_id'];?><i class="tip"></i></span></a><?php }else{?><a target="blank" href="<?php echo base_url(); ?>home/registration/<?php  echo $this->crud_model->generate_encryption_key($this->session->userdata('refer_id'));?>?place_id=<?php if(empty($_GET['refer_id'])){echo "0"; } else{echo $_GET['refer_id'];} ?>"><span class="new_user"><img src='<?php echo base_url();?>uploads/vacant.jpg'><br>Refer New Person</span></a><?php }?>
	</li>
	<li>
		<?php if($subchaild9!=''){?><a href="<?php echo base_url();?>admin_tree_view?refer_id=<?php echo $chaild3['refer_id']; ?>"><span class="button-text tool contactme new_user" id="<?php echo $subchaild9['refer_id']; ?>"><?php if($subchaild9['row_status']==1){echo '<img class"tree" src="'.base_url().'uploads/active.jpg ">';}elseif($subchaild9['row_status']==2){echo '<img src="'.base_url().'uploads/inactive.jpg ">';}elseif($subchaild9['row_status']=='3'){echo '<imgclass"tree" src="'.base_url().'uploads/vacant.jpg ">';}else{echo '<imgclass"tree" src="'.base_url().'uploads/vacant.jpg ">';}?><br><?=$subchaild9['name'];?><br><?=$subchaild9['refer_id'];?><i class="tip"></i></span></a><?php }else{?><a target="blank" href="<?php echo base_url(); ?>home/registration/<?php  echo $this->crud_model->generate_encryption_key($this->session->userdata('refer_id'));?>?place_id=<?php if(empty($_GET['refer_id'])){echo "0"; } else{echo $_GET['refer_id'];} ?>"><span class="new_user"><img class"tree" src='<?php echo base_url();?>uploads/vacant.jpg'><br>Refer New Person</span></a><?php }?></a>
	</li>
	</ul>
<?php } ?></li>
			</ul>
		</li>
	</ul>
	<?php }else{
		echo "This ID is not Available";
	}?>
</div>
</div>
<div>
<ul class="tree-1">

<li style="color:Green" class="tree_view"><img src="<?php echo base_url();?>uploads/active.jpg "> <br>Active</li><br>
	<li style="color:red" class="tree_view"><img src="<?php echo base_url();?>uploads/inactive.jpg "> <br>Inactive</li><br>
	
	<li style="color:Grey" class="tree_view"><img src="<?php echo base_url();?>uploads/vacant.jpg ">  <br>vacant</li>
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

    