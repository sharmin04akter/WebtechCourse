<?php
   
session_start();

     include("connection.php");
     //include("login.php");
     //$_SESSION['user_id'] = $user_data['user_id'];
          //include("functions.php");
   //$user_data = check_login($con);
    // session_start();

if (isset($_SESSION['user_id']))
 {
$user_id = $_SESSION['user_id'];

}
else{
        header("location:login.php");
        // echo "<script>location.href='login.php'</script>";
    }
     



  
 
 ?>  
<!DOCTYPE html>  
 <html>  
      <head>  
           <title></title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
           <style>
body{
    background-color: rgba( 248, 131, 121, 1);
}
</style>
      </head>  
      <body>  
           <br />  
           <div class="container" style="width:500px;">  
                <h3 align="">update your account</h3><br />                 
                
                    <form method="POST" action="" user_id="user_id">
                    
                   
<?php
   

     
 if(isset($_POST["submit"]))  
 { 

 
     $user_name = $_POST['user_name']; 
     $name = $_POST['name'];  
     $email = $_POST["email"];
  $sql = "UPDATE manager_info SET  user_name='$user_name',name='$name',email='$email' WHERE user_id='$user_id'";
         
               mysqli_query($con, $sql);

              $result1 = mysqli_query($con, $sql);
              //$user_data1 = mysqli_fetch_assoc($result1);
        
}


         // $user_id = $_GET['user_id']; 
          $query ="select * from manager_info where user_id = '$user_id' limit 1";
        
          mysqli_query($con, $query);

              $result = mysqli_query($con, $query);
              $user_data = mysqli_fetch_assoc($result);


          



 
     


  
 
 ?>  
                     <br />  
                     <label>Name</label>  
                     <input type="text" name="name" value =" <?php echo $user_data['name'];?> " class="form-control" /><br />  
                     <label>E-mail</label>
                     <input type="E-mail" name = "email" value =" <?php echo $user_data['email'];?> " class="form-control" /><br />
                     <label>User Name</label>
                     <input type="text" name = "user_name" value =" <?php echo $user_data['user_name'];?> " class="form-control" /><br />
                     
                     
                     <input type="submit" name="submit" value="update profile" class="btn btn-info" /><br />                      
                     <?php  
                     if(isset($message))  
                     {  
                          echo $message;  
                     }  
                     ?> 
                     <a href="profile.php"> Go back </a> &nbsp;&nbsp;&nbsp;&nbsp; 
                     <a href="changepas.php"> change password </a> &nbsp;&nbsp;&nbsp;&nbsp;
                </form>  
           </div> 

      </body>  
 </html>  