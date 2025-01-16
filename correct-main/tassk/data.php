<?php

// print_r($_POST['id']);
// print_r($_POST['name']);
// print_r($_POST['email']);
// print_r($_POST['password']);
// print_r($_POST['phone']);
// print_r($_POST['dob']);
// print_r($_POST['gender']);
// print_r($_POST['languages']);
// print_r($_POST['state']);
// print_r($_POST['district']);
// print_r($_POST['pincode']);
// print_r($_POST['experience']);
// print_r($_POST['salary']);
// print_r($_POST['address']);
// print_r($_POST['bio']);
// print_r($_POST['image']);





$id = isset($_POST['id']) ? $_POST['id'] : null;
$name = isset($_POST['name']) ? $_POST['name'] : null;
$email = isset($_POST['email']) ? $_POST['email'] : null;
$password = isset($_POST['password']) ? $_POST['password'] : null;
$phone = isset($_POST['phone']) ? $_POST['phone'] : null;
$dob = isset($_POST['dob']) ? $_POST['dob'] : null;
$gender = isset($_POST['gender']) ? $_POST['gender'] : null;
$languages = $_POST['language'];
$stringLanguage = implode(", " ,$languages);

$state = isset($_POST['state']) ? $_POST['state'] : null;
$district = isset($_POST['district']) ? $_POST['district'] : null;
$pincode = isset($_POST['pincode']) ? $_POST['pincode'] : null;
$experience = isset($_POST['experience']) ? $_POST['experience'] : null;
$salary = isset($_POST['salary']) ? $_POST['salary'] : null;
$address = isset($_POST['address']) ? $_POST['address'] : null;
$bio = isset($_POST['bio']) ? $_POST['bio'] : null;
$image = isset($_POST['image']) ? $_POST['image'] : null;

echo "ID: " . $id . "<br>";
echo "Name: " . $name . "<br>";
echo "Email: " . $email . "<br>";
echo "Password: " . $password . "<br>";
echo "Phone: " . $phone . "<br>";
echo "DOB: " . $dob . "<br>";
echo "Gender: " . $gender . "<br>";
echo "Languages: " . $stringLanguage . "<br>";
echo "State: " . $state . "<br>";
echo "District: " . $district . "<br>";
echo "Pincode: " . $pincode . "<br>";
echo "Experience: " . $experience . "<br>";
echo "Salary: " . $salary . "<br>";
echo "Address: " . $address . "<br>";
echo "Bio: " . $bio . "<br>";
echo "Image: " . $image . "<br>";

// print_r($_POST);




?>

