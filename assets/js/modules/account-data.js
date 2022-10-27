$(function() {
    var type = $('input[name="type"]').val();

    loadDataLecturer();


    function loadDataLecturer() {

        $.ajax({
            type : "GET",
            url  : serverside + 'account/onLoadDataAccount',
            data : "type=" + type,
            dataType: "html",
            beforeSend: function() {
    
                
            },
            success : function( response ) {
    
                // console.log( response );
                $('.data-content').html( response );
            }
        });
    }
})


