$(document).ready(function(){
//Hide the tooglebox when page load
$(".togglebox").hide(); 
//slide up and down when hover over heading 2
$("h4").hover(function(){
// slide toggle effect set to slow you can set it to fast too.
$(this).next(".togglebox").slideToggle("slow");
return true;
});
});

$(document).ready(function(){

	//Hide (Collapse) the toggle containers on load
	$(".togglebox1").hide(); 

	//Slide up and down on hover
	$("h4").click(function(){
		$(this).next(".togglebox1").slideToggle("slow");
	});

});
$(document).ready(function(){

	//Hide (Collapse) the toggle containers on load
	$(".togglebox2").hide(); 

	//Slide up and down on hover
	$("h4").click(function(){
		$(this).next(".togglebox2").slideToggle("slow");
	});

});