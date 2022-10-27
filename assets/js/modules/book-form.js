$(function() {


    var loader = '<div class="media">'+
                '<div class="media-left"><div class="sk-spinner sk-spinner-pulse" style="margin: 0px"></div></div>' +
                '<div class="media-right"><label class="text-main text-semibold">Proses</label><br><small>Mohon tunggu sebentar</small></div>';

    var getId = null;
    if ( $('input[name="id"]').val().length > 0 ) {

        getId = $('input[name="id"]').val();
    }

    // onload
    onLoadSelect("author", getId);
    onLoadSelect("subject", getId);
    onLoadSelect("publisher", getId);
    onLoadSelect("publishlocation", getId);
    


    // Click
    $('#form-add-author').submit(function( e ) {

        var formData = $(this).serialize();
        var $url = serverside + 'book/processInsertAuthor';

        var res = submitFormAttribute( $url, formData );
        
        if ( res.status ) {

            notification( "dark", "Berhasil ditambahkan !" );
            $('#modal-add-author').modal('hide');
            onLoadSelect("author", getId);

        } else {

            notification("dark", res.data);
        }
        e.preventDefault();
    });


    $('#form-add-subject').submit(function( e ) {

        var formData = $(this).serialize();
        var $url = serverside + 'book/processInsertSubject';

        var res = submitFormAttribute( $url, formData );
        
        if ( res.status ) {

            notification( "dark", "Berhasil ditambahkan !" );
            $('#modal-add-subject').modal('hide');
            onLoadSelect("subject", getId);

        } else {

            notification("dark", res.data);
        }
        e.preventDefault();
    });


    // publisher
    $('#form-add-publisher').submit(function( e ) {

        var formData = $(this).serialize();
        var $url = serverside + 'book/processInsertPublisher';

        var res = submitFormAttribute( $url, formData );
        
        if ( res.status ) {

            notification( "dark", "Berhasil ditambahkan !" );
            $('#modal-add-publisher').modal('hide');
            onLoadSelect("publisher", getId);

        } else {

            notification("dark", res.data);
        }
        e.preventDefault();
    });




    // publisher
    $('#form-add-publishlocation').submit(function( e ) {

        var formData = $(this).serialize();
        var $url = serverside + 'book/processInsertPublishLocation';

        var res = submitFormAttribute( $url, formData );
        
        if ( res.status ) {

            notification( "dark", "Berhasil ditambahkan !" );
            $('#modal-add-publishlocation').modal('hide');
            onLoadSelect("publishlocation", getId);

        } else {

            notification("dark", res.data);
        }
        e.preventDefault();
    });





    // form 
    $('.data-form').on('submit', function( e ) {

        var validate = checkValidate();

        if ( validate ) {

            
            var form = new FormData( this );
            

            $.ajax({

                type : "GET",
                async : false,
                url  : serverside + 'csrf',
                dataType : "json",
                success : function( response ) {

                    form.append( response.name, response.hash );
                }
            });

            $.ajax({
                type : "POST",
                url  : serverside + 'book/insertDataBook',
                data : form,
                contentType : false,
                cache    : false,
                processData : false,
                dataType : "html",
                beforeSend : function() {

                    $('#process-loader').modal('show');
                },
                success : function( data ) {

                    if ( data ) {

                        window.location.href = serverside + 'book';
                    } else {

                        $('#process-loader').modal('hide');
                        notification("dark", "Gagal menambahkan data buku baru !");
                    }
                }
            });

        }
        e.preventDefault();
    });



    // form update
    $('.data-form-update').on('submit', function( e ) {

        var validate = checkValidate();

        if ( validate ) {

            var form = new FormData( this );
            
            $.ajax({

                type : "GET",
                async : false,
                url  : serverside + 'csrf',
                dataType : "json",
                success : function( response ) {

                    form.append( response.name, response.hash );
                }
            });

            $.ajax({
                type : "POST",
                url  : serverside + 'book/processUpdateDataBook',
                data : form,
                contentType : false,
                cache    : false,
                processData : false,
                dataType : "json",
                beforeSend : function() {

                    $('#process-loader').modal('show');
                },
                success : function( data ) {

                    if ( data.status ) {

                        window.location.href = serverside + 'book';
                    } else {

                        $('#process-loader').modal('hide');
                        notification("dark", data.msg);
                    }
                }
            });

        }
        e.preventDefault();
    });



    function checkValidate() {

        var status = 0;
        var author = $('#data-author select[name="author[]"]');
        var subject = $('#data-subject select[name="subject"]');
        var publisher = $('#data-publisher select[name="publisher"]');
        var publisherLoc = $('#data-publisherlocation select[name="publishlocation"]');

        if ( author.val().length > 0 ) {

            status++;
        } else {            
            notification("danger", "Pilih informasi pengarang / author", "top-right");
            status--;
        } 


        if ( subject.val().length > 0 ) {

            status++;
        } else {
            notification("danger", "Pilih informasi subjek buku", "top-right");
            status--;
        }
        
        if ( publisher.val().length > 0 ) {

            status++;
        } else {
            notification("danger", "Pilih informasi penerbit buku / publisher", "top-right");
            status--;
        }
        
        if ( publisherLoc.val().length > 0 ) {

            status++;
        } else {
            notification("danger", "Pilih informasi lokasi penerbit buku", "top-right");
            status--;
        }

        return status == 4 ? true : false;

        
    }



    function submitFormAttribute( $url, $data ) {

        var result = false;

        $.ajax({
            type : "get",
            async : false,
            url  : serverside + 'csrf',
            dataType : "json",
            success : function( responseCSRF ) {

                let name = responseCSRF.name;
                let hash = responseCSRF.hash;

                $.ajax({
                    async : false,
                    type : "post", 
                    url  : $url,
                    data : $data + '&' + name + '=' + hash,
                    dataType : "json",
                    success : function( response ) {

                        result = response;
                    }
                });
            }
        });

        return result;
    } 






    // function
    function onLoadSelect( $type, $id ) {

        var url, element, chosen;
        if ( $type == "author" ) {

            url = serverside + 'book/getDataAuthor';
            element = '#data-author';
            chosen  = '#chosen-author';
            
        } else if ( $type == "subject" ) {

            url = serverside + 'book/getDataSubject';
            element = '#data-subject';
            chosen  = '#chosen-subject';
        
        } else if ( $type == "publisher" ) {

            url = serverside + 'book/getDataPublisher';
            element = '#data-publisher';
            chosen  = '#chosen-publisher';
        
        } else if ( $type == "publishlocation" ) {

            url = serverside + 'book/getDataPublisherLocation';
            element = '#data-publisherlocation';
            chosen  = '#chosen-publishlocation';
        }

        $.ajax({

            type : 'get',
            url : url,
            data : 'id=' + $id,
            dataType : 'html',
            beforeSend : function() {

                $(element).html(loader);
            },
            success : function( response ) {

                $(element).html( response );
                $(chosen).chosen({'width' : '100%'});
                $(chosen).prop('required', false);
            }
        });
    }



    
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
});


