<?php
require('../Including/db_connection.php');
?>

<?php
if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['register'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $pass = $_POST['password'];
    $cpass = $_POST['cpassword'];

    // Validate email
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo "Invalid email format";
    }

    if(!$pass == $cpass){
        echo "Passwords do not match";
    }

    $photo = $_FILES['photo']['name'];
    $tempphoto = $_FILES['photo']['tmp_name'];
    $folder = "../uploadphoto/users/".basename($photo);
    move_uploaded_file($tempphoto, $folder);

    // Prevent SQL injection by escaping inputs
    $email = mysqli_real_escape_string($conn, $email);

    $query = "SELECT * FROM users WHERE email='$email'";
    $data = mysqli_query($conn, $query);
    $total = mysqli_num_rows($data);

    if($total == 1){
        echo "<script>alert('This email is already taken!');</script>";
    }else{
        if(!empty($username) && !empty($email) && !empty($contact) && !empty($pass) && !empty($cpass)){
            $sql = "INSERT INTO users (username, email, contact, password, cpassword, photo) VALUES ('$username', '$email', '$contact', '$pass', '$cpass', '$photo')";
            $result = mysqli_query($conn, $sql);

            if($result){
                echo "<script>alert('User registered successfully!');</script>";
                echo "<meta http-equiv='refresh' content='0; url=http://localhost/dreamyrental/User/index.php'>  ";
                
            }else{
                echo "<script>alert('Failed to register!');</script>";
            }
        }
    }
    
}else{
    echo "Error: Invalid request method";
}
?>