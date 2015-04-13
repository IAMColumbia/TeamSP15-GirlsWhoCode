function deleteLink(){
$("a").each(function(){
		        if($(this).hasClass("disabled")){
		        	$(this).removeAttr("href");
		        }
			  });
}