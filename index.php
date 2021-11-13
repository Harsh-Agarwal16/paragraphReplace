<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script><link rel="stylesheet" href="style.css">
</head>

<body>
<?php

//echo"<pre>"; print_r($currentPage); exit;
?>
<div class="header">
<nav class="navbar navibar navbar-default ">
  <div class="container-fluid">
    <div class="navbar-header ">
    </div>
    <ul class="nav navbar-nav ">
    <li class="<?php echo ($currentPage == 'home' ? 'active' : '');?>"><a href="test.php">Home</a></li>
      
      <li class="<?php echo ($currentPage == 'edit' ? 'active' : '');?>"><a href="edit.php">Edit/Add</a></li>
      <li class="<?php echo ($currentPage == 'show' ? 'active' : '');?>"><a href="show.php">Edit String</a></li>
    </ul>
  </div>
</nav>
</div>
