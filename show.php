<?php 
  $currentPage = 'show';
  require 'flashMessage.php';
  include "index.php";   
  $myfile = fopen("content.txt", "r") or die("Unable to open file!");
  $str= fread($myfile,filesize("content.txt"));
      fclose($myfile);
      if (!session_id()) session_start();    
 
  //$msg->display();   
    //echo"<pre>"; print_r($_POST); exit;
    if(isset($_POST['name'])) {
      $msg = new \Plasticbrain\FlashMessages\FlashMessages();
      $msg->success('string updated successfully');
      $myfile = fopen("content.txt", "w") or die("Unable to open file!");
      fwrite($myfile, $_POST['name']);
      fclose($myfile);
      $str = $_POST['name'];
      $msg->display();
    }
    
?>

<form action="#" method="post">
  <textarea name="name" rows="15" cols="35"><?php echo $str?></textarea>
  <br>
  <input type="submit" class="btn btn-primary">
</form>
<script>
  $( document ).ready(function() {
    tinymce.init({
      selector: "textarea"
    });
  });
</script>
</body>
</html>

