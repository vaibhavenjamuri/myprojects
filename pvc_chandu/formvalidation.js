// this is a start function which is called from load function

   // this is the complete function for validation
function formValidation(){
	
		var firstName = document.getElementById("firstName").value;
		var lastName = document.getElementById("lastName").value;
		var mobileNumber = document.getElementById("mobileNumber").value;
		var eMail = document.getElementById("mailId").value;
		var currentDate = document.getElementById("currentDate").value;
		var expectedDate = document.getElementById("expectedDate").value;
		
				
				if(validateFirstName(firstName)){
						
					if(validateLastName(lastName)){
							
						if(validateMobileNumber(mobileNumber)){
								 
						    if(validateEmailId(eMail)){
										 
								if(validateDates(currentDate, expectedDate)){
										
										return true;
										 
								} else {
									return false;
								}//end of fifth if loop 
								
							}else {
								
								return false;
							}//end of fourth if loop
									
					    }else {
							return false;
						}//end of third loop
										
					}else {
						return false;
					}//end of second loop
				}else {
					return false;
				}//end of first if loop	
	
		}    
		
		
		// validating the first name
		function validateFirstName(firstName){
		
			// using a regular expression to verify the given user input
			var charInFirstName = /^[A-Za-z ]{2,25}$/;
			//start of first if else loop  for verifying the correct input
			if(firstName.length >1 &&  firstName.length<25){
				  
				if (firstName.search(charInFirstName) !== -1) {
				  
				        return true;
			        }
		     	 else {
			    	window.alert("Please Enter the valid first name");
				    return false;
			    }
			}//end of first if else loop
			
			else{
				window.alert("First Name should be between 1 to 25 characters!");
				return false;
			}//end of second if else loop
			
		
		}//end of validateFirstName function

          // validating the last name
        function validateLastName(lastName){
		
			// using a regular expression to verify the given user input
			var charInLastName = /^[A-Za-z ]{2,15}$/;;
			//start of first if else loop  for verifying the correct input
			if(lastName.length >1 &&  lastName.length<15){
				    
			    if  (lastName.search(charInLastName) !== -1){	
				    return true;
			    }
		     	else {
			    	window.alert("Please Enter the valid last name");
				    return false;
			    } //end of first if else loop
			}
			else{
				window.alert("Last Name should be between 1 to 15 characters!");
				return false;
			}//end of second if else loop
			
		
		}// end of the validateLastName function 
         
		
		//function for validating the mobile number
		function validateMobileNumber(mobileNumber){
			
			// start of firs if loop to verify if the given input is a number or not
			if(mobileNumber.length !== 0){	

                // verifying if the given input of phone number is equal to 10			
			    var numberOfDigitsInMobileNumber = /^\d{10}$/;
				if(mobileNumber.search(numberOfDigitsInMobileNumber) == -1) {
					window.alert("Mobile Number must be 10 digit");	
					return false;
			    }
			
			    else {
				    
					// if loop to verify if the mobile number has starting number 0.
				    if  (mobileNumber[0]==0){
						window.alert("please enter a valid number, phone number does not start with 0");
                        return false;						
				    }
					else {		      
						return true;
					}
						
					// end of third if else loop
					 
			    }// end of second if else loop
			}
			else {
				window.alert("Mobile Number must be filled out");
				return false;
			}// end of first if else loop
		}// end of function validateMobileNumber 
    

        function validateEmailId(eMail) { // validating the function of email
			 
			if (eMail.length == 0) {
				window.alert("Your mailid must be filled out");
				return false;
			} 
			else  {
				var charInEmail = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+.[A-Z]{2,4}/igm;
		
				// If Email Id field does contain above defined characters else display appropriate error messsage in alert window
				if(eMail.search(charInEmail) == -1) {
					window.alert("Entered invalid mailid");	
					return false;
				} // End of second if
				
				else{
					return true;
				}
				
			}
			
		}//end of validateEmailId function

	
		function validateDates(currentDate, expectedDate) {		
			
			//Code to check the dates filling and expected date should be greater than current date
			if (expectedDate == "" || currentDate == "") {
				window.alert("Both the Dates should be filled out!");
				return false;
			} else if (currentDate > expectedDate) {
				window.alert("Expected date should be greater than current date");
				return false;
			}
			// Checking tick mark on check box for terms and conditions
			if (document.getElementById("agree").checked)	{
				return true;
			}
			else {
				window.alert("Please indicate that you have read and agree to the Terms and Conditions");
				return false;
			}
	
		} //end of validateDates function



		// Validation of status php page reference number, which is entered by user
		function validateRefNum() {
				
			var refNumber = document.getElementById("refNumber").value;
				
			if (refNumber.length == 0) {
				window.alert("Reference number should not be blank");
				return false;
			} else  { 
				var charInRefNumber = /^[A-Za-z0-9]{8}$/;
				if (refNumber.search(charInRefNumber) == -1 ) {
					window.alert("Enter valid reference number1");
					return false;
				}
				return true;
			}
	
		}
