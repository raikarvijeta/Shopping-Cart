function imageSwap(currentImage)
{
	var thumbImg= currentImage.src;
	var bigImg=document.getElementById("bigImg");
	bigImg.src=currentImage.src;
}

function openLightbox(currentImage)
{
	var modalImg = document.getElementById("img01");
	var myModal =document.getElementById("myModal");
	modalImg.src = currentImage.src;
	myModal.style.display = "block";
}
function closeLightbox(currentImage)
{
	var span = document.getElementsByClassName("close")[0];
	var myModal =document.getElementById("myModal");
	span.onclick = function()
	{ 
		myModal.style.display = "none";
	}
}


