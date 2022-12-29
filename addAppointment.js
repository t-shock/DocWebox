$(document).ready(function(){

    $('input[type="checkbox"]').on('change', function() {
        $('input[type="checkbox"]').not(this).prop('checked', false);
    });
    var today = new Date().toISOString().split('T')[0];
    document.getElementsByName("date")[0].setAttribute('min', today);
    document.getElementsByName("date")[0].setAttribute('value', today);
    document.getElementsByClassName("btn btn-primary")[0].addEventListener("click", function (ev) {
        if(!$('td.checkbox-group.required :checkbox:checked').length > 0){
            alert("check a doctor first");
        }
        var inputs = document.getElementsByTagName("input");
        var docid;
        var date;
        var time;
        for(var i = 0; i < inputs.length; i++){
            if(inputs[i].type === "checkbox" && inputs[i].checked){
                docid = inputs[i].value;
            }else if(inputs[i].type === "date"){
                date = inputs[i].value;//2023-01-02
            }else if(inputs[i].type === "time"){
                time = inputs[i].value;//15:00
                // alert(time);
            }
        }

    });
    load_data();

    function load_data(docid,date,time)
    {
        $.ajax({
        url:"fetch.php",
        method:"POST",
        data:{docid,date,time},
        success:function(data)
        {
            alert("yes");
        }
        });
    }
});
