<?php

        // $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $phone = $_POST['phone'];
        $pincode = $_POST['pincode'];
        $dob = $_POST['dob'];
        $gender = $_POST['gender'];
        $languages = $_POST['languages'];
        $state = $_POST['state'];
        $district = $_POST['district'];
        $pincode = $_POST['pincode'];
        $experience = $_POST['experience'];
        $salary = $_POST['salary'];
        $address = $_POST['address'];
        $bio = $_POST['bio'];
        $image = $_POST['image'];


    $conn = mysqli_connect("localhost", "root", "", "test") or die("Connection failed");

    $sql= "INSERT INTO user (id,name,email,password,phone,pincode,dob,gender,languages,state,district,pincode,experience,salary,address,bio,image)
    values(null,'{$_POST['name']}', '$email', '$password', $phone,$dob,'$gender', '$languages','$state','$district',$pincode,$experience,$salary,'$address','$bio', '$image')";

    $conn->query($sql);
    
// $result=mysqli_query($conn,$sql) or die("query failed");


if($conn->query($sql)) {
    echo $sql;
    } else {
        echo 0;
    }

?>