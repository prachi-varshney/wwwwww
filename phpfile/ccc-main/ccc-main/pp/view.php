<html>

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
    <style>
        span {
            color: red;
        }
    </style>

</head>

<body class="m-4">
    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home"
                type="button" role="tab" aria-controls="pills-home" aria-selected="true">List</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile"
                type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Add/Edit</button>
        </li>
    </ul>
    <div class="tab-content m-2" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

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
                        <th scope="col" style="min-width:120px !important">Action</th>

                    </tr>
                </thead>
                <tbody id="list_table">

                </tbody>
            </table>
        </div>
        <div class="tab-pane fade m-2" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            <form id="dataFrom" enctype="multipart/form-data">
                <div class="row">
                    <input type="hidden" name="id" id="id">
                    <div class="mb-3 col-md-3">
                        <label class="form-label">Name <span class="req-star">*</span></label>
                        <input type="text" class="form-control form-control-sm" maxlength="50" name="name" id="name" />
                        <div id="nameError" class="text-danger" style="display: none;">Name is required.</div>
                    </div>
                    <div class="mb-3 col-md-3">
                        <label class="form-label">Email <span class="req-star">*</span></label>
                        <input type="text" class="form-control form-control-sm" maxlength="50" name="email"
                            id="email" />
                        <div id="emailError" class="text-danger" style="display: none;">Email is required and should be
                            valid.</div>
                    </div>
                    <div class="mb-3 col-md-3">
                        <label class="form-label">Phone No <span class="req-star">*</span></label>
                        <input type="text" class="form-control form-control-sm numeric" maxlength="10" name="phone_no"
                            id="phone_no" />
                        <div id="phoneError" class="text-danger" style="display: none;">Phone number is required.</div>
                    </div>
                    <div class="mb-3 col-md-3">
                        <label class="form-label">Dob <span class="req-star">*</span></label>
                        <input type="date" class="form-control form-control-sm" name="dob" id="dob" />
                        <div id="dobError" class="text-danger" style="display: none;">Date of birth is required.</div>
                    </div>

                    <div class="mb-3 col-md-3">
                        <label class="form-label">Experience </label>
                        <input type="text" class="form-control form-control-sm numeric" name="experience"
                            id="experience" maxlength="2" />
                    </div>
                    <div class="mb-3 col-md-3">
                        <label class="form-label">Salary </label>
                        <input type="text" class="form-control form-control-sm text-end numeric" name="salary"
                            id="salary" maxlength="10" value="" />
                    </div>

                    <div class="mb-3 col-md-3">
                        <label class="form-label " for="state">State <span class="req-star">*</span> </label>
                        <select class="form-select form-select-sm selectpicker" name="state" id="state"
                            onclick="getdistrictOfState()">
                        </select>
                        <div id="stateError" class="text-danger" style="display: none;">State is required.</div>

                    </div>
                    <div class="mb-3 col-md-3">
                        <label class="form-label " for="district">district <span class="req-star">*</span> </label>
                        <select class="form-select form-select-sm" name="district" id="district">
                            <option value="">Select </option>
                        </select>
                        <div id="districtError" class="text-danger" style="display: none;">district is required.</div>

                    </div>
                    <div class="mb-3 col-md-1">
                        <label class="form-label" for="pincode">Pincode </label>
                        <input type="text" class="form-control form-control-sm numeric" name="pincode" id="pincode"
                            required minlength="6" maxlength="6" />
                    </div>
                    <div class="mb-3 col-md-3">
                        <label class="form-label">Profile </label>
                        <input type="file" accept="image/*" class="form-control form-control-sm" name="profile"
                            id="profile" />
                    </div>
                    <div class="mb-3 mt-3 col-md-1 d-none d-flex" id="userimage">
                        <div>
                            <img id="imagePreview" style="min-width: 30px; max-width:30; height:auto" />
                        </div>
                        <div class="m-auto">
                            <button type="button" class="btn btn-sm btn-danger rounded-cricle"
                                onclick="deletePreview()">X</button>
                        </div>
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
                            <input class="form-check-input" type="checkbox" id="hobbyOther" value=""
                                onclick="ohterHobbies()">
                            <label class="form-check-label" for="hobbyOther">Other</label>
                        </div>

                    </div>
                    <div class="mb-3 col-md-1 d-none mt-4" id="otherhobbiefield">
                        <input type="text" class="form-control form-control-sm" maxlength="200" name="other_hobbies"
                            id="other_hobbie" placeholder="hobbies.." />


                    </div>
                    <div class="mb-3 col-md-4">
                        <label class="form-label">Bio </label>
                        <textarea class="form-control" name="bio" id="bio"> </textarea>
                    </div>
                    <div class="mb-3 col-md-4">
                        <label class="form-label">Address </label>
                        <textarea class="form-control" name="address" id="address"> </textarea>
                    </div>
                </div>
                <div class="row mt-2 float-end">
                    <div class="col-md-12 ">
                        <button type="reset" class="btn btn btn-secondary me-2"
                            onclick="validationReset()">Reset</button>

                        <button type="button" class="btn btn btn-primary" onclick="addRec()">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

