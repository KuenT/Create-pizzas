<?php

//connect to database
$conn = mysqli_connect('localhost', 'quentin', 'test1234', 'pizzas');

//check connection
if(!$conn){
    echo 'Connection error: ' . mysqli_connect_error();
}

?>