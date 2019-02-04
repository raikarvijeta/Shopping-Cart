$(document).ready(function(){

		$("#firstNameErrorMsg").hide();
		$("#lastNameErrorMsg").hide();
		$("#genderErrorMsg").hide();/*no*/
		$("#emailErrorMsg").hide();
		$("#addressErrorMsg").hide();/*no*/
		$("#flatNoErrorMsg").hide();/*no*/
		$("#zipErrorMsg").hide();
		$("#stateErrorMsg").hide();/*no*/
		$("#phoneErrorMsg").hide();
		$("#faxErrorMsg").hide();
		$("#passwordErrorMsg").hide();
		$("verifyPasswordErrorMsg").hide();
		$("captchaErrorMsg").hide();

		var firstNameError= false;
		var lastNameError= false;
		var genderError= false;
		var emailError= false;
		var addressError= false;
		var flatNoError= false;
		var zipError= false;
		var StateError= false;
		var phoneError= false;
		var faxError= false;
		var passwordError= false;
		var verifyPasswordError=false;
		var captchaError=false;
	
	$("#firstName").keydown(function(){
		validateFirstName();
	});
	$("#lastName").keydown(function(){
		validateLastName();
	});

	$("#password").keydown(function(){
		valiadtePassword();
	});

	$("#confPassword").focusout(function(){
    	validateVerifyPassword();
    });


	$("#email").keydown(function (){
		if (!validateEmail($("#email").val())){
			$("#email").css("border-bottom","2px solid #F90a0a");/*fail*/
        	$("#emailErrorMsg").html("Invalid email Address");
        	emailError=true;
        }else{
        	 $("#email").css("border-bottom","2px solid #34f458");/*green on success*/
             $("#emailErrorMsg").html("valid email Address");
         }
    });

    $("#phone").keydown(function(){
    	validatePhone();
    });
    $("#zipCode").keydown(function(){
    	validateZipCode();
    });
    $("#faxNo").keydown(function(){
    	validateFaxNo();
    });

    $("#captchaInput").focusout(function(){
    	validateCaptcha();
    });




function validateFirstName(){
	if ($("#firstName").val().match('^[a-zA-Z]{3,16}$')){
		$("#firstNameErrorMsg").hide();
		$("#firstName").css("border-bottom","2px solid #34F458");/*green on success*/
	}else{
		var nameLength=$("#firstName").val().length;
		if( nameLength<3){
			$("#firstNameErrorMsg").html("Name should contain more than 3 letters");
		}else{
			$("#firstName").css("border-botton","2px solid #F90A0A");
			$("#firstNameErrorMsg").html("Name should contain only alphabets");
		}
		$("#firstName").css("border-bottom","2px solid #F90a0a");/*fail on red*/
		$("#firstNameErrorMsg").show();
	    firstNameError=true;
	}
}


function validateLastName(){
	if ($("#lastName").val().match('^[a-zA-Z]{3,16}$')){
		$("#lastNameErrorMsg").hide();
	    $("#lastName").css("border-bottom","2px solid #34f458");/*green on success*/
	}else{
		var nameLength=$("#lastName").val().length;
		if( nameLength <3){
			$("#lastNameErrorMsg").html("Lastname should contain more than 3 letters");
		}else{
			$("#lastName").css("border-botton","2px solid #F90A0A");
			$("#lastNameErrorMsg").html("Lastname should contain only alphabets");
		}
		$("#lastName").css("border-bottom","2px solid #F90a0a");/*fail*/
		$("#lastNameErrorMsg").show();
		lastNameError=true;
	}
}


function valiadtePassword(){
	var passwordPattern = new RegExp(/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/);
	if((passwordPattern.test($("#password").val()))){
		$("#passwordErrorMsg").hide();
		$("#password").css("border-bottom","2px solid #34f458");/*green on success*/
	}else{
		$("#password").css("border-bottom","2px solid #F90a0a");/*fail*/ 
		$("#passwordErrorMsg").html("Minimum eight characters, at least one letter, one number and one special character");
		$("#passwordErrorMsg").show();
		passwordError = true;
     }
}


function validateVerifyPassword() {
	
		var password = $("#password").val();
		var verifyPassword = $("#confPassword").val();
		//alert(verifyPassword);
		
			
			if(password!=verifyPassword) {
				$("#confPassword").css("border-bottom","2px solid #F90a0a");/*fail*/ 
				$("#verifyPasswordErrorMsg").html("Passwords don't match");
				$("#verifyPasswordErrorMsg").show();
				verifyPasswordError = true;
			} else {
				$("#verifyPasswordErrorMsg").show();
				$("#confPassword").css("border-bottom","2px solid #34f458");/*green on success*/
				$("#verifyPasswordErrorMsg").html("Passwords is matching ");
			}
		
}


function validateEmail(email){
	var expr = /([\w\-]+\@[\w\-]+\.[\w\-]+)/;
	return expr.test(email);
}


function validatePhone(){
	if ($("#phone").val().match('^[0-9-+]{10,20}$')){
		$("#phoneErrorMsg").hide();
	    $("#phone").css("border-bottom","2px solid #34f458");/*green on success*/
	}else{
		var phoneLength=$("#phone").val().length;
		if( phoneLength <10){
			$("#phoneErrorMsg").html("Required numbers should be 10");
		}else{
			$("#phone").css("border-botton","2px solid #F90A0A");
			$("#phoneErrorMsg").html("Should contain No characters");
		}
		$("#phone").css("border-bottom","2px solid #F90a0a");/*fail*/
		$("#phoneErrorMsg").show();
		phoneError=true;
	}
}


function validateZipCode(){
	if ($("#zipCode").val().match('^[0-9]{6,}$')){
		$("#zipErrorMsg").hide();
	    $("#zipCode").css("border-bottom","2px solid #34f458");/*green on success*/
	}else{
		var zipCodeLength=$("#zipCode").val().length;
		if( zipCodeLength<7){
			$("#zipErrorMsg").html("Required numbers should be valid");
		}else{
			$("#zipCode").css("border-botton","2px solid #F90A0A");
			$("#zipErrorMsg").html("Should contain No characters");
		}
		$("#zipCode").css("border-bottom","2px solid #F90a0a");/*fail*/
		$("#zipErrorMsg").show();
		zipError=true;
	}
}


function validateFaxNo(){

	if ($("#faxNo").val().match('^[0-9-+]{10,20}$')){
		$("#faxErrorMsg").hide();
	    $("#faxNo").css("border-bottom","2px solid #34f458");/*green on success*/
	}else{
		var faxNoLength=$("#faxNo").val().length;
		if( faxNoLength<11){
			$("#faxErrorMsg").html("Required numbers should be valid");/*fail*/
		}else{
			$("#faxNo").css("border-botton","2px solid #F90A0A");
			$("#faxErrorMsg").html("Should contain No characters");
		}
		$("#faxNo").css("border-bottom","2px solid #F90a0a");/*fail*/
		$("#faxErrorMsg").show();
		faxError=true;
	}
}


function validateCaptcha(){
	var string1 = removeSpaces(document.getElementById('captcha').value);
	var string2 = removeSpaces(document.getElementById('captchaInput').value);
	if (string1 == string2){
		$("#captchaInput").css("border-bottom","2px solid #34f458");/*green on success*/
		$("#captchaErrorMsg").html("Valid Captcha");
		$("#captchaErrorMsg").show();
	}else{
		$("#captchaInput").css("border-bottom","2px solid #F90a0a");/*fail*/
		$("#captchaErrorMsg").html("Invalid Captcha");
		$("#captchaErrorMsg").show();
		captchaError = true;
	}
}


function removeSpaces(string){
            return string.split(' ').join('');
          }

  $("#registerForm").submit(function() {
		
		firstNameError=false;
		lastNameError= false;
		genderError= false;
		emailError= false;
		addressError= false;
		flatNoError= false;
		zipError= false;
		StateError= false;
		phoneError= false;
		faxError= false;
		passwordError= false;
		verifyPasswordError=false;
		captchaError=false;
		
		validateFirstName();
		validateLastName();							
		valiadtePassword();
		validateVerifyPassword();
		validateEmail();
		validatePhone();
		validateZipCode();
		validateFaxNo();
		validateCaptcha();

		
		
		if(firstNameError == false && lastNameError == false && genderError == false && emailError == false && addressError == false && flatNoError == false && zipError == false && StateError == false && phoneError == false && faxError == false &&
		passwordError== false && verifyPasswordError == false && captchaError == false) {
			return true;
		} else {
			return false;	
		}

	});

});



function generateCaptcha(){
	var alpha = new Array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');
	var i;
	for (i=0;i<4;i++){
		var a = alpha[Math.floor(Math.random() * alpha.length)];
		var b = alpha[Math.floor(Math.random() * alpha.length)];
		var c = alpha[Math.floor(Math.random() * alpha.length)];
		var d = alpha[Math.floor(Math.random() * alpha.length)];
	}
	var code = a + '' + b + '' + '' + c + '' + d;
	document.getElementById("captcha").value = code
}



































