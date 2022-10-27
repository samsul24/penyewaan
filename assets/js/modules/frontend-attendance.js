$(function() {

    let formRegister = $('.register-form');
    formRegister.hide();
    
    // login form
    $('.login-form').submit(function( e ) {

        let dataForm = $(this).serialize();
        

        // error input
        let errorInput = $('input[name="identity"]');
        if ( errorInput.hasClass('has-error') ) {
            errorInput.removeClass('has-error');
        }

        $.ajax({
            type : "GET",
            url  : serverside + 'attendance/check',
            data : dataForm,
            dataType : "json",
            success : function( res ) {

                if ( res.status ) {

                    $('.alert-danger').hide();
                    Swal.fire(
                        'Absensi Berhasil !',
                        'Selamat datang di perpustakaan',
                        'success'
                    );
                    $('input[name="identity"]').val("");

                      
                } else {

                    errorInput.addClass('has-error');
                    $('#alert-login').fadeIn();
                    $('#msg').text( res.msg );
                    $('input[name="identity"]').val("");
                }
            }
        });
        e.preventDefault();
    });



    // register
    formRegister.submit(function( e ) {

        let formData = $(this).serialize();
        $.ajax({

            type : "GET",
            url  : serverside + 'attendance/register',
            data : formData,
            dataType : "json",
            success : function( res ) {

                if ( res ) {

                    Swal.fire(
                        'Pendaftaran Berhasil !',
                        'Anda dapat melakukan absensi perpustakaan',
                        'success'
                    );
                    $('.login-form').fadeIn();
                    $('#alert-register').hide();
                    formRegister.hide();

                } else {

                    $('#alert-register').show();
                }
            }
        });

        e.preventDefault();
    });


    // UI
    $('#forget-password').click(function() {

        $('.login-form').hide();
        formRegister.fadeIn();
    });



    // back btn 
    $('#back-btn').click(function() {

        $('.login-form').fadeIn();
        $('#alert-register').hide();
        formRegister.hide();
    }); 

});