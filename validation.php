<?php

  $fName="";
	$lName="";
	$gender="";
	$email="";
	$address="";
	$phoneNo="";
  $password="";
	$confPwd="";

//add product
  $price="";
  $name="";

  $fnameError="";
  $lnameError="";
  $genderError="";
  $emailError="";
  $addressError="";
  $phoneError="";
  $passwordError="";
  $confpasswordError="";
 
  //add product
  $priceError="";
  $productnameError="";

  //image upload
  
  $imageError = "";

  $checkValid="true";

// -----------------------------------------------REGISTRATION VALIDATION--------------------------------------
  if (isset($_POST['submitButton'])){

    if (empty($_POST["fName"])){
      $fnameError = "Name is required";
      $checkValid = "false";
    }else{
		$fName = $_POST["fName"];
		if(!preg_match("/^[a-zA-Z ]*$/",$fName))
		{
			$fnameError = "Only letters and white space allowed";
			$fName="";
			$checkValid = "false";
		}
	}

	if (empty($_POST["lName"])){
      $lnameError = "Surname is required";
      $checkValid = "false";
    }else{
		$lName = $_POST["lName"];
		if(!preg_match("/^[a-zA-Z ]*$/",$lName))
		{
			$lnameError = "Only letters and white space allowed";
			$lName="";
			$checkValid = "false";
		}
	}

	if(empty($_POST["gender"])){
		$genderError="Gender is required";
		$checkValid="false";
	}else{
		$gender=$_POST["gender"];
		if ($gender != 'male' && $gender != 'female')
		{
			$genderError=" Gender required male or Female";
			$gender="";
			$checkValid="false";
		}
	}

	if (empty($_POST["email"])){
      $emailError = "Email is required";
      $checkValid = "false";
    }else{
        $email= $_POST["email"];
        if(!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email))
        {
    			$emailError = "Proper Email address is required";
    			$email="";
          $checkValid = "false";
		    }else{
          // $emailError = "Proper Email address is requiredasdsdasdasdas";
          //$checkValid = "true";
        }

  }

  if (empty($_POST["address"])){
      $addressError = "Address is required";
      $checkValid = "false";
   	}else{
   		$address = $_POST["address"];
      if(!preg_match("/^[a-zA-Z ]*$/",$address)){
        $addressError = "Proper address is required";
        $address="";
        $checkValid = "false";
      }
    }

   	if (empty($_POST["phoneNo"])){
   		$phoneError="Contact Number required";
   		$checkValid="false";
   	}else{
   		$phoneNo=$_POST["phoneNo"];
   		if (!ctype_digit($phoneNo) OR strlen($phoneNo) != 10){
   			$phoneError="Contact No is required";
   			$phoneNo="";
   			$checkValid="false";
   		}
   	}

   	if (empty($_POST["password"])){
   		$passwordError="password required";
   		$checkValid="false";
   }else{
   	$password=$_POST["password"];
   	if (strlen($password) < 3 OR strlen($password) > 20){
   		$passwordError="Password is required";
   		$password="";
   		$checkValid="false";
   	}
  }

  	if (empty($_POST["confPwd"])){
  		$confpasswordError = "confirm password is required";
  		$checkValid = "false";
  	}else{
  		$password=$_POST["password"];
      $confPwd=$_POST["confPwd"];
      // var_dump($password);
      // var_dump($confPwd);
      // exit();
  		if ($confPwd != $password){
  			$confpasswordError="confirm Password is required khkhk";
  			$confPwd="";
  			$checkValid="false";
  		}
  	}



    // if($checkValid== "true"){
    //   echo("success");
    // }else{
    //   echo("unSUCCESS")
    // }
}




// ----------------------------------------------------------LOGIN VALIDATION-----------------------------------------------
  if (isset($_POST['login-button'])){
        if (empty($_POST["email"])){
            $emailError = "Email is required";
            $checkValid = "false";
          }else{
              $email= $_POST["email"];
              if(!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email))
              {
                $emailError = "Proper Email address is required";
                $email="";
                $checkValid = "false";
              }else{
                // $emailError = "Proper Email address is requiredasdsdasdasdas";
                //$checkValid = "true";
              }

        }
    }

  //------------------------------ADD/UPDATE PRODUCT VALIDATION --------------------------//

 // if ( (isset($_POST['addPdBttn'])) || (isset($_POST['editProductButton'])))
 // {
  if ((isset($_POST['addPdBttn']))|| (isset($_POST['editProductButton'])))
    {
      if (empty($_POST["Name"]))
      {
        $productnameError = "Product name is required";
        $checkValid = "false";
      }

      if (empty($_POST["Price"]))
      {
        $priceError="Price is  required";
        $checkValid="false";
      }else
      {
        $price=$_POST["Price"];
        if(!preg_match("/^\d{0,8}(\.\d{1,4})?$/",$price))
        {
          $priceError="Price should be digits";
          $price="";
          $checkValid="false";
        }
      }
    }
  // }
?>



