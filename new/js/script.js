$(document).ready(function(){
	$("#login").click(function(){
			$("#light_bg").fadeIn("slow");
			$("#login-box").fadeIn("slow");
			$("body").css("overflow","hidden");
	});
		
	$("#close").click(function(){
			$("#light_bg").fadeOut("slow");
			$("#login-box").fadeOut("slow");
			$("body").css("overflow","visible");
	});
});
