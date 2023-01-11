$(document).ready(function(){

    $('input[type="checkbox"]').on('change', function() {
        $('input[type="checkbox"]').not(this).prop('checked', false);
    });
    var today = new Date().toISOString().split('T')[0];
    document.getElementsByName("date")[0].setAttribute('min', today);
    document.getElementsByName("date")[0].setAttribute('value', today);
    $('#exp, #loc').change(function() {
        // Get the filter values from the dropdowns
        var filterValue1 = $('#exp').val();
        var filterValue2 = $('#loc').val();
        // Hide all table rows
        $('#tb tr').hide();
        // Show the rows that contain either or both filter values
        if (filterValue1 == '' && filterValue2 == '') {
        // Show all rows
            $('#tb tr').show();
        } else if (filterValue1 && filterValue2) {
            // Show the rows that contain both filter values
            var filteredRows = $('#tb td:contains("' + filterValue1 + '")').parent().filter(function() {
                return $(this).find('td:contains("' + filterValue2 + '")').length > 0;
            });
            filteredRows.show();
        } else if (filterValue1 == '') {
            // Show the rows that contain the second filter value
            $('#tb td:contains("' + filterValue2 + '")').parent().show();
        } else if (filterValue2 == '') {
            // Show the rows that contain the first filter value
            $('#tb td:contains("' + filterValue1 + '")').parent().show();
        } else {
            // Show the rows that contain either filter value
            var filteredRows = $('#tb td:contains("' + filterValue1 + '")').parent();
            filteredRows.add('#tb td:contains("' + filterValue2 + '")').parent().show();
        }
        if (filteredRows.length == 0) {
            $("#noResults").html("<br>Τα Φίλτρα Αναζήτησης Δεν Αντιστοιχούν Σε Κάποιον Ιατρό");
        }
    });
});
function validation() {
    if ($('td.checkbox-group.required :checkbox:checked').length > 0) {
        return true;
    } else {
        alert('Πρέπει να επιλέξετε έναν γιατρό');
        return false;
    }
    
  }
