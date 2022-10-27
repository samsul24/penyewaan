$(function() {

    // init
    var statusAntrian = $('input[name="status_antrian"]').val("pending");
    var statusType    = $('input[name="specific"]').val("all");

    viewDataAntrian( "pending", "all" );



    // reset show all data
    $('.reset').click( function() {

        $('input[name="status_antrian"]').val("all");
        $('input[name="specific"]').val("all");

        statusAntrian = "all";
        statusType = "all";

        viewDataAntrian( statusAntrian, statusType );
    } );

    // event refresh data
    $('#ref-btn').click( function() {

        statusAntrian = $('input[name="status_antrian"]').val();
        statusType    = $('input[name="specific"]').val();

        viewDataAntrian( statusAntrian, statusType );
        // $('input[name="specific"]').val("all");
    } );


    // event show data by all | decline | finished 
    $('.select-by').click(function() {

        let status = $(this).data('status');
        let text = "";

        if ( status == "pending" ) {

            text = "Menampilkan antrian baru";
        } else if ( status == "decline" ) {

            text = "Menampilkan yang ditolak";
        } else if ( status == "finished" ) {

            text = "Menampilkan sudah terlayani";
        }

        notification("dark", text, "center-right");

        $('input[name="status_antrian"]').val( status );
        statusAntrian = status;
        statusType =    $('input[name="specific"]').val();
        viewDataAntrian( status, statusType );
    });


    // event bagian 
    $('.select-bagian').click(function() {

        let status = $(this).data('bagian');
        statusAntrian = $('input[name="status_antrian"]').val();
        
        statusType    = status;
        $('input[name="specific"]').val(status);
        

        viewDataAntrian( statusAntrian, status);
    });



    // search 
    $('input[name="keyword"]').on('keyup', function() {

        statusAntrian = $('input[name="status_antrian"]').val();
        statusType    = $('input[name="specific"]').val();
        
        viewDataAntrian( statusAntrian, statusType, this.value );
    });


    // view data 
    function viewDataAntrian( statusAntrian, statusType = null, keyword = "" ) {

        // set text
        showBy( statusAntrian, statusType );

        $.ajax({

            type : "GET",
            url  : serverside + 'queue/getElementList',
            data : 'show-data=' + statusAntrian + '&show-type=' + statusType + '&show-keyword=' + keyword,
            dataType : "html",
            beforeSend : function() {

                $('#demo-mail-list').html('<div class="sk-double-bounce"><div class="sk-child sk-double-bounce1"></div><div class="sk-child sk-double-bounce2"></div></div> <h5 class="text-center">Tunggu beberapa saat</h5>');
            }, 
            success : function( res ) {
            
                $('#demo-mail-list').html( res ).hide().fadeIn();
            }
        });
    }




    // function breadcrumb
    function showBy( statusAntrian, statusType ) {

        let text_bagian     ="";
        let text_berdasarkan ="";

        if ( statusAntrian == "all" ) text_bagian = "Seluruh Bagian";
        if ( statusAntrian == "pending" ) text_bagian = "Antrian Baru";
        if ( statusAntrian == "finished" ) text_bagian = "Sudah Dilayani";
        if ( statusAntrian == "decline" ) text_bagian = "Ditolak";

        if ( statusType == null || statusType == "all" ) text_berdasarkan = "Semua Jenis Bagian";
        if ( statusType == "tu" ) text_berdasarkan = "Bagian Tata Usaha";
        if ( statusType == "renvapor") text_berdasarkan = "Bagian Renvapor";
        if ( statusType == "keuangan") text_berdasarkan = "Bagian Keuangan";
        if ( statusType == "sd" ) text_berdasarkan = "Bagian SD";
        if ( statusType == "smp" ) text_berdasarkan = "Bagian SMP";
        if ( statusType == "paud" ) text_berdasarkan = "Bagian Paud";
        if ( statusType == "tentis" ) text_berdasarkan = "Bagian Tentis";

        $('#text-bagian').text( text_bagian ).hide().fadeIn();
        $('#text-berdasarkan').text( text_berdasarkan ).hide().fadeIn();
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