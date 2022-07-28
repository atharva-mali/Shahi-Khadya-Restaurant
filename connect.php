<?php
$name = $_POST['name'];
$phone = $_POST['phone'];
$food = $_POST['food'];
$email = $_POST['email'];
$quantity = $_POST['quantity'];
$addFood = $_POST['addFood'];
$address = $_POST['address'];
$message = $_POST['message'];

//Database Connection
$conn = new mysqli('localhost', 'root', '', 'food_website');
if ($conn->connect_error) {
    die('Connection Failed : ' . $conn->connect_error);
} else {
    $stmt = $conn->prepare("insert into orders(name,phone,food,email,quantity,addFood,address,message) values(?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sississs", $name, $phone, $food, $email, $quantity, $addFood, $address, $message);
    $stmt->execute();
    echo "Order Placed...";
    echo "Sit back and wait for your order to be processed.";
    $stmt->close();
    $conn->close();
}
