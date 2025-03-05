// handler pro prihlaseni
$(document).on('click', '#signin', function(event) {
    //console.log("ahoj");
    event.preventDefault();

    // vymazani chybovych zprav
    $('.text-danger').remove();

    // console.log($('#email').val());
    // console.log($('#password').val());

    // ajax pozadavek pro prihlaseni uzivatele
    $.ajax({
        url: window.location.href,
        type: 'POST',
        contentType: 'application/json',
        data: JSON.stringify({
            action: 'signin',
            email: $('#email').val(),
            heslo: $('#password').val()}), // data k odeslani
        success: function (response) {
            console.log("ahoj");
            console.log(response);

            // povedlo se prihlasit
            if (response.success) {

                //ulozime alert na domovskou stranku
                sessionStorage.setItem("showAlert", "true");
                sessionStorage.setItem("alertType", "success");
                sessionStorage.setItem("alertMessage", "Přihlášení bylo úspěšné!");
                window.location.href = window.location.href;

            } else {
                // zobrazime chybove zpravy
                if (response.error && response.error.email) {
                    $('#email').after('<div class="text-danger">' + response.error.email + '</div>');
                }
                if (response.error && response.error.heslo) {
                    $('#password').after('<div class="text-danger">' + response.error.heslo + '</div>');
                }
            }
        },
        error: function (xhr, status, error) {
            // chyby
            console.log("Status: " + status);
            console.log("Error: " + error);
            console.log("Response Text: " + xhr.responseText);
        }
    });
});