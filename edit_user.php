<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit_user</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<style>
body{
    background-color:#6eb4b2;
    color:solid black;
    font-size:25px;
}
</style>
<body>

<div class="container">
  <h2>Edit user</h2>
  <?php
  $conn=mysqli_connect('localhost','root','','crud3');
  if(isset($_GET['edit'])){
     $edit_id=$_GET['edit'];
    


     $select="SELECT *FROM user WHERE user_id=$edit_id";
    $run=mysqli_query($conn,$select);
    $row_user=mysqli_fetch_array($run);

     $user_id=$row_user['user_id'];   
     $user_name=$row_user['user_name'];
     $user_email=$row_user['user_email'];
     $user_password=$row_user['user_password'];
     $user_image=$row_user['user_image'];
     $user_details=$row_user['user_details'];
    
    

  }

  ?>




  <form action=""  method="post" enctype="multipart/form-data">
  <div class="form-group">
      <label >Name:</label>
      <input type="text" class="form-control" value="<?php echo $user_name; ?>" placeholder="Enter your name" name="user_name">
    </div>
    <div class="form-group">
      <label >Email:</label>
      <input type="email" class="form-control" value="<?php echo $user_email; ?>" placeholder="Enter email" name="user_email">
    </div>
    <div class="form-group">
      <label >Password:</label>
      <input type="password" class="form-control" value="<?php echo $user_password; ?>" placeholder="Enter password" name="user_paswword">
    </div>
    <div class="form-group">
      <label >Image:</label>
      <input type="file" class="form-control" value="<?php echo $user_image; ?>" placeholder="" name="user_image">
    </div>
    <div class="form-group">
      <label >Details:</label>
      <textarea class="form-control"   name="user_details" ><?php echo $user_details; ?></textarea>
    </div>

    
    <button type="submit" class="btn btn-danger" name="inert-btn" >Submit</button>
  </form>
  <?php
  $conn=mysqli_connect('localhost','root','','crud3');
  if (mysqli_connect_errno()){
      echo "try again";

  }
  else{
      echo "";
  }


  if (isset($_POST['inert-btn'])){
      
  $euser_name=$_POST['user_name'];
  $euser_email=$_POST['user_email'];
  $euser_paswword=$_POST['user_paswword'];
  $eimage=$_FILES['user_image']['name'];
  $etmp_name=$_FILES['user_image']['tmp_name'];
  $euser_details=$_POST['user_details'];

 $update="UPDATE user SET user_name='$euser_name',user_email='$euser_email',user_password='$euser_paswword',user_image='$eimage',user_details='$euser_details' WHERE user_id=$edit_id";

 $run_update=mysqli_query($conn,$update);

 if ($run_update===true)
{
    echo "record has been succesfully updated";
    move_uploaded_file($etmp_name,"upload/$eimage");
}
else{
    echo " try again";
}





  }
  

  ?>
  <a clas="btn btn-primary" href="view_user.php">Go back to view_user page</a>



</div>

</body>
</html>
