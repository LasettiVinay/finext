<!DOCTYPE html>
<html>
<head>
    <title>update mail</title>
</head>
<body>
    <form action="http://localhost/ujwal/auth/edit_profile" method="post">
       <input type="hidden" name="id" value="<?php echo $data['id']?>">
        <input type="hidden" name="email" value="<?php echo $data['email']?>">
        <p>Hi <?php echo $data['email']?></p>
        <input type="submit" value="Confirm mail">
	</form>
</body>
</html>