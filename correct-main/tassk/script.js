

$(document).ready(function () {  //php basic code

    $("#load-button").on("click",function(e) {

        
// let formdata = new FormData(myformData);        

        $.ajax({
            url: "ajax-load.php",
            type:"post",
            // data: formdata,
            // processData: false,
            // contentType: false,
            type: "POST",
            success: function (data) {
                // console.log(data);

                $('#myformData').html(data);
                
            }
        });

    });

});





// $(document).ready(function() {
//     $('#btn-submit').click(function(e) {
//         e.preventDefault(); // Prevent default form submission

//         // Create a FormData object to handle file uploads
//         var formData = new FormData($('#myformData')[0]);

//         // Send AJAX request
//         $.ajax({
//             url: 'insert.php', // PHP file to handle insertion
//             type: 'POST',
//             data: formData,
//             processData: false, // Don't process the data
//             contentType: false, // Don't set content type
//             success: function(response) {
//                 alert(response); // Show success message
//                 location.reload(); // Reload the page to reflect changes
//             },
//             error: function(xhr, status, error) {
//                 alert("Error: " + error); // Show error message
//             }
//         });
//     });
// });
