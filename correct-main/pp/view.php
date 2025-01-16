<!DOCTYPE html>
<html lang="en">


<head>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>


</head>

<body class="m-4">
    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home"
                type="button" role="tab" aria-controls="pills-home" aria-selected="true">List</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile"
                type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Form</button>
        </li>


    </ul>




    <div class="tab-content m-2" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <div id="search-bar">
                <label>search :</label>
                <input type="text" id="search" autocomplete="off">
            </div>
            <table class="table table-bordered">
                <thead class="bg-secondary text-white">
                    <tr>
                        <th scope="col">#ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone No</th>
                        <th scope="col">DOB</th>
                        <th scope="col">Experience</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Hobbies</th>
                        <th scope="col">Salary</th>
                        <th scope="col">Address</th>
                        <th scope="col">Bio</th>
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody id="list_table">
                </div>
                
                </tbody>
              
            </table>
            <div id="pagination">
                    <a class="active" id="1" href="">1</a>
                    <a id="2" href="">2</a>
                    <a id="3" href="">3</a>

                </div>
        </div>
        <div class="tab-pane fade m-2" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            <form id="dataFrom" enctype="multipart/form-data">
                <div class="row">
                    <!-- <div class="mb-3 col-md-3">
                        <label class="form-label">Name <span class="req-star">*</span></label>
                        <input type="text" class="form-control form-control-sm" name="name" id="name" />
                    </div> -->

                    <div class="mb-3 col-md-3">
                        <label class="form-label">Name <span class="req-star">*</span></label>
                        <input type="text" class="form-control form-control-sm" name="name" id="name" />
                        <span id="name-error" style="color: red;"></span>
                    </div>

                    <!-- 
                    <div class="mb-3 col-md-3">
                        <label class="form-label">Email <span class="req-star">*</span></label>
                        <input type="text" class="form-control form-control-sm" name="email" id="email" />
                    </div> -->



                    <div class="mb-3 col-md-3">
                        <label class="form-label">Email <span class="req-star">*</span></label>
                        <input type="text" class="form-control form-control-sm" name="email" id="email" />
                        <span id="email-error" style="color: red;"></span>
                    </div>
                    <!-- <div class="mb-3 col-md-3">
                        <label class="form-label">Phone No <span class="req-star">*</span></label>
                        <input type="text" class="form-control form-control-sm" name="phone_no" id="phone_no" />
                    </div>-->
                    <div class="mb-3 col-md-3">



                        <label class="form-label">Phone No <span class="req-star">*</span></label>
                        <input type="text" class="form-control form-control-sm" name="phone_no" id="phone_no" />
                        <span id="phone_no-error" style="color: red;"></span>
                    </div>

                    <div class="mb-3 col-md-3">
                        <label class="form-label">Dob <span class="req-star">*</span></label>
                        <input type="date" class="form-control form-control-sm" name="dob" id="dob" />
                    </div>

                    <!-- <div class="mb-3 col-md-3">
                        <label class="form-label">Experience <span class="req-star">*</span></label>
                        <input type="text" class="form-control form-control-sm" name="experience" id="experience" />
                    </div> -->



                    <div class="mb-3 col-md-3">
                        <label class="form-label">Experience <span class="req-star">*</span></label>
                        <input type="text" class="form-control form-control-sm" name="experience" id="experience" />
                        <span id="experience-error" style="color: red;"></span>
                    </div>


                    <div class="mb-3 col-md-3">
                        <label class="form-label">Salary <span class="req-star">*</span></label>
                        <input type="text" class="form-control form-control-sm text-end" name="salary" id="salary" />
                    </div>

                    <div class="mb-3 col-md-3">
                        <label class="form-label " for="state">State <span class="req-star">*</span></label>
                        <select class="form-select form-select-sm selectpicker" name="state" id="state" required>
                            <option value="">Select </option>
                        </select>
                    </div>
                    <div class="mb-3 col-md-3">
                        <label class="form-label " for="city">City <span class="req-star">*</span></label>
                        <select class="form-select form-select-sm" name="city" id="city" required>
                            <option value="">Select </option>
                        </select>
                    </div>
                    <div class="mb-3 col-md-2">
                        <label class="form-label" for="pincode">Pincode <span class="req-star">*</span></label>
                        <input type="text" class="form-control form-control-sm" maxlength="6" name="pincode"
                            id="pincode" required />
                    </div>
                    <div class="mb-3 col-md-3">
                        <label class="form-label"> <span class="req-star">Profile*</span></label>
                        <input type="file" class="form-control form-control-sm" name="profile" id="profile" />
                    </div>


                    <div class="mb-3 col-md-3">
                        <label class="form-label" for="">Gender</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="genderMale" value="male">
                            <label class="form-check-label" for="genderMale">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="genderFemale" value="female">
                            <label class="form-check-label" for="genderFemale">Female</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="genderOther" value="other">
                            <label class="form-check-label" for="genderOther">Other</label>
                        </div>
                    </div>
                    <div class="mb-3 col-md-3">
                        <label class="form-label" for="">Hobbies</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="hobbies[]" id="hobbyReading"
                                value="reading">
                            <label class="form-check-label" for="hobbyReading">Reading</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="hobbies[]" id="hobbyCoding"
                                value="coding">
                            <label class="form-check-label" for="hobbyCoding">Coding</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="hobbies[]" id="hobbyOther"
                                value="other">
                            <label class="form-check-label" for="hobbyOther">Other</label>
                        </div>



                        <div id="otherHobbyInput" style="display: none;">
                            <input type="text" class="form-control form-control-sm mt-2" id="otherHobby"
                                name="hobbies[]" placeholder="Specify other hobby">
                        </div>
                    </div>




                </div>



                <div class="mb-3 col-md-4">
                    <label class="form-label">Bio </label>
                    <textarea class="form-control" name="bio" id="bio"> </textarea>
                </div>
                <div class="mb-3 col-md-4">
                    <label class="form-label">Address </label>
                    <textarea class="form-control" name="address" id="address"> </textarea>
                </div>
                <div class="row mt-2 float-end">
                    <div class="col-md-12 ">
                        <button type="reset" class="btn btn btn-secondary me-2">Reset</button>

                        <button type="button" class="btn btn btn-primary" onclick="addRec()">Submit</button>
                    </div>
             
            </form>
        </div>
    </div>
