<?php
$email = $_POST['email'];
$password = $_POST['password'];

//Database Connection
$conn = new mysqli("localhost","root","","test");
if($conn->connect_error){
    die("Failed to Connect : ".$conn->connect_error);
}else{
    $stmt = $conn->prepare("select * from register where email = ? ");
    $stmt->bind_param("s",$email);
    $stmt->execute();
    $stmt_result = $stmt->get_result();
    if($stmt_result->num_rows > 0){
        $data = $stmt_result->fetch_assoc();
        if($data['password']===$password){
            echo "<h2>Login Successfully<h2>"; 
        }else{
            echo "<h2>Invalid Email or Password<h2>";
        }
    }else{
        echo "<h2>Invalid Email or Password<h2>";
    }
}
?>