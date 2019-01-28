
function deleteProduct(product_id){ 
	if(confirm("Do you want to delete this Product?") == true)
    window.location="Product.php?delete_product_id=" + product_id;
   	return false;
}

function validateCategory(){
	var categoryName = document.getElementById("categoryName").value;
	if(categoryName.trim() == ""){
		alert("Please enter Category Name");
		return false;
	}
}

function validateFrgtPwd(){
	var emailId=document.getElementById("emailId").value;
	if(emailId.trim() == ""){
		alert("Please Enter Your Email Id");
		return false;
	}
}

function validateContactUs(){
	var name = document.getElementById("name").value;
	if(name.trim() == ""){
		alert("Please enter Full Name");
		return false;
	}
	var email = document.getElementById("email").value;
	if(email.trim() == ""){
		alert("Please enter Email Address");
		return false;
	}
	var subject=document.getElementById("subject").value;
	if (subject.trim() == ""){
		alert("Please Enter Your Message");
		return false;
	}
}

function validateaddProduct(){
	var name = document.getElementById("Name").value;
	if(name.trim() == ""){
		alert("Please Enter Product Name");
		return false;
	}
	var price=document.getElementById("Price").value;
	if(price.trim() == ""){
		alert("Please Enter Price");
		return false;
	}
	var description=document.getElementById("Description").value;
	if(description.trim()== ""){
		alert("Please Enter Description");
		return false;
	}
	var quantity=document.getElementById("Quantity").value;
	if(quantity.trim()== ""){
		alert("Please Enter Quantity");
		return false;
	}
	var image=document.getElementById("txtImage").value;
	if(image.trim()== ""){
		alert("Please Choose an Image");
		return false;
	}
	
}

