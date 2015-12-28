$(document).ready(function(){
	$('#breadcrumbs a').each(function(){
		$('#categoriesmenu a[href="'+$(this).attr('href')+'"]').addClass('current');
	});

	$('#breadcrumbs strong').each(function(){
		$('#categoriesmenu a:contains(' +$(this).text() +')').addClass('current');
	});

	$('#center').layoutHeight({  
		offSet: -17 
	});
	
});

function product_tooltip(id){
	$("#"+id).wTooltip({ 
		content: $("#"+id+">div").html(), 
		id: "myId",
		fadeIn: "normal",
		fadeOut: "fast",
		offsetY: 10,
		offsetX: 5, 	
        delay:1000,
        timeout:0	
	});
}
