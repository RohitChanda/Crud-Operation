<!DOCTYPE html>
<html lang="en">
<head>
  <title>user</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<style>
body{
    background-color:#aecce8;
}
.container{
    color:black;
}
</style>
<body>

<div class="container">
  <h2>User</h2>
  <?php
  $conn=mysqli_connect('localhost','root','','crud3');
  if(isset($_GET['del'])){   // for delete
    $del_id=$_GET['del'];
    $delete="DELETE FROM user WHERE user_id='$del_id'";
    $run_delete=mysqli_query($conn,$delete);

    if($run_delete === false){
        echo "try again";
        
    }



  }

  ?>

             
  <table class="table table-bordered">
    <thead>
      <tr>
       <th>Sno</th>
        <th>Name</th>
        <th>Email Id</th>
        <th>Password</th>
        <th>Image</th>
        <th>Details</th>
        <th>Delete</th>
        <th>Edit</th>
      </tr>
    </thead>
    <?php
    $conn=mysqli_connect('localhost','root','','crud3');
    $select="SELECT *FROM user";
    $run=mysqli_query($conn,$select);
    while($row_user=mysqli_fetch_array($run)){

     $user_id=$row_user['user_id'];   
     $user_name=$row_user['user_name'];
     $user_email=$row_user['user_email'];
     $user_password=$row_user['user_password'];
     $user_image=$row_user['user_image'];
     $user_details=$row_user['user_details'];
    
    
    ?>
    <tbody>
      <tr>
         <td><?php echo $user_id;?></td>
        <td><?php echo $user_name;?></td>
        <td><?php echo $user_email;?></td>
        <td><?php echo $user_password;?></td>
        <td><img src="upload/<?php echo $user_image; ?>" height="70px"></td>
        <td><?php echo $user_details;?></td>
        <td><a class="btn btn-danger" href="view_user.php?del=<?php echo $user_id ?>" >Delete</a></td>
        <td><a class="btn btn-success" href="edit_user.php?edit=<?php echo $user_id ?>" >Edit</a></td>
      </tr>
      
    </tbody>
    <?php } ?>
  </table>
</div>

</body>
</html>
<!-- Assignment 1:

Write RestApi to add/edit/delete a users in a user table using Php Codeignitor Framework.

Deadline: By tomorrow, Night.
edu.onlineapp@gmail 
edu.onlineapp@gmail
.com-->