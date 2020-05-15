jQuery(document).ready(function() {
    jQuery('.submit').on('click', function() {
        var firstname = jQuery('#firstname').val();
        var lastname = jQuery('#lastname').val();
        var email = jQuery('#email').val();
        var phone_number = jQuery('#phone_number').val();

        jQuery.ajax({
            url: admin.ajaxurl,
            type: "post",
            dataType: "json",
            data: {
                action: "register_action",
                firstname: firstname,
                lastname: lastname,
                email: email,
                phone_number: phone_number,
            },
            beforeSend: function() {
                jQuery('.image').show();
                jQuery('.msg').hide();
                jQuery('.error').hide();
            },
            success: function(response) {
                if (response == 200) {
                    jQuery('.msg').show().fadeIn('slow')
                } else if (response == 400) {
                    jQuery('.error').show().fadeIn('slow')
                } else {
                    jQuery('.error').text(response + ' Error').fadeIn('slow');
                }
                jQuery('.image').hide();
            },
        });
    });
});