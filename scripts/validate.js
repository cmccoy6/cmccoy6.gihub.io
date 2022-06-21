function Validate() {
    var w = document.forms["accountcreate"]["username"].value;
    if (w == "") {
        alert("Please choose a username");
        return false;
    } else if (w.length > 20) {
		alert("username is too long"); 
		return false;
	} 	
    var x = document.forms["accountcreate"]["fname"].value;
    if (x == "") {
        alert ("Please provide your First Name");
        return false;
    } else if (x.length > 25) {
		alert("First name is too long"); 
		return false;
	} 
    var y = document.forms["accountcreate"]["lname"].value;
    if (y == "") {
        alert ("Please provide your Last Name");
        return false;
    } else if (y.length > 25) {
		alert("Last name is too long")
		return false;
	} 
    var p = document.forms["accountcreate"]["pass"].value;
    if (p == "") {
        alert ("Please provide your password");
        return false;
    }
    plength = p.length;
    var re = /(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}/;
    if (plength < 10) {
        alert("Your password is not long enough");
        return false;
    }
    else if (!re.test(p)) {
		alert("Password must contain (1) of the following: lowercase letter, uppercase letter, number, special character(@$!%*#?&)"); 
		return false; 
	}
}

