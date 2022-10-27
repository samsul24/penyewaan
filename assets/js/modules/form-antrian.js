$(function() {


    // form set
    $('#data-form').submit(function( e ) {

        let dataForm = $(this).serialize();
        let email = $('input[name="email"]').val();    
        // ajax
        $.ajax({

            type : "GET",
            url  : serverside + 'csrf',
            dataType : "json",
            success : function ( res ) {

                $.ajax({

                    type : "POST",
                    url  : serverside + 'process-queue',
                    data : dataForm + '&' + res.name + "=" + res.hash,
                    dataType : "json",
                    success : function ( request ) {
                            
                        let html = '<div style="font-size: 12">Email : '+ email +'</div> <br>' +
                            '<div class="text-left"><small>Dimohon untuk menunggu beberapa saat, kami akan memberikan informasi lebih lanjut melalui email. <br><br><span class="text-semibold text-main">Terima kasih</span></small></div>';
                        
                            Swal.fire({
                            title: '<h3>Antrian Berhasil Dibuat<h3>',

                            html: html,
                            // html : true,
                            icon: 'success',
                            showCloseButton: true,
                            showConfirmButton: false,
                            timer: 6000
                            }).then((result) => {

                                window.location.href = serverside;
                            });

                    }
                })

            }

        });

        e.preventDefault();
    });



    // selectpicker
    $('select[name="status"]').change( function() {

        let status = $(this).val();
        let rowSelect = $('#select-status');
        let label   = $('#spesific-label');
        let caption = $('#specific-caption');
        
        if ( (status == "bekerja") || (status == "mahasiswa") ) {

            if ( rowSelect.hasClass('col-md-12') ) {

                rowSelect.removeClass('col-md-12');
                rowSelect.addClass('col-md-6');

                $('.spesific-status').fadeIn();
            }

            if ( status == "bekerja" ) {

                label.html("Nama Perusahaan / Institusi");
                caption.text("Masukkan nama perusahaan atau institusi").hide().fadeIn();
            } else if ( status == "mahasiswa" ) {

                label.html("Nama Universitas / Institut");
                caption.text("Masukkan nama pendidikan yang ditempuh").hide().fadeIn();
            }
        } else if ( status == "" || status == "tidak-bekerja" ) { // default

            if ( rowSelect.hasClass('col-md-6') ) {

                rowSelect.removeClass('col-md-6');
                rowSelect.addClass('col-md-12');

                $('.spesific-status').hide();
            }
        }

        // alert(status);
        
    } );
});