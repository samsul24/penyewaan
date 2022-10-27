$(function(){


    $('#form-login').on('submit', function(e) {

        var form = $(this).serialize();
        var username = $('input[name="username"]');
        var password = $('input[name="password"]');


        $.ajax({

            type : "GET",
            url  : serverside + "login/getCSRF",
            dataType: "json",
            success: function( CSRF ) {


                $.ajax({

                    type: "post",
                    url : serverside + "login/processlogin",
                    data: form + "&" + CSRF.name + "=" + CSRF.hash,
                    dataType : "json",
                    beforeSend: function() {
        
        
                    }, success : function( response ) {
                        
                        if ( response.status ) {

                            username.css('border', "1.5px solid #03a9f4");
                            password.css('border', "1.5px solid #03a9f4");

                            window.location.href = serverside + 'dashboard';

                        } else {

                            if ( response.data == "password" ) {

                                username.css('border', "1.5px solid #03a9f4");
                                password.css('border', "1.5px solid red");

                                notification("dark", "Kata sandi salah");
                            } else {

                                username.css('border', "1.5px solid red");
                                password.css('border', "1.5px solid red");

                                notification("dark", "Maaf akun tidak ditemukan atau tidak terdaftar");
                            }
                        }
                    }, error : function( q ) {

                        console.log( q );
                    }
        
                });
            }
        });
        
        e.preventDefault();
    });
});



function notification( type, html, position = 'bottom-left' ) {

    $.niftyNoty({
        type: type,
        container : 'floating',
        html : html,
        closeBtn : false,
        timer : 6000,
        floating: {
            position: position,
            animationIn: 'jellyIn',
            animationOut: 'jellyOut'
        },
    });
}