function updateData(clicked) {

    let ope = document.getElementById(clicked);
    let id = clicked.slice(6);
    let row = document.getElementById("row" + id);
    let cells = row.getElementsByTagName("td");
    
    let uname = cells[1];
    let email = cells[2];
    let phn_no = cells[3];
    let role = cells[4];
    


    if (ope.innerHTML == "Edit") {
        ope.innerHTML = "Confirm";
        
        uname.contentEditable = true;
        email.contentEditable = true;
        phn_no.contentEditable = true;
        role.contentEditable = true;
        

    } 
    else {

        
        if(uname.innerHTML.trim() == "" ||  email.innerHTML.trim()=="") { 
            alert("Fill all the entries");
            return;
        }
        var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
        if (!email.innerHTML.match(validRegex)) {
            alert("Enter a valid email");
            return; 
        }
      
      
        let result = confirm("Confirm the Changes");


        if (result == true) {
            ope.innerHTML = "Edit";
            let xhttp;
            uname.contentEditable = false;
            email.contentEditable = false;
            phn_no.contentEditable = false;
            role.contentEditable = false;
            let val = "id=" + id + "&uname=" + uname.innerHTML  + "&email=" + email.innerHTML +"&phn_no=" + phn_no.innerHTML + "&role=" + role.innerHTML;
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("error").innerHTML = this.responseText;
                }
            };

            xhttp.open("POST", "updateUser.php");
            xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhttp.send(val);
        }
        
        
            return;

    }

 


}
function updateZooData(clicked) {

    let ope = document.getElementById(clicked);
    let id = clicked.slice(6);
    let row = document.getElementById("row" + id);
    let cells = row.getElementsByTagName("td");
    
    let zoo_name= cells[1];
    let  state= cells[2];
    let city = cells[3];
    let area = cells[4];


    if (ope.innerHTML == "Edit") {
        ope.innerHTML = "Confirm";
        
        zoo_name.contentEditable = true;
        state.contentEditable = true;
        city.contentEditable = true;
        area.contentEditable = true;
        

    } 
    else {
      
        let result = confirm("Confirm the Changes");


        if (result == true) {
            ope.innerHTML = "Edit";
            let xhttp;
            zoo_name.contentEditable = false;
            state.contentEditable = false;
            city.contentEditable = false;
            area.contentEditable = false;
            
            let val = "id=" + id + "&zoo_name=" + zoo_name.innerHTML  + "&state=" + state.innerHTML +"&city=" + city.innerHTML + "&area=" + area.innerHTML;
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("error").innerHTML = this.responseText;
                }
            };

            xhttp.open("POST", "updateZoo.php");
            xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhttp.send(val);
        }
        
        
            return;

    }

 


}

function addzoo()
{
 
let zoo_name = document.getElementById('zoo_name').value;
let state = document.getElementById('state').value;
let city = document.getElementById('city').value;
let area = document.getElementById('area').value;


let value= "zoo_name=" + zoo_name + "&state=" + state + "&city=" + city + "&area=" + area;

xhttp = new XMLHttpRequest();

xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        document.getElementById("error").innerHTML = this.responseText;
    }
};
    xhttp.open('POST', "add_zoo.php", true);
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.send(value);
}


function updateanimalsData(clicked) {

    let ope = document.getElementById(clicked);
    let id = clicked.slice(6);
    let row = document.getElementById("row" + id);
    let cells = row.getElementsByTagName("td");
    let a = document.getElementById("zooOption"+id).value;

    let animals_name= cells[1];
    let  scientific_name= cells[2];
    let type = cells[3];
    let category = cells[4];
    // let  a= z[0].innerHTML;
    // let zname=a.trim();
 
    if (ope.innerHTML == "Edit") {
        ope.innerHTML = "Confirm";
        
        
        animals_name.contentEditable = true;
        scientific_name.contentEditable = true;
        type.contentEditable = true;
        category.contentEditable = true;
        document.getElementById("zooOption"+id).disabled = false;
    } 
    else {
      
        let result = confirm("Confirm the Changes");


        if (result == true) {
            ope.innerHTML = "Edit";
            let xhttp;
            animals_name.contentEditable = false;
            scientific_name.contentEditable = false;
            type.contentEditable = false;
            category.contentEditable = false;
            document.getElementById("zooOption"+id).disabled = true;
           
            
            let val = "id=" + id + "&animals_name=" + animals_name.innerHTML  + "&scientific_name=" + scientific_name.innerHTML +"&type=" + type.innerHTML + "&category=" + category.innerHTML + "&a=" + a ;
            
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("error").innerHTML = this.responseText;
                }
            };

            xhttp.open("POST", "Animals/updateanimals.php");
            xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhttp.send(val);
        }
        
        
            return;

    }

 


}

function addanimals()
{
 
let animals_name = document.getElementById('animals_name').value;
let scientific_name = document.getElementById('scientific_name').value;
let type = document.getElementById('type').value;
let category = document.getElementById('category').value;
let zoo = document.getElementById("zoo").value;


let value= "animals_name=" + animals_name + "&scientific_name=" + scientific_name + "&type=" + type + "&category=" + category + "&zoo=" + zoo;

xhttp = new XMLHttpRequest();

xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        document.getElementById("error").innerHTML = this.responseText;
    }
};
    xhttp.open('POST', "Animals/add_animals.php", true);
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.send(value);
}
