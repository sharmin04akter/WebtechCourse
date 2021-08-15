 <?php  
 $message = '';  
 $error = '';

session_start();

     include("connection.php");
    // include("functions.php");
   //$user_data = check_login($con);
    // session_start();

if (isset($_SESSION['user_id']))
 {
  $user_id = $_SESSION['user_id'];
      $query ="select * from manager_info where user_id = '$user_id' limit 1";

               mysqli_query($con, $query);

              $result = mysqli_query($con, $query);
}
else{
        header("location:login.php");
        // echo "<script>location.href='login.php'</script>";
    }
     
 
 if(isset($_POST["submit"]))  
 {
 

     $newpass = $_POST['newpass'];
     $renewpass = $_POST['renewpass'];
     $pass = $_POST['pass'];

                   if($newpass != $renewpass)
     {

         $error = "<label class='text-danger'>passwords doesn't match</label>"; 
     }

 
      else if(empty($_POST["pass"]))  
      {  
           $error = "<label class='text-danger'>Enter old password</label>";  
      }
      else if(empty($_POST["newpass"]))  
      {  
           $error = "<label class='text-danger'>enter new pasword</label>";  
      } 
      else if(empty($_POST["renewpass"]))  
      {  
           $error = "<label class='text-danger'>re enter new pasword</label>";  
      } 
              //$result=mysql_query($sql);
             else if($result)
              {
                if($result && mysqli_num_rows($result) > 0)
                {
                 $user_data = mysqli_fetch_assoc($result);
                    if($user_data['pass'] === $pass)
                      {
                           $sql = "UPDATE manager_info SET  pass='$newpass'WHERE user_id='$user_id'";
         
               mysqli_query($con, $sql);

              $result1 = mysqli_query($con, $sql);
              echo "password changed successfully";

                       }
      

      
                 }
              }
              else
              {
                echo "wrong pasword!";
              }
 }

    


              //$user_data1 = mysqli_fetch_assoc($result1);
        


  
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
                <h3 align="">change password</h3><br />                 
                <form method="post">  
                    <?php   
                     if(isset($error))  
                     {  
                          echo $error;  
                     }  
                     ?>
                     <br />  
                     <label>current password</label>  
                     <input type="text" name="pass" /><br />  
                     <label>new password</label>
                     <input type="text" name = "newpass" /><br />
                     <label>retype new password</label>
                     <input type="text" name = "renewpass" /><br />
                    
                     
                     <input type="submit" name="submit" value="save new password" class="btn btn-info" /><br />                      
                          <?php  
                     if(isset($message))  
                     {  
                          echo $message;  
                     }  
                     ?>  
                </form>  
           </div>  
     

     
         <h1 align="center">
     <a href="editprofile.php">Go back</a>&nbsp;&nbsp;&nbsp;&nbsp;
     </h1> 
           <br />  
      </body>  
 </html>  