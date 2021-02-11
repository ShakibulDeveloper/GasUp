$(document).ready(function(){

	$(".menu_btn").click(function(){
	    $(".left_sidebar").show();
	});

	$(".close_icon").click(function(){
	    $(".left_sidebar").fadeOut();
	});
	
});

function getGasPrice(set)
{
	var url = $('#get_gas_price').val();
	var name = set.value;

    if (url != null && name != null) {
		$.ajax({
			url: url,
			data: {name: name},
			method: 'get',
			success: function (result) {
				$('#price').val(result);
			},
		});
	}else{
		alert('Something went wrong');
	}
}

function CalculatePrice()
{
	var gas = $('#gas').val();
	var litre = $('#litre').val();
	var url = $('#calc_gas_price').val();

	if (url != null && litre != null) {
		$.ajax({
			url: url,
			data: {litre: litre, gas: gas},
			method: 'get',
			success: function (result) {
				$('#price').val(result);
			},
		});
	}else{
		alert('Wrong input');
	}

}