<?php //$id = $user_data['id'];
$email=$user_data['email'];
$role=$user_data['role'];
    $base_url = base_url();
    $reset_url = $base_url.'auth/reset/'.base64_encode($role.'/'.$email);
    
?>
<html>
	<head>
		<title>Forget password mail</title>
	</head>
	<body>
		<h1> Hello , </h1>
		<p>
			Use this link to reset your password <a href="<?php echo $reset_url;?>">click here</a>
		</p>
		<h5>Thanks,</h5>
		<p>dance</p>
	</body>
</html>