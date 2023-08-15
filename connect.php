<?php
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$number = $_POST['number'];
$password = $_POST['password'];

//Database Connection

$conn = new mysqli("localhost","root","","test");
if($conn->connect_error){
    die('Connection Failed : '.$conn->connect_error);
}else{
    $stmt = $conn->prepare("insert into register(firstName, lastName, email, number, password)
    values(?,?,?,?,?)");
    $stmt->bind_param("sssis",$firstName,$lastName,$email,$number,$password);
    $stmt->execute();
    echo "Registration Successfully...";
    $stmt->close();
    $conn->close();
}
?>