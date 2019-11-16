<html>
	<head>
		<title><?=ucwords($subject);?></title>
	</head>
	<body>
		<center><h2><?=ucwords($subject);?></h2></center>
		<center><div>
			<?php
			$msg=explode(':@',$message);
			echo $msg[0];
			$path=$msg[1];
			$id=$msg[2];
			?>
			<img src="<?=base_url('uploads/').$path.'/'.$id.'.jpg';?>">
		</div>
		</center>
	</body>
</html>