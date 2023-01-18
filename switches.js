

function login(){
    var forms = document.getElementsByClassName("input-group");
    forms[0].style.marginLeft = "0%"
    forms[1].style.marginLeft = "0%"

    var btnbackg = document.getElementById("btn");
    btnbackg.style.marginLeft = "0%";

    var lgnBtn = document.getElementById("loginbtn");
    var rgstrBtn = document.getElementById("registerbtn");
    lgnBtn.style.color = "white"
    rgstrBtn.style.color = "black"


}
function register(){
    
    var forms = document.getElementsByClassName("input-group");
    forms[0].style.marginLeft = "-100%"
    forms[1].style.marginLeft = "-100%"
    
    var btnbackg = document.getElementById("btn");
    btnbackg.style.marginLeft = "50%";

    var lgnBtn = document.getElementById("loginbtn");
    var rgstrBtn = document.getElementById("registerbtn");
    lgnBtn.style.color = "black"
    rgstrBtn.style.color = "white"

    updateform();
    
}
function updateform(){
    var e = document.getElementById("role");
    var value = e.value;
    var text = e.options[e.selectedIndex].text;

    if(text == "Ασθενής"){
        //$('.doc').show();
        //$('.pat').hide();
        

         var adiv = document.getElementById("register").innerHTML = '<h3>"Είμαι:"</h3><br><select id="role" name="role" onchange="updateform()"><br><option value="pat">Ασθενής</option><br><option value="doc">Ιατρός</option><br></select><input type="text" id="username" class="input-field" name="username" placeholder="Username ασθενή" required><br><input type="password" id="password" class="input-field" name ="password" placeholder="Κωδικός πρόσβασης" required><br><input type="text" id="fname" class="input-field" name="fname" placeholder="Όνομα" required><br><input type="text" id="lname" class="input-field" name="lname" placeholder="Επίθετο" required><br><input type="checkbox" class="check-box"><span>Αποδέχομαι τους Όρους και τις Προυποθέσεις</span><br><button type="submit1" class="submit-btn" name="submit1">Εγγραφή</button><br>';
         var forms = document.getElementsByClassName("input-group");
         //forms[0].style.marginLeft = "-100%"
         //forms[1].style.marginLeft = "-100%"


    }
    else{
        console.log("Not equal");
        //$('.doc').hide();
        //$('.pat').show();

        var adiv = document.getElementById("register").innerHTML = '<h3>"Είμαι:"</h3><br><select id="role" name="role" onchange="updateform()"><br><option value="doc">Ιατρός</option><br><option value="pat">Ασθενής</option><br><input type="text" id="username" class="input-field" name="username" placeholder="Username ιατρού" required><br><input type="password" id="password" class="input-field" name ="password" placeholder="Κωδικός πρόσβασης" required><br><input type="text" id="fname" class="input-field" name="fname" placeholder="Όνομα" required><br><input type="text" id="lname" class="input-field" name="lname" placeholder="Επώνυμο" required><br><input type="text" id="prof" class="input-field" name="prof" placeholder="Ειδίκευση" required><br><input type="text" id="address" class="input-field" name="address" placeholder="Διεύθυνση" required><br><input type="checkbox" class="check-box"><span>Αποδέχομαι τους Όρους και τις Προυποθέσεις</span><br><button type="submit2" class="submit-btn" name="submit2">Εγγραφή</button><br>';
        var forms = document.getElementsByClassName("input-group");
        //forms[0].style.marginLeft = "-100%"
        //forms[1].style.marginLeft = "-100%"
    }
 }
					