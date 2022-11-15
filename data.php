<?php
include 'database.php';


// sql to create table
$sql = "CREATE TABLE users (
u_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
u_name VARCHAR(100) NOT NULL,
u_password VARCHAR(30) NOT NULL,
u_email VARCHAR(50) UNIQUE KEY,
u_reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table Users created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}


$sql_restaurant = "CREATE TABLE restaurant (
r_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
r_name VARCHAR(100) NOT NULL,
r_address VARCHAR(30) NOT NULL,
r_by VARCHAR(50),
u_reg_date TIMESTAMP
)";
if ($conn->query($sql_restaurant) === TRUE) {
    echo "Table Restaurant created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$sql_restaurant = "CREATE TABLE review (
r_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
r_name VARCHAR(100) NOT NULL,
r_address VARCHAR(100) UNIQUE KEY,
r_by INT(50),
r_date TIMESTAMP
)";
if ($conn->query($sql_restaurant) === TRUE) {
    echo "Table review created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>

