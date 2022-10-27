// dropdown config
function stateDropdown( id ) {


    var dropdownValue = function( size ) {

        $('.data-panel').css("margin-bottom", size);
    }

    $('#table-content-type').on('show.bs.dropdown', function () {

        $('#dropdown-group-' + id).css("position", "absolute");
        dropdownValue( '100px');
    })

    $('#table-content-type').on('hide.bs.dropdown', function () {

        $('#dropdown-group-' + id).css("position", "relative");
        dropdownValue( '0px');
    })
}