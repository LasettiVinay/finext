<html>
<body>
      <div class="container">
      <div class="row">
      <div class="col-md-12 col-xs-12">

      <table>

            <tr>
            <th>To Mail:</th>
            <td><?php  echo $mail_details->to_email;?></td>
      </tr> 
      <tr>
            <th>Subject:</th>
            <td><?php  echo $mail_details->subject;?></td>
      </tr>
      <tr>
            <th>Text:</th>
            <td><?php  echo $mail_details->text;?></td>
      </tr>
      <tr>
            <th>From Mail:</th>
            <td><?php echo $mail_details->from_email;?></td>
      </tr>
      
</table>

  
</div>
</div> 
</div>
</body>
</html>