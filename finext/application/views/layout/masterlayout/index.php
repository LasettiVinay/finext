<!DOCTYPE html>
<html lang="zxx">
  <?php $folder = $this->router->fetch_class();?>
<head>
<?php $folder = $this->router->fetch_class();?>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $page_title;?></title>
     
      <?php include 'allcss.php';?>
   
    </head>
    <body >
    <?php include_once 'header.php';?>
    <!-- content -->
    	<?php include 'application/views/'.strtolower($folder).'/'.$page_name.'.php';?>
    <?php include 'footer.php';?>
   	<?php include 'topscript.php';?>
    </body>
    </html>