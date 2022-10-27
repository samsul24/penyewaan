$(function() {


    // init 
    var incrementRow = 0;
    var totalStockNow = 0;

    var firstElementTable = '<tr id="first-data-row"><td colspan="8" class="text-center">-- Klik <span class="text-bold text-main">+</span> untuk memilih buku --</td></tr>';
    if ( incrementRow == 0 ) {

        $('.peminjaman').append( firstElementTable ); 
    }


    // form search
    $('#form-scanner').submit(function( e ) {

        var formData = $(this).serialize();
        let identity = $('input[name="identity"]');
        let msg;
        $.ajax({

            type : "get",
            url  : serverside + 'search-user',
            data  : formData,
            dataType : "json",
            beforeSend: function(){

                $('#data-loader').show();
            },
            success : function( res ) {

                $('#data-loader').hide();
                if ( res.status ) {

                    createViewTable( res.data );
                    msg = '<div class="media-left"><span class="icon-wrap icon-wrap-xs icon-circle alert-icon"><i class="ti-check icon-2x"></i></span></div>' +
                                '<div class="media-body"><h4 class="alert-title">Nomor Identitas : '+ res.data.no_identity +'</h4><p class="alert-message">Berhasil ditemukan.</p></div>';

                    notification("dark", msg, 'top-right');
                    identity.val('');
                } else {

                    
                    msg = '<div class="media-left"><span class="icon-wrap icon-wrap-xs icon-circle alert-icon"><i class="ti-na icon-2x"></i></span></div>' +
                                '<div class="media-body"><h4 class="alert-title">Nomor Identitas : '+ identity.val() +'</h4><p class="alert-message">'+ res.error +'</p></div>';

                    identity.val('');
                    createView404();
                    notification("danger", msg, 'top-right');
                }
            }
        });


        $('.data-total-stock').text( '0 Buku' );
        e.preventDefault();
    });



    





    // form show data detail
    $('.btn-submit').click(function() {
        
        if ( totalStockNow > 0 ) {

            // rules
            $.ajax({

                type : "GET",
                url  : serverside + 'transaction/getDataRule',
                dataType : "json",
                success : function( res ) {

                    if ( res.max_book >= totalStockNow ) {

                        $('#set-data-detail').modal('show');

                        $('#max-buku').html(res.max_book + " eksemplar / buah");
                        $('#max-hari').html(res.max_day + " hari");
                        $('#max-minggu').html(res.max_week + " minggu");
                        $('#max-bulan').html(res.max_month + " bulan");

                    } else {

                        var hreflink = '<a class="btn-link text-semibold" style="color: #fff" href="'+ serverside + 'punishment' +'" target="_blank">pengaturan peminjaman</a>';

                        notification('dark', "Maksimal buku yang dapat dipinjam : " + res.max_book + '<br><small>Pengaturan terdapat di perpustakaan > '+ hreflink +'</small>', "center-right");
                    }
                }
            });
        } else {

            notification('dark', "Peminjaman dilakukan minimal 1 buku", "center-right");
        }
    }); 


    

    // on change radio button
    $('input[name="time_type"]').change(function() {

        $.ajax({

            type : "GET",
            url  : serverside + 'punishment/getDataPunishmentBySetTime',
            data : 'key=' + $(this).val(),
            dataType : "json",
            success : function( res ) {

                $('input[name="date-deadline"]').val( res[0] );
                $('#deadline').html( res[1] ).hide().fadeIn();
            }
        });
    });


    // on change type 
    $('input[name="level"]').change( function() {

        $('input[name="user-type"]').val( $(this).val() );

        // default
        $('#data-main-content').fadeOut(500, function() {

            $(this).html("");
        });
        $('html,body').animate({scrollTop: document.body.scrollHeight}, 0);
        $('.data-total-stock').html( "0 Buku" ).hide().fadeIn(1000);
        
        incrementRow = 0;
        totalStockNow = 0;
    } );



    
















    // add new book
    $('#data-main-content').on('click', '#add-row-table', function() {

        // $('#first-data-row').remove();
        var elementSelect = getDataSelectItem( incrementRow );
        $('#first-data-row').remove();
        var elementHTML = '<tr id="data-row-tr" data-id="'+ incrementRow +'">' +
                            '<td class="text-center">' +
                                '<div style="margin-top: 10px">' +
                                    '<a href="javascript:;" id="remove-row-table"><i class="btn-link text-danger"><i class="ti-close"></i></i></a>' +
                                '</div>' +
                            '</td>' +
                            '<td>' +
                                elementSelect +
                            '</td>' +
                            '<td><div class="text-semibold text-main" style="margin-top: 10px" id="stock-'+ incrementRow +'">0 item </div>' +
                                '<input type="hidden" id="data-earlystock-'+ incrementRow +'" /></td>' +
                            '<td><div style="margin-top: 0px"><input type="number" style="width: 80px; border: 1px solid #F9A826" class="form-control input-sm input-amount-stock-'+ incrementRow +'" name="amount-stock[]" min="1" value="0" data-id="'+ incrementRow +'" placeholder="Jumlah"/></div></td>' +
                        '</tr>';

        $('.peminjaman').append( elementHTML );
        
        // property
        $('#chosen-select-' + incrementRow).chosen({ width: '100%' });
        $('.input-amount-stock-' + incrementRow).prop('readonly', true);

        $('#data-main-content').css('margin-bottom', '100px');
        $('html,body').animate({scrollTop: document.body.scrollHeight}, 1000);

        // increment
        incrementRow++;
    });


    // remove book
    $('#data-main-content').on('click', '#data-row-tr #remove-row-table', function() {

        $('#data-row-tr').remove();
        if ( $('#data-row-tr').length == 0 ) {

            $('.peminjaman').append( firstElementTable );
            incrementRow = 0;
        }

        checkUpdateStock();
    });


    // set select
    $('#data-main-content').on('change', 'select[name="choose-product[]"]', function() {

        var getId = $(this).val();
        var index = $(this).data('id');
        $.ajax({
            type : "GET",
            url : serverside + 'transaction/getDataBookById?id=' + getId,
            dataType : "json",
            success : function( res ) {

                $('#stock-' + index).html( res.data[0].stok + " item" );
                $('#data-earlystock-' + index).val( res.data[0].stok );
                $('#input-amount-stock-' + index).attr({

                    "max" : res.data[0].stok,
                });

                $('.input-amount-stock-' + index).prop('readonly', false);
            }
        });
    });


    // on keyup
    $('#data-main-content').on('keyup', '.peminjaman input[name="amount-stock[]"]', function() {

        var index = $(this).data('id');
        var defaultVal = parseInt($('#data-earlystock-' + index).val());
        
        if ( defaultVal < parseInt($(this).val()) ) {

            notification("dark", "Nilai terlalu besar maksimal " + defaultVal, 'center-right');
            $(this).val(defaultVal);
        } 

        if ( $(this).val().length < 0 ) $(this).val(0);

        checkUpdateStock();
    });




    // check update stock 
    var checkUpdateStock = function() {

        var row = $('.peminjaman #data-row-tr').length;
        let totalStock = 0;

        for( var i = 0; i < row; i++ ) {

            let id = $('.peminjaman #data-row-tr').eq(i).data('id');
            totalStock += parseInt($('.input-amount-stock-' + id).val());
        }

        
        $('.data-total-stock').text( totalStock + ' Buku' );
        totalStockNow = totalStock;
    }





    

    // get data select 
    var getDataSelectItem = function( id ) {

        var elementSelect = "";
        $.ajax({
            type: "get",
            async : false,
            url : serverside + 'transaction/getDataBook',
            dataType : "json",
            success : function( response ) {
                
                var elementOption = "";
                if ( response.status ) {

                    let data = response.data;
                    data.forEach( function( item ) {

                        elementOption += '<option value="'+ item.id_book +'">'+ item.barcode +' - '+ item.title +'</option>';
                    } );
                }

                elementSelect = '<select name="choose-product[]" data-placeholder="Pilih buku . . ." id="chosen-select-'+ id +'" data-id="'+ id +'"><option></option>' +
                    elementOption +
                '</select>';                
            }
        });

        return elementSelect;
    }



    // create view main table
    function createViewTable( res ) {

        var data = 'id_user=' + res.id_user + '&level=' + res.level + '&gender=' + res.gender + '&name=' + res.name + '&no_identity=' + res.no_identity;
        $('input[name="id_user"]').val( res.id_user );

        $.ajax({

            type : "GET",
            url : serverside + 'transaction/createElementHTMLMain',
            data: data,
            dataType : "html",
            success : function( response ) {

                $('#data-main-content').html(response).hide().fadeIn();
                $('html,body').animate({scrollTop: document.body.scrollHeight}, 1500);
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


})