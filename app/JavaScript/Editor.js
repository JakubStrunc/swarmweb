// handler pro editaci produktu
$(document).on('click', '#edit-paragraphs-btn', function(event) {
    event.preventDefault();
    console.log("ahoj")

    //data
    const page = window.location.href

    //ajax pozadavek k ziskani produktu
    $.ajax({
        url: page,
        type: 'POST',
        contentType: 'application/json',
        data: JSON.stringify({
            action: 'get-paragraph',
        }), //data k odeslani
        success: function(response) {
            //console.log(response.data[0]);
            console.log(response.data[1].text);
            if (response.success) {
                // nacteni dat
                $('#editParagraphDescription1').val(response.data[0].text);
                //$('#editfileToUpload1').val(response.data[0].photo);
                $('#editParagraphDescription2').val(response.data[1].text);
                //$('#editfileToUpload2').val(response.data[1].photo);


                //$('#saveProductChanges').attr('data-product-id', productId);
                // zobrazeni modalniho okna
                $('#editParagraphModal').modal('show');
            } else {
                alert(response.message || 'We could not find any data about the paragraph');
            }
        },
        error: function(xhr, status, error) {
            //chyba
            console.error("Status:", status);
            console.error("Error:", error);
            console.error("Response Text:", xhr.responseText);
        }
    });
});

// handler pro ulozeni zmen produktu
$(document).on('click', '#saveParagraphsChanges', function(event) {
    console.log("Starting product addition...");
    event.preventDefault();

    // vymazani chybovych zprav
    $('.text-danger').remove();


    const page = window.location.href;

    // formdata k odeslani
    const formData = new FormData();
    formData.append('action', 'update-paragraph');
    formData.append('paragraph1', $('#editParagraphDescription1').val());
    formData.append('fileToUpload1', $('#editfileToUpload')[0].files[0]);
    formData.append('paragraph2', $('#editParagraphDescription2').val());
    formData.append('fileToUpload2', $('#editfileToUpload2')[0].files[0]);



    // ajax pozadavek k uprave produktu
    $.ajax({
        url: page,
        type: 'POST',
        data: formData, // data k odeslani
        processData: false,
        contentType: false,
        success: function(response) {
            console.log("Response received:", response);
            //povedlo se ulozit zmeny
            if (response.success) {
                //ulozime alert
                sessionStorage.setItem("showAlert", "true");
                sessionStorage.setItem("alertType", "success"); // Type of alert (success, warning, danger)
                sessionStorage.setItem("alertMessage", "Paragraphs were successfully updated!"); // Alert message
                window.location.reload(); // Reload after success
            } else {
                if (response.errors && response.errors.paragraph1) {
                    $('#editParagraphDescription1').after('<div class="text-danger">' + response.errors.paragraph1 + '</div>');
                }
                if (response.errors && response.errors.paragraph2) {
                    $('#editParagraphDescription2').after('<div class="text-danger">' + response.errors.paragraph2 + '</div>');
                }
                if (response.errors && response.errors.fileToUpload1) {
                    $('#editfileToUpload').after('<div class="text-danger">' + response.errors.fileToUpload1 + '</div>');
                }
                if (response.errors && response.errors.fileToUpload2) {
                    $('#editfileToUpload2').after('<div class="text-danger">' + response.errors.fileToUpload2 + '</div>');
                }
            }
        },
        error: function(xhr, status, error) {
            //chyba
            console.error("Status:", status);
            console.error("Error:", error);
            console.error("Response Text:", xhr.responseText);
        }
    });
});


$(document).on('click', '#saveNewEvent', function(event) {
    console.log("Starting new event addition...");
    event.preventDefault();

    // Remove any error messages
    $('.text-danger').remove();

    // Get current page URL
    const page = window.location.href;

    // Collect data from the modal form
    const formData = new FormData();
    formData.append('action', 'add-event');
    formData.append('name', $('#newEventName').val());
    formData.append('description', $('#newEventDescription').val());
    formData.append('date', $('#newEventDate').val());
    formData.append('photo', $('#newEventPhoto')[0].files[0]);

    // AJAX request to add new event
    $.ajax({
        url: page,
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            console.log(response);

            // If the event was successfully added
            if (response.success) {
                // Store success alert data in sessionStorage
                sessionStorage.setItem("showAlert", "true");
                sessionStorage.setItem("alertType", "success");
                sessionStorage.setItem("alertMessage", "Event was successfully added!");

                // Close the modal and reload the page
                $('#addEventModal').modal('hide');
                window.location.reload();
            } else {
                // Display error messages
                if (response.errors && response.errors.nazev) {
                    $('#newEventName').after('<div class="text-danger">' + response.errors.nazev + '</div>');
                }
                if (response.errors && response.errors.popis) {
                    $('#newEventDescription').after('<div class="text-danger">' + response.errors.popis + '</div>');
                }
                if (response.errors && response.errors.datum) {
                    $('#newEventDate').after('<div class="text-danger">' + response.errors.datum + '</div>');
                }
                if (response.errors && response.errors.photo) {
                    $('#newEventPhoto').after('<div class="text-danger">' + response.errors.photo + '</div>');
                }
            }
        },
        error: function(xhr, status, error) {
            // Log any errors if the AJAX request fails
            console.error("Status:", status);
            console.error("Error:", error);
            console.error("Response Text:", xhr.responseText);
        }
    });
});