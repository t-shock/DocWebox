$(document).ready(function(){

    $('input[type="checkbox"]').on('change', function() {
        $('input[type="checkbox"]').not(this).prop('checked', false);
    });
    var today = new Date().toISOString().split('T')[0];
    document.getElementsByName("date")[0].setAttribute('min', today);
    document.getElementsByName("date")[0].setAttribute('value', today);

});
function validation() {
    if ($('td.checkbox-group.required :checkbox:checked').length > 0) {
        return true;
    } else {
        alert('check a doctor first');
        return false;
    }
    
  }
