$(document).ready(function(){
	var objSideShow = ".wrapper .header .sideshow-control ul li";
	$(objSideShow + ":not(:first)").css("display","none");
	setInterval(function(){
	if( 
	    $(objSideShow + ":last").is(":visible")){
		$(objSideShow + ":first").fadeIn("1500").addClass("in");
		$(objSideShow + ":last").hide()
	}
	else{
		$(objSideShow + ":visible").addClass("in");
		$(objSideShow + ".in").next().fadeIn("1500");
		$(objSideShow + ".in").hide().removeClass("in")}
	},5000)
	$(".wrapper .header .navbar .search .text").click(function(){
		if(this.value == "Search..."){
			this.value = "";
		}
	}).blur(function(){
			if(this.value == ""){
				this.value = "Search...";
			}
	})
})