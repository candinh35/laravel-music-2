$(document).ready(function() {
    //Khi bàn phím được nhấn và thả ra thì sẽ chạy phương thức này
		$(".form-validate").validate({
			rules: {
                "name":"required",
				"email": "required",
                "old_password": "required",
				"password": "required",
                "confirm_password": {
                    required: true,
                    equalTo: "#password"
                },
                "phonenumber": "required",

                "singer_id" :"required",
                "category_id" :"required",
                "price": {
                    required: true,
                    digits: true
                },
                "image" :{
                    required: true,
                    extension: "jpg,jpeg,png"
                },
                "audio" :{
                    required: true,
                    extension: "mp3"
                },
                "dob" :"required",
			},
			messages: {

			}
		});
});