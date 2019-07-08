// Wait for the DOM to be ready
$(function () {
	$("form[name='login']").validate({
		rules: {
			password: {
				required: true,
				minlength: 6,
			},
			email: {
				required: true,
				email: true
			}
		},
		messages: {
			password: {
				required: "Please provide a password",
				minlength: "Your password must be at least 6 characters long",
			},
			email: {
				required: "Pease enter your email",
				email : "Enter a valid email"
			}
		},
		submitHandler: function (form) {
			form.submit();
		}
	});
});