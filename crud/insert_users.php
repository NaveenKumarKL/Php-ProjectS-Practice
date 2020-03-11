<?php

include_once 'includes/connection.php';

if(isset($_POST["firstname"]))
{
    try
    {
         

        $sql = "INSERT INTO users (firstname, lastname, email, phone, alternate, address) VALUES (:firstname, :lastname, :email, :phone, :alternate, :address)";

        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':firstname', $firstname, PDO::PARAM_STR);
        $stmt->bindParam(':lastname', $lastname, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
        $stmt->bindParam(':alternate', $alternate, PDO::PARAM_STR);
        $stmt->bindParam(':address', $address, PDO::PARAM_STR);
        
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $email = $_POST["email"];   
        $phone = $_POST["phone"];   
        $alternate = $_POST["alternate"];   
        $address = $_POST["address"];  

        $stmt->execute();

        echo "User Added Successfully";

    }
    catch(PDOException $e)
    {
        echo "User Could not be Added.";
        die("ERROR: Could not prepare/execute query: $sql. " . $e->getMessage());
    }    
    // Close statement
    unset($stmt);
    
    // Close connection
    unset($conn);

}
else
{
    echo "Something went wrong";
}