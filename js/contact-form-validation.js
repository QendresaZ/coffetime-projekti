$(function() {
    
    $("form[name='form-registration']").validate({

        //Specify validation rules
        rules: {
            name: {
                required: true,
                minlength: 2,
                lettersonly: true
            },
            surname: {
                required: true,
                minlength: 2,
                lettersonly: true
            },
            email: {
                required: true,
                //Specify that email should be validated
                //by the biult in "email" true
                email: true
            },
            phone: {
                required: true,
                digits: true
            }
        },
        //specify validation error messages
        messages: {
            name: {
                required: "Please enter your name",
                minlength: "Your name must be at least 2 characters",
                lettersonly: "Only letters are accepted"
            },
            surname: {
                required: "Please enter your surname",
                minlength: "Your surname must be at least 2 characters",
                lettersonly: "Only letters are accepted"
            },
            email: {
                required: "Please enter your email",
                email: "Enter a valid email"
            }
        },
        //make sure the form is submitted to the destination defined
        //in the action attribute of the form when valid

        submitHandler: function(form) {
            form.submit();
        }
    });
});