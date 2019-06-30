

$(document).ready(function(){
	$("#btn1").click(function(){
		$("#div4").toggleClass("toggle");
	});
	
$(window).bind('resize',function(){
	
	if($(window).width()>800)
		
	{
		var div=$("#div4");
		var div2=$("#div5");
		div.css("width","200px");
		div.css("padding-top","50px");
		div.removeClass("toggle");
		div2.css("margin-left","250px");
		div2.css("margin-top","80px");
		$("#btn1").hide();
		
	}
	else
		{
			var div=$("#div4");
			var div2=$("#div5");
		div.css("width","0px");
		div.css("padding-top","80px");
		div2.css("margin-left","0px");
		div2.css("margin-top","130px");
		$("#btn1").show();
		
	}
});
});