function showTab(tab){
	$("#menu-tabs .item").removeClass("active");
	$("#tab-" + tab).addClass("active");
	$("#menu .sub").hide();
	$("#sub-" + tab).show();
}

$(document).ready(function(){
	$("#tab-misc"	).click(function(){ showTab("misc"); });
	$("#tab-block"	).click(function(){ showTab("block"); });
	$("#tab-item"	).click(function(){ showTab("item"); });
	$("#tab-res"	).click(function(){ showTab("res"); });
	$("#tab-mech"	).click(function(){ showTab("mech"); });
	$("#tab-tut"	).click(function(){ showTab("tut"); });
	showTab("misc");
});