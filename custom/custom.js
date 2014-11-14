
// Simple turn one div on and the other off function
function swap(one, two) {
    document.getElementById(one).style.display = 'block';
    document.getElementById(two).style.display = 'none';
}


// Switch on-off the visibility of the element id (elid)
function switchvis(elid) {
    var current_state = document.getElementById(elid).style.display;
    
    if(current_state == "none") {
        var exit_state = 'block';
    } 
    
    if(current_state == "block") {
       var exit_state = 'none';
    }
    document.getElementById(elid).style.display = exit_state;
}


// Get a list of all the session ids and turn all the others off
function toggle(elid) {
	
	console.log("this is the element id " + elid + " it has been set to block.");
	document.getElementById(elid).style.display = "block";

	var target = document.getElementById("dom_target");
    var element_string = target.textContent;
    var element_array = element_string.split(",");

    // Get element ids that are not elid & set display none
    // Loop over the array and do a string compare
    for(var i = 0; i < element_array.length; i++) {
    	if(element_array[i] != elid && element_array[i]){
    		document.getElementById(element_array[i]).style.display = "none";
    	} 
    }    
}
