function validation(){
	var gender= document.getElementById('gender');
	var dob= document.getElementById('dob');
	var bloodgroup= document.getElementById('bloodgroup');
	var placeofbirth= document.getElementById('paceofbirth');
	var maritalstatus= document.getElementById('maritalstatus');
	var nationality= document.getElementById('nationality');
	var nid= document.getElementById('nid');
	var place= document.getElementById('place');
	var dateofissue= document.getElementById('dateofissue');
	var phone= document.getElementById('phone');

		
	var re = /^[A-Za-z ]+$/;
	
	var res = /^[a-zA-Z0-9]+$/;
	
	var regex_date =  /^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/;
	
	if(gender.value=="" ){
		gender.focus();
		return false;
	}
	if(dob.value==""){
		dob.focus();
		return false;
	}
	
	if(bloodgroup.value==""){
		bloodgroup.focus();
		return false;
	}
	if(placeofbirth.value=="" || !re.test(placeofbirth.value)){
		placeofbirth.focus();
		return false;
	}
	
	if(maritalstatus.value==""){
		maritulstatus.focus();
		return false;
	}
	
	if(nationality.value==""){
		nationality.focus();
		return false;
	}
	
	if(nid.value=="" || !res.test(nid.value)){
		nid.focus();
		return false;
	}
	
	if(place.value=="" || !re.test(place.value)){
		place.focus();
		return false;
	}
	
	if(dateofissue.value=="" || !regex_date.test(dateofissue.value)){
		dateofissue.focus();
		return false;
	}
	
	if(phone.value==""){
		phone.focus();
		return false;
	}
	
	
	
	
	
	
	
	
	
	
	return true;
}
