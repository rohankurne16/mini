<?php

$conn = new mysqli("localhost","root","","mini");

if($conn->connect_error){
    die($conn->connect_error);
}

$sql = "INSERT INTO register(name,email,mobile,password)
VALUES('Test','test@gmail.com','9999999999','1234')";

if($conn->query($sql)){
    echo "Inserted";
}else{
    echo $conn->error;
}
?>