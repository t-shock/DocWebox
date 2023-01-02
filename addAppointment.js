$(document).ready(function(){

    $('input[type="checkbox"]').on('change', function() {
        $('input[type="checkbox"]').not(this).prop('checked', false);
    });
    var today = new Date().toISOString().split('T')[0];
    document.getElementsByName("date")[0].setAttribute('min', today);
    document.getElementsByName("date")[0].setAttribute('value', today);
    document.getElementsByName("submit")[0].addEventListener("click", function (ev) {
        if(!$('td.checkbox-group.required :checkbox:checked').length > 0){
            alert("check a doctor first");
        }
    });
});
