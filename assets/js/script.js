	$(".port").click(function(){

		var checkbox = $(this).is(":checked");
        console.log(checkbox);

		if (checkbox) {
			$(".lib").show();
		}else{
			$(".lib").hide();
		}
		
	})