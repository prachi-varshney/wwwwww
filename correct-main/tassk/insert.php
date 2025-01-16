<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <title>Simple HTML Form</title>
</head>

<body>
    <h2>Registration Form</h2>
    <form id="myformData" enctype="multipart/form-data">

        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" required><br><br>


        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>


        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>


        <label for="phone">Phone No:</label><br>
        <input type="tel" id="phone" name="phone" required><br><br>


        <label for="dob">Date of Birth:</label><br>
        <input type="date" id="dob" name="dob" required><br><br>


        <label>Gender:</label><br>
        <input type="radio" id="male" name="gender" value="male" required>
        <label for="male">Male</label><br>
        <input type="radio" id="female" name="gender" value="female">
        <label for="female">Female</label><br>
        <input type="radio" id="other" name="gender" value="other">
        <label for="other">Other</label><br><br>


        <label>Languages Known:</label><br>
        <input type="checkbox" id="hindi" name="language[]" value="hindi">
        <label for="hindi">Hindi</label><br>
        <input type="checkbox" id="english" name="language[]" value="english">
        <label for="english">English</label><br>
        <input type="checkbox" id="otherLang" name="language[]" value="other">
        <label for="otherLang">Other</label><br><br>


        <label for="state">State:</label><br>
        <input type="text" id="state" name="state" required><br><br>


        <label for="district">District:</label><br>
        <input type="text" id="district" name="district" required><br><br>


        <label for="pincode">Pincode:</label><br>
        <input type="text" id="pincode" name="pincode" required><br><br>


        <label for="experience">Experience (in years):</label><br>
        <input type="number" id="experience" name="experience" required><br><br>


        <label for="salary">Salary:</label><br>
        <input type="number" id="salary" name="salary" required><br><br>


        <label for="address">Address:</label><br>
        <textarea id="address" name="address" rows="4" cols="50" required></textarea><br><br>


        <!-- <label for="bio">Bio:</label> -->

        <textarea id="bio" name="bio" rows="4" cols="50" required></textarea><br><br>


        <label for="image">Upload Image:</label><br>
        <input type="file" id="image" name="image" accept="image/*" required><br><br>

        <!-- Submit Button -->
        <input type="button" value="Submit" id="btn-submit" >
        <!-- <input type="submit" value="Save" id="save-button"> -->



        <!-- <button id="load-button">submit</button> -->

        <td id="table-data">

        </td>


        <script>
            // $(document).ready(function () {
            //     function loadTable() {
            //         $.ajax({
            //             url: "ajax-load.php",
            //             type: "post",
            //             // data: formdata,
            //             // processData: false,
            //             // contentType: false,
            //             type: "POST",
            //             success: function (data) {
            //                 // console.log(data);
            //                 // $('#myformData').html(data);

            //             }
            //         });

            //     }


            // });

            // loadTable();



            $("#btn-submit").on("click", function () {
                let formdata = new FormData(myformData);

                $.ajax({
                    url: "ajax-insert.php",
                    type: "post",
                    data: formdata,
                    processData: false,
                    contentType: false,
                    type: "POST",
                    success: function (data) {
                        console.log(data);
                        if (data == "1") {
                            // loadTable();
                        }
                        else {
                            alert("not save");
                        }




                        // $('#myformData').html(data);

                    }
                });


            });



        </script>
    </form>
</body>

</html>