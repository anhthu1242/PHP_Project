<?php 
    $conn = mysqli_connect("localhost","root","admin","admissionsManagement");
    if(!$conn)
    {
        echo "loi ket noi";
        exit();
    }
    mysqli_query($conn,"set names utf8");
    
?>