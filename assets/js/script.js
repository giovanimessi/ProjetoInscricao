
	$(".port").click(function(){

		var checkbox = $(this).is(":checked");

		if (checkbox) {
			$(".lib").show();
		}else{
			$(".lib").hide();
		}
		
	})