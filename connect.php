<?php
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $msg = $_POST['msg'];

    //Database Connection
    $conn = new mysqli('localhost','root','','contact');
    if($conn->connect_error){
        die('Connection Failed : '.$conn->connect_error);
    }else{
        $stmt = $conn->prepare("insert into contactus(name, email, subject, msg)
            values(?, ?, ?, ?)");
        $stmt->bind_param("ssss",$name, $email, $subject, $msg);
        $stmt->execute();
        echo "Message Send Successfully...";
        $stmt->close();
        $conn->close();
    }

?>