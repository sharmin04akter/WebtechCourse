<!DOCTYPE HTML>  
<html>
<head>
<style>
</style>
</head>
 <body
 
 style="background-color:pink;"
 style="justify-content: center;"


>

<?php

$naME = $emAIL = $genDER = $dOB= $bG= $dG="" ;
$name = $email = $gender = $dob= $bg= $dg="";


if ($_SERVER["REQUEST_METHOD"] == "POST")

 {
  if (empty($_POST["name"])) {
    $naME = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    
     
    if (!preg_match("/^[a-zA-Z-' , ]*$/",$name)) {
      $naME = "Only letters and white space allowed";
      $name="";
     
    }

    }
  
  if (empty($_POST["email"])) {
    $emAIL = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emAIL = "Invalid email format";
      $email="";
    }
  }
    
  
  if (empty($_POST["gender"])) {
    $genDER = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>PHP TASK(lab_task_2)</h2>
<p><span class="error">REQUIRED FIELD</span></p>

<form method="post" action="
<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);
?>">  

  NAME: <input type="text" name="name" value="
  <?php echo $name;
?>">
  <span class="error">
  	<?php echo $naME;?></span>

  <br><br>

  EMAIL: <input type="text" name="email" value="
  <?php echo $email;

?>">
  <span class="error">
   <?php echo $emAIL;?></span>
  <br><br>
  
  GENDER:
  <input type="radio" name="gender" 
			<?php if (isset($gender) && $gender=="female")
			echo "checked";?> value="female">Female

  <input type="radio" name="gender"
  	 <?php if (isset($gender) && $gender=="male")
   	 echo "checked";?> value="male">Male

  <input type="radio" name="gender"
   	<?php if (isset($gender) && $gender=="other")
   	 echo "checked";?> value="other">Other  

  <span class="error">
  	 <?php echo $genDER;?></span><br><br>


	DOB:
  <input type="date" name="DOB" id="date1" min="1900-01-01" max="1990-01-01"  value="
  	<?php echo $dob;?>" >
<span class="error">
	 <?php echo $dOB;
		?></span>

  <br><br>
<br><br>
 BLOOD GROUP:
 <input style=" text-align:center;" list="states" name="state" id="state" value="<?php echo $dob;?>"   > 
<span class="error">* <?php echo $bG;?></span>
  <br><br>
  <datalist id="states">
    <option value="A+">
    <option value="A-">
    <option value="B+">
    <option value="B-">
    <option value="AB+">
      <option value="AB-">

        <option value="AB+">
      <option value="AB-">
  </datalist><br><br>
  <br><br>


DEGREE (Select at least 3):
  <input type="radio" name="dg"
   <?php if (isset($dg) && $dg=="ssc") echo "checked";?> value="ssc">SSC
  <input type="radio" name="dg1"
   <?php if (isset($dg) && $dg=="hsc") echo "checked";?> value="hsc">HSC
   <input type="radio" name="dg2"
    <?php if (isset($dg) && $dg=="bsc") echo "checked";?> value="bsc">BSC

   <input type="radio" name="dg3"
    <?php if (isset($dg) && $dg=="msc") echo "checked";?> value="msc">MSC
  <span class="error">* <?php echo $dG;?></span><br><br>




  <input type="submit" name="submit" value="Submit">  




</form>

<?php
echo "<h2>Your_Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";

echo $gender;
echo"<br> ";
echo $dob;
echo "<br>";

echo $bg;
echo"<br>";
echo$dg;

?>
 


</body>
</html>