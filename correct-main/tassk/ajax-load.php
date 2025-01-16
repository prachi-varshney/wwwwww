<?php
$conn = mysqli_connect("localhost","root","","test") or die("Connection failed");


$sql="select * from user";
$result = mysqli_query($conn, $sql) or die("sql query FAILED");
$output="";

if(mysqli_num_rows($result)>0){
    $output = '<table border="1" width="100%" cellspacing="0" cellpadding="10px">;

<tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone </th>
            <th>DOB</th>
            <th>Gender</th>
            <th>languages</th>
            <th>address</th>

            <th>Experience</th>
            <th>Salary</th>
            <th>Bio</th>
            <th>Image</th>
            <th>Action</th>
</tr>   ';
while($row = mysqli_fetch_assoc($result)){
    $output.= 
    
    "<tr>
    <td>{$row["id"]}</td>
    <td>{$row["name"]}</td>
    <td>{$row["email"]}</td>
    <td>{$row["password"]}</td>
    <td>{$row["phone"]}</td>
    <td>{$row["dob"]}</td>
    <td>{$row["gender"]}</td>
    <td>{$row["languages"]}</td>
    <td>{$row["state"]}</td>
    <td>{$row["district"]}</td>
    <td>{$row["pincode"]}</td>
    <td>{$row["experience"]}</td>
    <td>{$row["salary"]}</td>
    <td>{$row["address"]}</td>
    <td>{$row["bio"]}</td>
    <td>{$row["image"]}</td>
    </tr>";

}
$output.= "</table>";
 mysqli_close($conn);

 echo $output;

}else{
    echo "<h2>record not find.</h2>";
}


?>