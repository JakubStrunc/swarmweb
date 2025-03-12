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
                sessionStorage.setItem("alertMessage", "Produkt byl úspěšně upraven!"); // Alert message
                window.location.reload(); // Reload after success
            } else {
                // zobrazime chybove zpravy
                if (response.errors && response.errors.nazev) {
                    $('#editproductName').after('<div class="text-danger">' + response.errors.nazev + '</div>');
                }
                if (response.errors && response.errors.popis) {
                    $('#editproductDescription').after('<div class="text-danger">' + response.errors.popis + '</div>');
                }
                if (response.errors && response.errors.cena) {
                    $('#editproductPrice').after('<div class="text-danger">' + response.errors.cena + '</div>');
                }
                if (response.errors && response.errors.mnozstvi) {
                    $('#editproductStock').after('<div class="text-danger">' + response.errors.mnozstvi + '</div>');
                }
                if (response.errors && response.errors.fileToUpload) {
                    $('#editfileToUpload').after('<div class="text-danger">' + response.errors.fileToUpload + '</div>');
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