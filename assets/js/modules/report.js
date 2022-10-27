$(function() {



    /** PDF */

        // account and lecturer
        $('#print-pdf-1').click(function() {

            let type = $('select[name="type-1"]').val();
            let chosen = $('select[name="chosen-1"]').val();

            let request = serverside + 'report/exportAccountPDF?type=' + type + '&actor=' + chosen;
            window.open( request );
            // downloadFile( request );
        });



        // data master book 
        $('#print-pdf-2').click(function() {

            let start = $('input[name="start-2"]').val();
            let end = $('input[name="end-2"]').val();

            let request = serverside + 'report/exportBookPDF?start=' + start + '&end=' + end;
            window.open( request );
        });





        // data transaction 
        $('#print-pdf-3').click(function() {

            let start = $('input[name="start-3"]').val();
            let end = $('input[name="end-3"]').val();
            let chosen = $('select[name="chosen-3"]').val();

            let request = serverside + 'report/exportTransactionPDF?start=' + start + '&end=' + end + '&type=' + chosen;
            window.open( request );
        });






        // data attendance
        $('#print-pdf-4').click(function() {

            let start = $('input[name="start-4"]').val();
            let end = $('input[name="end-4"]').val();
            let chosen = $('select[name="chosen-4"]').val();

            let request = serverside + 'report/exportAttendancePDF?start=' + start + '&end=' + end + '&type=' + chosen;
            window.open( request );
        });
        
        
        
        
        // data fine
        $('#print-pdf-5').click(function() {

            let start = $('input[name="start-5"]').val();
            let end = $('input[name="end-5"]').val();
            let chosen = $('select[name="chosen-5"]').val();

            let request = serverside + 'report/exportDendaPDF?start=' + start + '&end=' + end + '&type=' + chosen;
            window.open( request );
        });


        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        function downloadFile(filePath) {
            var link = document.createElement('a');
            link.href = filePath;
            link.download = filePath.substr(filePath.lastIndexOf('/') + 1);
            link.click();
        }
    













    // BOOTSTRAP DATEPICKER WITH RANGE SELECTION
    // =================================================================
    // Require Bootstrap Datepicker
    // http://eternicode.github.io/bootstrap-datepicker/
    // =================================================================
    $('#demo-dp-range .input-daterange').datepicker({
        format: "M dd, yyyy",
        todayBtn: "linked",
        autoclose: true,
        todayHighlight: true
    });
});