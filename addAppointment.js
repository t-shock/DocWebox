$(document).ready(function(){
    $('input[type="checkbox"]').on('change', function() {
        $('input[type="checkbox"]').not(this).prop('checked', false);
    });
    var today = new Date().toISOString().split('T')[0];
    document.getElementsByName("date")[0].setAttribute('min', today);
    document.getElementsByName("date")[0].setAttribute('value', today);
    document.getElementsByClassName("btn btn-primary")[0].addEventListener("click", function (ev) {
        var inputs = document.getElementsByTagName("input");
        for(var i = 0; i < inputs.length; i++){
            if(inputs[i].type === "checkbox" && inputs[i].checked){
                var docid = inputs[i].name;
            }else if(inputs[i].type === "date"){
                var date = inputs[i].value;//2023-01-02
            }else if(inputs[i].type === "time"){
                var time = inputs[i].value;
                alert(time);
            }
        }

    });
});
