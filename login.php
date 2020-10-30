<?php

$host="localhost";
$user="root";
$password="";
$db="useraccounts";

$link=mysqli_connect($host,$user,$password);
mysqli_select_db($link,$db);

if(isset($_POST['submit'])){
    
$uname=$_POST['email'];
$password=$_POST['password'];

$sql="select email,password from users where email='".$uname."' AND password='".$password."' limit 1";

$result=mysqli_query($link,$sql);

if(mysqli_num_rows($result)==1){
   echo " Sccessfully Logged In";
    exit();
} else{
    echo " Incorrect Data";
    exit();
}
 
}
?>

<html>
<head>
<title>longin form design</title>
    <link rel="stylesheet" type="text/css" href="style.css">  
<body>
    <div class="loginbox">
        <h1>Login Here</h1>
        <form method="POST" action="#">
            <p>Email</p>
            <input type="email" name="email" placeholder="Provide Email">
            <p>Password</p>
            <input type="password" name="password" placeholder="Provide password">
            <input type="submit" name="submit" value="Login">
            <a href="#">Lost your password?</a><br>
            <a href="#">Don't have an account?</a>
        
        </form>
    </div>
</body>
</head>
</html>