<?php 
$this->session->set_userdata('last_page',current_url());
?>
<!DOCTYPE html>
<html lang="en">

<head><?php $folder = $this->router->fetch_class();
 ?>
    <title><?php echo $page_title;?>-Admin</title>
    <!-- Meta Tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="keywords" content="
    " />
    
    <script>
        addEventListener("load", function () {
            
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
      
            window.scrollTo(0, 1);
        }
    </script>
<?php include 'topcss.php';?>
</head>

<body>
    <div class="se-pre-con"></div>
    <div class="wrapper">
     <!-- sidebar start-->
    <?php include 'side_nav.php';?>
    <!-- sidebar end-->
       <div id="content">
       <?php include 'top_nav.php';?>
      
                <?php include 'application/views/'.strtolower($folder).'/'.$page_name.'.php';?>
               
                
       </div>
    </div>
    
    </body>
    <?php include 'scripts.php';?>
    </html>