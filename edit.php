<?php
require 'flashMessage.php';
$currentPage = 'edit';
include "function.php";
 include "index.php";  
// read a text file 
  $myfile = fopen("content.txt", "r") or die("Unable to open file!");
  $str=fread($myfile,filesize("content.txt"));
  preg_match_all("/#(.*?)\#/",$str,$newarray);
  // echo '<pre>';
  // print_r($newarray);

  fclose($myfile);
  if (!session_id()) @session_start();    
// edit 
  if(isset($_POST['edit'])) {
  
    // echo '<pre>';
    // print_r($_POST);
    $new_array  = [];
    for($i = 0; $i <count($_POST['key']); $i++) {
        fetchAllDb();
        
        updateInDb($_POST['key'][$i],$_POST['value'][$i]);
      $new_array[$_POST['key'][$i]] = $_POST['value'][$i];
    }
  //backup file generate
    
   
    $msg = new \Plasticbrain\FlashMessages\FlashMessages();
    $msg->success('Key updated successfully');
    $msg->display();
  }

$arr=fetchAllDb();
// print_r($arr);

//add 
  if(isset($_POST['add']) && !empty($_POST['add_key'])  && !empty($_POST['add_value'])) {
    $arr[$_POST['add_key']]=$_POST['add_value'];
  // echo "<pre>"; print_r($arr); exit;
    // print_r($_POST['add_key']);
    // print_r($_POST['add_value']);
    // insertIntoDB("hai","kai");
  insertIntoDB($_POST['add_key'],$_POST['add_value']);
  
    
   
    $msg = new \Plasticbrain\FlashMessages\FlashMessages();
    $msg->success('add key successfully');
    $msg->display();
  }
  if(isset($_POST['del']) && !empty($_POST['del_key'])) {
      deletefromDB($_POST['del_key']);
    $msg = new \Plasticbrain\FlashMessages\FlashMessages();
    $msg->success('add key successfully');
    $msg->display();
  }

?>
<div class="container">
  <div class="row" > 
    <div class=" col-md-6 col-lg-6"> 
      <form class=" form-inline form-edit" action="#" method="post">
      <h1>Edit</h1>
       <?php 
        // echo "<pre>";
        // print_r($arr);
          foreach($arr as $pkey=>$pvalue)
          { ?>
          <div class="row form-row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Key:</label>
                <input type="text" name="key[]" class="form-control" readonly="readonly" value="<?php echo $pkey?>">
                <label>Value:</label>
                <input type="text" name="value[]" class="form-control" value="<?php echo $pvalue?>">
              </div>  
            </div>
          </div>
        <?php } ?>
        <div class="row">
          <div class="col-md-12 edit-btn">
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="EDIT" name="edit">
            </div>
          </div>
        </div>  
      </form>
    </div>
  </div>

  <div class="col-md-8 col-lg-4"> 
      <form class="form-inline form-edit" action="#" method="post">
      <h1>Add</h1>
      <div class="row form-row">
        <div class="col-md-12">
          <div class="form-group">
            <label>Key:</label>
            <input type="text" class="form-control" name="add_key" value="">
            <label>Value:</label>
            <input type="text" class="form-control" name="add_value" value="">
          </div>
        </div>
      <div>
      <div class="row">
        <div class="col-md-12 edit-btn">
         <input type="submit"  class="btn btn-primary" value="ADD" name="add">
        </div>
      </div>
      </form>
  </div>


  <!-- delete -->
  <div class="col-md-6 col-lg-6"> 
      <form class="form-inline form-edit" action="#" method="post">
      <h1>Delete</h1>
      <div class="row form-row">
        <div class="col-md-12">
          <div class="form-group">
            <label>Key:</label>
            <input type="text" class="form-control" name="del_key" value="">
            <!-- <label>Value:</label>
            <input type="text" class="form-control" name="add_value" value=""> -->
          </div>
        </div>
      <div>
      <div class="row">
        <div class="col-md-12 edit-btn">
         <input type="submit"  class="btn btn-primary" value="Delete" name="del">
        </div>
      </div>
      </form>
  </div>
</div>
</body>
</html>