</body>

<!-- <script>
    $(document).ready(function () {
        tableList();


    // Delete record
        $(document).on("click", ".btn.btn-sm.btn-danger", function () {
            // console.log("click")
            let emppid = $(this).data("id"); // Get the ID from the data-id attribute
            if (confirm("Are you sure you want to delete this record?")) {
                $.ajax({
                    url: "delete.php",
                    type: "POST",
                    data: { id: emppid }, // Send the ID to the server
                    success: function (data) {
                        // console.log(data);
                        if (data == 1) {
                            tableList(); // Reload the table after deletion
                        } else {
                            alert("Failed to delete the record. Please try again.");
                        }
                    },
                    error: function () {
                        alert("An error occurred while deleting the record. Please try again.");
                    }
                });
            }
        });

    });

    //add record
    function addRec() {
        var formElem = document.getElementById('dataFrom');
        var formData = new FormData(formElem);

        formData.append('type', 'addupdate');
        $.ajax({
            type: 'POST',
            url: 'crud.php',
            data: formData,
            processData: false,
            contentType: false,
            async: false,
            dataType: "json",
            success: function (result) {
                tableList();
                alert(result.message);
            },
            error: function (xhr, status, error) {
                console.log("Error:", error);
            }
        });
    }


    function tableList() {
        $.ajax({
            type: 'POST',
            url: 'crud.php',
            data: {
                type: 'list'
            },
            dataType: "HTML",
            success: function (result) {
                $('#list_table').html(result);
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                alert('err');
            }
        });
    }





</script> -->

<script>
    $("#search").on("keyup", function () {
        var search_term = $(this).val();
        $.ajax({
            url: "live-search.php",
            type: 'POST',
            data: { search: search_term },
            success: function (data) {
                $("#list_table").html(data);
            }
        })
    })
</script>

<script>
// $(document).ready(function(){
//     function loadtable(page){
// $.ajax{
//     url:"pagination.php",
//     type:"POST",
//     data:{
//         page_no:page
//         },
//         success:function(data){
//             $("#list_table").html(data);
//             }
// }
//     }
//     loadtable();

//     //pagination code
//     $(document).on("click","#pagination a",function(e)){
//         e.preventDefault();
//         var page_id=$(this).attr("id");
//         loadtable(page_id);
        


//     }
// })


$(document).ready(function(){
    function loadTable(page) {
        $.ajax({
            url: "pagination.php",
            type: "POST",
            data: {
                page_no: page,
                type: "list"  // Ensure the server knows what type of request this is
            },
            success: function(data) {
                $("#list_table").html(data);
            }
        });
    }

    // Initial load
    loadTable(1);

    // Pagination click event
    $(document).on("click", "#pagination a", function(e) {
        e.preventDefault();
        var page_id = $(this).attr("id");
        loadTable(page_id);
    });
});

</script>


<script src="script.js"></script>

</html>