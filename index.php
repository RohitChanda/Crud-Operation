<!DOCTYPE html>
<html lang="en">
<head>
  <title>Form</title>
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
  <h2>Vertical (basic) form</h2>
  <form action=""  method="post" enctype="multipart/form-data">
  <div class="form-group">
      <label >Name:</label>
      <input type="text" class="form-control"  placeholder="Enter your name" name="user_name">
    </div>
    <div class="form-group">
      <label >Email:</label>
      <input type="email" class="form-control"  placeholder="Enter email" name="user_email">
    </div>
    <div class="form-group">
      <label >Password:</label>
      <input type="password" class="form-control"  placeholder="Enter password" name="user_paswword">
    </div>
    <div class="form-group">
      <label >Image:</label>
      <input type="file" class="form-control"  placeholder="" name="user_image">
    </div>
    <div class="form-group">
      <label >Details:</label>
      <textarea class="form-control"  name="user_details" ></textarea>
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
      
  $user_name=$_POST['user_name'];
  $user_email=$_POST['user_email'];
  $user_paswword=$_POST['user_paswword'];
  $image=$_FILES['user_image']['name'];
  $tmp_name=$_FILES['user_image']['tmp_name'];
  $user_details=$_POST['user_details'];

 $insert="INSERT INTO `user`(`user_name`,`user_email`, `user_password`,`user_image`,`user_details`) VALUES ('$user_name','$user_email','$user_paswword','$image','$user_details')";

 $run_insert=mysqli_query($conn,$insert);

 if ($run_insert===true)
{
    echo "record has been succesfully inserted";
    move_uploaded_file($tmp_name,"upload/$image");
}
else{
    echo " try again";
}





  }
  

  ?>



</div>

</body>
</html>
