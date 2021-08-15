<?php
function check_cookies()
{
if(!empty($_POST["remember"])) {
    setcookie ("user_name",$_POST["user_name"],time()+ 50);
    setcookie ("pass",$_POST["pass"],time()+ 50);
    echo "Cookies Set Successfuly <br>";
    echo "Welcome ". $_POST["user_name"];
} else {
    setcookie("user_name","");
    setcookie("pass","");
    echo "Cookies Not Set. I will forget you !!!!";
}
}

?>