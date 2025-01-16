<?php
// include_once('datab.php');

include "coo.php";

    // $obj = new Database();
    $sql = "select * from User";
    $data = $conn->query($sql);
    if ($data['success'] == true)
    ?>
    <table width=100% border="1">
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
</tr>   


        <?php
        foreach ($data['data'] as $val) {
            ?>
            <tr>
                <td><?php echo $val['id'] ?></td>
                <td><?php echo $val['name'] ?></td>
                <td><?php echo $val['email'] ?></td>
                <td><?php echo $val['phone'] ?></td>
                <td><?php echo $val['dob'] ?></td>
                <td><?php echo $val['gender'] ?></td>
                <td><?php echo $val['languages'] ?></td>
                <td><?php echo $val['address'] ?>,
                    <?php echo $val['state'] ?>,
                    <?php echo $val['district'] ?>,
                    <?php echo $val['pincode'] ?>
                </td>


                <td><?php echo $val['experience'] ?></td>
                <td><?php echo $val['salary'] ?></td>
                <td><?php echo $val['bio'] ?></td>
                <td><?php echo $val['image'] ?></td>

                <td>
                    <a href="update.php?id=<?php echo $val['id']; ?>">update</a> |
                    <a href="delete.php?id=<?php echo $val['id']; ?>">delete</a> |
                    <a href="add.php?id=<?php echo $val['id']; ?>">Add</a>
                   
                </td>

            </tr>
            <?php
        }
        ?>
    </table>
    