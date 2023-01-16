

function login(){
    var forms = document.getElementsByClassName("input-group");
    forms[0].style.marginLeft = "0%"
    forms[1].style.marginLeft = "0%"

    var btnbackg = document.getElementById("btn");
    btnbackg.style.marginLeft = "0%";
}
function register(){
    
    var forms = document.getElementsByClassName("input-group");
    forms[0].style.marginLeft = "-100%"
    forms[1].style.marginLeft = "-100%"
    
    var btnbackg = document.getElementById("btn");
    btnbackg.style.marginLeft = "50%";

    updateform();
    
}
function updateform(){
    var e = document.getElementById("role");
    var value = e.value;
    var text = e.options[e.selectedIndex].text;

    if(text == "Patient"){
        //$('.doc').show();
        //$('.pat').hide();
        

         var adiv = document.getElementById("register").innerHTML = '<h3>"Im a:"</h3><br><select id="role" name="role" onchange="updateform()"><br><option value="pat">Patient</option><br><option value="doc">Doctor</option><br></select><input type="text" id="username" class="input-field" name="username" placeholder="User/Doctor username" required><br><input type="text" id="password" class="input-field" name ="password" placeholder="Password" required><br><input type="text" id="fname" class="input-field" name="fname" placeholder="First name" required><br><input type="text" id="lname" class="input-field" name="lname" placeholder="Last name" required><br><input type="checkbox" class="check-box"><span>I Agree to The Term & Conditions</span><br><button type="submit1" class="submit-btn" name="submit1">Register</button><br>';
         var forms = document.getElementsByClassName("input-group");
         //forms[0].style.marginLeft = "-100%"
         //forms[1].style.marginLeft = "-100%"


    }
    else{
        console.log("Not equal");
        //$('.doc').hide();
        //$('.pat').show();

        var adiv = document.getElementById("register").innerHTML = '<h3>"Im a:"</h3><br><select id="role" name="role" onchange="updateform()"><br><option value="doc">Doctor</option><br><option value="pat">Patient</option><br><input type="text" id="username" class="input-field" name="username" placeholder="User/Doctor username" required><br><input type="text" id="password" class="input-field" name ="password" placeholder="Password" required><br><input type="text" id="fname" class="input-field" name="fname" placeholder="First name" required><br><input type="text" id="lname" class="input-field" name="lname" placeholder="Last name" required><br><input type="text" id="prof" class="input-field" name="prof" placeholder="Profession" required><br><input type="text" id="address" class="input-field" name="address" placeholder="Address" required><br><input type="checkbox" class="check-box"><span>I Agree to The Term & Conditions</span><br><button type="submit2" class="submit-btn" name="submit2">Register</button><br>';
        var forms = document.getElementsByClassName("input-group");
        //forms[0].style.marginLeft = "-100%"
        //forms[1].style.marginLeft = "-100%"
    }
 }
					