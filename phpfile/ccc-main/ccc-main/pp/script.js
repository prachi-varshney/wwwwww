$(document).ready(function () {
    tableList();

    // Delete record
    $(document).on("click", ".btn.btn-sm.btn-danger", function () {
        let emppid = $(this).data("id"); // Get the ID from the data-id attribute
        if (confirm("Are you sure you want to delete this record?")) {
            $.ajax({
                url: "delete.php",
                type: "POST",
                data: { id: emppid }, // Send the ID to the server
                success: function (data) {
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

// Function to validate the form
function validateForm() {
    let isValid = true;

    // Validate Name
    const name = $("#name").val().trim();
    const nameRegex = /^[a-zA-Z]{1,20}$/;
    if (name === "") {
        $("#name").css("border", "1px solid red");
        $("#name-error").text("Name is required.");
        isValid = false;
    } else if (!nameRegex.test(name)) {
        $("#name").css("border", "1px solid red");
        $("#name-error").text("Name should only contain alphabets and maximum 20 characters.");
        isValid = false;
    } else {
        $("#name").css("border", "1px solid #ccc");
        $("#name-error").text("");
    }

    // Validate Email
    const email = $("#email").val().trim();
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (email === "") {
        $("#email").css("border", "1px solid red");
        $("#email-error").text("Email is required.");
        isValid = false;
    } else if (!emailRegex.test(email)) {
        $("#email").css("border", "1px solid red");
        $("#email-error").text("Please enter a valid email address.");
        isValid = false;
    } else {
        $("#email").css("border", "1px solid #ccc");
        $("#email-error").text("");
    }

    // Validate Phone No
    const phoneNo = $("#phone_no").val().trim();
    const phoneRegex = /^[1-9]\d{9}$/;
    if (phoneNo === "") {
        $("#phone_no").css("border", "1px solid red");
        $("#phone_no-error").text("Phone No is required.");
        isValid = false;
    } else if (!phoneRegex.test(phoneNo)) {
        $("#phone_no").css("border", "1px solid red");
        $("#phone_no-error").text("Please enter a 10-digit phone number (should not start with 0).");
        isValid = false;
    } else {
        $("#phone_no").css("border", "1px solid #ccc");
        $("#phone_no-error").text("");
    }

    // Validate Pincode
    const pincode = $("#pincode").val().trim();
    const pincodeRegex = /^[1-9]\d{5}$/;
    if (pincode === "") {
        $("#pincode").css("border", "1px solid red");
        $("#pincode-error").text("Pincode is required.");
        isValid = false;
    } else if (!pincodeRegex.test(pincode)) {
        $("#pincode").css("border", "1px solid red");
        $("#pincode-error").text("Please enter a valid 6-digit pincode (should not start with 0).");
        isValid = false;
    } else {
        $("#pincode").css("border", "1px solid #ccc");
        $("#pincode-error").text("");
    }

    // Validate Experience
    const experience = $("#experience").val().trim();
    if (experience === "") {
        $("#experience").css("border", "1px solid red");
        $("#experience-error").text("Experience is required.");
        isValid = false;
    } else if (isNaN(experience) || experience > 20) {
        $("#experience").css("border", "1px solid red");
        $("#experience-error").text("Please enter a valid experience in years (maximum 20 years).");
        isValid = false;
    } else {
        $("#experience").css("border", "1px solid #ccc");
        $("#experience-error").text("");
    }

    // Validate Profile Image
    const profile = $("#profile").val().trim();
    if (profile === "") {
        $("#profile").css("border", "1px solid red");
        $("#profile-error").text("Profile image is required.");
        isValid = false;
    } else {
        $("#profile").css("border", "1px solid #ccc");
        $("#profile-error").text("");
    }

    return isValid;
}






//pop up box for other hobby
$(document).ready(function () {
    // Toggle visibility of the "Other" hobby input box
    $("#hobbyOther").change(function () {
        if (this.checked) {
            $("#otherHobbyInput").show(); // Show the input box
        } else {
            $("#otherHobbyInput").hide(); // Hide the input box
        }
    });
});

//add record
function addRec() {

    if (!validateForm()) {
        return; // Stop if validation fails
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


$("#search").on("keyup", function () {
    var search_term = $(this).attr("id");
    console.log( search_term);
    $.ajax({
        url: "live-search.php",
        type: 'POST',
        data: { search: search_term },
        success: function (data) {
            $("#list_table").html(data);
        }
    })
})

