<?php

$host='localhost';
$username='root';
$password='';
$dbname='db.php';

try{

    $conn=new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
    
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    $query="INSERT INTO db(name,email,subject,message,rating) VALUES (:name,:email,:subject,:message,:rating)";

    $stmt=$conn->prepare($query);
    $stmt->bindParam(':name',$name);
    $stmt->bindParam(':email',$email);
    $stmt->bindParam(':subject',$subject);
    $stmt->bindParam(':message',$message);
    $stmt->bindParam(':rating',$rating);

    $name=$_POST['name'];
    $email=$_POST['email'];
    $subject=$_POST['subject'];
    $message=$_POST['message'];
    $rating=$_POST['rating'];
    $stmt->execute();
    
    echo "records inserted succesfully";
    
}catch(PDOException $e){

    echo("connection error") .$e->getMessage();
}

?>