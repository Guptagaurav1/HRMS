$(document).ready(function (){
	var token = $("meta[name=csrf-token]").attr('content');

	function get_cities(stateid, oldcity = ''){
		$.ajax({
			url : SITE_URL+'/hr/recruitment/cities',
			method : 'post',
			dataType : 'json',
			data : {
				'stateid' : stateid,
				'_token' : token
			},
			success : function(res){
				if (res.success) {
					var cities = "<option value=''>Select City</option>";
					res.cities.forEach(function(item, index) {
						if (oldcity && oldcity == item.id) {
							cities += '<option value="'+item.id+'" selected>'+item.city_name+'</option>';
						}
						else {
							cities += '<option value="'+item.id+'" selected>'+item.city_name+'</option>';
						}
					});
					$("#city").html(cities);
				}	
			}
		})
	}

	// Get cities when state changes.
	$("#states").change(function () {
		var stateid = $(this).val();
		get_cities(stateid);
	});

	// Get old cities.
	var oldcity = $("input[name=old_city]").val();
	if (oldcity) {
		var stateId = $("#states").val();
		console.log(stateId);
		get_cities(stateId, oldcity);
	}
})