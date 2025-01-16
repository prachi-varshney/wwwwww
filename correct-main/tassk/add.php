<?php


// Get form data
$name = isset($_POST['name']) ? $_POST['name'] : null;
$email = isset($_POST['email']) ? $_POST['email'] : null;
$password = isset($_POST['password']) ? $_POST['password'] : null;
$phone = isset($_POST['phone']) ? $_POST['phone'] : null;
$dob = isset($_POST['dob']) ? $_POST['dob'] : null;
$gender = isset($_POST['gender']) ? $_POST['gender'] : null;
$languages = isset($_POST['language']) && is_array($_POST['language']) ? implode(", ", $_POST['language']) : null;
$state = isset($_POST['state']) ? $_POST['state'] : null;
$district = isset($_POST['district']) ? $_POST['district'] : null;
$pincode = isset($_POST['pincode']) ? $_POST['pincode'] : null;
$experience = isset($_POST['experience']) ? $_POST['experience'] : null;
$salary = isset($_POST['salary']) ? $_POST['salary'] : null;
$address = isset($_POST['address']) ? $_POST['address'] : null;
$bio = isset($_POST['bio']) ? $_POST['bio'] : null;

// Handle file upload
$image = isset($_FILES['image']['name']) ? $_FILES['image']['name'] : null;
$image_tmp = isset($_FILES['image']['tmp_name']) ? $_FILES['image']['tmp_name'] : null;
$image_path = "uploads/" . basename($image); // Save image in the "uploads" folder

// Print out form data for debugging
echo "Form Data:<br>";
echo "Name: $name<br>";
echo "Email: $email<br>";
echo "Password: $password<br>";
echo "Phone: $phone<br>";
echo "DOB: $dob<br>";
echo "Gender: $gender<br>";
echo "Languages: $languages<br>";
echo "State: $state<br>";
echo "District: $district<br>";
echo "Pincode: $pincode<br>";
echo "Experience: $experience<br>";
echo "Salary: $salary<br>";
echo "Address: $address<br>";
echo "Bio: $bio<br>";
echo "Image: $image<br>";


include "coo.php";

$sql= "INSERT INTO user 
VALUES (null,'$name', '$email', '$password', $phone,$dob,'$gender', '$languages','$state','$district',$pincode,$experience,$salary,'$address','$bio', '$image')";

$conn->query($sql);



// Check if form data is valid
// if ($name && $email && $password && $phone && $dob && $gender && $languages && $state && $district && $pincode && $experience && $salary && $address && $bio && $image) {
//     // Move uploaded file to the desired location
//     if (move_uploaded_file($image_tmp, $image_path)) {
//         // Insert data into the database using prepared statements
//         $stmt = $db->prepare("INSERT INTO User (id,name, email, password, phone, dob, gender, languages, state, district, pincode, experience, salary, address, bio, image)
// VALUES (?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
//         $stmt->bind_param("sssssssssssssss", $name, $email, password_hash($password, PASSWORD_DEFAULT), $phone, $dob, $gender, $languages, $state, $district, $pincode, $experience, $salary, $address, $bio, $image_path);
//         $stmt->execute();

//         if ($stmt->affected_rows > 0) {
//             echo "Data inserted successfully!";
//         } else {
//             echo "Error inserting data.";
//         }
//     } else {
//         echo "Error uploading image.";
//     }
// } else {
//     echo "Invalid form data.";
// }



?>