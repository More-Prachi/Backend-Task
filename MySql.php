<?php
// echo "welcome to databe connectivity ..." ;
// connecting DB :
$servername="localhost";
$username="root";
$password="";
$dbname="sample"; 
//create a connection :
$conn=mysqli_connect($servername,$username, $password, $dbname);
// Die if connection fails:
    if(!$conn){
        die("sorry we failed to connect :" . mysqli_connect_error() );
    }
    
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $city = $_POST['city'];
    //checking the conditions if all the variables are entered by the user
    if(!empty($name) && !empty($contact) && !empty($email) && !empty($city)){
        //sql query for inserting the record into database
        $insert_qry = "INSERT INTO customer (Name, Contact, Email, City) VALUES ('$name','$contact', '$email', '$city')";
        //establishing the connection so as to insert the record
        $result = mysqli_query($conn,$insert_qry);    //returns true or false
        if($result){
            //declaring a response array so as to display the message
            $response = array(
                "status" => true,
                "message" => "Record inserted successfully."
            );
        }
        else{
                  $response = array(
                "status" => false,
                "message" => "Something went wrong."
            );
        }
    }
    else
    {
        $response = array(
            "status" => false,
            "message" => "Name, contact, email & city required."
        );
    }
    //echoing the $response as per the action in json format
    echo json_encode($response);
?> 





