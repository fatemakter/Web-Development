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
                <input class="form-control" type="text" id="firstname" name="firstname" required>
                
                <label for="lastname"><b>Last Name</b></label>
                <input class="form-control" type="text" id="lastname" name="lastname" required>
                
                <label for="email"><b>Email Address</b></label>
                <input class="form-control" type="email" id="email" name="email" required>
                
                <label for="phone"><b>Phone Number</b></label>
                <input class="form-control" type="phone" id="phone" name="phone" required>
                
                <label for="password"><b>Password</b></label>
                <input class="form-control" type="password" id="password" name="password" required>
               
                        <hr class="mb-3">
                        
                <input class="btn byn-primary" class="form-control" id="create" type="submit" name="create" value="Sign Up">
                        </div>
                </div>
            </div>
            </form>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        
        <script type="text/javascript">
            
            $(function(){
                
                $('#create').click(function(e){
                    
                    var valid = this.form.checkValidity();
        
            var firstname   = $('#firstname').val();
            var lastname    = $('#lastname').val();
            var email       = $('#email').val();
            var phone       = $('#phone').val();
            var password    = $('password').val();
                    
                    if(valid){
                        e.preventDefault();
                        $.ajax({
                            type: 'POST',
                            url: 'process.php',
                            data: {firstname: firstname,lastname: lastname,email: email,phone: phone,password: password},
                            success:function(data){
                                Swal.fire({
                                    'title':'Successful',
                                    'text':data,
                                    'type':'success'
                                })
                                
                                
                            },
                            Error:function(data){
                                Swal.fire({
                                    'title':'Error',
                                    'text':'there were errors while saving the data',
                                    'type':'error'
                                })
                            }
                            
                            
                    
                });
                   
                    }
                    
                    });
            });
            
        </script>
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
</body>
</html>