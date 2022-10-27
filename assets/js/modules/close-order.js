$(function() {


    // init 
    var incrementRow = 0;
    var totalStockNow = 0;


    // form search
    $('#form-scanner').submit(function( e ) {

        var formData = $(this).serialize();
        let identity = $('input[name="identity"]');
        let msg;
        $.ajax({

            type : "get",
            url  : serverside + 'transaction/searchIdentityPeminjaman',
            data  : formData,
            dataType : "json",
            beforeSend: function(){

                $('#data-loader').show();
            },
            success : function( res ) {
                
                $('#data-loader').hide();
                if ( res.status ) {

                    if ( res.data.status_tr == "concept" ) {

                        createViewConcept( res.data );

                    } else {

                        createViewTable( res.data );
                        createViewReturn( res.data );
                    }

                    
                    msg = '<div class="media-left"><span class="icon-wrap icon-wrap-xs icon-circle alert-icon"><i class="ti-check icon-2x"></i></span></div>' +
                                '<div class="media-body"><h4 class="alert-title">Nomor Identitas : '+ res.data.no_identity +'</h4><p class="alert-message">Berhasil ditemukan.</p></div>';

                    notification("dark", msg, 'top-right');
                    identity.val('');
                } else {

                    
                    msg = '<div class="media-left"><span class="icon-wrap icon-wrap-xs icon-circle alert-icon"><i class="ti-help-alt icon-2x"></i></span></div>' +
                                '<div class="media-body"><h4 class="alert-title">Nomor Identitas : '+ identity.val() +'</h4><p class="alert-message">Tidak dideteksi telah meminjam buku <br> <small>Coba periksa identitas kembali</small>.</p></div>';

                    identity.val('');
                    createView404();
                    notification("danger", msg, 'top-right');
                }

                checkUpdateStock();
            }
        });


        $('.data-total-stock').text( '0 Buku' );
        e.preventDefault();
    });






    // btn show modal
    $('.btn-submit').click( function() {

        var statusType = $('input[name="type-return"]').val();

        try {   

            if ( statusType.length > 0 ) {

                
                if ( statusType == "concept" ) {

                    $('#set-data-concept').modal('show');
                } else {

                    // show modal 
                    $('#set-data-return').modal('show');
                }
            }
            
        } catch (error) {
            
            console.log( error );
            alert("Error");
        }
        
    } );







    // denda 
    $('.main-body-return').on('keyup', 'input[name="total-bayar"]', function() {

        var dataDenda = parseInt($('input[name="total-denda"]').val());
        var dataBayar = parseInt($('input[name="total-bayar"]').val());
        
        if ( dataDenda > 0 ) {

            var elementHTML = '';
            if ( dataDenda <= dataBayar ) {

                $('input[name="total-kembalian"]').val( dataBayar - dataDenda );
                elementHTML = '<button class="btn btn-default" data-dismiss="modal" type="button">Tutup</button>' +
                '<button class="btn btn-primary btn-labeled btn-final" type="submit"><i class="btn-label fa fa-paper-plane-o"></i> Setujui Pengembalian Buku</button>';

            } else {

                elementHTML = '<button class="btn btn-default" data-dismiss="modal" type="button">Tutup</button>' +
                '<button class="btn btn-warning btn-labeled btn-final" type="button"><i class="btn-label fa fa-paper-plane-o"></i> Masukkan Pembayaran</button>';

                notification("dark", "Pembayaran kurang dari " + dataDenda, "center-right");
            }

            $('#btn-return').html( elementHTML ).hide().fadeIn(1000);
        }
    });








    // on keyup
    $('#data-main-content').on('keyup', '.peminjaman input[name="amount-stock[]"]', function() {

       
        var defaultVal = $(this).data('qty');
        
        if ( defaultVal < parseInt($(this).val()) ) {

            notification("dark", "Nilai terlalu besar, item yang dipinjam sebanyak " + defaultVal + ' buku', 'center-right');
            $(this).val(defaultVal);
        } 

        if ( $(this).val().length < 0 ) $(this).val(0);

        checkUpdateStock();
    });








    // on submit (Final)
    // $('.data-form').on('submit', function( e ) {

    //     let dataForm = $('.data-form').serialize();
    //     console.log( dataForm );

    //     e.preventDefault();
        
    // });













    // button concept clicked
    $('.btn-concept').click(function() {

        let id = $('.main-body-concept input[name="id_transaction"]').val();
        $.ajax({

            type : "GET",
            url  : serverside + 'transaction/onDeclineDataTransaction',
            data : 'id=' + id,
            dataType : "json",
            beforeSend : function() {

                $('#data-loader').show();
            }, 
            success : function( res ) {

                if ( res ) {

                    notification("dark", "Buku berhasil dikembalikan !", "top-right");
                    setTimeout( function() {

                        window.location.href = serverside + 'history';
                    }, 500 );
                }
            }
        });
    });











    // check update stock 
    function checkUpdateStock(){

        var row = $('.peminjaman #data-row-tr').length;
        let totalStock = 0;
        var totalBukuKembali   = parseInt($('#data-main-content input[name="total-return-book"]').val());
        var inputTotalStockNow = $('#data-main-content input[name="total-stock"]').val();
        

        for( var i = 0; i < row; i++ ) {

            let amount = $('.input-amount-stock-' + i);
            let stateInput = $('.input-amount-stock-return-' + i);

            if ( stateInput.data('return') == "minus" ) {

                totalStock += parseInt(amount.val());
            }
        }

        totalStockNow = totalStock + totalBukuKembali;

        if ( inputTotalStockNow > totalStockNow  ) {

            $('.data-total-stock').html( (totalStockNow) + ' Buku ' + ' | <small>Tersisa '+ (inputTotalStockNow - totalStockNow) +'</small> <br> <label style="font-size: 10px; color: #9e9e9e">Status akan diubah menjadi pengembalian "Sebagian"</label>'  ).hide().fadeIn(500);
            $('.data-total-stock').css('color', '#f44336'); 

            // status return 
            $('.main-body-return input[name="status-return"]').val("partial");

            let percentage = 0;
            if ( totalStockNow > 0 ) {

                percentage = parseInt((totalStockNow / inputTotalStockNow ) * 100);
            }
            
            // progress bar status
            let $elementHTML = '<small>Buku yang kembali</small>' +
                    '<div class="progress progress-striped active"><div style="width: '+percentage+'%;" class="progress-bar progress-bar-warning">'+ parseInt(percentage) +'%</div></div>' +
                    '<i class="ti-book" style="font-size: 15px"></i><span class="text-main text-semibold"> Total dari '+ totalStockNow +' / '+ inputTotalStockNow +' buku</span>';
            $('.main-body-return #all-book-item').html($elementHTML);

        } else {

            $('.data-total-stock').text( (totalStockNow) + ' Buku' ).hide().fadeIn(500);
            $('.data-total-stock').css('color', '#79af3a');

            // status return 
            $('.main-body-return input[name="status-return"]').val("full");

            // progress bar status
            let $elementHTML = '<small>Buku yang kembali</small>' +
                    '<div class="progress"><div style="width: 100%;" class="progress-bar progress-bar-success">100%</div></div>' +
                    '<i class="ti-book" style="font-size: 15px"></i><span class="text-main text-semibold"> Total dari '+ totalStockNow +' / '+ totalStockNow +' buku</span>';

            $('.main-body-return #all-book-item').html($elementHTML);
        }



        // if ( inputTotalStockNow > totalStockNow ){

        //     $('.data-total-stock').html( (totalStock) + ' Buku ' + ' | <small>Tersisa '+ (inputTotalStockNow - totalStockNow) +'</small> <br> <label style="font-size: 10px; color: #9e9e9e">Status akan diubah menjadi pengembalian "Sebagian"</label>'  ).hide().fadeIn(500);
        //     $('.data-total-stock').css('color', '#f44336'); 

        //     // status return 
        //     $('.main-body-return input[name="status-return"]').val("partial");

        //     let percentage = 0;
        //     if ( totalStockNow > 0 ) {

        //         percentage = parseInt((totalStockNow / inputTotalStockNow ) * 100);
        //     }
            
        //     // progress bar status
        //     let $elementHTML = '<small>Buku yang kembali</small>' +
        //             '<div class="progress progress-striped active"><div style="width: '+percentage+'%;" class="progress-bar progress-bar-warning">'+ parseInt(percentage) +'%</div></div>' +
        //             '<i class="ti-book" style="font-size: 15px"></i><span class="text-main text-semibold"> Total dari '+ totalStockNow +' / '+ inputTotalStockNow +' buku</span>';
        //     $('.main-body-return #all-book-item').html($elementHTML);


        // } else {

        //     $('.data-total-stock').text( (totalStock) + ' Buku' ).hide().fadeIn(500);
        //     $('.data-total-stock').css('color', '#79af3a');

        //     // status return 
        //     $('.main-body-return input[name="status-return"]').val("full");

        //     // progress bar status
        //     let $elementHTML = '<small>Buku yang kembali</small>' +
        //             '<div class="progress"><div style="width: 100%;" class="progress-bar progress-bar-success">100%</div></div>' +
        //             '<i class="ti-book" style="font-size: 15px"></i><span class="text-main text-semibold"> Total dari '+ totalStock +' / '+ totalStock +' buku</span>';

        //     $('.main-body-return #all-book-item').html($elementHTML);
        // }


    }

    // create view main table
    function createViewTable( res ) {

        var data = 'id_user=' + res.id_user + '&level=' + res.level + '&gender=' + res.gender + '&name=' + res.name + '&no_identity=' + res.no_identity + 
            '&status_tr=' + res.status_tr + '&status_returned=' + res.status_returned + '&date_returned=' + res.date_returned + '&id_transaction=' + res.id_transaction;
        $('input[name="id_user"]').val( res.id_user );  

        $.ajax({

            type : "GET",
            url : serverside + 'transaction/createElementHTMLMainPengembalian',
            data: data,
            dataType : "html",
            success : function( response ) {

                $('#data-main-content').html(response).hide().fadeIn();
                $('html,body').animate({scrollTop: document.body.scrollHeight}, 1500);

                checkUpdateStock();

            }, error : function( jqXHR ) {

                console.log( jqXHR );
            }
        });
        
    }




    // create view main modal return
    function createViewReturn( res ) {

        var data = 'id_user=' + res.id_user + '&level=' + res.level + '&gender=' + res.gender + '&name=' + res.name + '&no_identity=' + res.no_identity + 
            '&status_tr=' + res.status_tr + '&status_returned=' + res.status_returned + '&date_returned=' + res.date_returned + '&id_user_service=' + res.id_user_service + '&id_transaction=' + res.id_transaction;
        $('input[name="id_user"]').val( res.id_user );  

        // console.log( data );
        $.ajax({

            type : "GET",
            url : serverside + 'transaction/viewHTMLDataReturn',
            data: data,
            dataType : "html",
            success : function( response ) {

                // $('#set-data-return').modal('show');
                $('.main-body-return').html( response ).hide().fadeIn();  


                let checkDataCharge = $('.main-body-return input[name="total-denda"]').val();
                if ( checkDataCharge == 0 ) {

                    
                    $('#btn-return').html( '<button class="btn btn-default" data-dismiss="modal" type="button">Tutup</button>' +
                                            '<button class="btn btn-primary btn-labeled btn-final" type="submit"><i class="btn-label fa fa-paper-plane-o"></i> Setujui Pengembalian Buku</button>' )
                    .hide().fadeIn(1000);
                }
                checkUpdateStock();

            }, error : function( jqXHR ) {

                console.log( jqXHR );
            }
        });
        
    }



    // create view concept 
    function createViewConcept( res ) {


        var data = 'id_user=' + res.id_user + '&level=' + res.level + '&gender=' + res.gender + '&name=' + res.name + '&no_identity=' + res.no_identity + 
            '&status_tr=' + res.status_tr + '&status_returned=' + res.status_returned + '&date_returned=' + res.date_returned + '&id_user_service=' + res.id_user_service;

        $.ajax({

            type : "GET",
            url : serverside + 'transaction/viewHTMLDataConcept',
            data: data,
            dataType : "html",
            success : function( response ) {

                $('#data-main-content').html("").hide().fadeOut();
                $('#set-data-concept').modal('show');
                $('.main-body-concept').html( response ).hide().fadeIn();  
            
            }, error : function( jqXHR ) {

                console.log( jqXHR );
            }
        });
        
    }


    // view not found 
    function createView404() {

        let svg = '<svg id="b21613c9-2bf0-4d37-bef0-3b193d34fc5d" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" style="width: 200px" viewBox="0 0 647.63626 632.17383"><path d="M687.3279,276.08691H512.81813a15.01828,15.01828,0,0,0-15,15v387.85l-2,.61005-42.81006,13.11a8.00676,8.00676,0,0,1-9.98974-5.31L315.678,271.39691a8.00313,8.00313,0,0,1,5.31006-9.99l65.97022-20.2,191.25-58.54,65.96972-20.2a7.98927,7.98927,0,0,1,9.99024,5.3l32.5498,106.32Z" transform="translate(-276.18187 -133.91309)" fill="#f2f2f2"/><path d="M725.408,274.08691l-39.23-128.14a16.99368,16.99368,0,0,0-21.23-11.28l-92.75,28.39L380.95827,221.60693l-92.75,28.4a17.0152,17.0152,0,0,0-11.28028,21.23l134.08008,437.93a17.02661,17.02661,0,0,0,16.26026,12.03,16.78926,16.78926,0,0,0,4.96972-.75l63.58008-19.46,2-.62v-2.09l-2,.61-64.16992,19.65a15.01489,15.01489,0,0,1-18.73-9.95l-134.06983-437.94a14.97935,14.97935,0,0,1,9.94971-18.73l92.75-28.4,191.24024-58.54,92.75-28.4a15.15551,15.15551,0,0,1,4.40966-.66,15.01461,15.01461,0,0,1,14.32032,10.61l39.0498,127.56.62012,2h2.08008Z" transform="translate(-276.18187 -133.91309)" fill="#3f3d56"/><path d="M398.86279,261.73389a9.0157,9.0157,0,0,1-8.61133-6.3667l-12.88037-42.07178a8.99884,8.99884,0,0,1,5.9712-11.24023l175.939-53.86377a9.00867,9.00867,0,0,1,11.24072,5.9707l12.88037,42.07227a9.01029,9.01029,0,0,1-5.9707,11.24072L401.49219,261.33887A8.976,8.976,0,0,1,398.86279,261.73389Z" transform="translate(-276.18187 -133.91309)" fill="#f9a826"/><circle cx="190.15351" cy="24.95465" r="20" fill="#f9a826"/><circle cx="190.15351" cy="24.95465" r="12.66462" fill="#fff"/><path d="M878.81836,716.08691h-338a8.50981,8.50981,0,0,1-8.5-8.5v-405a8.50951,8.50951,0,0,1,8.5-8.5h338a8.50982,8.50982,0,0,1,8.5,8.5v405A8.51013,8.51013,0,0,1,878.81836,716.08691Z" transform="translate(-276.18187 -133.91309)" fill="#e6e6e6"/><path d="M723.31813,274.08691h-210.5a17.02411,17.02411,0,0,0-17,17v407.8l2-.61v-407.19a15.01828,15.01828,0,0,1,15-15H723.93825Zm183.5,0h-394a17.02411,17.02411,0,0,0-17,17v458a17.0241,17.0241,0,0,0,17,17h394a17.0241,17.0241,0,0,0,17-17v-458A17.02411,17.02411,0,0,0,906.81813,274.08691Zm15,475a15.01828,15.01828,0,0,1-15,15h-394a15.01828,15.01828,0,0,1-15-15v-458a15.01828,15.01828,0,0,1,15-15h394a15.01828,15.01828,0,0,1,15,15Z" transform="translate(-276.18187 -133.91309)" fill="#3f3d56"/><path d="M801.81836,318.08691h-184a9.01015,9.01015,0,0,1-9-9v-44a9.01016,9.01016,0,0,1,9-9h184a9.01016,9.01016,0,0,1,9,9v44A9.01015,9.01015,0,0,1,801.81836,318.08691Z" transform="translate(-276.18187 -133.91309)" fill="#f9a826"/><circle cx="433.63626" cy="105.17383" r="20" fill="#f9a826"/><circle cx="433.63626" cy="105.17383" r="12.18187" fill="#fff"/></svg>';
        $('#data-main-content').html('<div class="text-center">'+ svg +' <h4>Tidak ditemukan !</h4></div>').hide().fadeIn();
        
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