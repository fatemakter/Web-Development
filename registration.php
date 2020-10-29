

<html>
<head>
    <title>User Registration | PHP</title></head>
    <link rel="stylesheet" type="text/css" href="css/bootstrap-grid.min.css">
    <body>
 
        <div>
        
                       <?php
            
            if(isset($_POST['create'])){

$link = mysqli_connect("localhost", "root", "", "useraccounts");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$firstname = mysqli_real_escape_string($link, $_REQUEST['firstname']);
$lastname = mysqli_real_escape_string($link, $_REQUEST['lastname']);
$email = mysqli_real_escape_string($link, $_REQUEST['email']);
$phone = mysqli_real_escape_string($link, $_REQUEST['phone']);
$password = mysqli_real_escape_string($link, $_REQUEST['password']);
                
                
                
                
                
                
// Attempt insert query execution
$sql = "INSERT INTO users (firstname,lastname,email,phone,password) VALUES ('$firstname','$lastname','$email','$phone','$password')";
                
                
if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
                
            }
            
?>
   
            
        </div>
        <div>
        <form action="registration.php" method="post">
            <div class="container">
                
                <div class="row">
                    
                    
                    <div class="col-sm-3">
                
            <h1>Registration</h1>
                <p>Fill up the with correct values.</p>
                <hr class="mb-3">
                        
                <label for="firstname"><b>First Name</b></label>
                <input class="form-control" type="text" name="firstname" required>
                
                <label for="lastname"><b>Last Name</b></label>
                <input class="form-control" type="text" name="lastname" required>
                
                <label for="email"><b>Email Address</b></label>
                <input class="form-control" type="email" name="email" required>
                
                <label for="phone"><b>Phone Number</b></label>
                <input class="form-control" type="phone" name="phone" required>
                
                <label for="password"><b>Password</b></label>
                <input class="form-control" type="password" name="password" required>
               
                        <hr class="mb-3">
                        
                <input class="btn byn-primary" class="form-control" type="submit" name="create" value="Sign Up">
                        </div>
                </div>
            </div>
            </form>
        </div>
        
</body>
</html>