<script>




    $(document).ready(function () {
        tableList();
        stateList();
    });

    function getdistrictOfState() {
        var state_id = $("#state").val();
        if (state_id) {
            districtList(state_id);
        }
    }

    document.getElementById('profile').addEventListener('change', function (event) {
        const file = event.target.files[0];
        $('#userimage').removeClass('d-none')
        if (file) {
            const imagePreview = document.getElementById('imagePreview');
            imagePreview.src = URL.createObjectURL(file);
        }
    });

    function ohterHobbies() {
        $('#otherhobbiefield').removeClass('d-none')


    }




    function deletePreview() {
        $('#imagePreview').attr('src', '');         //removes the image displayed in the preview area.

        $('#userimage').addClass('d-none');          //hide elements by setting their display property to none.
        $('#profile').val('');          //This clears any selected file or value in the input field
    }


    function deleteData(id) {
        if (confirm("Do you want to delete this record?")) {
            $.ajax({
                type: 'POST',
                url: 'crud.php',
                data: {
                    type: 'delete',
                    id: id
                },
                dataType: "json",
                success: function (result) {
                    if (result.success == 'true' || result.success == true) {
                        alert(result.message);
                        tableList();
                        tabChange('pills-home-tab');
                    }
                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    alert('Error: Unable to delete the record.'); // Show error message
                }
            });
        } else {
            // If the user clicks "Cancel", do nothing
            console.log("Deletion canceled by user.");
        }
    }

    function stateList(id) {
        $.ajax({
            type: 'POST',
            url: 'crud.php',
            data: {
                type: 'state',
            },
            dataType: "HTML",
            success: function (result) {
                $("#state").html('<option value="">Select</option>' + result);
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                alert('err');
            }
        });
    }

    function districtList(state_id) {
        $.ajax({
            type: 'POST',
            url: 'crud.php',
            data: {
                type: 'district',
                state_id: state_id
            },
            dataType: "HTML",
            success: function (result) {
                $("#district").html(result);

            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                alert('err');
            }
        });
    }



    function getFromData(id) {
        $.ajax({
            type: 'POST',
            url: 'crud.php',
            data: {
                type: 'edit',
                id: id
            },
            dataType: "json",
            success: function (result) {
                $("#id").val(result.data.id);
                $("#name").val(result.data.name);
                $("#email").val(result.data.email);
                $("#phone_no").val(result.data.phone_no);
                $("#dob").val(result.data.dob);
                $("#experience").val(result.data.experience);
                $("#salary").val(result.data.salary);
                $("#address").val(result.data.address);
                $("#bio").val(result.data.bio);
                $("#state").val(result.data.state);
                $(".rounded-cricle").css("display","block")

                    var imagePath = result.data.Image;

                    // Display the image on the edit page
                    if (imagePath) {
                    $('#imagePreview').attr('src', imagePath);
                    $('#imagePreview').attr('data-src', imagePath); // Add this line
                    $('#userimage').removeClass('d-none');
                } else {
                    $('#imagePreview').attr('src', '');
                    $('#userimage').addClass('d-none');
                }



                districtList(result.data.state);
                setTimeout(() => {
                    $("#district").val(result.data.districts);
                }, 500);


                $("#pincode").val(result.data.pincode);

                if (result.data.gender) {
                    $("input[name='gender'][value='" + result.data.gender + "']").prop("checked", true);
                }

                // if (result.data.hobbies) {
                //     var hobbiesArr = result.data.hobbies.split(',');
                //     hobbiesArr.forEach(function (hobby) {
                //         hobby = hobby.trim();
                //         $("input[name='hobbies[]'][value='" + hobby + "']").prop("checked", true);
                //     });
                // }
                



  // Handle hobbies checkboxes
            if (result.data.hobbies) {
                var hobbiesArr = result.data.hobbies.split(',');
                hobbiesArr.forEach(function (hobby) {
                    hobby = hobby.trim();
                    if (hobby === "other") {
                        // Check the "Other" checkbox
                        $('#hobbyOther').prop('checked', true);
                        // Show the "Other Hobbies" input field
                        $('#otherhobbiefield').removeClass('d-none');
                        // Populate the "Other Hobbies" input field
                        $('#other_hobbie').val(result.data.other_hobbies || '');
                    } else {
                        $("input[name='hobbies[]'][value='" + hobby + "']").prop("checked", true);
                    }
                });
            }



                tabChange('pills-profile-tab');
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                alert('err');
            }
        });
    }

    function tabChange(tabButtonId) {
        $('.tab-pane').removeClass('show active');
        $('.nav-link').removeClass('active');
        var contentId = $('#' + tabButtonId).attr('data-bs-target').substring(1);
        $('#' + contentId).addClass('show active');
        $('#' + tabButtonId).addClass('active');
    }

    function addRec() {
        let isValid = validate();
        if (!isValid) {
            return;
        }
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
                if (result.success == 'false' || result.success == false) {
                    alert(result.message);
                } else {
                    alert(result.message);
                    tableList();
                    tabChange('pills-home-tab');
                    $("#dataFrom").trigger("reset");
                    $("#imagePreview").attr("src","");
                }
            },
            error: function (xhr, status, error) {
                console.log("Error:", error);
            }
        });
    }

    $("#pills-home-tab").on('click', function(){

        $("#dataFrom").trigger("reset");
        $("#imagePreview").attr("src","");
        $(".rounded-cricle").hide();
    })

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



    function validateName(name) {
        const nameRegex = /^[a-zA-Z]+$/; // Regex to allow only alphabets
        return nameRegex.test(name);
    }
    function validateEmail(email) {
        var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
        return emailPattern.test(email);
    }


    $('.numeric').on('keypress', function (e) {
        var charCode = (e.which) ? e.which : e.keyCode;
        if (charCode < 48 || charCode > 57) {
            e.preventDefault();
        }
    });


    function validate() {
        document.getElementById('nameError').style.display = 'none';
        document.getElementById('emailError').style.display = 'none';
        document.getElementById('phoneError').style.display = 'none';
        document.getElementById('dobError').style.display = 'none';
        document.getElementById('stateError').style.display = 'none';
        document.getElementById('districtError').style.display = 'none';


        var name = document.getElementById('name').value;
        var email = document.getElementById('email').value;
        var phoneNo = document.getElementById('phone_no').value;
        var dob = document.getElementById('dob').value;
        var state = document.getElementById('state').value;
        var district = document.getElementById('district').value;


        var isValid = true;

        if (!name) {
            document.getElementById('nameError').style.display = 'block';
            isValid = false;
        }

        if (!email) {
            document.getElementById('emailError').style.display = 'block';
            isValid = false;
        } else if (!validateEmail(email)) {
            document.getElementById('emailError').innerText = 'Please enter a valid email address';
            document.getElementById('emailError').style.display = 'block';
            isValid = false;
        }

        if (!phoneNo) {
            document.getElementById('phoneError').style.display = 'block';
            isValid = false;
        }

        if (!dob) {
            document.getElementById('dobError').style.display = 'block';
            isValid = false;
        }

        if (!state) {
            document.getElementById('stateError').style.display = 'block';
            isValid = false;
        }
        if (!district) {
            document.getElementById('districtError').style.display = 'block';
            isValid = false;
        }

        return isValid;

    }

    // function validationReset() {
    //     document.getElementById('nameError').style.display = 'none';
    //     document.getElementById('emailError').style.display = 'none';
    //     document.getElementById('phoneError').style.display = 'none';
    //     document.getElementById('dobError').style.display = 'none';
    //     document.getElementById('dobError').style.display = 'none';
    //     document.getElementById('profile').value = '';
    //     $('#userimage').addClass('d-none');
    //     $('#imagePreview').attr('src', '');
    // }




    function validationReset() {
    // Reset the form fields
    document.getElementById('dataFrom').reset();

    // Hide validation error messages
    document.getElementById('nameError').style.display = 'none';
    document.getElementById('emailError').style.display = 'none';
    document.getElementById('phoneError').style.display = 'none';
    document.getElementById('dobError').style.display = 'none';
    document.getElementById('stateError').style.display = 'none';
    document.getElementById('districtError').style.display = 'none';

    // Reset checkboxes and radio buttons
    $('input[type="checkbox"]').prop('checked', false);
    $('input[type="radio"]').prop('checked', false);

    // Reset dynamic fields
    $('#otherhobbiefield').addClass('d-none'); // Hide "Other Hobbies" field
    $('#other_hobbie').val(''); // Clear "Other Hobbies" value

    // Reset image preview
    $('#imagePreview').attr('src', ''); // Clear image preview
    $('#userimage').addClass('d-none'); // Hide image preview container

    // Reset select fields
    $('#state').val(''); // Reset state dropdown
    $('#district').html('<option value="">Select</option>'); // Reset district dropdown

    // Reset textareas
    $('#bio').val(''); // Clear bio textarea
    $('#address').val(''); // Clear address textarea

    // Clear the hidden ID field only if not in edit mode
    if (!isEditMode()) {
        $('#id').val('');
    }
}

function isEditMode() {
    // Check if the hidden ID field has a value 
    return $('#id').val() !== '';
}





</script>

</html>






http://localhost:81/phpfile/wwwwww-main/phpfile/ccc-main/ccc-main/pp/view.php